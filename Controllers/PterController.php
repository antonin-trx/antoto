<?php

namespace Controllers;

class PterController extends Controller
{
    public function myMethod()

    {   
        $users=["Albert","Georges","Sophie","Maxime"];
        $myData="Mes données";
        echo $this->twig->render('myView.html', ["users"=>$users,'myData' =>   $myData,'message'=>"Ceci est un message"]);
    }
}