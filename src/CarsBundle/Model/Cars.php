<?php

namespace CarsBundle\Model;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class Cars extends Bundle
{
    private $repository;

    public function __construct($doctrine)
    {
        $this->repository = $doctrine->getRepository('CarsBundle:Car');
    }

    public function getCars()
    {
        return $this->repository->findAll();
    }
}