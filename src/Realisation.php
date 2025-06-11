<?php
// src/Realisation.php

use Doctrine\ORM\Mapping as ORM; 
//use Doctrine\ORM\Mapping\Entity;


#[ORM\Entity]
#[ORM\Table(name: 'realisation')]
class Realisation
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int|null $id = null;
    #[ORM\nom]
    #[ORM\Column(type: 'string')]
    private string $nom;
    #[ORM\ManyToOne(targetEntity: Categorie::class)]
    //#[ORM\JoinColumn(name: 'region_id', referencedColumnName: 'id')]
    private Categorie|null $categorie = null;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set description.
     *
     * @param string $description
     *
     * @return Realisation
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set categorie.
     *
     * @param \Categorie|null $categorie
     *
     * @return Realisation
     */
    public function setCategorie(\Categorie $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie.
     *
     * @return \Categorie|null
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set nom.
     *
     * @param string $nom
     *
     * @return Realisation
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom.
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }
}
