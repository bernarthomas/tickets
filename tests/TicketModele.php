<?php

namespace Tests;

use Domaine\Partage\Exceptions\NomException;
use Domaine\Partage\Exceptions\UrlException;
use Domaine\Partage\Exceptions\UuidException;
use Domaine\Partage\Modele\Id;
use Domaine\Partage\Modele\Url;
use Domaine\Ticket\Enum\Impact;
use Domaine\Ticket\Enum\Priorite;
use Domaine\Ticket\Enum\Projet;
use Domaine\Ticket\Enum\Statut;
use Domaine\Ticket\Modele\Ticket;
use Domaine\Utilisateur\Modele\Utilisateur;
use PHPUnit\Framework\TestCase;
use DateTimeImmutable;
use Exception;

/**
 * Tests unitaires objet Ticket Mantis
 */
class TicketModele extends TestCase
{
    /**
     * @return void
     * @throws NomException
     * @throws UrlException
     * @throws UuidException
     */
    public function testInstanciation(): void
    {
        $url = 'https://mantis.enseignement-catholique.fr/view.php?id=30249#c73596';
        $uuidUtilisateur = 'fbd5cfb1-ebc9-42fe-ab70-5ab2820b87ba';
        $uuidTicket = 'fa568e13-d36c-469a-b940-5f0fb855303d';
        $ticketIdNull = Ticket::cree(
            null,
            $url,
            Projet::ANGE2D,
            Priorite::BASSE,
            Impact::MINEUR,
            Statut::CONFIRME,
            new Utilisateur($uuidUtilisateur, 'Nom', 'Prénom')
        );
        $this->assertInstanceOf(Id::class, $ticketIdNull->getIdentifiant());
        $this->assertInstanceOf(Url::class, $ticketIdNull->getUrl());
        $this->assertInstanceOf(Projet::class, $ticketIdNull->getProjet());
        $this->assertInstanceOf(Priorite::class, $ticketIdNull->getPriorite());
        $this->assertInstanceOf(Impact::class, $ticketIdNull->getImpact());
        $this->assertInstanceOf(Statut::class, $ticketIdNull->getStatut());
        $this->assertInstanceOf(Utilisateur::class, $ticketIdNull->getAssignation());
        $this->assertInstanceOf(DateTimeImmutable::class, $ticketIdNull->getDate());
        $this->assertEquals($url, $ticketIdNull->getUrl()->getValeur());
        $this->assertEquals(2, $ticketIdNull->getProjet()->value);
        $this->assertEquals(5, $ticketIdNull->getPriorite()->value);
        $this->assertEquals(4, $ticketIdNull->getImpact()->value);
        $this->assertEquals(4, $ticketIdNull->getStatut()->value);
        $this->assertEquals($uuidUtilisateur, $ticketIdNull->getAssignation()->getIdentifiant()->getValeur());
        $ticketIdNonNull = Ticket::cree(
            $uuidTicket,
            $url,
            Projet::ANGE2D,
            Priorite::BASSE,
            Impact::MINEUR,
            Statut::CONFIRME,
            new Utilisateur($uuidUtilisateur, 'Nom', 'Prénom')
        );
        $this->assertInstanceOf(Id::class, $ticketIdNonNull->getIdentifiant());
        $this->assertEquals($uuidTicket, $ticketIdNonNull->getIdentifiant()->getValeur());
    }

    /**
     * @return void
     * @throws NomException
     * @throws UrlException
     * @throws UuidException
     */
    public function testUrlNull(): void
    {
        $uuidTicket = 'fa568e13-d36c-469a-b940-5f0fb855303d';
        $uuidUtilisateur = 'fbd5cfb1-ebc9-42fe-ab70-5ab2820b87ba';
        $this->expectException(Exception::class);
        Ticket::cree(
            $uuidTicket,
            null,
            Projet::ANGE2D,
            Priorite::BASSE,
            Impact::MINEUR,
            Statut::CONFIRME,
            new Utilisateur($uuidUtilisateur, 'Nom1', 'Prenom1')
        );
    }

