<?php
	/*
		Thanks to Jeremy Desvaux from Creative Commons.
		$this->load->library('paypal');
		$this->paypal->addMultipleItems($this->paypal->getSampleItems());
		echo $this->paypal->getCartContentAsHtml();
		echo $this->paypal->getCheckoutForm();
	*/
	class PayPal {
		public $business;
		public $currency;
		public $curSymbol;
		public $location;
		public $returnUrl;
		public $returnTxt;
		public $cancelUrl;
		public $items;
		public function __construct( $config = '' ) {
			$settings = array(
				//paypal email address.
				'business' => 'jeremy@jdmweb.com',
				//paypal currency.
				'currency' => 'SGD',
				//currency symbol.                    
				'curSymbol'=> 'SGD',
				//location code  (ex GB).
				'location' => 'SG',
				//where to go back when the transaction is done.
				'returnUrl'=> 'http://mysite/myreturnpage',
				//What is written on the return button in paypal.
				'returnTxt'=> 'Return to My Site',
				//Where to go if the user cancels.
				'cancelUrl'=> 'http://mysite/mycancelpage',
				//Shipping cost.
				'shipping' => 0,
				//Custom attribute
				'custom'   => ''
			);
			//Overrride default settings
			if ( !empty( $config ) ) {
        foreach ( $config as $key=>$val ) {
					if ( !empty( $val ) ) { $settings[$key] = $val; }
				}
      }
			//
			$this->business  = $settings['business'];
			$this->currency  = $settings['currency'];
			$this->curSymbol = $settings['curSymbol'];
			$this->location  = $settings['location'];
			$this->returUurl = $settings['returnUrl'];
			$this->returnTxt = $settings['returnTxt'];
			$this->cancelUrl = $settings['cancelUrl'];
			$this->shipping  = $settings['shipping'];
			$this->custom    = $settings['custom'];
			$this->items = array();
		}
		public final function addSimpleItem( $item ) {
			if ( !empty( $item['quantity'] )
				&& is_numeric( $item['quantity'] )
				&& $item['quantity']>0
				&& !empty( $item['name'] )
			) {
				$items = $this->items;
				$items[] = $item;
				$this->items = $items;
			}
		}
		public final function getSampleItems() {
			return $items = array(
				1 => array(
					"name" => "Gold Tickets",
					"price" => 3,
					"quantity" => 2,
					"shipping" => 0
				),
				2 => array(
					"name" => "Silver Tickets",
					"price" => 2,
					"quantity" => 1,
					"shipping" => 0
				),
				3 => array(
					"name" => "Bronze Tickets",
					"price" => 1,
					"quantity" => 1,
					"shipping" => 0
				)
			);
		}
		public final function addMultipleItems( $items ) {
			foreach ( $items as $item ) {
				$this->addSimpleItem( $item );
			}
		}
    //TODO: Transf to view fldr.
		//Sample view model.
		public final function getCartContentAsHtml( $hidetotal=0 ) {
			$content='<ul id="cartcontent">'; 
      $total=0; 
      $count = 0;
			$cpt=1;
			if ( !empty( $this->items ) ) {
        foreach ( $this->items as $item ) {
					$amount = $item['quantity']*$item['price'];
					$content .= '<li class="cartitem">' . 
                            $item['quantity'] . 
                            ' x "' . 
                            $item['name'] . 
                            '" at ' . 
                            $this->cursymbol . 
                            ''.
                            $item['price'];
					if ( $item['shipping']>0 ){
            $content .=  ' + ' . 
                              $this->cursymbol . 
                              '' . 
                              $item['shipping'] . 
                              ' shipping ';
          }
					$content.=' for '.$this->cursymbol.''.$amount;
					$content.='</li>';
					$total+=$amount;
					$count+=$item['quantity'];
					$cpt++;
				}
      }
			if ( $hidetotal!=1 ) { 
        $content .= '<li class="carttotal">Total: ' . 
                  $count . 
                  ' Items for ' . 
                  $this->curSymbol . 
                  ''.$total.'</li>'; 
      }
			$content.='</ul>';
			return $content;
		}
		//Checkout form view.
		public final function getCheckoutForm() {
			$form = '<form id="paypal_checkout" action="https://www.paypal.com/cgi-bin/webscr" method="post">';
			//Variables defining a cart, there shouldn't be 
      //a need to change those.
			$form.='
				<input type="hidden" name="cmd" value="_cart" />
				<input type="hidden" name="upload" value="1" />
				<input type="hidden" name="no_note" value="0" />
				<input type="hidden" name="bn" value="PP-BuyNowBF" />
				<input type="hidden" name="tax" value="0" />
				<input type="hidden" name="rm" value="2" />';
			//Personnalised variables, they get their values from the 
      //specified settings nd the class attributes.
			$form.='
			   <input type="hidden" name="business" value="'.$this->business.'" />
			   <input type="hidden" name="handling_cart" value="'.$this->shipping.'" />
			   <input type="hidden" name="currency_code" value="'.$this->currency.'" />
			   <input type="hidden" name="lc" value="'.$this->location.'" />
			   <input type="hidden" name="return" value="'.$this->returnUrl.'" />
			   <input type="hidden" name="cbt" value="'.$this->returnTxt.'" />
			   <input type="hidden" name="cancel_return" value="'.$this->cancelUrl.'" />
			   <input type="hidden" name="custom" value="'.$this->custom.'" />';
			//Cart items.
			$cpt=1;
			if ( !empty( $this->items ) ) {
        foreach ( $this->items as $item ) {
					$form.='
				  <div id="item_'.$cpt.'" class="itemwrap">
					<input type="hidden" name="item_name_'.$cpt.'" value="'.$item['name'].'" />
					<input type="hidden" name="quantity_'.$cpt.'" value="'.$item['quantity'].'" />
					<input type="hidden" name="amount_'.$cpt.'" value="'.$item['price'].'" />
				   <input type="hidden" name="shipping_'.$cpt.'" value="'.$item['shipping'].'" />
				 </div>';
					$cpt++;
				}
      }
			//You can also specify your own button.
			$form .= '<input id="ppcheckoutbtn" type="submit" ' . 
                'value="Checkout" class="button" /></form>';
			return $form;
		}
	}
