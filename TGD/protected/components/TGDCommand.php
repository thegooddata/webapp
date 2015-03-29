<?php

class TGDCommand extends CConsoleCommand {
  
  public $debug=false;
  
  /**
   * Debug a message on screen
   * @param string $message
   */
  public function debug($message) {
    if ((bool)$this->debug) {
      echo $message."\n";
    }
  }
  
}

