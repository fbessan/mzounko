<?php
// src/Nucleus/HomeBundle/Entity/Categorie.php
namespace Nucleus\HomeBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Entity(repositoryClass="Nucleus\HomeBundle\Entity\CategorieRepository")
* @ORM\Table(name="categorie")
*/
class Categorie
{
   /**
    * @var bigint $id
    * @ORM\Column(name="id", type="bigint")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    protected $id;
    
   /**
    * @var string $name
    * @ORM\Column(name="name", type="string", length=255, nullable=false)
    */
    protected $name;
    /**
    * @var string $unite
    * @ORM\Column(name="unite", type="string", length=255, nullable=false)
    */
    protected $unite;
    /**
    * @var datetime $date
    * @ORM\Column(name="date", type="datetime", nullable=false)
    */
    protected $date;
    
    public function __construct()
    {
        $this->date = new \Datetime(); 
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Categorie
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set unite
     *
     * @param string $unite
     * @return Categorie
     */
    public function setUnite($unite)
    {
        $this->unite = $unite;
    
        return $this;
    }

    /**
     * Get unite
     *
     * @return string 
     */
    public function getUnite()
    {
        return $this->unite;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Categorie
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }
}