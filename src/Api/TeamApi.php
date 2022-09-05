<?php

namespace EasyTranslate\RestApiClient\Api;

use EasyTranslate\RestApiClient\Api\Request\FetchAuthenticatedUserRequest;
use EasyTranslate\RestApiClient\Api\Response\FetchAuthenticatedUserResponse;

class TeamApi extends AbstractApi
{
    /**
     * @return \EasyTranslate\RestApiClient\Api\Response\FetchAuthenticatedUserResponse
     */
    public function getUser()
    {
        $request = new FetchAuthenticatedUserRequest();
        $data    = $this->sendRequest($request);

        return new FetchAuthenticatedUserResponse($data);
    }
}
