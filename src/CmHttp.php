<?php

namespace chrissmits91\CmSignSdk;

/**
 * Class CmHttp
 * @package CmSignSdk
 */
class CmHttp implements CmHttpInterface
{
    /**
     * cURL channel resource
     * @var false|resource
     */
    private $ch;

    /**
     * SimpleCurl constructor.
     */
    public function __construct()
    {
        $this->ch = curl_init();

        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
    }

    /**
     * @param array $headers
     */
    public function setHeaders(array $headers)
    {
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, $headers);
    }

    /**
     * @param string $url
     * @param array $queryParams
     * @return object
     * @throws ErrorResponse
     */
    public function get(string $url, array $queryParams = [])
    {
        curl_setopt($this->ch, CURLOPT_URL, $url);
        if (count($queryParams) > 0) {
            curl_setopt($this->ch, CURLOPT_POST, false);
            curl_setopt($this->ch, CURLOPT_POSTFIELDS, http_build_query($queryParams));
        }

        return $this->handleResult(curl_exec($this->ch));
    }

    /**
     * @param string $url
     * @param mixed $data
     * @return object
     * @throws ErrorResponse
     */
    public function post(string $url, $data)
    {
        curl_setopt($this->ch, CURLOPT_URL, $url);
        curl_setopt($this->ch, CURLOPT_POST, true);
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, $data);

        return $this->handleResult(curl_exec($this->ch));
    }

    /**
     * @param $result
     * @return object
     * @throws ErrorResponse
     */
    public function handleResult($result)
    {
        $obj = json_decode($result);
        if (is_object($obj) && property_exists($obj, 'status') && !in_array($obj->status, [200, 201])) {
            throw new ErrorResponse($obj->message, $obj->status);
        }
        return $obj;
    }
}