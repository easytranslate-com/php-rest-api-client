<?php

declare(strict_types=1);

namespace EasyTranslate\RestApiClient;

interface TaskInterface
{
    public const STATUS_CREATED = 'CREATED';

    public const STATUS_PRICE_ACCEPTED = 'PRICE_ACCEPTED';

    public const STATUS_PRICE_DECLINED = 'PRICE_DECLINED';

    public const STATUS_ASSIGNED = 'ASSIGNED';

    public const STATUS_COMPLETED = 'COMPLETED';

    public const STATUS_CANCELLED_BY_CUSTOMER = 'CANCELLED_BY_CUSTOMER';

    public function getId(): string;

    public function getProject(): ProjectInterface;

    public function getTargetContent(): ?string;

    public function getTargetLanguage(): string;

    public function getStatus(): string;
}
