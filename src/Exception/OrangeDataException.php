<?php
declare(strict_types=1);

namespace Pioniro\OrangeData\Exception;

use Exception;
use Throwable;

class OrangeDataException extends Exception
{
    protected $context;

    public function __construct($message = "", array $context = [], $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->context = $context;
    }

    /**
     * @param array $context
     * @return $this
     */
    public function addToContext(array $context): self
    {
        $this->context = array_merge_recursive($this->context, $context);
        return $this;
    }

    /**
     * @return array
     */
    public function getContext(): array
    {
        return $this->context;
    }

}