<?php

namespace App\Entity;

use App\Controller\PeopleInBuildingController;
use App\Controller\PeopleInOrganisationController;
use App\Repository\OrganisationRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use phpDocumentor\Reflection\DocBlock\Tags\Method;
use Symfony\Component\Serializer\Annotation\Groups;


/**

 * @ORM\Entity(repositoryClass=OrganisationRepository::class)

**/
#[ApiResource(
        collectionOperations: [
        'get'=>[
            'normalization_context'=>['groups'=>['get:orga']],
            'pagination_enabled'=>false,
            'openapi_context'=>[
                'summary'=>'récupere la liste des organisations',
                ]
        ],
        'Organisation_PeopleIn'=>[
            'normalization_context'=>['groups'=>['get:PeopleIn']],
            'method'=>'get',
            'path'=>'/PeopleIn/Organisation/{nom}',
            'pagination_enabled'=>false,

            'controller'=>PeopleInOrganisationController::class,
            'openapi_context'=>[
                'summary'=>' nombre de personnes présentes dans l\'organisation',
                'description'=>'donne le nombre de personnes présentes dans l\'organisation en parametre',
                'parameters'=>[
                    [
                        'in'=>'path',
                        'name'=>'nom',
                        'description'=>'nom d\'une Organisation',
                        'required'=>true,
                        'schema'=>[
                            'type'=>'string'
                        ]
                    ]
                ],
                'response'=>[
                    'description'=>"personnes présentes",
                    'schema'=>[
                        'type'=>'int'
                    ]
                ]
            ]

        ]
    ]
)]

class Organisation
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
    //     * @Groups("get:orga")
    #[Groups(['get:orga'])]
    private $nom;

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
}
