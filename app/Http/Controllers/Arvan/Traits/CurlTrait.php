<?php

namespace App\Http\Controllers\Arvan\Traits;

use App\Traits\Exception;
use GuzzleHttp\Exception\ClientException;

trait CurlTrait
{
    private $baseUrl = 'https://napi.arvancloud.ir/vod/2.0/';

    private $token = 'Apikey ef0144be-541f-5433-b274-c16ec2e8afe2';

    private $endpoint;

    private function setEndpoint($path)
    {
        $this->endpoint = $this->baseUrl . $path;

        return $this;
    }


    private function client(): \GuzzleHttp\Client
    {
        return $client = new \GuzzleHttp\Client();
    }

    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    private function getHeader(): array
    {
        return [
            'Authorization' => $this->getToken(),
        ];
    }

    public function getData()
    {
        return ['headers' => $this->getHeader()];
    }


    public function getRequestData()
    {
        try {
            $guzzleResponse = $this->client()->get($this->endpoint, $this->getData());

            if ($guzzleResponse->getStatusCode() == 200) {
                $response = json_decode($guzzleResponse->getBody() , true);
                return $response['data'];
            }

        } catch (Exception|ClientException $e) {
            return null;
        }

    }

}
