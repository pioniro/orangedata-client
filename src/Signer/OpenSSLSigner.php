<?php
declare(strict_types=1);

namespace Pioniro\OrangeData\Signer;

use Pioniro\OrangeData\Exception\DependencyException;
use Pioniro\OrangeData\SignerInterface;

class OpenSSLSigner implements SignerInterface
{
    /**
     * @var string
     */
    protected $privateKey;

    /**
     * OpenSSLSigner constructor.
     * @param string $privateKey
     * @throws DependencyException
     */
    public function __construct(string $privateKey)
    {
        if(!function_exists('openssl_get_privatekey'))
            throw new DependencyException('For usage ' . __CLASS__  . ' Openssl must be installed');
        $this->privateKey = $privateKey;
    }

    public function sign($data): string
    {
        $data = pack('h*', '3031300d060960864801650304020105000420') . hash('sha256', $data, true);
        $pk = openssl_get_privatekey($this->privateKey);
        openssl_private_encrypt($data, $res, $pk);
        return base64_encode($res);
    }
}