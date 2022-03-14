<?php

namespace App\Controller\Customer;

use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'product_home')]
    public function index(ProductRepository  $productRepository): Response
    {
        $products = $productRepository->findAll();
        
        return $this->render('customer/product.html.twig',[
            'products' => $products,
            
           
        ]
    );

    }
}
