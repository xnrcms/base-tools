<?php

namespace Xnrcms\BaseTools\Rsa;

class Rsa
{
    /**
     * 创建公钥和私钥
     * @param array $config
     * @param string $filepath
     * @param string $filename
     * @return bool
     */
    public function createRsa(array $config = [],string $filepath = '',string $filename = ''): bool
    {
        $config         = array_merge(["digest_alg" => "sha512", "private_key_bits"  => 2048, "private_key_type"  => OPENSSL_KEYTYPE_RSA],$config);
        $tt             = date('YmdHis');

        $filepath       = !empty($filepath) ? $filepath : '';
        $filename       = (!empty($filename) ? $filename : $tt);

        /*// 生成私钥

        $rsa            = openssl_pkey_new($config);
        openssl_pkey_export($rsa, $priKey, null, $config);
        file_put_contents($path . DIRECTORY_SEPARATOR . $filename . '_private' . '.key', $priKey);

        // 生成公钥
        $rsaPri         = openssl_pkey_get_details($rsa);
        $pubKey         = $rsaPri['key'];
        file_put_contents($path . DIRECTORY_SEPARATOR . $code . '_pub_' . $tt . snowflake_id() . '.key', $pubKey);*/

        return true;
    }
}