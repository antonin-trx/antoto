<?php
namespace Controllers;

use Region;

class RegionController extends Controller
{
    public function liste($params)
    {
        
        //$query = $this->em->createQuery('SELECT v FROM Villes v')->setMaxResults(1000);
        $qb=$this->em->createQueryBuilder();
        $qb->select('r')
            ->from('Region','r')
            ;
        $query=$qb->getQuery();
        $regions = $query->getResult();
        echo $this->twig->render('regions/liste.twig', ['regions'=>$regions]);
    }
    public function edit($params)
    {
        //dump($_GET);
        $id=$_GET["id"];
        
        $qb=$this->em->createQueryBuilder();
        $qb->select('r')
            ->from('Region','r')
            ->where('r.id=:region_id')
            ->setParameter('region_id',$id)
            ;
        $query=$qb->getQuery();
        //dump($query);
            // default action is always to return a Document
        $region = $query->getOneOrNullResult();
        $errMessage=null;
        if (!$region) $errMessage="Cette id est incorrecte";
        
        //dump($ville);*
        
        
        $action="edit";
        echo $this->twig->render('regions/edit.twig', ['region'=>$region,'errMessage'=>$errMessage,"action"=>$action]);
    }
    public function create($params)
    {
        $region=new Region();
        $errMessage=null;
        $action="create";
        echo $this->twig->render('regions/edit.twig', ['region'=>$region,'errMessage'=>$errMessage,"action"=>$action]);
    }

    public function insert($params)
    {
        $region=new Region();
        if ($region) {
            $region->setNom($_POST['nom']);
            
            $this->em->persist($region);
            $this->em->flush();
            
        }
        header('Location:http://195.154.113.10/pter/squelette_framework_php/?c=region&t=liste');
    }
    public function addDepartement($params) 
    {
        $id = $_GET['id'];
        $action=$_GET['action'];

        $region=$this->em->find("Region",$id);
        //dump($region->getDepartements());
        if ($action=="addDpt"){
            $departement=$this->em->find("Departement",$_POST['departement_id']);
            if ($departement) {
                //dump($departement);die;
                $region->addDepartement($departement);
                //dump($region);
                $this->em->persist($region);
                $this->em->flush();
            }
            header('Location:http://195.154.113.10/pter/squelette_framework_php/?c=region&t=liste'); 
        }

        if ($action=="selectDpt"){
            if ($region) {
                $qb=$this->em->createQueryBuilder();
                $qb->select('d')
                    ->from('Departement','d')
                    ->where('d.region is NULL')
                    ;
                $query=$qb->getQuery();
                $departements=$query->getResult();
                echo $this->twig->render('regions/addDepartement.twig', ['departements'=>$departements,'region'=>$region,'action'=>'selectDpt']);
            }
            else {
                header('Location:http://195.154.113.10/pter/squelette_framework_php/?c=region&t=liste');
            }
        }
    }
    public function delDepartement($params)
    {
        $id = $_GET["id"];
        $idDpt= $_GET["idDpt"];
        $region = $this->em->find("Region",$id);
        if ($region) {
            $departement=$this->em->find("Departement",$idDpt);
            if ($departement) {
                //dump("remove".$departement->getId());
                $region->removeDepartement($departement);
                $this->em->persist($region);
                $this->em->flush();
            }
        }
        header('Location:http://195.154.113.10/pter/squelette_framework_php/?c=region&t=liste');
    }
}
