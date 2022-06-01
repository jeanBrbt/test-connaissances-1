<?php

namespace App\Entity;
use App\Controller\GetPieceOfController;
use App\Controller\PeopleInPieceController;
use App\Entity\Building;
use App\Repository\PieceRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource(
    collectionOperations:[
        'pieceOf'=>[
            'normalization_context'=>['groups'=>['get:PieceOf']],
            'method'=>'get',
            'path'=>'/pieceOf/{nom}',
            'pagination_enabled'=>false,

            'controller'=>GetPieceOfController::class,
            'openapi_context'=>[
                'summary'=>'récupere la liste des piece du building en parametre',
                'description'=>'récupere la liste des pieces du building en parametre',
                'parameters'=>[
                    [
                        'in'=>'path',
                        'name'=>'nom',
                        'description'=>'nom du building au quel on recherche ses piéces',
                        'required'=>true,
                        'schema'=>[
                            'type'=>'string'
                        ]
                    ]
                ],

            ]

        ],
        'Piece_PeopleIn'=>[
            'normalization_context'=>['groups'=>['get:PeopleIn']],
            'method'=>'get',
            'path'=>'/PeopleIn/Piece/{nom}',
            'pagination_enabled'=>false,

            'controller'=>PeopleInPieceController::class,
            'openapi_context'=>[
                'summary'=>'nombre de personnes présentes',
                'description'=>'récupere le nombre de personnes présente dans le building en parametre',
                'parameters'=>[
                    [
                        'in'=>'path',
                        'name'=>'nom',
                        'description'=>'nom de building',
                        'required'=>true,
                        'schema'=>[
                            'type'=>'string'
                        ]
                    ]
                ],
                'response'=>[
                    'description'=>"nom des pieces",
                    'schema'=>[
                        'type'=>'int'
                    ]
                ]
            ]

        ]

    ]
)]
/**
 * @ORM\Entity(repositoryClass=PieceRepository::class)
 */
class Piece
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25)
     */
    #[Groups(['get:PieceOf'])]
    private $nom;

    /**
     * @ORM\Column(type="integer")
     */
    #[Groups(['get:PeopleIn'])]
    private $personnesPresentes;

    /**
     * @ORM\ManyToOne(targetEntity=building::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_building;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPersonnesPresentes(): ?int
    {
        return $this->personnesPresentes;
    }

    public function setPersonnesPresentes(int $personnesPresentes): self
    {
        $this->personnesPresentes = $personnesPresentes;

        return $this;
    }

    public function getIdBuilding(): ?building
    {
        return $this->id_building;
    }

    public function setIdBuilding(?building $id_building): self
    {
        $this->id_building = $id_building;

        return $this;
    }
}
