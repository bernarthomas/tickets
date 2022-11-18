<?php

namespace Domaine\Utilisateur\Depot;

use Domaine\Utilisateur\Modele\Utilisateur as EntiteUtilisateur;

/**
 * Port dépôt Utilisateur
 */
interface UtilisateurInterface
{
    /**
     * @param EntiteUtilisateur $utilisateur
     * @return UtilisateurInterface
     */
    public function ajoute(EntiteUtilisateur $utilisateur): UtilisateurInterface;

    /**
     * @return array
     */
    public function liste(): array;
}
