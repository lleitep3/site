<?php

namespace CarsBundle\Model;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class Cars extends Bundle
{
    private $em;

    public function __construct($doctrine)
    {
        $this->em = $doctrine->getManager();
    }

    public function getCars()
    {
        return $this->em
                    ->getRepository('CarsBundle:Car')
                    ->findAll();
    }

    public function removeCar($id)
    {
        $car = $this->em
                    ->getRepository('CarsBundle:Car')
                    ->find($id);

        if (!$car) {
            throw new Exception("code '{$id}' not fount", 404);
        }

        $this->em->remove($car);
        $this->em->flush();

        return true;
    }
}