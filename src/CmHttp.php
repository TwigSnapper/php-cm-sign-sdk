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
     * @return object
     * @throws ErrorResponse
     */
    public function get(string $url)
    {
        curl_setopt($this->ch, CURLOPT_URL, $url);

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
        if (property_exists($obj, 'status') && !in_array($obj->status, [200, 201])) {
            throw new ErrorResponse($obj->message, $obj->status);
        }
        return $obj;
    }
}