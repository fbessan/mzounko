<?php
// src/Nucleus/HomeBundle/Entity/Reponse.php
namespace Nucleus\HomeBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Entity(repositoryClass="Nucleus\HomeBundle\Entity\ReponseRepository")
* @ORM\Table(name="reponse")
*/
class Reponse
{
   /**
    * @var bigint $id
    * @ORM\Column(name="id", type="bigint")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    protected $id;
        
   /**
    * @ORM\ManyToOne(targetEntity="Nucleus\HomeBundle\Entity\Annonce")
    * @ORM\JoinColumn(nullable=false)
    */
    protected $annonce;
       
   /**
    * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User")
    * @ORM\JoinColumn(nullable=false)
    */
    protected $user;
    
   /**
    * 
    * @var string $message
    * @ORM\Column(name="message", type="string", length=255, nullable=false)
    */
    protected $message;
    
   /**
    * @ORM\OneToMany(targetEntity="Nucleus\HomeBundle\Entity\Image", mappedBy="reponse")
    */
    protected $image;
    
   /**
    * @var bigint $quantite
    * @ORM\Column(name="quantite", type="bigint", nullable=false)
    */
    protected $quantite;
   
   /**
    * @ORM\ManyToOne(targetEntity="Nucleus\HomeBundle\Entity\Phase")
    * @ORM\JoinColumn(nullable=false)
    */
    protected $phase;  
        
   /**
    * @ORM\OneToMany(targetEntity="Nucleus\HomeBundle\Entity\Paie", mappedBy="reponse")
    */
    protected $gain;
    /**
    * @var datetime $date
    * @ORM\Column(name="date", type="datetime", nullable=false)
    */
    protected $date;
        
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->image = new \Doctrine\Common\Collections\ArrayCollection();
        $this->gain = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set message
     *
     * @param string $message
     * @return Reponse
     */
    public function setMessage($message)
    {
        $this->message = $message;
    
        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     * @return Reponse
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    
        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer 
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set prix_nitaire
     *
     * @param integer $prixNitaire
     * @return Reponse
     */
    public function setPrixNitaire($prixNitaire)
    {
        $this->prix_nitaire = $prixNitaire;
    
        return $this;
    }

    /**
     * Get prix_nitaire
     *
     * @return integer 
     */
    public function getPrixNitaire()
    {
        return $this->prix_nitaire;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Reponse
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
     * Set annonce
     *
     * @param \Nucleus\HomeBundle\Entity\Annonce $annonce
     * @return Reponse
     */
    public function setAnnonce(\Nucleus\HomeBundle\Entity\Annonce $annonce)
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

    /**
     * Set user
     *
     * @param \Application\Sonata\UserBundle\Entity\User $user
     * @return Reponse
     */
    public function setUser(\Application\Sonata\UserBundle\Entity\User $user)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Application\Sonata\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add image
     *
     * @param \Nucleus\HomeBundle\Entity\Image $image
     * @return Reponse
     */
    public function addImage(\Nucleus\HomeBundle\Entity\Image $image)
    {
        $this->image[] = $image;
    
        return $this;
    }

    /**
     * Remove image
     *
     * @param \Nucleus\HomeBundle\Entity\Image $image
     */
    public function removeImage(\Nucleus\HomeBundle\Entity\Image $image)
    {
        $this->image->removeElement($image);
    }

    /**
     * Get image
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set phase
     *
     * @param \Nucleus\HomeBundle\Entity\Phase $phase
     * @return Reponse
     */
    public function setPhase(\Nucleus\HomeBundle\Entity\Phase $phase)
    {
        $this->phase = $phase;
    
        return $this;
    }

    /**
     * Get phase
     *
     * @return \Nucleus\HomeBundle\Entity\Phase 
     */
    public function getPhase()
    {
        return $this->phase;
    }

    /**
     * Add gain
     *
     * @param \Nucleus\HomeBundle\Entity\Paie $gain
     * @return Reponse
     */
    public function addGain(\Nucleus\HomeBundle\Entity\Paie $gain)
    {
        $this->gain[] = $gain;
    
        return $this;
    }

    /**
     * Remove gain
     *
     * @param \Nucleus\HomeBundle\Entity\Paie $gain
     */
    public function removeGain(\Nucleus\HomeBundle\Entity\Paie $gain)
    {
        $this->gain->removeElement($gain);
    }

    /**
     * Get gain
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGain()
    {
        return $this->gain;
    }
}