<?php

namespace EasyTranslate\RestApiClient\Api;

use EasyTranslate\RestApiClient\Api\Request\DownloadTaskTargetContentRequest;
use EasyTranslate\RestApiClient\Api\Response\DownloadTaskTargetContentResponse;
use EasyTranslate\RestApiClient\ProjectInterface;
use EasyTranslate\RestApiClient\TaskInterface;

class TaskApi extends AbstractApi
{
    /**
     * @param \EasyTranslate\RestApiClient\ProjectInterface $project
     * @param \EasyTranslate\RestApiClient\TaskInterface $task
     * @return \EasyTranslate\RestApiClient\Api\Response\DownloadTaskTargetContentResponse
     */
    public function downloadTaskTarget(
        $project,
        $task
    ) {
        $request = new DownloadTaskTargetContentRequest($project, $task);

        $data = $this->sendRequest($request);

        return new DownloadTaskTargetContentResponse($data);
    }
}
