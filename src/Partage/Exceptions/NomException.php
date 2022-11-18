<?php

namespace Domaine\Partage\Exceptions;

use Throwable;
use Exception;

/**
 * Le libellé du nom n'est pas valide
 */
class NomException extends Exception
{
    /**
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(string $message = '', int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message ?? "Le libellé n'est pas valide. ", $code, $previous);
    }
}
