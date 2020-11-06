<?php
// src/Nucleus/HomeBundle/Entity/Paie.php
namespace Nucleus\HomeBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Entity(repositoryClass="Nucleus\HomeBundle\Entity\PaieRepository")
* @ORM\Table(name="paie")
*/
class Paie
{
   /**
    * @var bigint $id
    * @ORM\Column(name="id", type="bigint")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    protected $id;
    
   /**
    * @var bigint $montant
    * @ORM\Column(name="montant", type="string", length=255, nullable=false)
    */
    protected $montant; 
      
   /**
    * @ORM\ManyToOne(targetEntity="Nucleus\HomeBundle\Entity\Reponse")
    * @ORM\JoinColumn(nullable=true)
    */
    protected $reponse;
    
          
   /**
    * @ORM\ManyToOne(targetEntity="Nucleus\HomeBundle\Entity\Annonce")
    * @ORM\JoinColumn(nullable=true)
    */
    protected $annonce;
   
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
     * Set montant
     *
     * @param string $montant
     * @return Paie
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;
    
        return $this;
    }

    /**
     * Get montant
     *
     * @return string 
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Paie
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

    /**
     * Set reponse
     *
     * @param \Nucleus\HomeBundle\Entity\Reponse $reponse
     * @return Paie
     */
    public function setReponse(\Nucleus\HomeBundle\Entity\Reponse $reponse = null)
    {
        $this->reponse = $reponse;
    
        return $this;
    }

    /**
     * Get reponse
     *
     * @return \Nucleus\HomeBundle\Entity\Reponse 
     */
    public function getReponse()
    {
        return $this->reponse;
    }

    /**
     * Set annonce
     *
     * @param \Nucleus\HomeBundle\Entity\Annonce $annonce
     * @return Paie
     */
    public function setAnnonce(\Nucleus\HomeBundle\Entity\Annonce $annonce = null)
    {
        $this->annonce = $annonce;
    
        return $this;
    }

    /**
     * Get annonce
     *
     * @return \Nucleus\HomeBundle\Entity\Annonce 
     */
    public function getAnnonce()
    {
        return $this->annonce;
    }
}