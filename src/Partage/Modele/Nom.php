<?php
namespace Domaine\Partage\Modele;

use Domaine\Partage\Exceptions\NomException;

/**
 * Nom valide
 */
class Nom
{
    /**
     * @var string
     */
    private string $valeur;

    /**
     * @param string $nom
     * @throws NomException
     */
    private function __construct(string $nom)
    {
        $this->valide($nom);
        $this->valeur = $nom;
    }

    /**
     * @param string $nom
     * @return static
     * @throws NomException
     */
    public static function cree(string $nom): static
    {
        return new static($nom);
    }

    /**
     * @return string
     */
    public function getValeur(): string
    {
        return $this->valeur;
    }

    /**
     * Lettres alphabétiques, tiret6, espace et quote

     * @param string $nom
     *
     * @throws NomException
     */
    private function valide(string $nom): void
    {
        setLocale(LC_CTYPE, 'fr_FR.UTF-8');
        $estValide =
            '' !== $nom
            && strlen($nom) > 1
            && true === ctype_alpha(str_replace(
                ["'", 'é', 'è', 'ê', 'î', 'û', 'â', 'ô', '-', ' '],
                '', $nom)
            );
        if (false === $estValide) {
            throw new NomException();
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getValeur();
    }
}
