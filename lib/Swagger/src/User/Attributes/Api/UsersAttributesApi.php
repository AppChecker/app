<?php
/**
 * UsersAttributesApi
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   http://github.com/swagger-api/swagger-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link     https://github.com/swagger-api/swagger-codegen
 */
/**
 *  Copyright 2015 SmartBear Software
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License.
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program. 
 * https://github.com/swagger-api/swagger-codegen 
 * Do not edit the class manually.
 */

namespace Swagger\Client\User\Attributes\Api;

use \Swagger\Client\Configuration;
use \Swagger\Client\ApiClient;
use \Swagger\Client\ApiException;
use \Swagger\Client\ObjectSerializer;

/**
 * UsersAttributesApi Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   http://github.com/swagger-api/swagger-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class UsersAttributesApi
{

    /**
     * API Client
     * @var \Swagger\Client\ApiClient instance of the ApiClient
     */
    protected $apiClient;
  
    /**
     * Constructor
     * @param \Swagger\Client\ApiClient|null $apiClient The api client to use
     */
    function __construct($apiClient = null)
    {
        if ($apiClient == null) {
            $apiClient = new ApiClient();
            $apiClient->getConfig()->setHost('https://localhost/');
        }
  
        $this->apiClient = $apiClient;
    }
  
    /**
     * Get API client
     * @return \Swagger\Client\ApiClient get the API client
     */
    public function getApiClient()
    {
        return $this->apiClient;
    }
  
    /**
     * Set the API client
     * @param \Swagger\Client\ApiClient $apiClient set the API client
     * @return UsersAttributesApi
     */
    public function setApiClient(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
        return $this;
    }
  
    
    /**
     * getAllAttributesForUser
     *
     * Returns all available attributes for the specified userID
     *
     * @param int $user_id The ID of the user (required)
     * @return \Swagger\Client\User\Attributes\Models\AllUserAttributesHalResponse
     * @throws \Swagger\Client\ApiException on non-2xx response
     */
    public function getAllAttributesForUser($user_id)
    {
        
        // verify the required parameter 'user_id' is set
        if ($user_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $user_id when calling getAllAttributesForUser');
        }
  
        // parse inputs
        $resourcePath = "/user/{userID}";
        $resourcePath = str_replace("{format}", "json", $resourcePath);
        $method = "GET";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = ApiClient::selectHeaderAccept(array('application/hal+json'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = ApiClient::selectHeaderContentType(array('application/x-www-form-urlencoded'));
  
        
        
        // path params
        if ($user_id !== null) {
            $resourcePath = str_replace(
                "{" . "userID" . "}",
                $this->apiClient->getSerializer()->toPathValue($user_id),
                $resourcePath
            );
        }
        
        
  
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } else if (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        
        $apiKey = $this->apiClient->getApiKeyWithPrefix('X-Wikia-AccessToken');
        if (isset($apiKey)) {
            $headerParams['X-Wikia-AccessToken'] = $apiKey;
        }
        
        
        
        $apiKey = $this->apiClient->getApiKeyWithPrefix('X-Wikia-UserId');
        if (isset($apiKey)) {
            $headerParams['X-Wikia-UserId'] = $apiKey;
        }
        
        
        
        // make the API Call
        try
        {
            list($response, $httpHeader) = $this->apiClient->callApi(
                $resourcePath, $method,
                $queryParams, $httpBody,
                $headerParams, '\Swagger\Client\User\Attributes\Models\AllUserAttributesHalResponse'
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Swagger\Client\User\Attributes\Models\AllUserAttributesHalResponse', $httpHeader);
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
        
        if (!$response) {
            return null;
        }
  
        return $this->apiClient->getSerializer()->deserialize($response, '\Swagger\Client\User\Attributes\Models\AllUserAttributesHalResponse');
        
    }
    
    /**
     * getAttributeForUser
     *
     * Returns specific attribute for specified user
     *
     * @param int $user_id The userID of the user (required)
     * @param string $attr_name The name of the attribute to be retrieved (required)
     * @return \Swagger\Client\User\Attributes\Models\UserAttributeHalResponse
     * @throws \Swagger\Client\ApiException on non-2xx response
     */
    public function getAttributeForUser($user_id, $attr_name)
    {
        
        // verify the required parameter 'user_id' is set
        if ($user_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $user_id when calling getAttributeForUser');
        }
        // verify the required parameter 'attr_name' is set
        if ($attr_name === null) {
            throw new \InvalidArgumentException('Missing the required parameter $attr_name when calling getAttributeForUser');
        }
  
        // parse inputs
        $resourcePath = "/user/{userID}/attr/{attrName}";
        $resourcePath = str_replace("{format}", "json", $resourcePath);
        $method = "GET";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = ApiClient::selectHeaderAccept(array('application/hal+json'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = ApiClient::selectHeaderContentType(array());
  
        
        
        // path params
        if ($user_id !== null) {
            $resourcePath = str_replace(
                "{" . "userID" . "}",
                $this->apiClient->getSerializer()->toPathValue($user_id),
                $resourcePath
            );
        }// path params
        if ($attr_name !== null) {
            $resourcePath = str_replace(
                "{" . "attrName" . "}",
                $this->apiClient->getSerializer()->toPathValue($attr_name),
                $resourcePath
            );
        }
        
        
  
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } else if (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        
        $apiKey = $this->apiClient->getApiKeyWithPrefix('X-Wikia-AccessToken');
        if (isset($apiKey)) {
            $headerParams['X-Wikia-AccessToken'] = $apiKey;
        }
        
        
        
        $apiKey = $this->apiClient->getApiKeyWithPrefix('X-Wikia-UserId');
        if (isset($apiKey)) {
            $headerParams['X-Wikia-UserId'] = $apiKey;
        }
        
        
        
        // make the API Call
        try
        {
            list($response, $httpHeader) = $this->apiClient->callApi(
                $resourcePath, $method,
                $queryParams, $httpBody,
                $headerParams, '\Swagger\Client\User\Attributes\Models\UserAttributeHalResponse'
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Swagger\Client\User\Attributes\Models\UserAttributeHalResponse', $httpHeader);
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
        
        if (!$response) {
            return null;
        }
  
        return $this->apiClient->getSerializer()->deserialize($response, '\Swagger\Client\User\Attributes\Models\UserAttributeHalResponse');
        
    }
    
    /**
     * saveAttributeForUser
     *
     * Saves an attribute for a specified user
     *
     * @param int $user_id The id of the user (required)
     * @param string $attr_name The name of the attribute to be saved (required)
     * @param string $value Value for the specified attribute (required)
     * @return \Swagger\Client\User\Attributes\Models\UserAttributeHalResponse
     * @throws \Swagger\Client\ApiException on non-2xx response
     */
    public function saveAttributeForUser($user_id, $attr_name, $value)
    {
        
        // verify the required parameter 'user_id' is set
        if ($user_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $user_id when calling saveAttributeForUser');
        }
        // verify the required parameter 'attr_name' is set
        if ($attr_name === null) {
            throw new \InvalidArgumentException('Missing the required parameter $attr_name when calling saveAttributeForUser');
        }
        // verify the required parameter 'value' is set
        if ($value === null) {
            throw new \InvalidArgumentException('Missing the required parameter $value when calling saveAttributeForUser');
        }
  
        // parse inputs
        $resourcePath = "/user/{userID}/attr/{attrName}";
        $resourcePath = str_replace("{format}", "json", $resourcePath);
        $method = "PUT";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = ApiClient::selectHeaderAccept(array('application/hal+json'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = ApiClient::selectHeaderContentType(array('application/x-www-form-urlencoded'));
  
        
        
        // path params
        if ($user_id !== null) {
            $resourcePath = str_replace(
                "{" . "userID" . "}",
                $this->apiClient->getSerializer()->toPathValue($user_id),
                $resourcePath
            );
        }// path params
        if ($attr_name !== null) {
            $resourcePath = str_replace(
                "{" . "attrName" . "}",
                $this->apiClient->getSerializer()->toPathValue($attr_name),
                $resourcePath
            );
        }
        // form params
        if ($value !== null) {
            $formParams['value'] = $this->apiClient->getSerializer()->toFormValue($value);
        }
        
  
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } else if (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        
        $apiKey = $this->apiClient->getApiKeyWithPrefix('X-Wikia-AccessToken');
        if (isset($apiKey)) {
            $headerParams['X-Wikia-AccessToken'] = $apiKey;
        }
        
        
        
        $apiKey = $this->apiClient->getApiKeyWithPrefix('X-Wikia-UserId');
        if (isset($apiKey)) {
            $headerParams['X-Wikia-UserId'] = $apiKey;
        }
        
        
        
        // make the API Call
        try
        {
            list($response, $httpHeader) = $this->apiClient->callApi(
                $resourcePath, $method,
                $queryParams, $httpBody,
                $headerParams, '\Swagger\Client\User\Attributes\Models\UserAttributeHalResponse'
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Swagger\Client\User\Attributes\Models\UserAttributeHalResponse', $httpHeader);
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
        
        if (!$response) {
            return null;
        }
  
        return $this->apiClient->getSerializer()->deserialize($response, '\Swagger\Client\User\Attributes\Models\UserAttributeHalResponse');
        
    }
    
    /**
     * deleteAttributeForUser
     *
     * Deletes attribute for this user
     *
     * @param int $user_id id of the user to be modified (required)
     * @param string $attr_name Name of attribute to be deleted for specified user (required)
     * @return void
     * @throws \Swagger\Client\ApiException on non-2xx response
     */
    public function deleteAttributeForUser($user_id, $attr_name)
    {
        
        // verify the required parameter 'user_id' is set
        if ($user_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $user_id when calling deleteAttributeForUser');
        }
        // verify the required parameter 'attr_name' is set
        if ($attr_name === null) {
            throw new \InvalidArgumentException('Missing the required parameter $attr_name when calling deleteAttributeForUser');
        }
  
        // parse inputs
        $resourcePath = "/user/{userID}/attr/{attrName}";
        $resourcePath = str_replace("{format}", "json", $resourcePath);
        $method = "DELETE";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = ApiClient::selectHeaderAccept(array('*/*'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = ApiClient::selectHeaderContentType(array());
  
        
        
        // path params
        if ($user_id !== null) {
            $resourcePath = str_replace(
                "{" . "userID" . "}",
                $this->apiClient->getSerializer()->toPathValue($user_id),
                $resourcePath
            );
        }// path params
        if ($attr_name !== null) {
            $resourcePath = str_replace(
                "{" . "attrName" . "}",
                $this->apiClient->getSerializer()->toPathValue($attr_name),
                $resourcePath
            );
        }
        
        
  
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } else if (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        
        $apiKey = $this->apiClient->getApiKeyWithPrefix('X-Wikia-AccessToken');
        if (isset($apiKey)) {
            $headerParams['X-Wikia-AccessToken'] = $apiKey;
        }
        
        
        
        $apiKey = $this->apiClient->getApiKeyWithPrefix('X-Wikia-UserId');
        if (isset($apiKey)) {
            $headerParams['X-Wikia-UserId'] = $apiKey;
        }
        
        
        
        // make the API Call
        try
        {
            list($response, $httpHeader) = $this->apiClient->callApi(
                $resourcePath, $method,
                $queryParams, $httpBody,
                $headerParams
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            }
  
            throw $e;
        }
        
    }
    
}
