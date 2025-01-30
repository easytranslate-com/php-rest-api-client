<?php

declare(strict_types=1);

namespace EasyTranslate\RestApiClient\Api\Request;

class ShowLoggedTeamAccountDetailsRequest extends AbstractRequest
{
    /**
     * @var string
     */
    private $team;

    public function __construct(string $team)
    {
        $this->team = $team;
    }

    public function getResource(): string
    {
        return sprintf('laas/api/v2/teams/%s', $this->team);
    }
}
