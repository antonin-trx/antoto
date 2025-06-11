<?php
namespace Controllers;

use Realisation;

class PortfolioController extends Controller
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
        echo $this->twig->render('portfolio/liste.twig', ['realisations'=>$realisations]);
    }
}