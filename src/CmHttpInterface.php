<?php

namespace chrissmits91\CmSignSdk;

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
     * @param array $queryParams
     * @param bool $returnRaw
     * @return mixed
     */
    public function get(string $url, array $queryParams = [], bool $returnRaw = false);

    /**
     * @param string $url
     * @param $data
     * @return mixed
     */
    public function post(string $url, $data);
}