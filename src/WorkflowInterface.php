<?php

declare(strict_types=1);

namespace EasyTranslate\RestApiClient;

interface WorkflowInterface
{
    public function getId(): string;

    public function getIdentifier(): string;

    public function getDisplayName(): string;

    public function getDescription(): string;

    public function getStatus(): string;

    public function isAvailable(): bool;
}
