<?php

/**
 * This file is part of the <name> project.
 *
 * (c) <yourname> <youremail>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Application\Sonata\UserBundle\Entity;

use Sonata\UserBundle\Entity\BaseUser as BaseUser;

class User extends BaseUser
{
    /**
     * @var integer $id
     */
    protected $id;
    
    /**
    * @var decimal $latitude
    */
    protected $latitude;
    /**
    * @var decimal $longitude
    */
    protected $longitude;
    
   /**
    * @var integer $credit
    */
    protected $credit;

//    protected $payement;
    
    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }
 
    /**
     * Set latitude
     *
     * @param string $latitude
     * @return User
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    
        return $this;
    }

    /**
     * Get latitude
     *
     * @return string 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     * @return User
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    
        return $this;
    }

    /**
     * Get longitude
     *
     * @return string 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set credit
     *
     * @param integer $credit
     * @return User
     */
    public function setCredit($credit)
    {
        $this->credit = $credit;
    
        return $this;
    }

    /**
     * Get credit
     *
     * @return integer 
     */
    public function getCredit()
    {
        return $this->credit;
    }
    
    /**
     * @var string
     */
    private $gcmid;

    
    /**
     * Set gcmid
     *
     * @param string $gcmid
     * @return User
     */
    public function setGcmid($gcmid)
    {
        $this->gcmid = $gcmid;
    
        return $this;
    }

    /**
     * Get gcmid
     *
     * @return string 
     */
    public function getGcmid()
    {
        return $this->gcmid;
    }

    
}