    /**
     * @return void
     * @throws NomException
     * @throws UrlException
     * @throws UuidException
     */
    public function testProjetNull(): void
    {
        $uuidTicket = 'fa568e13-d36c-469a-b940-5f0fb855303d';
        $uuidUtilisateur = 'fbd5cfb1-ebc9-42fe-ab70-5ab2820b87ba';
        $url = 'https://mantis.enseignement-catholique.fr/view.php?id=30249#c73596';
        $this->expectException(Exception::class);
        Ticket::cree(
            $uuidTicket,
            $url,
            null,
            Priorite::BASSE,
            Impact::MINEUR,
            Statut::CONFIRME,
            new Utilisateur($uuidUtilisateur, 'Nom1', 'Prenom1')
        );
    }

    /**
     * @return void
     * @throws NomException
     * @throws UrlException
     * @throws UuidException
     */
    public function testPrioriteNull(): void
    {
        $uuidTicket = 'fa568e13-d36c-469a-b940-5f0fb855303d';
        $uuidUtilisateur = 'fbd5cfb1-ebc9-42fe-ab70-5ab2820b87ba';
        $url = 'https://mantis.enseignement-catholique.fr/view.php?id=30249#c73596';
        $this->expectException(Exception::class);
        Ticket::cree(
            $uuidTicket,
            $url,
            Projet::ANGE2D,
            null,
            Impact::MINEUR,
            Statut::CONFIRME,
            new Utilisateur($uuidUtilisateur, 'Nom1', 'Prenom1')
        );
    }

    /**
     * @return void
     * @throws NomException
     * @throws UrlException
     * @throws UuidException
     */
    public function testImpactNull(): void
    {
        $uuidTicket = 'fa568e13-d36c-469a-b940-5f0fb855303d';
        $uuidUtilisateur = 'fbd5cfb1-ebc9-42fe-ab70-5ab2820b87ba';
        $url = 'https://mantis.enseignement-catholique.fr/view.php?id=30249#c73596';
        $this->expectException(Exception::class);
        Ticket::cree(
            $uuidTicket,
            $url,
            Projet::ANGE2D,
            Priorite::BASSE,
            null,
            Statut::CONFIRME,
            new Utilisateur($uuidUtilisateur, 'Nom1', 'Prenom1')
        );
    }

    /**
     * @return void
     * @throws NomException
     * @throws UrlException
     * @throws UuidException
     */
    public function testStatutNull(): void
    {
        $uuidTicket = 'fa568e13-d36c-469a-b940-5f0fb855303d';
        $uuidUtilisateur = 'fbd5cfb1-ebc9-42fe-ab70-5ab2820b87ba';
        $url = 'https://mantis.enseignement-catholique.fr/view.php?id=30249#c73596';
        $this->expectException(Exception::class);
        Ticket::cree(
            $uuidTicket,
            $url,
            Projet::ANGE2D,
            Priorite::BASSE,
            Impact::MINEUR,
            null,
            new Utilisateur($uuidUtilisateur, 'Nom1', 'Prenom1')
        );
    }

    /**
     * @return void
     * @throws UrlException
     * @throws UuidException
     */
    public function testIndividuNull(): void
    {
        $uuidTicket = 'fa568e13-d36c-469a-b940-5f0fb855303d';
        $url = 'https://mantis.enseignement-catholique.fr/view.php?id=30249#c73596';
        $this->expectErrorMessage('Argument #7 ($assignation) must be of type Domaine\Utilisateur\Modele\Utilisateur, null given');
        Ticket::cree(
            $uuidTicket,
            $url,
            Projet::ANGE2D,
            Priorite::BASSE,
            Impact::MINEUR,
            Statut::CONFIRME,
            null
        );
    }

    /**
     * @return void
     * @throws NomException
     * @throws UrlException
     * @throws UuidException
     */
    public function testUrlEstChaineQuelconque(): void
    {
        $uuidTicket = 'fa568e13-d36c-469a-b940-5f0fb855303d';
        $uuidUtilisateur = 'fbd5cfb1-ebc9-42fe-ab70-5ab2820b87ba';
        $this->expectErrorMessage("L'url n'est pas valide. ");
        Ticket::cree(
            $uuidTicket,
            'test',
            Projet::ANGE2D,
            Priorite::BASSE,
            Impact::MINEUR,
            Statut::CONFIRME,
            new Utilisateur($uuidUtilisateur, 'Nom', 'Prenom')
        );
    }

