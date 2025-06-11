<?php
// src/Users.php

use Doctrine\ORM\Mapping as ORM; 

#[ORM\Entity]
#[ORM\Table(name: 'users')]
class Users
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int $id;
    #[ORM\nom]
    #[ORM\Column(type: 'string')]
    private string $nom;
    #[ORM\prenom]
    #[ORM\Column(type: 'string')]
    private string $prenom; 
    #[ORM\date_nais]
    #[ORM\Column(type: 'datetime')]
    private $date_nais;
   

   

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
     * @return Users
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
     * Set prenom.
     *
     * @param string $prenom
     *
     * @return Users
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom.
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set dateNais.
     *
     * @param \DateTime $dateNais
     *
     * @return Users
     */
    public function setDateNais($dateNais)
    {
        $this->date_nais = new DateTime($dateNais);
        

        return $this;
    }

    /**
     * Get dateNais.
     *
     * @return \DateTime
     */
    public function getDateNais()
    {
        //dump($this->date_nais);die;
        return $this->date_nais;
    }
}
