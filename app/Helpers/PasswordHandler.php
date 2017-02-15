<?php

namespace Acme\FsTest\Helpers;


class PasswordHandler
{
    static function hashPassword( $string )
    {
        $hash = password_hash( $string, PASSWORD_DEFAULT);

        return $hash;
    }

    static function verifyPassword( $string, $hash )
    {
        if ( $isValid = password_verify( $string, $hash ) )
        {
            return $isValid;
        } return false;
    }

    static function encryptPassword( $string )
    {
        $iv     = openssl_random_pseudo_bytes( openssl_cipher_iv_length( 'AES-256-CBC' ) );

        $iv_enc = trim( base64_encode( $iv ), '=' );

        if( ( $crypt = openssl_encrypt( $string, 'AES-256-CBC', 'secret', 0, $iv ) ) === FALSE )
        {
            throw new \RuntimeException("String Encryption Error");
        }

        return $crypt.':'.$iv_enc;
    }

    static function decryptString( $string )
    {
        $str = explode( ':', $string );

        if( ( $decrypt = openssl_decrypt( $str[0], 'AES-256-CBC', 'secret', 0, base64_decode( $str[1] ) ) ) === FALSE )
        {
            throw new \RuntimeException("String Decryption Error");
        }

        return $decrypt;
    }
}