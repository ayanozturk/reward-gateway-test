<?php

namespace App\Service;

use App\Exception\ApiException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ServerException;

class EmployeeApi
{
    private $client;
    private $user;
    private $password;

    public function __construct(Client $client, string $user, string $password)
    {
        $this->client = $client;
        $this->user = $user;
        $this->password = $password;
    }

    public function getAllEmployees(): string
    {
        try {
            $response = $this->client->get('/list', ['auth' => [$this->user, $this->password]]);
        } catch (ServerException $e) {
            throw new ApiException('Application can\'t be reached at the moment . Please try again later');
        }

        return $response->getBody()->getContents();
    }
}
