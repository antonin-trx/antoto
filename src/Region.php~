<?php
// src/Region.php

use Doctrine\ORM\Mapping as ORM; 
//use Doctrine\ORM\Mapping\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
#[ORM\Table(name: 'region')]
class Region
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int|null $id = null;
    #[ORM\nom]
    #[ORM\Column(type: 'string')]
    private string $nom;
    #[ORM\OneToMany(targetEntity: Departement::class, mappedBy:'region')]
    private Collection $departements;


    public function __construct() {
        $this->nom="";
        $this->departements = new ArrayCollection();
    }
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
     * Set nom.
     *
     * @param string $nom
     *
     * @return Region
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

    /**
     * Add departement.
     *
     * @param \Departement $departement
     *
     * @return Region
     */
    public function addDepartement(\Departement $departement)
    {
        $departement->setRegion($this);
        $this->departements->add($departement);
        return $this;
    }

    /**
     * Remove departement.
     *
     * @param \Departement $departement
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeDepartement(\Departement $departement)
    {   
        $result=$this->departements->removeElement($departement);
        $departement->setRegion(null);
        return $result;
    }

    /**
     * Get departements.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDepartements()
    {
        return $this->departements;
    }
}
