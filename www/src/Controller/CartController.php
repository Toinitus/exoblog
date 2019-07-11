<?php

namespace App\Controller;

use \Core\Controller\Controller;

class CartController extends Controller
{
    public function __construct() {
        $this->loadModel('orders_line');
    }

    public function index() {
        //dd($_SESSION['user']->getId());
        if ($_SESSION['user'])
        {
            $products = $this->orders_line->getPanier($_SESSION['user']->getId());
            //dd($products);
        }else
        {
            header('location: /login');
            exit;
        }
        
        $priceTotalHT = 0;
        $nbProduit = 0; 
        foreach($products as $product) {
            $priceTotalHT += ($product->beerQTY * $product->priceHT);
            $nbProduit += $product->beerQTY;                                //pour afficher nombre article dans panier
        }
        $_SESSION['cartNumber'] = $nbProduit;
        //dd($priceTotalHT);
        return $this->render('cart/index', [
            'products' => $products,
            'priceTotalHT' => $priceTotalHT
        ]);
    }

    /*
    * Ajax Method
    */
    public function getProductsInCart() {
        $_SESSION['cartNumber'] = $this->orders_line->getProductsInCart();
        echo $_SESSION['cartNumber'];
    }

    public function updateCart() {
        if(count($_POST) > 0) {
            $id = htmlspecialchars($_POST['id']);
            $qty = htmlspecialchars($_POST['qty']);
            
            if($this->orders_line->update($id, 'id', ['qty' => $qty])) {
                echo 'OK';
                die;
            }
            else {
                return false;
            }
        }
        header('location: /boutique/panier');
        exit();
    }

    public function delete() {
        if(count($_POST) > 0) {
            $id = htmlspecialchars($_POST['id']);
            if($this->orders_line->delete($id)) {
                echo 'OK';
                die;
            }
            else {
                return false;
            }
        }
    }
}

