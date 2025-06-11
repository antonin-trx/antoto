<?php

namespace Controllers;

use Users;

class SecurityController extends Controller
{
    public function login($params)
    {
        //Affiche le formulaire de login
        
        
        echo $this->twig->render('security/login.twig', []);
    } 
    
    public function check($params)
    {
        //Vérifie le mot de passe
        echo $this->twig->render('security/state.twig', []);   
    }
    
    
}