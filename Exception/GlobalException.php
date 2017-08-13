<?php

namespace OutCloud\CommonBundle\Exception;

use Throwable;

/**
 * Class GlobalException
 * @package CommonBundle\Exception
 */
abstract class GlobalException extends \Exception
{
    public const CODE = 0;
    public const HTTP_CODE = 500;
    public const MESSAGE = 'Internal Server Error';

    /**
     * GlobalException constructor.
     * @param null|string $message
     * @param Throwable|null $previous
     */
    public function __construct(?string $message = null, Throwable $previous = null)
    {
        parent::__construct($message ?? self::MESSAGE, $code = self::CODE, $previous);
    }
}

