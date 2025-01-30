<?php

declare(strict_types=1);

namespace EasyTranslate\RestApiClient\Api\Response;

use EasyTranslate\RestApiClient\Api\ApiException;
use EasyTranslate\RestApiClient\Task;
use EasyTranslate\RestApiClient\TaskInterface;

class TaskCompletedResponse extends AbstractResponse
{
    /**
     * @var TaskInterface
     */
    private $task;

    /**
     * @var string
     */
    private $projectId;

    public function mapFields(array $data): void
    {
        parent::mapFields($data);
        if (!isset($data['data']['type'], $data['data']['id']) || $data['data']['type'] !== 'task') {
            throw new ApiException(sprintf('Invalid response data in response class %s', self::class));
        }
        $task = new Task();
        $task->setId($data['data']['id']);
        $this->projectId = $data['data']['attributes']['project']['id'];
        $task->setTargetContent($data['data']['attributes']['target_content']);
        $task->setTargetLanguage($data['data']['attributes']['target_language']);
        $this->task = $task;
    }

    public function getTask(): TaskInterface
    {
        return $this->task;
    }

    public function getProjectId(): string
    {
        return $this->projectId;
    }
}
