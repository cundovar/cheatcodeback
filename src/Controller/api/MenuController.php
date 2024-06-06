<?php

namespace App\Controller\api;

use App\Entity\Menu;
use App\Repository\MenuRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Json;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;

class MenuController extends AbstractController
{
    /**
     * @Route("/menu", name="api_menu",methods={"GET"})
     */
    public function getMenus(EntityManagerInterface $entityManager): JsonResponse
    {
        $menuRepository = $entityManager->getRepository(Menu::class);
        $menus = $menuRepository->findAll();

        $data = [];
        foreach ($menus as $menu) {
            $data[] = [
                'id' => $menu->getId(),
                'name' => $menu->getName(),
                'submenus' => $this->getSubmenusData($menu->getSubmenus())
            ];
        }

        return new JsonResponse($data);
    }

    private function getSubmenusData($submenus): array
    {
        $data = [];
        foreach ($submenus as $submenu) {
            $data[] = [
                'id' => $submenu->getId(),
                'name' => $submenu->getName(),
                'children' => $this->getSubmenusData($submenu->getChildren()),
                'menuContents'=>$submenu->getMenuCOntents()
            ];
        }
        return $data;
    }
}