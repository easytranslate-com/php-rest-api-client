<?php

declare(strict_types=1);

namespace EasyTranslate\RestApiClient\Api;

use EasyTranslate\RestApiClient\Api\Request\AcceptPriceRequest;
use EasyTranslate\RestApiClient\Api\Request\CreateProjectRequest;
use EasyTranslate\RestApiClient\Api\Request\DeclinePriceRequest;
use EasyTranslate\RestApiClient\Api\Response\AcceptPriceResponse;
use EasyTranslate\RestApiClient\Api\Response\CreateProjectResponse;
use EasyTranslate\RestApiClient\Api\Response\DeclinePriceResponse;
use EasyTranslate\RestApiClient\ProjectInterface;

class ProjectApi extends AbstractApi
{
    public function sendProject(ProjectInterface $project): CreateProjectResponse
    {
        $request = new CreateProjectRequest($project);

        $data = $this->sendRequest($request);

        return new CreateProjectResponse($data);
    }

    public function acceptPrice(ProjectInterface $project): AcceptPriceResponse
    {
        $request = new AcceptPriceRequest($project);

        $data = $this->sendRequest($request);

        return new AcceptPriceResponse($data);
    }

    public function declinePrice(ProjectInterface $project): DeclinePriceResponse
    {
        $request = new DeclinePriceRequest($project);

        $data = $this->sendRequest($request);

        return new DeclinePriceResponse($data);
    }
}
