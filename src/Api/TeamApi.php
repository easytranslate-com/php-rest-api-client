<?php

declare(strict_types=1);

namespace EasyTranslate\RestApiClient\Api;

use EasyTranslate\RestApiClient\Api\Request\FetchAuthenticatedUserRequest;
use EasyTranslate\RestApiClient\Api\Request\ShowLoggedTeamAccountDetailsRequest;
use EasyTranslate\RestApiClient\Api\Response\FetchAuthenticatedUserResponse;
use EasyTranslate\RestApiClient\Api\Response\ShowLoggedTeamAccountDetailsResponse;

class TeamApi extends AbstractApi
{
    public function getUser(): FetchAuthenticatedUserResponse
    {
        $request = new FetchAuthenticatedUserRequest();
        $data    = $this->sendRequest($request);

        return new FetchAuthenticatedUserResponse($data);
    }

    public function getTeamDetails(string $team): ShowLoggedTeamAccountDetailsResponse
    {
        $request = new ShowLoggedTeamAccountDetailsRequest($team);
        $data    = $this->sendRequest($request);

        return new ShowLoggedTeamAccountDetailsResponse($data);
    }
}
