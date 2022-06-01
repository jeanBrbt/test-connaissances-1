<?php
namespace App\Controller;

use App\Entity\Building;
use Doctrine\ORM\EntityManagerInterface;
use  Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\AsController;

#[AsController]
class GetBuildingOfController extends AbstractController
{
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;

    }

    public function __invoke(Request $request): array
    {
        $argument = $request->attributes->get('nom');
        // $argument="Organisation_B";
        return $this->em->getRepository(building::class)
            ->findBuildingof($argument);
    }
}