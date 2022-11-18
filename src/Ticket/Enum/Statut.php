<?php

namespace Domaine\Ticket\Enum;

/**
 * Liste blanche des statuts du ticket
 */
enum Statut: int
{
    case NOUVEAU = 1;
    case COMMENTAIRE = 2;
    case ACCEPTE = 3;
    case CONFIRME = 4;
    case AFFECTE = 5;
    case CORRIGE_A_TESTER = 6;
    case A_LIVRER_EN_PROD = 7;
    case RESOLU = 8;
    case FERME = 9;
}
