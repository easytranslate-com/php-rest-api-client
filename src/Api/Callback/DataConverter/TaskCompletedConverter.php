<?php

namespace EasyTranslate\RestApiClient\Api\Callback\DataConverter;

use EasyTranslate\RestApiClient\Api\Response\TaskCompletedResponse;

class TaskCompletedConverter
{
    /**
     * @param mixed[] $data
     * @return \EasyTranslate\RestApiClient\Api\Response\TaskCompletedResponse
     */
    public function convert($data)
    {
        return new TaskCompletedResponse($data);
    }
}
