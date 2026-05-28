<?php
namespace App\Traits;

trait userActivityLogger {

public function logUserActivity($message, $logLevel) { 
$metaTime = date("d-m-Y H:i:s");
    
    echo"[{$logLevel} | {$metaTime}] | User {$this->userId} | LOG: {$message}<br>";

    
error_log(
    "DEBUG: " . $logLevel . " | " . $metaTime . " | User " . $this->userId . " | LOG: " . $message
);
error_log("ID TYPE: " . gettype($this->userId));
error_log("ID VALUE: " . $this->userId);
}
}
//TBD for DB