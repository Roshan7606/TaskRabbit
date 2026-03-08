<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('md'); // tamaru common model hoy to
    }

    public function addtocart() {
        $item_id = $this->input->post('item_id');
        $qty     = (int)$this->input->post('qty');
        if(!$qty) $qty = 1;

        // Example: item fetch (table name tamara project pramane change karo)
        $item = $this->md->my_select("tbl_item", "*", array("item_id" => $item_id));
        if(empty($item)){
            echo json_encode(["status"=>false,"msg"=>"Item not found"]);
            return;
        }
        $item = $item[0];

        $data = array(
            'id'    => $item->item_id,
            'qty'   => $qty,
            'price' => $item->item_price,
            'name'  => $item->item_name
        );

        $this->cart->insert($data);

        // Optional: right side cart html return
        $cart_html = $this->load->view("cart_box", [], true);

        echo json_encode([
            "status" => true,
            "cart_html" => $cart_html,
            "total_items" => $this->cart->total_items()
        ]);
    }
}