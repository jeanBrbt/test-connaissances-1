<?php

namespace App\Controller;

use App\Entity\Piece;
use Doctrine\ORM\EntityManagerInterface;
use  Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\AsController;

#[AsController]
class testController extends AbstractController
{
    protected  $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em=$em;

    }

    public function __invoke(Request $request):array
{
    $argument=$request->attributes->get('nom');
    return  $this->em->getRepository(Piece::class)
        ->findPieceof($argument);
}
}