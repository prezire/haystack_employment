<?php
  //http://coding.smashingmagazine.com/2011/09/05/getting-started-with-the-paypal-api/
  class DirectPayment {
    public function __construct() {
      $requestParams = array
      (
        'IPADDRESS' => $_SERVER['REMOTE_ADDR'],
        'PAYMENTACTION' => 'Sale'
      );
      $creditCardDetails = array
      (
        'CREDITCARDTYPE' => 'Visa',
        'ACCT' => '4929802607281663',
        'EXPDATE' => '062012',
        'CVV2' => '984'
      );
      $payerDetails = array
      (
        'FIRSTNAME' => 'John',
        'LASTNAME' => 'Doe',
        'COUNTRYCODE' => 'US',
        'STATE' => 'NY',
        'CITY' => 'New York',
        'STREET' => '14 Argyle Rd.',
        'ZIP' => '10010'
      );
      $orderParams = array
      (
        'AMT' => '500',
        'ITEMAMT' => '496',
        'SHIPPINGAMT' => '4',
        'CURRENCYCODE' => 'GBP'
      );
      $item = array
      (
        'L_NAME0' => 'iPhone',
        'L_DESC0' => 'White iPhone, 16GB',
        'L_AMT0' => '496',
        'L_QTY0' => '1'
      );
      /*
        $this->load->library('paypalapis/paypal', '', 'paypalapi');
        $response = $this->paypalapi->apiRequest
        (
          'DoDirectPayment',
          $requestParams +
          $creditCardDetails +
          $payerDetails +
          $orderParams +
          $item
        );
        if ( is_array( $response ) && $response['ACK'] == 'Success' ) {
          //Payment successful. We'll fetch the 
          //transaction ID for internal book keeping.
          $transactionId = $response['TRANSACTIONID'];
        }
      */
    }
  }