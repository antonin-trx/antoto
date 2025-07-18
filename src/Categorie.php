<?php
// src/Categorie.php
 
use Doctrine\ORM\Mapping as ORM;
//use Doctrine\ORM\Mapping\Entity;
 
 
#[ORM\Entity]
#[ORM\Table(name: 'categorie')]
class Categorie
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int|null $id = null;
    #[ORM\nom]
    #[ORM\Column(type: 'string')]
    private string $nom;
 
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
     * @return Categorie
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
     * Set nom.
     *
     * @param string $nom
     *
     * @return Categorie
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
