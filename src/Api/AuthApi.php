<?php

declare(strict_types=1);

namespace EasyTranslate\RestApiClient\Api;

use EasyTranslate\RestApiClient\Api\Request\ObtainAccessTokenRequest;
use EasyTranslate\RestApiClient\Api\Request\RequestInterface;
use EasyTranslate\RestApiClient\Api\Response\ObtainAccessTokenResponse;

class AuthApi extends AbstractApi
{
    public function obtainAccessToken(): ObtainAccessTokenResponse
    {
        $request = new ObtainAccessTokenRequest($this->getConfiguration());
        $data    = $this->sendRequest($request);

        return new ObtainAccessTokenResponse($data);
    }

    protected function setCurlPostData(RequestInterface $request, $curl): void
    {
        if ($request->getData()) {
            $data = json_encode($request->getData());
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
    }
}
