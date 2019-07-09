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
        $beers = $this->beer->find($_POST['idBeer']);
        //dd($_SESSION['user']);
        $line = ['user_id'=> $_SESSION['user']->getId(),
                'beer_id'=> $beers->getId(), 
                'beerPriceHT'=> $beers->getPrice(),
                'beerQty'=> 1,
                'token'=> ''];
        
        $this->orders_line->create($line);
        header('location: /boutique');
        exit();
        //dd($beers);
    }
}
