<?php
namespace Domaine\Partage\Modele;

use Domaine\Partage\Exceptions\UuidException;
use Ramsey\Uuid\Uuid;

/**
 * Uuid valide
 */
class Id
{
    /**
     * @var string
     */
    private string $valeur;

    /**
     * @param string|null $identifiantUnique
     * @throws UuidException
     */
    public function __construct(?string $identifiantUnique = null)
    {
        $uuid = is_null($identifiantUnique) ? Uuid::uuid4()->toString(): $identifiantUnique;
        $this->valide($uuid);
        $this->valeur = $uuid;
    }

    /**
     * @return string
     */
    public function getValeur(): string
    {
        return $this->valeur;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getValeur();
    }

    /**
     * @param string $uuid
     * @return void
     * @throws UuidException
     */
    private function valide(string $uuid): void
    {
        $estValide = 1 === preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-5][0-9a-f]{3}-[089ab][0-9a-f]{3}-[0-9a-f]{12}$/", $uuid);
        if (false === $estValide) {
            throw new UuidException();
        }
    }
}
