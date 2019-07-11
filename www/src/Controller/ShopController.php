<?php
namespace App\Controller;

use \Core\Controller\Controller;

class ShopController extends Controller
{
    public function __construct() {
        $this->loadModel('beer');
        $this->loadModel('orders_line');
    }

    public function index()
    {
        return $this->render('shop/index');
    }

    public function all() {

        $beers = $this->beer->all();
        
        return $this->render('shop/boutique', [
            'beers' => $beers
        ]);
    }

    public function purchaseOrder() {
        
        if(count($_POST) > 0) {
            foreach($_POST['qty'] as $key => $value) {
                if($value > 0) {
                    $ids[] = $key;
                    $qty[] = $value;
                }
            }
            $ids = implode($ids, ',');

            $beers = $this->beer->getAllInIds($ids);

            $orderTotal = 0;
            foreach($beers as $key => $value) {
                $orderTotal += $value->getPrice() * constant('TVA') * $qty[$key];
            }
            
            return $this->render('shop/confirmationDeCommande', [
                'beers' => $beers,
                'data' => $_POST,
                'qty' => $qty,
                'order' => $orderTotal
            ]);
        }

        $beers = $this->beer->all();

        return $this->render('shop/bondecommande', [
            'beers' => $beers
        ]);
    }

    public function contact() {
        return $this->render('shop/contact', [
        ]);
    }

    public function addBeerCart(){
        if(null !== $_SESSION['user'] && $_SESSION['user']){
            $beers = $this->beer->find($_POST['idBeer']);
            //dd($_SESSION['user']);
            /*if ($_SESSION['token']) {
                #stokage de $_SESSION['token'] dans $token
                $token = $_SESSION['token'];
            } else {
                # creation du token et stokage dans $token
                $token = substr(md5(uniqid()), 0, 10);
            }*/
            //requete $this->orders_line->find($userid, $beerid, $token) 'cree par moi meme' ($line);
            //second if si la lign exist qty = qty +1 (update sql)
            //else creation de la ligne []
            $token="";
            $beerQty = $this->orders_line->getQtyAndID($_SESSION['user']->getId(), $beers->getId());
            
            $orderID = $beerQty[0]->getId();
            $beerLigne = $beerQty[0]->nb;
            $beerQty = $beerQty[0]->getQty();
            //dd($beerLigne, $beerQty, $orderID, $beers->getPrice());
            
            if ($beerLigne != 0){
                //update
                $line = ['user_id'=> $_SESSION['user']->getId(),
                    'beer_id'=> $beers->getId(), 
                    'beerPriceHT'=> ($beers->getPrice() * ($beerQty+1)),
                    'beerQty'=> ($beerQty + 1),
                    'token'=> $token];

                $this->orders_line->update($orderID, 'id', $line);
            } else {
                //create 
                $line = ['user_id'=> $_SESSION['user']->getId(),
                    'beer_id'=> $beers->getId(), 
                    'beerPriceHT'=> $beers->getPrice(),
                    'beerQty'=> 1,
                    'token'=> $token];

                $this->orders_line->create($line);
            }

            $_SESSION['cartNumber'] += 1;
            /*$line = ['user_id'=> $_SESSION['user']->getId(),
                    'beer_id'=> $beers->getId(), 
                    'beerPriceHT'=> $beers->getPrice(),
                    'beerQty'=> 1,
                    'token'=> $token];
            
            $this->orders_line->create($line);*/
            header('location: /boutique');
            exit();
            //dd($beers);
        }else{
            header('location: /login');
            exit();
        }
    }
}
