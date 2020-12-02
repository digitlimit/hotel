<?php

namespace Tests;

trait TestCaseRequestTrait
{
    /**
     * @param $uri
     * @param array $data
     * @param string $token
     * @return \Illuminate\Foundation\Testing\TestResponse
     */
    protected function ajaxPost($uri, array $data = [], $token='')
    {
        $headers = [
            'Accept' => 'application/json',
        ];

        if($token){
            $headers['Authorization'] = 'Bearer ' . $token;
        }

        return $this->withHeaders($headers)
            ->json('POST', $uri, $data);
    }

    /**
     * @param $uri
     * @param array $data
     * @param string $token
     * @return \Illuminate\Foundation\Testing\TestResponse
     */
    protected function ajaxGet($uri, array $data = [], $token='')
    {
        $headers = [
            'Accept' => 'application/json',
        ];

        if($token){
            $headers['Authorization'] = 'Bearer ' . $token;
        }

        return $this->withHeaders($headers)
            ->json('GET', $uri, $data);
    }

    /**
     * @param $uri
     * @param array $data
     * @return \Illuminate\Foundation\Testing\TestResponse
     */
    protected function ajaxPut($uri, array $data = [], $token='')
    {
        $headers = [
            'Accept' => 'application/json',
        ];

        if($token){
            $headers['Authorization'] = 'Bearer ' . $token;
        }

        return $this->withHeaders($headers)
            ->json('PUT', $uri, $data);
    }

    /**
     * @param $uri
     * @param array $data
     * @return \Illuminate\Foundation\Testing\TestResponse
     */
    protected function ajaxDelete($uri, array $data = [], $token='')
    {
        $headers = [
            'Accept' => 'application/json',
        ];

        if($token){
            $headers['Authorization'] = 'Bearer ' . $token;
        }

        return $this->withHeaders($headers)
            ->json('DELETE', $uri, $data);
    }
}
