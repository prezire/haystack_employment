<?php
	class TransactionModel extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->library('cart');
		}
		public final function index()
		{
			return $this->cart->contents();
		}
	    public final function create
	    (
	    	$rowId, 
	    	$name, 
	    	$quantity, 
	    	$price, 
	    	$options = array()
	    )
	    {
	    	$data = array
	    	(
               'id' => $id,
               'name' => $name,
               'qty'   => $quantity,
               'price' => $price,
               'options' => $options
            );
	    	//Return the row ID.
	    	return $this->cart->insert($data);
	    }
	    public final function createChequePayment()
	    {
	    	$a = $this->readUserDetails();
	    	$b = array
	    	(
	    		'user_id' => $a['user']['id'],
	    		'company_id' => $a['company']['id']
	    	);
	    	$this->db->insert('cheque_payments', $b);
	    	return $this->readChequePayment($this->db->insert_id());
	    }
	    public final function createDirectBankTransfer()
	    {
	    	$a = $this->readUserDetails();
	    	$b = array
	    	(
	    		'user_id' => $a['user']['id'],
	    		'company_id' => $a['company']['id']
	    	);
	    	$this->db->insert('direct_bank_transfers', $b);
	    	return $this->readDirectBankTransfer
	    	(
	    		$this->db->insert_id()
	    	);
	    }
	    //
	    public final function readChequePayment($orderId)
	    {
	    	return $this->db->get_where
	    	(
	    		'cheque_payments', 
	    		array('id' => $orderId)
	    	);
	    }
	    public final function readDirectBankTransfer($orderId)
	    {
	    	return $this->db->get_where
	    	(
	    		'direct_bank_transfers', 
	    		array('id' => $orderId)
	    	);
	    }
	    //Helper for other controllers to
		//modify params in any case.
		public final function readParams()
	    {
	      $i => $this->input;
	      $a = array
	      (
	        'id' => $i->post('id');
	        'name' => $i->post('name');
	        'quantity' => $i->post('quantity');
	        'price' => $i->post('price');
	        'options' => $i->post('options');  
	      );
	      return $a;
	    }
	    //
	    public final function readUserDetails()
	    {
	    	$this->load->model('companymodel');
			$u = getLoggedUser();
			$c = $this->companymodel->readByUserId($u->id)->row();
			$a = array
			(
				'user' => array
				(
				  'id' => $u->id, 
				  'full_name' => $u->fullName
				),
				'company' => array
				(
					'id' => $c->id,
					'name' => $c->name,
					'address' => $c->address,
					'city' => $c->city,
					'state' => $c->state,
					'country' => $c->country
				)
			);
			return $a;
	    }
	    public final function read($rowId)
	    {
	    	$c = $this->cart->contents();
	    	foreach($c as $i)
	    	{
	    		if($i['rowid'] == $rowId)
	    		{
	    			return $i;
	    		}
	    	}
	    }
	    public final function update
	    (
	    	$rowId, 
	    	$name, 
	    	$quantity, 
	    	$price, 
	    	$options = array()
	    )
	    {
	    	//TODO: Create a helper outside this method
	    	//that has a formula 
	    	//of pricing when the item is updated.
	    	$data = array
	    	(
               'rowid' => $rowId,
               'name' => $name,
               'qty'   => $quantity,
               'price' => $price,
               'options' => $options
            );
	    	$this->cart->update($data);
	    }
	    public final function delete($destroyAll = false, $rowId)
	    {
	    	if($destroyAll)
	    	{
	    		$this->cart->destroy();
	    	}
	    	else
	    	{
	    		$data = array('rowid' => $rowId,'qty' => 0);
	    		$this->cart->update($data); 
	    	}
	    }
	    public final function total($items = false)
	    {
	    	return $items ? 
	    			$this->cart->total() : 
	    			$this->cart->total_items();
	    }