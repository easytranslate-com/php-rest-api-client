<?php

declare(strict_types=1);

namespace EasyTranslate\RestApiClient\Api;

use EasyTranslate\RestApiClient\Api\Request\FetchAuthenticatedUserRequest;
use EasyTranslate\RestApiClient\Api\Response\FetchAuthenticatedUserResponse;

class TeamApi extends AbstractApi
{
    public function getUser(): FetchAuthenticatedUserResponse
    {
        $request = new FetchAuthenticatedUserRequest();
        $data    = $this->sendRequest($request);

        return new FetchAuthenticatedUserResponse($data);
    }
}
