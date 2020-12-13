<?php

declare(strict_types=1);

namespace Fredoddou\Resume\Infrastructure\Primary\Http;

use Fredoddou\Resume\Domain\Education\EducationCollection;
use Fredoddou\Resume\Domain\Experience\ExperienceCollection;
use Fredoddou\Resume\Domain\Profile\Profile;
use Fredoddou\Resume\Domain\Project\ProjectCollection;
use Fredoddou\Resume\Domain\Techno\TechnoCollection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class HomeController extends AbstractController
{
    private TechnoCollection $technoCollection;
    private EducationCollection $educationCollection;
    private ExperienceCollection $experienceCollection;
    private ProjectCollection $projectCollection;
    private Profile $profile;

    public function __construct(
        TechnoCollection $technoCollection,
        EducationCollection $educationCollection,
        ExperienceCollection $experienceCollection,
        ProjectCollection $projectCollection,
        Profile $profile
    ) {
        $this->technoCollection = $technoCollection;
        $this->educationCollection = $educationCollection;
        $this->experienceCollection = $experienceCollection;
        $this->projectCollection = $projectCollection;
        $this->profile = $profile;
    }

    /**
     * @Route("/", name="home")
     */
    public function __invoke(): Response
    {
        return $this->render('home/index.html.twig', [
            'technos' => $this->technoCollection,
            'educations' => $this->educationCollection,
            'experiences' => $this->experienceCollection,
            'projects' => $this->projectCollection,
            'profile' => $this->profile,
        ]);
    }
}
