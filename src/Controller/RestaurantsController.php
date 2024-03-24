<?php

namespace App\Controller;

use App\Entity\Testdb;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class RestaurantsController extends AbstractController{

    #[Route('/testdb/{id}',name:'product_show',methods:['GET'])]
    public function show(EntityManagerInterface $entityManager,int $id):Response{
        $testdb = $entityManager->getRepository(Testdb::class)->find($id);

        if (!$testdb) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
        return new Response('Check out this great product: '.$testdb->getName());

    }
}