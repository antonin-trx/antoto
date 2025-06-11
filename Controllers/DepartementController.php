<?php
namespace Controllers;

use Departement;

class DepartementController extends Controller
{
    public function liste($params)
    {
        
        //$query = $this->em->createQuery('SELECT v FROM Villes v')->setMaxResults(1000);
        $qb=$this->em->createQueryBuilder();
        $qb->select('d')
            ->from('Departement','d')
            ;
        $query=$qb->getQuery();
        $departements = $query->getResult();
        echo $this->twig->render('departements/liste.twig', ['departements'=>$departements]);
    }
    public function edit($params)
    {
        //dump($_GET);
        $id=$_GET["id"];
        
        $qb=$this->em->createQueryBuilder();
        $qb->select('d')
            ->from('Departement','d')
            ->where('d.id=:departement_id')
            ->setParameter('departement_id',$id)
            ;
        $query=$qb->getQuery();
        //dump($query);
            // default action is always to return a Document
        $departement = $query->getOneOrNullResult();
        $errMessage=null;
        if (!$departement) $errMessage="Cette id est incorrecte";
        
        //dump($ville);*
        
        $qb=$this->em->createQueryBuilder();
        $qb->select('r')
            ->from('Region','r')
        ;
        $query=$qb->getQuery();
        //dump($query);
        $regions = $query->getResult();
        $action="edit";
        echo $this->twig->render('departements/edit.twig', ['departement'=>$departement,'errMessage'=>$errMessage,"regions"=>$regions,"action"=>$action]);
    }
    public function update($params)
    {
        $departement=$this->em->find("Departement",$_GET["id"]);
    
        if ($departement) {
            //dump($_POST);
            $departement->setNom($_POST['nom']);
            $departement->setCode($_POST["code"]);
            $region=$this->em->find("Region",$_POST["region"]);
            $departement->setRegion($region);
            $this->em->persist($departement);
            $this->em->flush();
        }
        header('Location:http://195.154.113.10/pter/squelette_framework_php/?c=departement&t=liste');
    }
}
