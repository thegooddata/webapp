<?php

/**
 * Stripe Docs:
 * https://stripe.com/docs
 * 
 * Test CC Number:
 * 4242 4242 4242 4242
 * */

require_once(dirname(__FILE__).'/stripe/lib/Stripe.php');

class YiiStripe extends CApplicationComponent
{
  
  public $test=true;
  public $test_secret_key='sk_test_B8HMrs0HYcTmoLdtvmOUZP5l';
  public $test_publishable_key='pk_test_flBzSw7jwY4lJ7B3KoCmFzZs';
  
  public $secret_key=null;
  public $publishable_key=null;
  
  private $error=null;
  
  public function init() {
    
    parent::init();
    
    Stripe::setApiKey($this->getSecretKey());
    
  }
  
  public function getSecretKey() {
    return $this->test ? $this->test_secret_key : $this->secret_key;
  }
  
  public function getPublishableKey() {
    return $this->test ? $this->test_publishable_key : $this->publishable_key;
  }
  
  public function charge($params) {
    $this->cleanError();
    // Create the charge on Stripe's servers - this will charge the user's card
    try {
      $charge = Stripe_Charge::create($params);
    } catch(Stripe_Error $e) {
      // The card has been declined
      $this->error=$e->getMessage();
    }
  }
  
  public function cleanError() {
    $this->error=null;
  }
  
  public function hasError() {
    return ($this->error !== null);
  }
  
  public function getError() {
    return $this->error;
  }
  
}