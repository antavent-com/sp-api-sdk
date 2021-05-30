<?php

namespace AmazonPHP\SellingPartner\Api\TokensApi;

use AmazonPHP\SellingPartner\Exception\ApiException;
use AmazonPHP\SellingPartner\Exception\InvalidArgumentException;
use AmazonPHP\SellingPartner\OAuth;
use AmazonPHP\SellingPartner\ObjectSerializer;
use AmazonPHP\SellingPartner\HttpSignatureHeaders;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\RequestInterface;

/**
 * This class was auto-generated by https://github.com/OpenAPITools/openapi-generator/.
 * Do not change it, it will be overwritten with next execution of /bin/generate.sh
 */
final class TokensSDK
{
    private OAuth $oauth;

    public function __construct(OAuth $authentication)
    {
        $this->oauth = $authentication;
    }

    /**
     * Operation createRestrictedDataToken
     *
     * @param \AmazonPHP\SellingPartner\Model\Tokens\CreateRestrictedDataTokenRequest $body The restricted data token request details. (required)
     *
     * @throws \AmazonPHP\SellingPartner\Exception\ApiException on non-2xx response
     * @throws \AmazonPHP\SellingPartner\Exception\InvalidArgumentException
     * @return \AmazonPHP\SellingPartner\Model\Tokens\CreateRestrictedDataTokenResponse
     */
    public function createRestrictedDataToken($body): \AmazonPHP\SellingPartner\Model\Tokens\CreateRestrictedDataTokenResponse
    {
        list($response) = $this->createRestrictedDataTokenWithHttpInfo($body);
        return $response;
    }

    /**
     * Operation createRestrictedDataTokenWithHttpInfo
     *
     * @param  \AmazonPHP\SellingPartner\Model\Tokens\CreateRestrictedDataTokenRequest $body The restricted data token request details. (required)
     *
     * @throws \AmazonPHP\SellingPartner\Exception\ApiException on non-2xx response
     * @throws \AmazonPHP\SellingPartner\Exception\InvalidArgumentException
     * @return array<\AmazonPHP\SellingPartner\Model\Tokens\CreateRestrictedDataTokenResponse>
     */
    private function createRestrictedDataTokenWithHttpInfo($body) : array
    {
        $request = $this->createRestrictedDataTokenRequest($body);

        try {
            try {
                $response = $this->oauth->client()->sendRequest($request);
            } catch (ClientExceptionInterface $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    $content = (string) $response->getBody()->getContents();

                    return [
                        ObjectSerializer::deserialize($content, \AmazonPHP\SellingPartner\Model\Tokens\CreateRestrictedDataTokenResponse::class, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    $content = (string) $response->getBody()->getContents();

                    return [
                        ObjectSerializer::deserialize($content, \AmazonPHP\SellingPartner\Model\Tokens\ErrorList::class, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    $content = (string) $response->getBody()->getContents();

                    return [
                        ObjectSerializer::deserialize($content, \AmazonPHP\SellingPartner\Model\Tokens\ErrorList::class, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    $content = (string) $response->getBody()->getContents();

                    return [
                        ObjectSerializer::deserialize($content, \AmazonPHP\SellingPartner\Model\Tokens\ErrorList::class, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    $content = (string) $response->getBody()->getContents();

                    return [
                        ObjectSerializer::deserialize($content, \AmazonPHP\SellingPartner\Model\Tokens\ErrorList::class, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 415:
                    $content = (string) $response->getBody()->getContents();

                    return [
                        ObjectSerializer::deserialize($content, \AmazonPHP\SellingPartner\Model\Tokens\ErrorList::class, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    $content = (string) $response->getBody()->getContents();

                    return [
                        ObjectSerializer::deserialize($content, \AmazonPHP\SellingPartner\Model\Tokens\ErrorList::class, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    $content = (string) $response->getBody()->getContents();

                    return [
                        ObjectSerializer::deserialize($content, \AmazonPHP\SellingPartner\Model\Tokens\ErrorList::class, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 503:
                    $content = (string) $response->getBody()->getContents();

                    return [
                        ObjectSerializer::deserialize($content, \AmazonPHP\SellingPartner\Model\Tokens\ErrorList::class, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = \AmazonPHP\SellingPartner\Model\Tokens\CreateRestrictedDataTokenResponse::class;
            $content = (string) $response->getBody()->getContents();

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        \AmazonPHP\SellingPartner\Model\Tokens\CreateRestrictedDataTokenResponse::class,
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        \AmazonPHP\SellingPartner\Model\Tokens\ErrorList::class,
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        \AmazonPHP\SellingPartner\Model\Tokens\ErrorList::class,
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        \AmazonPHP\SellingPartner\Model\Tokens\ErrorList::class,
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        \AmazonPHP\SellingPartner\Model\Tokens\ErrorList::class,
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 415:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        \AmazonPHP\SellingPartner\Model\Tokens\ErrorList::class,
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        \AmazonPHP\SellingPartner\Model\Tokens\ErrorList::class,
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        \AmazonPHP\SellingPartner\Model\Tokens\ErrorList::class,
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 503:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        \AmazonPHP\SellingPartner\Model\Tokens\ErrorList::class,
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Create request for operation 'createRestrictedDataToken'
     *
     * @param  \AmazonPHP\SellingPartner\Model\Tokens\CreateRestrictedDataTokenRequest $body The restricted data token request details. (required)
     *
     * @throws \AmazonPHP\SellingPartner\Exception\InvalidArgumentException
     * @return RequestInterface
     */
    private function createRestrictedDataTokenRequest($body) : RequestInterface
    {
        // verify the required parameter 'body' is set
        if ($body === null || (is_array($body) && count($body) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $body when calling createRestrictedDataToken'
            );
        }

        $resourcePath = '/tokens/2021-03-01/restrictedDataToken';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $multipart = false;
        $query = '';


        if (\count($queryParams)) {
            $query = http_build_query($queryParams);
        }




        if ($multipart) {
            $headers = ['Accept' => ['application/json']];
        } else {
            $headers = [
                'Content-Type' => ['application/json'],
                'Accept' => ['application/json']
            ];
        }

        $request = $this->oauth->requestFactory()->createRequest(
            $method = 'GET',
            $host = $this->oauth->configuration()->apiURL() . $resourcePath . '?' . $query
        );

        // for model (json/xml)
        if (isset($body)) {
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \json_encode(ObjectSerializer::sanitizeForSerialization($body));
            } else {
                $httpBody = $body;
            }

            $request = $request->withBody($this->oauth->requestFactory()->createStreamFromString($httpBody));
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                $request = $request->withParsedBody($multipartContents);
            } elseif ($headers['Content-Type'] === 'application/json') {
                $request = $request->withBody($this->oauth->requestFactory()->createStreamFromString(\json_encode($formParams)));
            } else {
                $request = $request->withParsedBody($formParams);
            }
        }

        $defaultHeaders = HttpSignatureHeaders::forIAMUser(
            $this->oauth->configuration(),
            $method,
            $this->oauth->accessToken(),
            $resourcePath,
            $query,
            (string) $request->getBody()
        );

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        foreach ($headers as $name => $header) {
            $request = $request->withHeader($name, $header);
        }

        return $request;
    }

}
