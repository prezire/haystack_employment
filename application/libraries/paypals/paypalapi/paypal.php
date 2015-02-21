<?php
  //TODO: Include recurring payment option.
  class Paypal {
    //Last error messages
    private $aErrors;
    /**
     * API Credentials. Use the correct credentials for the
     * environment in use (Live / Sandbox).
     */
    private $aCreds;
    /**
     * API endpoint
     * Live - https://api-3t.paypal.com/nvp
     * Sandbox - https://api-3t.sandbox.paypal.com/nvp
     */
    private $sEndPoint;
    private $sVer;
    public function __construct() {
      $this->setErrors(array());
      $this->setCredentials
      (
        array
        (
          'USER' => 'seller_1297608781_biz_api1.lionite.com',
          'PWD' => '1297608792',
          'SIGNATURE' => 'A3g66.FS3NAf4mkHn3BDQdpo6JD.ACcPc4wMrInvUEqO3Uapovity47p',
        )
      );
      $this->setEndPoint('https://api-3t.sandbox.paypal.com/nvp');
      $this->setVersion('74.0');
    }
    public final function setErrors($errors){
      $this->aErrors = $errors;
    }
    public final function getErrors(){
      return $this->aErrors;
    }
    public final function setCredentials($credentials){
      $this->aCreds = $credentials;
    }
    public final function getCredentials(){
      return $this->aCreds;
    }
    public final function setEndPoint($endPoint){
      $this->sEndPoint = $endPoint;
    }
    public final function getEndPoint(){
      return $this->sEndPoint;
    }
    public final function setVersion($version){
      $this->sVer = $version;
    }
    public final function getVersion(){
      return $this->sVer;
    }
    /**
     * Make API request.
     * @param string  $method string API method to request.
     * @param array   $params Additional request parameters.
     * @return array / boolean Response array / boolean false on failure.
     */
    public final function apiRequest( $method, $params = array() ) {
      if ( empty( $method ) ) {
        //Check if API method is not empty.
        $this->setErrors(array( 'API method is missing' ));
        return false;
      }
      //Our request parameters.
      $requestParams = array
      (
        'METHOD' => $method,
        'VERSION' => $this->sVer
      ) + $this->aCreds;
      //Building our NVP string.
      $request = http_build_query( $requestParams + $params );
      //cURL settings.
      $curlOptions = array
      (
        CURLOPT_URL => $this->sEndPoint,
        CURLOPT_VERBOSE => 1,
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_SSL_VERIFYHOST => 2,
        //CA cert file
        CURLOPT_CAINFO => dirname( __FILE__ ) . '/cacert.pem',
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => $request
      );
      $ch = curl_init();
      curl_setopt_array( $ch, $curlOptions );
      //Sending our request - $response will hold the API response
      $response = curl_exec( $ch );
      //Checking for cURL errors
      if ( curl_errno( $ch ) ) {
        $this->setErrors(curl_error( $ch ));
        curl_close( $ch );
        return false;
        //TODO: Handle errors after returning...
      }
      else {
        curl_close( $ch );
        $responses = array();
        //Break the NVP string to an array.
        parse_str( $response, $responses );
        return $responses;
      }
    }
  }