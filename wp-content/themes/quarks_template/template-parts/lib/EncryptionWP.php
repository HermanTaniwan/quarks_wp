<?php


class EncryptionWP
{
    // Storing the cipher method
    private static $ciphering = "AES-256-CTR";

    // Non-NULL Initialization Vector for encryption
    private static $encryption_iv = '1234567891011121';

    // Storing the encryption key
    private static $encryption_key = "W3docs";

    public static function encrypt($string): string
    {
        // Using openssl_encrypt() function to encrypt the data
        $encryption = openssl_encrypt($string, self::$ciphering, self::$encryption_key, 0, self::$encryption_iv);

        return base64_encode($encryption);
    }

    public static function decrypt($string): string
    {
        $string = base64_decode($string);
        // Using openssl_decrypt() function to decrypt the data
        return openssl_decrypt($string, self::$ciphering, self::$encryption_key, 0, self::$encryption_iv);
    }
}
