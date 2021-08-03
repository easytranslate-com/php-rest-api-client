<?php

declare(strict_types=1);

namespace EasyTranslate\RestApiClient\Api\Callback\DataConverter;

use EasyTranslate\RestApiClient\Api\Response\PriceApprovalResponse;

class PriceApprovalConverter
{
    public function convert(array $data): PriceApprovalResponse
    {
        return new PriceApprovalResponse($data);
    }
}
