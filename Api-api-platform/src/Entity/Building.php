<?php

namespace App\Entity;
use ApiPlatform\Core\Action\NotFoundAction;
use App\Controller\GetBuildingOfController;
use App\Controller\PeopleInBuildingController;
use App\Controller\PeopleInPieceController;
use App\Controller\testController;
use App\Repository\BuildingRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use phpDocumentor\Reflection\DocBlock\Description;
use phpDocumentor\Reflection\DocBlock\Tags\Method;
use phpDocumentor\Reflection\Type;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ORM\Entity(repositoryClass=BuildingRepository::class)

 */
#[ApiResource(
    collectionOperations:[
        'BuildingOf'=>[
            'normalization_context'=>['groups'=>['get:buildingOf']],
            'method'=>'get',
            'path'=>'/buildingof/{nom}',
            'pagination_enabled'=>false,

            'controller'=>GetBuildingOfController::class,
            'openapi_context'=>[
                'summary'=>'liste les building appartenant a une organisation',
                'description'=>'récupere la liste des building de l\'organisations en parametre',
                'parameters'=>[
                    [
                        'in'=>'path',
                        'name'=>'nom',
                        'description'=>'nom de l\'organisation des buildings recherchés',
                        'required'=>true,
                        'schema'=>[
                            'type'=>'string'
                        ]
                    ]
                ]
            ]

        ],
        'Building_PeopleIn'=>[
            'normalization_context'=>['groups'=>['get:PeopleIn']],
            'method'=>'get',
            'path'=>'/PeopleIn/Building/{nom}',
            'pagination_enabled'=>false,

            'controller'=>PeopleInBuildingController::class,
            'openapi_context'=>[
                'summary'=>'nombre de personnes présentes dans le building',
                'description'=>'récupere le nombre de personnes présentes dans le building en parametre',
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

                'response'=>[
                    'description'=>'nb de personne presente',
                    'content'=>[
                        'application/json'=>[
                            'schema'=>[
                                'type'=>'int'
                            ]
                        ]
                    ]
                ]
            ]

        ]

    ]

)]
class Building
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
    #[Groups(['get:buildingOf'])]
    private $nom;

    /**
     * @ORM\ManyToOne(targetEntity=Organisation::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_organisation;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $zipcode;

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

    public function getIdOrganisation(): ?Organisation
    {
        return $this->id_organisation;
    }

    public function setIdOrganisation(?Organisation $id_organisation): self
    {
        $this->id_organisation = $id_organisation;

        return $this;
    }

    public function getZipcode(): ?string
    {
        return $this->zipcode;
    }

    public function setZipcode(string $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }
}
