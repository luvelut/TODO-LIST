<?php

class Liste
{
    public string $titre;
    private bool $privee;
    private int $id;

    /**
     * Liste constructor.
     * @param int $id
     * @param string $titre
     * @param bool $privee
     */
    public function __construct(int $id, string $titre, bool $privee)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->privee = $privee;
    }

    public function getId(): int
    {
        return $this->id;
    }
}