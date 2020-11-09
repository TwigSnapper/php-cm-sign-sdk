<?php

namespace CmSignSdk;

/**
 * Interface CmHttpInterface
 * @package CmSignSdk
 */
interface CmHttpInterface
{
    /**
     * @param array $headers
     * @return mixed
     */
    public function setHeaders(array $headers);

    /**
     * @param string $url
     * @return mixed
     */
    public function get(string $url);

    /**
     * @param string $url
     * @param $data
     * @return mixed
     */
    public function post(string $url, $data);
}