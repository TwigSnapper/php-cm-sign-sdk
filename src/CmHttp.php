<?php

namespace TwigSnapper\CmSignSdk;

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
     * @param bool $returnRaw
     * @return object
     * @throws ErrorResponse
     */
    public function get(string $url, array $queryParams = [], bool $returnRaw = false)
    {
        if (count($queryParams) > 0) {
            $url .= '?' . http_build_query($queryParams);
        }

        curl_setopt($this->ch, CURLOPT_URL, $url);

        return $this->handleResult(curl_exec($this->ch), $returnRaw);
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
     * @param string $url
     * @param $data
     * @return mixed|void
     * @throws ErrorResponse
     */
    public function put(string $url, $data)
    {
        curl_setopt($this->ch, CURLOPT_URL, $url);
        curl_setopt($this->ch, CURLOPT_PUT, true);
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, $data);

        return $this->handleResult(curl_exec($this->ch));
    }

    /**
     * @param string $url
     * @return mixed|void
     * @throws ErrorResponse
     */
    public function delete(string $url)
    {
        curl_setopt($this->ch, CURLOPT_URL, $url);
        curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, "DELETE");

        return $this->handleResult(curl_exec($this->ch));
    }

    /**
     * @param $result
     * @param bool $returnRaw
     * @return object
     * @throws ErrorResponse
     */
    public function handleResult($result, bool $returnRaw = false)
    {
        $obj = json_decode($result);
        if (is_object($obj) && property_exists($obj, 'status') && !in_array($obj->status, [200, 201])) {
            throw new ErrorResponse($obj->message, $obj->status);
        }

        if ($returnRaw) {
            return $result;
        }

        return $obj;
    }
}