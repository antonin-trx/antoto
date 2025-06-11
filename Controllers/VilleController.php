<?php

namespace Controllers;

use Ville;

class VilleController extends Controller
{
    public function liste($params)
    {
        
        //$query = $this->em->createQuery('SELECT v FROM Villes v')->setMaxResults(1000);
        $qb=$this->em->createQueryBuilder();
        $qb->select('v')
            ->from('Ville','v')
            ->setMaxResults(100)
            ;
        $query=$qb->getQuery();
        $villes = $query->getResult();
        //dump($villes);die;
        
        echo $this->twig->render('villes/liste.twig', ['villes'=>$villes]);
    } 
    public function edit($params)
    {
        //dump($_GET);
        $id=$_GET["id"];
        //$ville=$this->em->find("Villes",$id);
        $qb=$this->em->createQueryBuilder();
        $qb->select('v')
            ->from('Ville','v')
            ->join('Departement','d')
            ->where('v.id=:ville_id')
            ->setParameter('ville_id',$id)
            ;
        $query=$qb->getQuery();
        //dump($query);
            // default action is always to return a Document
        $ville = $query->getOneOrNullResult();
        $errMessage=null;
        if (!$ville) $errMessage="Cette id est incorrecte";
        
        //dump($ville);*
        
        $qb=$this->em->createQueryBuilder();
        $qb->select('d')
            ->from('Departement','d')
        ;
        $query=$qb->getQuery();
        dump($query);
        $departements = $query->getResult();
        $action="edit";
        echo $this->twig->render('villes/edit.twig', ['ville'=>$ville,'errMessage'=>$errMessage,"departements"=>$departements,"action"=>$action]);
    }
    public function create($params)
    {
        $ville=new Ville();
        $qb=$this->em->createQueryBuilder();
        $qb->select('d')
            ->from('Departement','d')
        ;
        $query=$qb->getQuery();
        
        $departements = $query->getResult();
        $errMessage=null;
        $action="create";
        echo $this->twig->render('villes/edit.twig', ['ville'=>$ville,'errMessage'=>$errMessage,"departements"=>$departements,"action"=>$action]);
    }
    public function insert($params)
    {
        $ville=new Ville();
        if ($ville) {
            $ville->setNom($_POST['nom']);
            $ville->setCodePostal($_POST["code_postal"]);
            $departement=$this->em->find("Departement",$_POST["departement"]);
            $ville->setDepartement($departement);
            $this->em->persist($ville);
            $this->em->flush();
            
        }
        header('Location:http://195.154.113.10/pter/squelette_framework_php/?c=ville&t=liste');
    }
    public function update($params)
    {
        $ville=$this->em->find("Ville",$_GET["id"]);
    
        if ($ville) {
            dump($_POST);
            $ville->setNom($_POST['nom']);
            $ville->setCodePostal($_POST["code_postal"]);
            $departement=$this->em->find("Departement",$_POST["departement"]);
            $ville->setDepartement($departement);
            $this->em->persist($ville);
            $this->em->flush();
        }
        header('Location:http://195.154.113.10/pter/squelette_framework_php/?c=ville&t=liste');
    }
    public function delete()
    {
        $ville=$this->em->find("Ville",$_GET['id']);
        if ($ville) {
            $this->em->remove($ville);
            $this->em->flush();
            
        }
        header('Location:http://195.154.113.10/pter/squelette_framework_php/?c=ville&t=liste');
    }
}
    
    
    
    
