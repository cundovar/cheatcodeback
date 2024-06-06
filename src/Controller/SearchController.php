<?php

namespace App\Controller;

use App\Repository\MenuContentRepository;
use App\Repository\MenuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search",methods={"GET"})
     */
    public function search(Request $request, MenuContentRepository $repo): JsonResponse
    {
    
        $query = $request->query->get('q', '');
        $results = $repo->findBySearchQuery($query);
        return $this->json($results);
    }
}
