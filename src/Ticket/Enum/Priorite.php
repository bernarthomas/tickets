<?php

namespace Domaine\Ticket\Enum;

/**
 * Liste blanche des priorités du ticket
 */
enum Priorite: int
{
    case IMMEDIATE = 1;
    case URGENTE = 2;
    case ELEVEE = 3;
    case NORMALE = 4;
    case BASSE = 5;
    case AUCUNE = 6;
}
