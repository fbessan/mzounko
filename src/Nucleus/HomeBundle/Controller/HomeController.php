<?php
// src/Nucleus/HomeBundle/Controller/SecurityController.php;
namespace Nucleus\HomeBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

use Nucleus\HomeBundle\Services\GCMPushMessage;
use Nucleus\HomeBundle\Form\ReponseType;
use Nucleus\HomeBundle\Entity\Annonce;
use Nucleus\HomeBundle\Entity\Reponse;
use Nucleus\HomeBundle\Entity\TypeAnnonce;


class HomeController extends Controller
{
  public function homeAction()
  {
      $stats = self:: stats();
      $em = $this->getDoctrine()->getManager();
      
      $annonces = $em->getRepository('NucleusHomeBundle:Annonce')->findAll();
      $categories = $em->getRepository('NucleusHomeBundle:Categorie')->findAll();
      $types_annonce = $em->getRepository('NucleusHomeBundle:TypeAnnonce')->findAll();
      $phases = $em->getRepository('NucleusHomeBundle:Phase')->findAll();
      
//      $em->persist($product);
//      $em->flush();
      
//      return new Response(json_encode($annonces));
      return $this->render('NucleusHomeBundle:Home:home.html.twig', array('annonces'=>$annonces, 
                                                                          'categories'=>$categories,
                                                                          'typeannonce'=>$types_annonce,
                                                                          'phases'=>$phases,
                                                                          'stats'=>$stats
                                                                         ) 
                          );
  }
  
  public function annonceAction()
  {  
    $Annonce = new Annonce();
    $Annonce->addImage($image);
    $Annonce->addPaie($paie);
    $Annonce->addReponse($reponse);
    $Annonce->setCategorie($categorie);
    $Annonce->setDate($date);
    $Annonce->setDescription($description);
    $Annonce->setLibelle($libelle);
    $Annonce->setPhase($phase);
    $Annonce->setPrixNitaire($prixNitaire);
    $Annonce->setQuantite($quantite);
    $Annonce->setTypeAnnonce($typeAnnonce);
    $Annonce->setUser($user);
    
    $em = $this->getDoctrine()->getManager();
    $em->persist($Annonce);
    $em->flush();
    return $this->render('NucleusHomeBundle:Home:home.html.twig', array() );
  }
  
  public function reponseAction($id)
  {
    $stats = self:: stats();
    $em = $this->getDoctrine()->getManager();
      
    $annonce = $em->getRepository('NucleusHomeBundle:Annonce')->findOneById($id);


    //var_dump(intval($annonce->getPhase()->getId()));
    
    if(intval($annonce->getPhase()->getId()) == 1)
    {
      $phase_annonce = $em->getRepository('NucleusHomeBundle:Phase')->findOneById(2);
      $annonce->setPhase($phase_annonce);
    }
    
    $phase = $em->getRepository('NucleusHomeBundle:Phase')->findOneById(1);
    

    $User = $this->getUser();
        
    $reponse = new Reponse();
    $reponse->setAnnonce($annonce);
    $reponse->setPhase($phase);
    
    
    
    if(is_object($User))
    {
        $reponse->setUser($User);
    }
    else
    {
        return $this->redirect($this->generateUrl('login'));
    }
    
    $form = $this->createForm(new ReponseType, $reponse);
    
    
    $request = $this->get('request');

    if ($request->getMethod() == 'POST')
    {
        $form->bind($request);

        if ($form->isValid())
        {
            $apiKey = "AIzaSyBGkuVCyWJ52HqJ_a7gyEZI4-2TLt1vPYo";

            $userManager = $this->get('fos_user.user_manager');
            $current_device_user = $userManager->findUserBy(array('id' => '1'));



            $devices = array($current_device_user->getGcmid());

            $message = $reponse->getMessage();

            $gcpm = new GCMPushMessage($apiKey);
            $gcpm->setDevices($devices);
            $responseElemt['message']=$message;
            $responseElemt['quantite']=$reponse->getQuantite();
            $responseElemt['annonce_id']=$reponse->getAnnonce()->getId();
            
            $Resp = $gcpm->send($message, array('response' => $responseElemt));
            
            $em->persist($reponse);
            $em->persist($annonce);
            $em->flush();
            return $this->redirect($this->generateUrl('NucleusHomeBundle_home'));
        }
    }
    
    return $this->render('NucleusHomeBundle:Home:reponse.html.twig',
                        array(
                            'form' => $form->createView(),
                            'annonce'=>$annonce,
                            'stats'=>$stats
                             )
                        );
    
  }
  
  public function reponsesAction($id)
  { 
    $stats = self:: stats();
    $em = $this->getDoctrine()->getManager();
     
    $categories = $em->getRepository('NucleusHomeBundle:Categorie')->findAll();
    $types_annonce = $em->getRepository('NucleusHomeBundle:TypeAnnonce')->findAll();
    $phases = $em->getRepository('NucleusHomeBundle:Phase')->findAll(); 
    $annonce = $em->getRepository('NucleusHomeBundle:Annonce')->findOneById($id);
    
    return $this->render('NucleusHomeBundle:Home:reponses.html.twig',
                        array(
                            'annonce' => $annonce,
                            'categories'=>$categories,
                            'typeannonce'=>$types_annonce,
                            'phases'=>$phases,
                            'stats'=>$stats
                             )
                        );
    
  }
  
  public function stats()
  {
      
      $em = $this->getDoctrine()->getManager();
     
//      $reponse = $em->getRepository('NucleusHomeBundle:Reponse')->findCountAllReponse();
//      $vente = $em->getRepository('NucleusHomeBundle:Annonce')->findCountAllVente();
//      $ann = $em->getRepository('NucleusHomeBundle:Annonce')->findCountAllAnnonce();
//      $achat = $em->getRepository('NucleusHomeBundle:Annonce')->findCountAllAchat();
      return array('rep'=>1200, 'ven'=>130, 'ann'=>250, 'ach'=>120 );
  }
  public function languageAction()
  {
//     // On récupère la requête
//    $request = $this->container->get('request');
//    // On vérifie qu'elle est de type POST
//    if ($request->getMethod() == 'POST') 
//    {
//      $userlangue = $request->request->get('langue');
//           
//      $request->setLocale($userlangue);
//      print_r($request->getLocale()); 
//      
//      return new RedirectResponse($this->generateUrl('ffhouse_home'));
//    }
      return $this->render('NucleusHomeBundle:Home:language.html.twig',
        array(
            
            ));
  }
}