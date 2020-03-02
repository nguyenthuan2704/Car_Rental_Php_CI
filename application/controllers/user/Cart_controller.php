<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('cart');
	}

	public function cart()
	{
		$data = array(
			'title' => 'Giỏ Hàng',
			'com' => 'cart',
			'view' => 'cart'
		);
		$this->load->view('user/layout',$data);
	}

	public function addToCart()
	{
		if(isset($_POST['submit'])):
	    $data = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('name'),
			'qty' => 1
	    );
	    if($this->cart->insert($data)):
	      $this->cart();
	    else:
	      echo "Error";
	    endif;
	    endif;
  }

  public function remove($rowid)
  {
    $data = array(
        'rowid' => $rowid,
        'qty' => 0
    );
    $this->cart->update($data);
    $this->cart();
  }

}

?>