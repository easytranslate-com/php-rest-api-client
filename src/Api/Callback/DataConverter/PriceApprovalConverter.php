<?php

namespace EasyTranslate\RestApiClient\Api\Callback\DataConverter;

use EasyTranslate\RestApiClient\Api\Response\PriceApprovalResponse;

class PriceApprovalConverter
{
    /**
     * @param mixed[] $data
     * @return \EasyTranslate\RestApiClient\Api\Response\PriceApprovalResponse
     */
    public function convert($data)
    {
        return new PriceApprovalResponse($data);
    }
}
