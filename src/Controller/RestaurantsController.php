<?php

namespace App\Controller;

use App\Entity\Testdb;
use App\Repository\TestdbRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class RestaurantsController extends AbstractController{

    #[Route('/testdb/{id}',name:'product_show',methods:['GET'])]
    public function show(TestdbRepository $testdbRepository,int $id):Response{
        $testdb = $testdbRepository->find($id);
        if (!$testdb) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
        return new Response('Check out this great product: '.$testdb->getName());

    }

    #[Route('/testdb/update/{id}',name:'product_update',methods:['POST']),]
    public function update(EntityManagerInterface $entityManager,int $id):Response{
        $testdb = $entityManager->getRepository(Testdb::class)->find($id);     
        $request = Request::createFromGlobals();        
        dump($request->getPayload());                    
        if (!$testdb) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
        $testdb -> setName('修正したよ');
        $entityManager->flush();

        // return $this->redirectToRoute('product_show',[
        //     'id'=>$testdb->getId()
        // ]);       
        return new Response('デバッグ');
    }
}