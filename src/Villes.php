<?php
// src/Villes.php

use Doctrine\ORM\Mapping as ORM; 


#[ORM\Entity]
#[ORM\Table(name: 'villes')]
class Villes
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int|null $id = null;
    #[ORM\nom]
    #[ORM\Column(type: 'string')]
    private string $nom;
    #[ORM\code_postal]
    #[ORM\Column(type: 'string')]
    private string $code_postal;
    #[ORM\ManyToOne(targetEntity: Departement::class)]
    #[ORM\JoinColumn(name: 'departement_id', referencedColumnName: 'id')]
    private Departement|null $departement = null;

    

   

    

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
     * @return Villes
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
     * Set codePostal.
     *
     * @param string $codePostal
     *
     * @return Villes
     */
    public function setCodePostal($codePostal)
    {
        $this->code_postal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal.
     *
     * @return string
     */
    public function getCodePostal()
    {
        return $this->code_postal;
    }

    /**
     * Set departement.
     *
     * @param \Departement|null $departement
     *
     * @return Villes
     */
    public function setDepartement(\Departement $departement = null)
    {
        $this->departement = $departement;

        return $this;
    }

    /**
     * Get departement.
     *
     * @return \Departement|null
     */
    public function getDepartement()
    {
        return $this->departement;
    }
}
