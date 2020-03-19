<?php
declare(strict_types=1);

namespace Pioniro\OrangeData\Exception;

use Throwable;

class ResponseException extends OrangeDataException
{
    public function __construct($request, $httpCode, $response, array $context = [], $code = 0, Throwable $previous = null)
    {
        parent::__construct('Bad response', $context, $code, $previous);
        $this->addToContext([
            'http' => [
                'request' => $request,
                'response' => $response,
                'code' => $httpCode
            ]
        ]);
    }

}