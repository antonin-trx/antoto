<?php

namespace Controllers;

use Users;

class UserController extends Controller
{
    public function liste($params)
    {
        //Affiche un tableau des users
        $query = $this->em->createQuery('SELECT u FROM Users u');
        $users = $query->getResult();
       // dump($users);  
        echo $this->twig->render('users/liste.twig', ['users'=>$users]);
    } 
    
    public function create() {
        echo $this->twig->render('users/create.twig');
    }

    public function edit() {
        $user= $this->em->find("Users",$_GET['id']);
        echo $this->twig->render('users/edit.twig',['user'=>$user]);
    }
    
    public function update($params)
    {
        //Insert un user dans la BDD
        //dump($_POST);die;
        $user= $this->em->find("Users",$_GET['id']);
        $user->setNom($_POST['nom']);
        $user->setPrenom($_POST['prenom']);
        $user->setDateNais($_POST['date_nais']);
        
       
        //dump($user);die;
        $this->em->persist($user);
        $this->em->flush();

        header('Location:http://195.154.113.10/pter/squelette_framework_php/?c=user&t=liste');
    }
}