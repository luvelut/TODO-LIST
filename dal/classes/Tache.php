<?php


class Tache
{
    private string $intitule;
    private bool $effectuee;
    private int $id;

    /**
     * Tache constructor.
     * @param int $id
     * @param string $intitule
     * @param bool $effectuee
     */
    public function __construct(int $id, string $intitule, bool $effectuee)
    {
        $this->intitule = $intitule;
        $this->effectuee = $effectuee;
        $this->id=$id;
    }

    /**
     * @return bool
     */
    public function isEffectuee(): bool
    {
        return $this->effectuee;
    }

    public function getIntitule(): string
    {
        return $this->intitule;
    }

    public function getId(): int
    {
        return $this->id;
    }
}