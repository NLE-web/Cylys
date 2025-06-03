<?php

namespace App\Twig\Components;
use App\Entity\SecurityStandard;
use App\Repository\SecurityStandardRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
class SecurityStandardComponent
{
    use DefaultActionTrait;
    #[LiveProp(writable: true)]
    public string $mode = 'form';

    #[LiveProp(writable: ["title", "code", "description", "level", "domain"])]
    public ?SecurityStandard $securityStandard = null;


    public function __construct(private SecurityStandardRepository $securityStandardRepository, private ManagerRegistry $managerRegistry)
    {
    }

    #[LiveAction]
    public function new()
    {
        $this->securityStandard = new SecurityStandard();
    }

    #[LiveAction]
    public function save()
    {
        $this->managerRegistry->getManager()->persist($this->securityStandard);
        $this->managerRegistry->getManager()->flush();
        $this->securityStandard = null;
    }

}
