<?php
namespace App\Core;

class Encryption {
    private $ciphering = "AES-256-GCM"; 
    private $encryptionKey = "aKeyForDemonstration";
    private $encryptionIV = "anIVForDemonstration";
    private $decryptionKey = "aKeyForDemonstration";  //Feels redundant to do considering its AES but at the moment I think it improves clarity 
    private $decryptionIV = "anIVForDemonstration";   

    public function encrypt($data) {
        return openssl_encrypt(
            $data,
            $this->ciphering,
            $this->encryptionKey,
            OPENSSL_RAW_DATA,
            $this->encryptionIV
        );
    }

    public function decrypt($data) {
        return openssl_decrypt(
            $data,
            $this->ciphering,
            $this->decryptionKey,
            OPENSSL_RAW_DATA,
            $this->decryptionIV
        );
    }
}
?>