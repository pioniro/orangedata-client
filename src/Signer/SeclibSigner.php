<?php
declare(strict_types=1);

namespace Pioniro\OrangeData\Signer;

use Pioniro\OrangeData\Exception\DependencyException;
use Pioniro\OrangeData\SignerInterface;
use phpseclib\Crypt\RSA;

class SeclibSigner implements SignerInterface
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
        if(!class_exists('\phpseclib\Crypt\RSA'))
            throw new DependencyException('For usage ' . __CLASS__  . ' phpseclib/phpseclib must be installed');
        $this->privateKey = $privateKey;
    }
    public function sign($data): string
    {
        $rsa = new RSA();
        $rsa->setPrivateKey($this->privateKey);
        $rsa->setPrivateKeyFormat(RSA::PRIVATE_FORMAT_XML);
        $rsa->setHash('sha256');
        $rsa->setMGFHash('sha256');
        $rsa->setSignatureMode(RSA::SIGNATURE_PKCS1);
        return base64_encode($rsa->sign($data));
    }
}