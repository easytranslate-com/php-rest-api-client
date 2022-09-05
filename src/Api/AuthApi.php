<?php

namespace EasyTranslate\RestApiClient\Api;

use EasyTranslate\RestApiClient\Api\Request\ObtainAccessTokenRequest;
use EasyTranslate\RestApiClient\Api\Request\RequestInterface;
use EasyTranslate\RestApiClient\Api\Response\ObtainAccessTokenResponse;

class AuthApi extends AbstractApi
{
    /**
     * @return \EasyTranslate\RestApiClient\Api\Response\ObtainAccessTokenResponse
     */
    public function obtainAccessToken()
    {
        $request = new ObtainAccessTokenRequest($this->getConfiguration());
        $data    = $this->sendRequest($request);

        return new ObtainAccessTokenResponse($data);
    }

    /**
     * @param \EasyTranslate\RestApiClient\Api\Request\RequestInterface $request
     * @return void
     */
    protected function setCurlPostData($request, $curl)
    {
        if ($request->getData()) {
            $data = json_encode($request->getData());
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
    }
}