    /**
     * @return void
     * @throws NomException
     * @throws UrlException
     * @throws UuidException
     */
    public function testProjetEstChaineQuelconque(): void
    {
        $uuidTicket = 'fa568e13-d36c-469a-b940-5f0fb855303d';
        $uuidUtilisateur = 'fbd5cfb1-ebc9-42fe-ab70-5ab2820b87ba';
        $url = 'https://mantis.enseignement-catholique.fr/view.php?id=30249#c73596';
        $this->expectException(Exception::class);
        Ticket::cree(
            $uuidTicket,
            $url,
            'test',
            Priorite::BASSE,
            Impact::MINEUR,
            Statut::CONFIRME,
            new Utilisateur($uuidUtilisateur, 'Nom1', 'Prenom1')
        );
    }

    /**
     * @return void
     * @throws NomException
     * @throws UrlException
     * @throws UuidException
     */
    public function testPrioriteEstChaineQuelconque(): void
    {
        $uuidTicket = 'fa568e13-d36c-469a-b940-5f0fb855303d';
        $uuidUtilisateur = 'fbd5cfb1-ebc9-42fe-ab70-5ab2820b87ba';
        $url = 'https://mantis.enseignement-catholique.fr/view.php?id=30249#c73596';
        $this->expectException(Exception::class);
        Ticket::cree(
            $uuidTicket,
            $url,
            Projet::ANGE2D,
            'test',
            Impact::MINEUR,
            Statut::CONFIRME,
            new Utilisateur($uuidUtilisateur, 'Nom1', 'Prenom1')
        );
    }

    /**
     * @return void
     * @throws NomException
     * @throws UrlException
     * @throws UuidException
     */
    public function testImpactEstChaineQuelconque(): void
    {
        $uuidTicket = 'fa568e13-d36c-469a-b940-5f0fb855303d';
        $uuidUtilisateur = 'fbd5cfb1-ebc9-42fe-ab70-5ab2820b87ba';
        $url = 'https://mantis.enseignement-catholique.fr/view.php?id=30249#c73596';
        $this->expectException(Exception::class);
        Ticket::cree(
            $uuidTicket,
            $url,
            Projet::ANGE2D,
            Priorite::BASSE,
            'test',
            Statut::CONFIRME,
            new Utilisateur($uuidUtilisateur, 'Nom1', 'Prenom1')
        );
    }

    /**
     * @return void
     * @throws NomException
     * @throws UrlException
     * @throws UuidException
     */
    public function testStatutEstChaineQuelconque(): void
    {
        $uuidTicket = 'fa568e13-d36c-469a-b940-5f0fb855303d';
        $uuidUtilisateur = 'fbd5cfb1-ebc9-42fe-ab70-5ab2820b87ba';
        $url = 'https://mantis.enseignement-catholique.fr/view.php?id=30249#c73596';
        $this->expectException(Exception::class);
        Ticket::cree(
            $uuidTicket,
            $url,
            Projet::ANGE2D,
            Priorite::BASSE,
            Impact::MINEUR,
            'test',
            new Utilisateur($uuidUtilisateur, 'Nom1', 'Prenom1')
        );
    }

    /**
     * @return void
     * @throws UrlException
     * @throws UuidException
     */
    public function testIndividuEstChaineQuelconque(): void
    {
        $uuidTicket = 'fa568e13-d36c-469a-b940-5f0fb855303d';
        $url = 'https://mantis.enseignement-catholique.fr/view.php?id=30249#c73596';
        $this->expectErrorMessage('Argument #7 ($assignation) must be of type Domaine\Utilisateur\Modele\Utilisateur, string given');
        Ticket::cree(
            $uuidTicket,
            $url,
            Projet::ANGE2D,
            Priorite::BASSE,
            Impact::MINEUR,
            Statut::CONFIRME,
            'test'
        );
    }
}
