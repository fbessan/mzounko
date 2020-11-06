<?php
// src/Nucleus/HomeBundle/Entity/Annonce.php
namespace Nucleus\HomeBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Entity(repositoryClass="Nucleus\HomeBundle\Entity\AnnonceRepository")
* @ORM\Table(name="annonce")
*/
class Annonce
{
   /**
    * @var bigint $id
    * @ORM\Column(name="id", type="bigint")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    protected $id;
    
   /**
    * @ORM\ManyToOne(targetEntity="Nucleus\HomeBundle\Entity\TypeAnnonce")
    * @ORM\JoinColumn(nullable=false)
    */
    protected $type_annonce;
    
   /**
    * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User")
    * @ORM\JoinColumn(nullable=false)
    */
    protected $user;
    
   /**
    * 
    * @var string $libelle
    * @ORM\Column(name="libelle", type="string", length=255, nullable=false)
    */
    protected $libelle;
    
   /**
    * 
    * @var string $description
    * @ORM\Column(name="description", type="string", length=255, nullable=false)
    */
    protected $description;
    
   /**
    * @ORM\ManyToOne(targetEntity="Nucleus\HomeBundle\Entity\Categorie")
    * @ORM\JoinColumn(nullable=false)
    */
    protected $categorie;
    
   /**
    * @ORM\OneToMany(targetEntity="Nucleus\HomeBundle\Entity\Image", mappedBy="annonce")
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
    * @var bigint $prix_unitaire
    * @ORM\Column(name="prix_unitaire", type="bigint", nullable=false)
    */
    protected $prix_unitaire;
   
        
   /**
    * @ORM\OneToMany(targetEntity="Nucleus\HomeBundle\Entity\Reponse", mappedBy="annonce")
    */
    protected $reponse;
        
   /**
    * @ORM\OneToMany(targetEntity="Nucleus\HomeBundle\Entity\Paie", mappedBy="annonce")
    */
    protected $paie;
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
        $this->reponse = new \Doctrine\Common\Collections\ArrayCollection();
        $this->paie = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set libelle
     *
     * @param string $libelle
     * @return Annonce
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    
        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Annonce
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     * @return Annonce
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
     * Set prix_unitaire
     *
     * @param integer $prixUnitaire
     * @return Annonce
     */
    public function setPrixUnitaire($prixUnitaire)
    {
        $this->prix_nitaire = $prixUnitaire;
    
        return $this;
    }

    /**
     * Get prix_unitaire
     *
     * @return integer 
     */
    public function getPrixUnitaire()
    {
        return $this->prix_unitaire;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Annonce
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
     * Set type_annonce
     *
     * @param \Nucleus\HomeBundle\Entity\TypeAnnonce $typeAnnonce
     * @return Annonce
     */
    public function setTypeAnnonce(\Nucleus\HomeBundle\Entity\TypeAnnonce $typeAnnonce)
    {
        $this->type_annonce = $typeAnnonce;
    
        return $this;
    }

    /**
     * Get type_annonce
     *
     * @return \Nucleus\HomeBundle\Entity\TypeAnnonce 
     */
    public function getTypeAnnonce()
    {
        return $this->type_annonce;
    }

    /**
     * Set user
     *
     * @param \Application\Sonata\UserBundle\Entity\User $user
     * @return Annonce
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
     * Set categorie
     *
     * @param \Nucleus\HomeBundle\Entity\Categorie $categorie
     * @return Annonce
     */
    public function setCategorie(\Nucleus\HomeBundle\Entity\Categorie $categorie)
    {
        $this->categorie = $categorie;
    
        return $this;
    }

    /**
     * Get categorie
     *
     * @return \Nucleus\HomeBundle\Entity\Categorie 
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Add image
     *
     * @param \Nucleus\HomeBundle\Entity\Image $image
     * @return Annonce
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
     * @return Annonce
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
     * Add reponse
     *
     * @param \Nucleus\HomeBundle\Entity\Reponse $reponse
     * @return Annonce
     */
    public function addReponse(\Nucleus\HomeBundle\Entity\Reponse $reponse)
    {
        $this->reponse[] = $reponse;
    
        return $this;
    }

    /**
     * Remove reponse
     *
     * @param \Nucleus\HomeBundle\Entity\Reponse $reponse
     */
    public function removeReponse(\Nucleus\HomeBundle\Entity\Reponse $reponse)
    {
        $this->reponse->removeElement($reponse);
    }

    /**
     * Get reponse
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getReponse()
    {
        return $this->reponse;
    }

    /**
     * Add paie
     *
     * @param \Nucleus\HomeBundle\Entity\Paie $paie
     * @return Annonce
     */
    public function addPaie(\Nucleus\HomeBundle\Entity\Paie $paie)
    {
        $this->paie[] = $paie;
    
        return $this;
    }

    /**
     * Remove paie
     *
     * @param \Nucleus\HomeBundle\Entity\Paie $paie
     */
    public function removePaie(\Nucleus\HomeBundle\Entity\Paie $paie)
    {
        $this->paie->removeElement($paie);
    }

    /**
     * Get paie
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPaie()
    {
        return $this->paie;
    }
}