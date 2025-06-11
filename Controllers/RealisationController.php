<?php
namespace Controllers;

use Realisation;

class RealisationController extends Controller
{
    public function liste($params)
    {
        
        //$query = $this->em->createQuery('SELECT v FROM realisations v')->setMaxResults(1000);
        $qb=$this->em->createQueryBuilder();
        $qb->select('r')
            ->from('Realisation','r')
            ;
        $query=$qb->getQuery();
        $realisations = $query->getResult();
        echo $this->twig->render('realisations/liste.twig', ['realisations'=>$realisations]);
    }
    public function delete()
    {
        $realisation=$this->em->find("Realisation",$_GET['id']);
        if ($realisation) {
            $this->em->remove($realisation);
            $this->em->flush();
            
        }
        header('Location:http://163.172.44.107/antonin/squelette_framework_php/?c=realisation&t=liste');
    }
    public function edit($params)
    {
        //dump($_GET);
        $id=$_GET["id"];
        
        $qb=$this->em->createQueryBuilder();
        $qb->select('r')
            ->from('Realisation','r')
            ->where('r.id=:realisation_id')
            ->setParameter('realisation_id',$id)
            ;
            $query=$qb->getQuery();
            //dump($query);
                // default action is always to return a Document
            $realisation = $query->getOneOrNullResult();
            $errMessage=null;
            if (!$realisation) $errMessage="Cette id est incorrecte";
            
            //dump($ville);*
            
            
            $action="edit";
            echo $this->twig->render('realisations/edit.twig', ['realisation'=>$realisation,'errMessage'=>$errMessage,"action"=>$action]);
    }
}