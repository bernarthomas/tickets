<?php

namespace Domaine\Utilisateur\Modele;

use Domaine\Partage\Exceptions\NomException;
use Domaine\Partage\Exceptions\UuidException;
use Domaine\Partage\Modele\Id;
use Domaine\Partage\Modele\Nom;
use DateTimeImmutable;

/**
 * Représentation object d'un utilisateur
 */
class Utilisateur
{
    /**
     * @var Id
     */
    protected Id $identifiant;

    /**
     * @var Nom
     */
    protected Nom $nom;

    /**
     * @var Nom
     */
    protected Nom $prenom;

    /**
     * @var DateTimeImmutable
     */
    protected DateTimeImmutable $date;

    /**
     * @param string|null $identifiant
     * @param string $nom
     * @param string $prenom
     * @throws NomException
     * @throws UuidException
     */
    public function __construct(?string $identifiant, string $nom, string $prenom)
    {
        $this->identifiant = new Id($identifiant);
        $this->nom = Nom::cree($nom);
        $this->prenom = Nom::cree($prenom);
        $this->date = new DateTimeImmutable();
    }

    /**
     * @return Id
     */
    public function getIdentifiant(): Id
    {
        return $this->identifiant;
    }

    /**
     * @return Nom
     */
    public function getNom(): Nom
    {
        return $this->nom;
    }

    /**
     * @return Nom
     */
    public function getPrenom(): Nom
    {
        return $this->prenom;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getDate(): DateTimeImmutable
    {
        return $this->date;
    }
}
