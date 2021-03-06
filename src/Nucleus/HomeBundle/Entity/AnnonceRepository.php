<?php

namespace Nucleus\HomeBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * AnnonceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AnnonceRepository extends EntityRepository
{
    public function findCountAllVente()
    {
        return $this->getEntityManager()
        ->createQuery(
        'SELECT COUNT(p) FROM NucleusHomeBundle:Annonce p WHERE p.type_annonce = 2'
        )->getScalarResult();
    }
    
    public function findCountAllAchat()
    {
        return $this->getEntityManager()
        ->createQuery(
        'SELECT COUNT(p) FROM NucleusHomeBundle:Annonce p WHERE p.type_annonce = 1'
        )->getScalarResult();
    }
    
    public function findCountAllAnnonce()
    {
        return $this->getEntityManager()
        ->createQuery(
        'SELECT COUNT(p) FROM NucleusHomeBundle:Annonce p'
        )->getScalarResult();
    }
}
