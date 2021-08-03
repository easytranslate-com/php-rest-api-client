<?php

declare(strict_types=1);

namespace EasyTranslate\RestApiClient\Api\Callback\DataConverter;

use EasyTranslate\RestApiClient\Api\Response\TaskCompletedResponse;

class TaskCompletedConverter
{
    public function convert(array $data): TaskCompletedResponse
    {
        return new TaskCompletedResponse($data);
    }
}
