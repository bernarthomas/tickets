<?php

namespace Domaine\Partage\Exceptions;

use Throwable;
use Exception;

/**
 * L'url n'est pas valide
 */
class UrlException extends Exception
{
    /**
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(string $message = '', int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct(empty($message) ? "L'url n'est pas valide. " : $message, $code, $previous);
    }
}
