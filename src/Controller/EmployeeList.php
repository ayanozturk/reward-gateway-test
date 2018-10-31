<?php

namespace App\Controller;

use App\Repository\EmployeeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class EmployeeList extends AbstractController
{
    public function list(EmployeeRepository $employeeRepository): Response
    {

        $employees = $employeeRepository->fetchAllEmployees();

        return $this->render(
            'employee/list.html.twig', [
            'employees' => $employees,
        ]
        );
    }
}
