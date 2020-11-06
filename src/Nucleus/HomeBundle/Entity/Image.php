<?php
// src/Nucleus/HomeBundle/Entity/Image.php
namespace Nucleus\HomeBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Entity(repositoryClass="Nucleus\HomeBundle\Entity\ImageRepository")
* @ORM\Table(name="image")
*/
class Image
{
   /**
    * @var bigint $id
    * @ORM\Column(name="id", type="bigint")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    protected $id;
    
   /**
    * 
    * @var string $alt
    * @ORM\Column(name="alt", type="string", length=255, nullable=false)
    */
    protected $alt;
   /**
    * 
    * @var string $url
    * @ORM\Column(name="url", type="string", length=255, nullable=false)
    */
    protected $url;
    
   /**
    * @ORM\ManyToOne(targetEntity="Nucleus\HomeBundle\Entity\Annonce")
    * @ORM\JoinColumn(nullable=true)
    */
    protected $annonce;
    
   /**
    * @ORM\ManyToOne(targetEntity="Nucleus\HomeBundle\Entity\Reponse")
    * @ORM\JoinColumn(nullable=true)
    */
    protected $reponse;
    
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
     * Set alt
     *
     * @param string $alt
     * @return Image
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;
    
        return $this;
    }

    /**
     * Get alt
     *
     * @return string 
     */
    public function getAlt()
    {
        return $this->alt;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Image
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Image
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
     * @return Image
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

    /**
     * Set reponse
     *
     * @param \Nucleus\HomeBundle\Entity\Reponse $reponse
     * @return Image
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
}