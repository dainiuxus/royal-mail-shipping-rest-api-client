<?php
/**
 * ManifestsApi
 * PHP version 5
 *
 * @category Class
 * @package  RoyalMail\Shipping\Rest\Api
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Royal Mail API Shipping V3 (REST)
 *
 * API Shipping V3 (REST) provides the functionality for customers to take a shipping transaction from creation to collection.   It specifically covers how the Royal Mail API Shipping V3 can be used by business customers to conduct shipping activity with Royal Mail and provides the technical information to build this integration. This specification must be used with the relevant accompanying specifications for customers wishing to interface their systems with Royal Mail services.  Royal Mail API Shipping V3 exposes a fully RESTful service that allows account customers to create shipments, produce labels, and produce documentation for all the tasks required to ship domestic and international items with Royal Mail.  Built on industry standards, Royal Mail API Shipping V3 provides a simple and low cost method for customers to integrate with Royal Mail, and allows them to get shipping quickly. The API offers data streaming to allow customers greater flexibility when generating their labels. There are no costs to customers for using the Royal Mail API Shipping V3 services, however customers??? own development costs must be covered by the customer developing the solution. Royal Mail will not accept any responsibility for these development, implementation and testing costs. Customers should address initial enquiries regarding development of systems for these purposes to their account handler.  This API can be used in conjunction with Royal Mail Pro Shipping, a GUI based shipping platform. For more details on Royal Mail Pro Shipping, including videos on and briefs on updating/ cancelling a shipment and Manifesting please refer to http://www.royalmail.com/pro-shipping-help.
 *
 * OpenAPI spec version: 3.0.20
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.8
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace RoyalMail\Shipping\Rest\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use RoyalMail\Shipping\Rest\Api\ApiException;
use RoyalMail\Shipping\Rest\Api\Configuration;
use RoyalMail\Shipping\Rest\Api\HeaderSelector;
use RoyalMail\Shipping\Rest\Api\ObjectSerializer;

/**
 * ManifestsApi Class Doc Comment
 *
 * @category Class
 * @package  RoyalMail\Shipping\Rest\Api
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class ManifestsApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation manifestsCreate
     *
     * Manifest All Shipments
     *
     * @param  \RoyalMail\Shipping\Rest\Api\models\ManifestRequest $body Request (required)
     * @param  string $xRMGAuthToken Authorisation token required to invoke this operation. Can be retrieved by invoking the **_/token** operation. (required)
     *
     * @throws \RoyalMail\Shipping\Rest\Api\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \RoyalMail\Shipping\Rest\Api\models\ManifestResponse
     */
    public function manifestsCreate($body, $xRMGAuthToken)
    {
        list($response) = $this->manifestsCreateWithHttpInfo($body, $xRMGAuthToken);
        return $response;
    }

    /**
     * Operation manifestsCreateWithHttpInfo
     *
     * Manifest All Shipments
     *
     * @param  \RoyalMail\Shipping\Rest\Api\models\ManifestRequest $body Request (required)
     * @param  string $xRMGAuthToken Authorisation token required to invoke this operation. Can be retrieved by invoking the **_/token** operation. (required)
     *
     * @throws \RoyalMail\Shipping\Rest\Api\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \RoyalMail\Shipping\Rest\Api\models\ManifestResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function manifestsCreateWithHttpInfo($body, $xRMGAuthToken)
    {
        $returnType = '\RoyalMail\Shipping\Rest\Api\models\ManifestResponse';
        $request = $this->manifestsCreateRequest($body, $xRMGAuthToken);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\RoyalMail\Shipping\Rest\Api\models\ManifestResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\RoyalMail\Shipping\Rest\Api\models\ManifestResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation manifestsCreateAsync
     *
     * Manifest All Shipments
     *
     * @param  \RoyalMail\Shipping\Rest\Api\models\ManifestRequest $body Request (required)
     * @param  string $xRMGAuthToken Authorisation token required to invoke this operation. Can be retrieved by invoking the **_/token** operation. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function manifestsCreateAsync($body, $xRMGAuthToken)
    {
        return $this->manifestsCreateAsyncWithHttpInfo($body, $xRMGAuthToken)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation manifestsCreateAsyncWithHttpInfo
     *
     * Manifest All Shipments
     *
     * @param  \RoyalMail\Shipping\Rest\Api\models\ManifestRequest $body Request (required)
     * @param  string $xRMGAuthToken Authorisation token required to invoke this operation. Can be retrieved by invoking the **_/token** operation. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function manifestsCreateAsyncWithHttpInfo($body, $xRMGAuthToken)
    {
        $returnType = '\RoyalMail\Shipping\Rest\Api\models\ManifestResponse';
        $request = $this->manifestsCreateRequest($body, $xRMGAuthToken);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'manifestsCreate'
     *
     * @param  \RoyalMail\Shipping\Rest\Api\models\ManifestRequest $body Request (required)
     * @param  string $xRMGAuthToken Authorisation token required to invoke this operation. Can be retrieved by invoking the **_/token** operation. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function manifestsCreateRequest($body, $xRMGAuthToken)
    {
        // verify the required parameter 'body' is set
        if ($body === null || (is_array($body) && count($body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling manifestsCreate'
            );
        }
        // verify the required parameter 'xRMGAuthToken' is set
        if ($xRMGAuthToken === null || (is_array($xRMGAuthToken) && count($xRMGAuthToken) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $xRMGAuthToken when calling manifestsCreate'
            );
        }

        $resourcePath = '/manifests';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // header params
        if ($xRMGAuthToken !== null) {
            $headerParams['X-RMG-Auth-Token'] = ObjectSerializer::toHeaderValue($xRMGAuthToken);
        }


        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/xml', 'application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/xml', 'application/json'],
                ['application/xml', 'application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($_tempBody));
            } else {
                $httpBody = $_tempBody;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-IBM-Client-Id');
        if ($apiKey !== null) {
            $headers['X-IBM-Client-Id'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation manifestsCreateByCarrier
     *
     * Manifest by Carrier Code(s)
     *
     * @param  \RoyalMail\Shipping\Rest\Api\models\ManifestCarrierCodesRequest $body body (required)
     * @param  string $xRMGAuthToken Authorisation token required to invoke this operation. Can be retrieved by invoking the **_/token** operation. (required)
     *
     * @throws \RoyalMail\Shipping\Rest\Api\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \RoyalMail\Shipping\Rest\Api\models\ManifestResponse
     */
    public function manifestsCreateByCarrier($body, $xRMGAuthToken)
    {
        list($response) = $this->manifestsCreateByCarrierWithHttpInfo($body, $xRMGAuthToken);
        return $response;
    }

    /**
     * Operation manifestsCreateByCarrierWithHttpInfo
     *
     * Manifest by Carrier Code(s)
     *
     * @param  \RoyalMail\Shipping\Rest\Api\models\ManifestCarrierCodesRequest $body (required)
     * @param  string $xRMGAuthToken Authorisation token required to invoke this operation. Can be retrieved by invoking the **_/token** operation. (required)
     *
     * @throws \RoyalMail\Shipping\Rest\Api\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \RoyalMail\Shipping\Rest\Api\models\ManifestResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function manifestsCreateByCarrierWithHttpInfo($body, $xRMGAuthToken)
    {
        $returnType = '\RoyalMail\Shipping\Rest\Api\models\ManifestResponse';
        $request = $this->manifestsCreateByCarrierRequest($body, $xRMGAuthToken);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\RoyalMail\Shipping\Rest\Api\models\ManifestResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\RoyalMail\Shipping\Rest\Api\models\ManifestResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation manifestsCreateByCarrierAsync
     *
     * Manifest by Carrier Code(s)
     *
     * @param  \RoyalMail\Shipping\Rest\Api\models\ManifestCarrierCodesRequest $body (required)
     * @param  string $xRMGAuthToken Authorisation token required to invoke this operation. Can be retrieved by invoking the **_/token** operation. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function manifestsCreateByCarrierAsync($body, $xRMGAuthToken)
    {
        return $this->manifestsCreateByCarrierAsyncWithHttpInfo($body, $xRMGAuthToken)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation manifestsCreateByCarrierAsyncWithHttpInfo
     *
     * Manifest by Carrier Code(s)
     *
     * @param  \RoyalMail\Shipping\Rest\Api\models\ManifestCarrierCodesRequest $body (required)
     * @param  string $xRMGAuthToken Authorisation token required to invoke this operation. Can be retrieved by invoking the **_/token** operation. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function manifestsCreateByCarrierAsyncWithHttpInfo($body, $xRMGAuthToken)
    {
        $returnType = '\RoyalMail\Shipping\Rest\Api\models\ManifestResponse';
        $request = $this->manifestsCreateByCarrierRequest($body, $xRMGAuthToken);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'manifestsCreateByCarrier'
     *
     * @param  \RoyalMail\Shipping\Rest\Api\models\ManifestCarrierCodesRequest $body (required)
     * @param  string $xRMGAuthToken Authorisation token required to invoke this operation. Can be retrieved by invoking the **_/token** operation. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function manifestsCreateByCarrierRequest($body, $xRMGAuthToken)
    {
        // verify the required parameter 'body' is set
        if ($body === null || (is_array($body) && count($body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling manifestsCreateByCarrier'
            );
        }
        // verify the required parameter 'xRMGAuthToken' is set
        if ($xRMGAuthToken === null || (is_array($xRMGAuthToken) && count($xRMGAuthToken) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $xRMGAuthToken when calling manifestsCreateByCarrier'
            );
        }

        $resourcePath = '/manifests/bycarrier';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // header params
        if ($xRMGAuthToken !== null) {
            $headerParams['X-RMG-Auth-Token'] = ObjectSerializer::toHeaderValue($xRMGAuthToken);
        }


        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/xml', 'application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/xml', 'application/json'],
                ['application/xml', 'application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($_tempBody));
            } else {
                $httpBody = $_tempBody;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-IBM-Client-Id');
        if ($apiKey !== null) {
            $headers['X-IBM-Client-Id'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation manifestsCreateByService
     *
     * Manifest by Service Code(s)
     *
     * @param  \RoyalMail\Shipping\Rest\Api\models\ManifestServiceCodesRequest $body body (required)
     * @param  string $xRMGAuthToken Authorisation token required to invoke this operation. Can be retrieved by invoking the **_/token** operation. (required)
     *
     * @throws \RoyalMail\Shipping\Rest\Api\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \RoyalMail\Shipping\Rest\Api\models\ManifestResponse
     */
    public function manifestsCreateByService($body, $xRMGAuthToken)
    {
        list($response) = $this->manifestsCreateByServiceWithHttpInfo($body, $xRMGAuthToken);
        return $response;
    }

    /**
     * Operation manifestsCreateByServiceWithHttpInfo
     *
     * Manifest by Service Code(s)
     *
     * @param  \RoyalMail\Shipping\Rest\Api\models\ManifestServiceCodesRequest $body (required)
     * @param  string $xRMGAuthToken Authorisation token required to invoke this operation. Can be retrieved by invoking the **_/token** operation. (required)
     *
     * @throws \RoyalMail\Shipping\Rest\Api\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \RoyalMail\Shipping\Rest\Api\models\ManifestResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function manifestsCreateByServiceWithHttpInfo($body, $xRMGAuthToken)
    {
        $returnType = '\RoyalMail\Shipping\Rest\Api\models\ManifestResponse';
        $request = $this->manifestsCreateByServiceRequest($body, $xRMGAuthToken);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\RoyalMail\Shipping\Rest\Api\models\ManifestResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\RoyalMail\Shipping\Rest\Api\models\ManifestResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation manifestsCreateByServiceAsync
     *
     * Manifest by Service Code(s)
     *
     * @param  \RoyalMail\Shipping\Rest\Api\models\ManifestServiceCodesRequest $body (required)
     * @param  string $xRMGAuthToken Authorisation token required to invoke this operation. Can be retrieved by invoking the **_/token** operation. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function manifestsCreateByServiceAsync($body, $xRMGAuthToken)
    {
        return $this->manifestsCreateByServiceAsyncWithHttpInfo($body, $xRMGAuthToken)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation manifestsCreateByServiceAsyncWithHttpInfo
     *
     * Manifest by Service Code(s)
     *
     * @param  \RoyalMail\Shipping\Rest\Api\models\ManifestServiceCodesRequest $body (required)
     * @param  string $xRMGAuthToken Authorisation token required to invoke this operation. Can be retrieved by invoking the **_/token** operation. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function manifestsCreateByServiceAsyncWithHttpInfo($body, $xRMGAuthToken)
    {
        $returnType = '\RoyalMail\Shipping\Rest\Api\models\ManifestResponse';
        $request = $this->manifestsCreateByServiceRequest($body, $xRMGAuthToken);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'manifestsCreateByService'
     *
     * @param  \RoyalMail\Shipping\Rest\Api\models\ManifestServiceCodesRequest $body (required)
     * @param  string $xRMGAuthToken Authorisation token required to invoke this operation. Can be retrieved by invoking the **_/token** operation. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function manifestsCreateByServiceRequest($body, $xRMGAuthToken)
    {
        // verify the required parameter 'body' is set
        if ($body === null || (is_array($body) && count($body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling manifestsCreateByService'
            );
        }
        // verify the required parameter 'xRMGAuthToken' is set
        if ($xRMGAuthToken === null || (is_array($xRMGAuthToken) && count($xRMGAuthToken) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $xRMGAuthToken when calling manifestsCreateByService'
            );
        }

        $resourcePath = '/manifests/byservice';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // header params
        if ($xRMGAuthToken !== null) {
            $headerParams['X-RMG-Auth-Token'] = ObjectSerializer::toHeaderValue($xRMGAuthToken);
        }


        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/xml', 'application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/xml', 'application/json'],
                ['application/xml', 'application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($_tempBody));
            } else {
                $httpBody = $_tempBody;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-IBM-Client-Id');
        if ($apiKey !== null) {
            $headers['X-IBM-Client-Id'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
