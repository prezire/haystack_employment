<?php
  //http://www.techfounder.net/2011/04/23/breaking-down-the-paypal-api/
  class ExpressCheckout {
    public function __construct() {
      //1. Getting The Checkout Token - SetExpressCheckout.
      $requestParams = array
      (
        'RETURNURL' => 'http://www.yourdomain.com/payment/success',
        'CANCELURL' => 'http://www.yourdomain.com/payment/cancelled'
      );
      $orderParams = array
      (
        'PAYMENTREQUEST_0_AMT' => '500',
        'PAYMENTREQUEST_0_SHIPPINGAMT' => '4'
        'PAYMENTREQUEST_0_CURRENCYCODE' => 'GBP'
      );
      $item = array
      (
        'L_PAYMENTREQUEST_0_NAME0' => 'iPhone',
        'L_PAYMENTREQUEST_0_DESC0' => 'White iPhone, 16GB',
        'L_PAYMENTREQUEST_0_AMT0' => '500',
        'L_PAYMENTREQUEST_0_QTY0' => '1'
      );
      //
      /*$this->load->library('paypalapis/paypal', '', 'paypalapi');
      $response = $this->paypalapi->apiRequest
      (
        'SetExpressCheckout',
        $requestParams +
        $orderParams +
        $item
      );
      //2. Redirecting To PayPal Using The Checkout Express Token.
      if 
      ( 
        is_array( $response ) && 
        $response['ACK'] == 'Success' 
      ) {
        //Request successful
        $token = $response['TOKEN'];
        header(
          'Location: https://www.paypal.com/webscr?cmd=_express-checkout&token=' .
          urlencode( $token )
        );
        //3. Completing The Transaction
        if 
        ( 
          isset( $_GET['token'] ) && 
          !empty( $_GET['token'] ) 
        ) {
          //Token parameter exists.
          //Get checkout details, including buyer information.
          //We can save it for future reference
          //or cross check with the data we have.
          $checkoutDetails = $this->paypalapi->apiRequest
          ( 
            'GetExpressCheckoutDetails',
            array( 'TOKEN' => $_GET['token'] ) 
          );
          // Complete the checkout transaction
          $requestParams = array
          (
            'PAYMENTREQUEST_0_PAYMENTACTION' => 'Sale',
            'PAYERID' => $_GET['PayerID']
          );
          //
          $response = $this->paypalapi->apiRequest
          (
            'DoExpressCheckoutPayment', 
            $requestParams 
          );
          if 
          ( 
            is_array( $response ) && 
            $response['ACK'] == 'Success' 
          ) {
            //Payment successful.
            //We'll fetch the transaction 
            //ID for internal bookkeeping.
            $transactionId = $response['PAYMENTINFO_0_TRANSACTIONID'];
          }
        }
      }*/
    }
  }