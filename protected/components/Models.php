<?php


class Models extends CActiveRecord
{
    private $key = 'Tramparam';
    private $alg = MCRYPT_BLOWFISH;
    private $mode = MCRYPT_MODE_ECB;
    public function encryption($str)
    {
        $encrypted_data = mcrypt_encrypt($this->alg, $this->key, $str, $this->mode);
        $result = base64_encode($encrypted_data);
        return $result;
    }

    public function decryption($data)
    {
        $decoded = mcrypt_decrypt($this->alg,$this->key,base64_decode($data),$this->mode);
        return trim($decoded);
    }
} 