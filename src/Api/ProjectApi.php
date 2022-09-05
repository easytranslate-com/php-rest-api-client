<?php

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
    /**
     * @param \EasyTranslate\RestApiClient\ProjectInterface $project
     * @return \EasyTranslate\RestApiClient\Api\Response\CreateProjectResponse
     */
    public function sendProject($project)
    {
        $request = new CreateProjectRequest($project);

        $data = $this->sendRequest($request);

        return new CreateProjectResponse($data);
    }

    /**
     * @param \EasyTranslate\RestApiClient\ProjectInterface $project
     * @return \EasyTranslate\RestApiClient\Api\Response\AcceptPriceResponse
     */
    public function acceptPrice($project)
    {
        $request = new AcceptPriceRequest($project);

        $data = $this->sendRequest($request);

        return new AcceptPriceResponse($data);
    }

    /**
     * @param \EasyTranslate\RestApiClient\ProjectInterface $project
     * @return \EasyTranslate\RestApiClient\Api\Response\DeclinePriceResponse
     */
    public function declinePrice($project)
    {
        $request = new DeclinePriceRequest($project);

        $data = $this->sendRequest($request);

        return new DeclinePriceResponse($data);
    }
}
