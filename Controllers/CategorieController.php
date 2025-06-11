<?php
namespace Controllers;

use Categorie;

class CategorieController extends Controller
{
    public function liste($params)
    {
        
        //$query = $this->em->createQuery('SELECT c FROM categories c')->setMaxResults(1000);
        $qb=$this->em->createQueryBuilder();
        $qb->select('c')
            ->from('Categorie','c')
            ;
        $query=$qb->getQuery();
        $categories = $query->getResult();
        echo $this->twig->render('categories/liste.twig', ['categories'=>$categories]);
    }
    public function delete()
    {
        $categorie=$this->em->find("Categorie",$_GET['id']);
        if ($categorie) {
            $this->em->remove($categorie);
            $this->em->flush();
            
        }
        header('Location:http://163.172.44.107/antonin/squelette_framework_php/?c=categorie&t=liste');
    }
    public function edit($params)
    {
        //dump($_GET);
        $id=$_GET["id"];
        //$categorie=$this->em->find("categories",$id);
        $qb=$this->em->createQueryBuilder();
        $qb->select('c')
            ->from('Categorie','c')
            ->join('Realisation','d')
            ->where('c.id=:categorie_id')
            ->setParameter('categorie_id',$id)
            ;
        $query=$qb->getQuery();
        //dump($query);
            // default action is always to return a Document
        $categorie = $query->getOneOrNullResult();
        $errMessage=null;
        if (!$categorie) $errMessage="Cette id est incorrecte";
        
        //dump($categorie);*
        
        $qb=$this->em->createQueryBuilder();
        $qb->select('d')
            ->from('Realisation','d')
        ;
        $query=$qb->getQuery();
        dump($query);
        $realisations = $query->getResult();
        $action="edit";
        echo $this->twig->render('categories/edit.twig', ['categorie'=>$categorie,'errMessage'=>$errMessage,"realisations"=>$realisations,"action"=>$action]);
    }
    public function create() {
        echo $this->twig->render('categories/create.twig');
    }
}