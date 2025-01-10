<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shop extends CI_Controller
{
    public function addToCart()
    {
        $product_id = $this->input->post('pid');
        $product = $this->CommonModal->getRowByIdfield('products', 'product_id', $product_id, array('product_id', 'price', 'pro_name'));
        $data = getSingleRowById('tbl_products_image', array('product_id' => $product_id));
        $data = array(
            'id'      => $product[0]['product_id'],
            'qty'     => 1,
            'price'   => $product[0]['price'],
            'name'    => htmlentities($product[0]['pro_name']),
            'image'    => $data['pi_name']
        );


        $this->cart->insert($data);
    }
    // public function fetch_data()
    // {
    //     $this->load->view('cart_list');
    // }
    public function fetch_data_cart()
    {
        $this->load->view('cart_list');
    }
    public function delete_item()
    {
        $product_id = $this->input->post('pid');
        $data = array(
            'rowid' => $product_id,
            'qty'   => 0
        );
        $this->cart->update($data);
    }
    public function update_qty()
    {
        extract($this->input->post());
        $data = array(
            'rowid' => $rowid,
            'qty'   => $qty
        );
        $this->cart->update($data);
    }
    public function fetch_totalitems()
    {
        echo $this->cart->total_items();
    }
    public function fetch_totalamount()
    {
        echo $this->cart->format_number($this->cart->total());
    }
    public function fetch_cart()
    {
        $this->load->view('cart-product');
    }
    public function guestCheckoutBtn()
    {
        $this->load->view('guestCheckoutButton');
    }
}
