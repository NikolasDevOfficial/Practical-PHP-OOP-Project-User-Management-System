<?php
namespace App\Security;
class Encryption {
    private $ciphering = "AES-256-CBC"; 
    private $encryptionKey = "aKeyForDisplay10";
    private $encryptionIV = "anIVForDisplay10";
    private $decryptionKey = "aKeyForDisplay10";  //Feels redundant to do considering its AES, but at the moment I think it improves clarity / works as a demonstration
    private $decryptionIV = "anIVForDisplay10";   
//For the sake of simplicity, but following common practices, encryption is used. However the values are hardcoded and fixed 
//for ease of use. In a real world scenario, each encryption and IV would be randomly generated for every encryption instance
 
    public function encrypt($data) {
return base64_encode (
         openssl_encrypt(
            $data,
            $this->ciphering,
            $this->encryptionKey,
            OPENSSL_RAW_DATA,
            $this->encryptionIV
        )
);
}
    public function decrypt($data) {
        
        return openssl_decrypt(
            base64_decode($data),
            $this->ciphering,
            $this->decryptionKey,
            OPENSSL_RAW_DATA,
            $this->decryptionIV
        );
    }
}

?>