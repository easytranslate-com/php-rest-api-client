<?php

declare(strict_types=1);

namespace EasyTranslate\RestApiClient\Api\Request;

use EasyTranslate\RestApiClient\ProjectInterface;

class CreateProjectRequest extends AbstractRequest
{
    /**
     * @var ProjectInterface
     */
    private $project;

    public function __construct(ProjectInterface $project)
    {
        $this->project = $project;
    }

    public function getType(): string
    {
        return self::TYPE_POST;
    }

    public function getResource(): string
    {
        return sprintf('laas/api/v2/teams/%s/projects', $this->project->getTeam());
    }

    public function getData(): array
    {
        $data = [
            'type'       => 'projects',
            'attributes' => [
                'name'             => $this->project->getName(),
                'source_language'  => $this->project->getSourceLanguage(),
                'target_languages' => $this->project->getTargetLanguages(),
                'content'          => $this->project->getContent(),
                'workflow_id'      => $this->project->getWorkflowId(),
                'callback_url'     => $this->project->getCallbackUrl(),
            ],
        ];

        if ($this->project->getName() !== null) {
            $data['attributes']['name'] = $this->project->getName();
        }
        if ($this->project->getFolderName() !== null) {
            $data['attributes']['folder_name'] = $this->project->getFolderName();
        }
        if ($this->project->getFolderId() !== null) {
            $data['folder_id'] = $this->project->getFolderId();
        }

        return $data;
    }
}
