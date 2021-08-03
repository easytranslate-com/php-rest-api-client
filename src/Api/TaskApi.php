<?php

declare(strict_types=1);

namespace EasyTranslate\RestApiClient\Api;

use EasyTranslate\RestApiClient\Api\Request\DownloadTaskTargetContentRequest;
use EasyTranslate\RestApiClient\Api\Response\DownloadTaskTargetContentResponse;
use EasyTranslate\RestApiClient\ProjectInterface;
use EasyTranslate\RestApiClient\TaskInterface;

class TaskApi extends AbstractApi
{
    public function downloadTaskTarget(
        ProjectInterface $project,
        TaskInterface $task
    ): DownloadTaskTargetContentResponse {
        $request = new DownloadTaskTargetContentRequest($project, $task);

        $data = $this->sendRequest($request);

        return new DownloadTaskTargetContentResponse($data);
    }
}
