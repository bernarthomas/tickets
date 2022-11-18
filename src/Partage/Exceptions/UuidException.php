<?php

namespace Domaine\Partage\Exceptions;

use Throwable;
use Exception;

/**
 * L'uuid n'est pas valide
 */
class UuidException extends Exception
{
    /**
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message ?? "L'Uuid n'est pas valide. ", $code, $previous);
    }
}
