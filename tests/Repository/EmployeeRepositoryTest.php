<?php

namespace App\Tests\Repository;

use App\Entity\Employee;
use App\Repository\EmployeeRepository;
use App\Service\EmployeeApi;
use PHPUnit\Framework\TestCase;

class EmployeeRepositoryTest extends TestCase
{
    private $api;

    public function setUp()
    {
        $this->api = $this->prophesize(EmployeeApi::class);
    }

    public function testContruct(): void
    {
        $repo = new EmployeeRepository($this->api->reveal());
        $this->assertInstanceOf(EmployeeRepository::class, $repo);
    }

    public function testItReturnsEmptyArrayByDefault(): void
    {
        $this->api->getAllEmployees()->willReturn('[]');
        $repo = new EmployeeRepository($this->api->reveal());

        $result = $repo->fetchAllEmployees();

        $this->assertSame([], $result);
    }


    public function testItReturnsListOfEmployeeObjects(): void
    {
        $this->api->getAllEmployees()->willReturn(
            $this->getValidEmployeeListJson()
        );
        $repo = new EmployeeRepository($this->api->reveal());

        $result = $repo->fetchAllEmployees();

        $this->assertContainsOnlyInstancesOf(Employee::class, $result);
    }

    private function getValidEmployeeListJson()
    {
        $data = [
            [
                'uuid' => '123',
                'name' => 'Ayan',
                'title' => 'PHP Developer',
                'company' => 'Reward Gateway',
                'bio' => 'PHP Ninja / Annoying Reviewer',
                'avatar' => 'tux'
            ]
        ];

        return json_encode($data);
    }
}
