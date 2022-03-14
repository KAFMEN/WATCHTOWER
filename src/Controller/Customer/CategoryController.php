<?php

namespace App\Controller\Customer;


use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoryController extends AbstractController
{
    #[Route('/category', name: 'category_home')]
    public function index(CategoryRepository $categoryRepository): Response
    {
       
        $categories = $categoryRepository->findAll();
        return $this->render('customer/category.html.twig',[
            
            'categories'=> $categories,
           
        ]
    );

    }
}
