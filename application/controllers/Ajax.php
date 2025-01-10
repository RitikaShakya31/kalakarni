<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function index()
    {
    }
    public function addToCart()
    {
        $product_id = $this->input->post('pid');
        $product = $this->CommonModal->getRowById('products', 'product_id', $product_id);
        $image = $this->CommonModal->getSingleRowById('products_image', array('product_id' => $product_id));
       
        print_r( $image);
        


        $data = array(
            'id'      => $product[0]['product_id'],
            'qty'     => 1,
            'price'   => $product[0]['price'],
            'name'    => $product[0]['pro_name'],
            'image'    => $image['pi_name']
        );

        $this->cart->insert($data);
       
    }
}
