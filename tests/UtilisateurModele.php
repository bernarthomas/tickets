<?php
namespace Tests;

use Domaine\Partage\Exceptions\NomException;
use Domaine\Partage\Exceptions\UuidException;
use Domaine\Partage\Modele\Id;
use Domaine\Partage\Modele\Nom;
use Domaine\Utilisateur\Modele\Utilisateur;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

/**
 *
 */
class UtilisateurModele extends TestCase
{
    /**
     * @return void
     * @throws NomException
     * @throws UuidException
     */
    public function testInstanciation(): void
    {
        $nom1 = 'Nom';
        $prenom1 = 'Prénom';
        $utilisateurIdNull = new Utilisateur(null, $nom1, $prenom1);
        $this->assertInstanceOf(Id::class, $utilisateurIdNull->getIdentifiant());
        $this->assertInstanceOf(Nom::class, $utilisateurIdNull->getNom());
        $this->assertInstanceOf(Nom::class, $utilisateurIdNull->getPrenom());
        $this->assertInstanceOf(DateTimeImmutable::class, $utilisateurIdNull->getDate());
        $this->assertEquals($nom1, $utilisateurIdNull->getNom());
        $this->assertEquals($prenom1, $utilisateurIdNull->getPrenom());
        $uuid = 'fbd5cfb1-ebc9-42fe-ab70-5ab2820b87ba';
        $utilisateurIdNonNull = new Utilisateur($uuid, $nom1, $prenom1);
        $this->assertInstanceOf(Id::class, $utilisateurIdNonNull->getIdentifiant());
        $this->assertEquals($uuid, $utilisateurIdNonNull->getIdentifiant()->getValeur());
    }

    /**
     * @return void
     */
    public function testNomNull(): void
    {
        $this->expectException(NomException::class);
        new Utilisateur(null, '', 'prenom1');

    }

    /**
     * @return void
     */
    public function testPrenomNull(): void
    {
        $this->expectException(NomException::class);
        new Utilisateur(null, 'nom1', '');
    }

    /**
     * @return void
     * @throws NomException
     * @throws UuidException
     */
    public function testNomAlphaTiret6EspaceQuoteEstValide(): void
    {
        $nom = "'- ABCCDEFGHIJKLMNOPQURSTUVWXYZ";
        $prenom = "'- abcdefghijklmnopqrstuvwxyzéèâêîôû";
        $utilisateur = new Utilisateur(null, $nom, $prenom);
        $this->assertEquals($nom, $utilisateur->getNom()->getValeur());
        $this->assertEquals($prenom, $utilisateur->getPrenom()->getValeur());
    }

    /**
     * @return void
     */
    public function testNomCaracteresInterdits(): void
    {
        $this->expectException(NomException::class);
        new Utilisateur(null, "N'Guyen Alonzo@", '1Jean-René');
    }
}
