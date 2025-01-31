<?php

declare(strict_types=1);

namespace EasyTranslate\RestApiClient\Api\Response;

use EasyTranslate\RestApiClient\Api\ApiException;
use EasyTranslate\RestApiClient\Project;
use EasyTranslate\RestApiClient\ProjectInterface;
use EasyTranslate\RestApiClient\Task;

class CreateProjectResponse extends AbstractResponse
{
    /**
     * @var ProjectInterface
     */
    private $project;

    public function mapFields(array $data): void
    {
        parent::mapFields($data);
        if (!isset($data['data']['type'], $data['data']['id']) || $data['data']['type'] !== 'projects') {
            throw new ApiException(sprintf('Invalid response data in response class %s', self::class));
        }
        $project = new Project();
        $project->setId($data['data']['id']);
        $team = $this->extractTeam($data);
        $project->setTeam($team);
        $project->setSourceLanguage($data['data']['attributes']['source_language']);
        $project->setTargetLanguages($data['data']['attributes']['target_languages']);
        $project->setFolderId($data['data']['attributes']['folder']);
        $project->setName($data['data']['attributes']['name']);
        $project->setWorkflowId($data['data']['attributes']['workflow']['id']);
        $tasks = $this->extractTasks($data, $project);
        $project->setTasks($tasks);
        if (isset($data['data']['attributes']['price'])) {
            $project->setPrice((float)$data['data']['attributes']['price']['amount']);
            $project->setCurrency($data['data']['attributes']['price']['currency']);
        }
        $this->project = $project;
    }

    private function extractTeam(array $data): string
    {
        if (!isset($data['data']['attributes']['account']['attributes'])) {
            return '';
        }

        return $data['data']['attributes']['account']['attributes']['team_identifier'];
    }

    private function extractTasks(array $data, ProjectInterface $project): array
    {
        $tasks = [];
        if (!isset($data['data']['attributes']['tasks'])) {
            return $tasks;
        }

        foreach ($data['data']['attributes']['tasks'] as $includedObject) {
            if (!isset($includedObject['type']) || $includedObject['type'] !== 'task') {
                continue;
            }
            $task = new Task();
            $task->setId($includedObject['id']);
            $task->setProject($project);
            $task->setTargetLanguage($includedObject['attributes']['target_language'] ?? '');
            $task->setStatus($includedObject['attributes']['status'] ?? '');
            $tasks[] = $task;
        }

        return $tasks;
    }

    public function getProject(): ProjectInterface
    {
        return $this->project;
    }
}
