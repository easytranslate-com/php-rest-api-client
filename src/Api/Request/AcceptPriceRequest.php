<?php

declare(strict_types=1);

namespace EasyTranslate\RestApiClient\Api\Request;

use EasyTranslate\RestApiClient\ProjectInterface;

class AcceptPriceRequest extends AbstractRequest
{
    /**
     * @var ProjectInterface
     */
    private $project;

    public function __construct(ProjectInterface $project)
    {
        $this->project = $project;
    }

    public function getType(): string
    {
        return self::TYPE_POST;
    }

    public function getResource(): string
    {
        return sprintf('laas/api/v1/teams/%s/projects/%s/accept-price', $this->project->getTeam(), $this->project->getId());
    }
}
