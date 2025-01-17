<?php

declare(strict_types=1);

namespace EasyTranslate\RestApiClient\Api\Response;

use EasyTranslate\RestApiClient\Workflow;
use EasyTranslate\RestApiClient\WorkflowInterface;

class ShowLoggedTeamAccountDetailsResponse extends AbstractResponse
{
    /**
     * @var WorkflowInterface[]
     */
    private $workflows = [];

    public function mapFields(array $data): void
    {
        foreach ((array)$data['data']['attributes']['workflows'] as $workflowData) {
            if (!$this->isValidWorkflowData($workflowData)) {
                continue;
            }
            $workflow = new Workflow();
            $workflow->setId($workflowData['id']);
            $workflow->setIdentifier($workflowData['attributes']['identifier']);
            $workflow->setDisplayName($workflowData['attributes']['display_name']);
            $workflow->setDescription($workflowData['attributes']['description']);
            $workflow->setStatus($workflowData['attributes']['status']);
            $workflow->setIsAvailable($workflowData['attributes']['is_available']);
            $this->workflows[] = $workflow;
        }
        parent::mapFields($data);
    }

    public function getWorkflows(): array
    {
        return $this->workflows;
    }

    private function isValidWorkflowData(mixed $workflowData): bool
    {
        if (!is_array($workflowData)) {
            return false;
        }

        return isset(
                $workflowData['type'],
                $workflowData['id'],
                $workflowData['attributes']['identifier'],
                $workflowData['attributes']['display_name'],
                $workflowData['attributes']['description'],
                $workflowData['attributes']['status'],
                $workflowData['attributes']['is_available'],
            )
            && $workflowData['type'] === 'account_workflows';
    }
}
