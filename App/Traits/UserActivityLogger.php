<?php
namespace App\Traits;

trait userActivityLogger {

public function logUserActivity($message, $logLevel) { 
    
    $metaTime = date("d-m-Y H:i:s");

    echo"[{$logLevel} | {$metaTime}] | User {$this->userId} | LOG: {$message}<br>";
}
}
//TBD for DB