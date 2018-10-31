<?php

namespace App\Repository;

use App\Entity\Employee;
use App\Service\EmployeeApi;

class EmployeeRepository
{
    private $api;

    public function __construct(EmployeeApi $api)
    {
        $this->api = $api;
    }

    public function fetchAllEmployees(): array
    {
        $data = json_decode($this->api->getAllEmployees(), true);

        $employees = [];

        foreach ($data as $employee) {
            $employees[] = new Employee(
                $employee['uuid'],
                $employee['company'],
                $employee['bio'],
                $employee['name'],
                $employee['title'],
                $employee['avatar']
            );
        }

        return $employees;
    }
}
