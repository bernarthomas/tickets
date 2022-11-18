<?php
namespace Domaine\Ticket\Modele;

use Domaine\Partage\Exceptions\UrlException;
use Domaine\Partage\Exceptions\UuidException;
use Domaine\Partage\Modele\Id;
use Domaine\Partage\Modele\Url;
use DateTimeImmutable;
use Domaine\Ticket\Enum\Impact;
use Domaine\Ticket\Enum\Priorite;
use Domaine\Ticket\Enum\Projet;
use Domaine\Ticket\Enum\Statut;
use Domaine\Utilisateur\Modele\Utilisateur;
use Ramsey\Uuid\Uuid;

/**
 * Représentation object d'un ticket Mantis
 */
class Ticket
{
    /**
     * @var Id|null
     */
    private ?Id $identifiant;

    /**
     * @var Url
     */
    private Url $url;

    /**
     * @var Projet
     */
    private Projet $projet;

    /**
     * @var Priorite
     */
    private Priorite $priorite;

    /**
     * @var Impact
     */
    private Impact $impact;

    /**
     * @var DateTimeImmutable
     */
    private DateTimeImmutable $date;

    /**
     * @var Statut
     */
    private Statut $statut;

    /**
     * @var Utilisateur
     */
    private Utilisateur $assignation;

    /**
     * @param Id|null $identifiant
     * @param Url $url
     * @param Projet $projet
     * @param Priorite $priorite
     * @param Impact $impact
     * @param Statut $statut
     * @param Utilisateur $assignation
     */
    private function __construct(
        Id|null $identifiant,
        Url $url,
        Projet $projet,
        Priorite $priorite,
        Impact $impact,
        Statut $statut,
        Utilisateur $assignation
    ) {
        $this->identifiant = $identifiant;
        $this->url = $url;
        $this->projet = $projet;
        $this->priorite = $priorite;
        $this->impact = $impact;
        $this->date = new DateTimeImmutable();
        $this->statut = $statut;
        $this->assignation = $assignation;
    }

    /**
     * @param string|null $identifiant
     * @param string $url
     * @param Projet $projet
     * @param Priorite $priorite
     * @param Impact $impact
     * @param Statut $statut
     * @param Utilisateur $assignation
     * @return Ticket
     * @throws UrlException
     * @throws UuidException
     */
    public static function cree(
        ?string $identifiant,
        string $url,
        Projet $projet,
        Priorite $priorite,
        Impact $impact,
        Statut $statut,
        Utilisateur $assignation
    ): Ticket {
        return new Ticket(
            new Id(is_null($identifiant) ? Uuid::uuid4() : $identifiant),
            Url::cree($url),
            $projet,
            $priorite,
            $impact,
            $statut,
            $assignation
        );
    }

    /**
     * @return Id
     */
    public function getIdentifiant(): Id
    {
        return $this->identifiant;
    }

    /**
     * @return Url
     */
    public function getUrl(): Url
    {
        return $this->url;
    }

    /**
     * @return Projet
     */
    public function getProjet(): Projet
    {
        return $this->projet;
    }

    /**
     * @return Priorite
     */
    public function getPriorite(): Priorite
    {
        return $this->priorite;
    }

    /**
     * @return Impact
     */
    public function getImpact(): Impact
    {
        return $this->impact;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getDate(): DateTimeImmutable
    {
        return $this->date;
    }

    /**
     * @return Statut
     */
    public function getStatut(): Statut
    {
        return $this->statut;
    }

    /**
     * @return Utilisateur
     */
    public function getAssignation(): Utilisateur
    {
        return $this->assignation;
    }
}
