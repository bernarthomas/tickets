<?php

namespace Domaine\Ticket\Enum;

/**
 * Liste blanche des impacts du ticket
 */
enum Impact: int
{
    case BLOQUANT = 1;
    case CRITIQUE = 2;
    case MAJEUR = 3;
    case MINEUR = 4;
    case COSMETIQUE = 5;
    case FONCTIONNALITE = 6;
}
