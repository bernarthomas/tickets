<?php
namespace Domaine\Partage\Modele;

use Domaine\Partage\Exceptions\UrlException;

/**
 * Url valide
 */
class Url
{
    /**
     * @var string
     */
    private string $valeur;

    /**
     * @param string $url
     * @throws UrlException
     */
    private function __construct(string $url)
    {
        $this->valide($url);
        $this->valeur = $url;
    }

    /**
     * @param string $url
     * @return static
     * @throws UrlException
     */
    public static function cree(string $url): static
    {
        return new static($url);
    }

    /**
     * @return string
     */
    public function getValeur(): string
    {
        return $this->valeur;
    }

    /**
     * @param string $url
     * @return void
     * @throws UrlException
     */
    private function valide(string $url): void
    {
        if (false === (filter_var($url, FILTER_VALIDATE_URL) !== false && '' !== $url)) {
            throw new UrlException();
        }
    }
}
