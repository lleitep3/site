<?php

namespace CarsBundle\Controller;

use CarsBundle\Model\Cars as CarsModel;
use CarsBundle\Entity\Car;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CarsController extends Controller
{
    public function indexAction()
    {
        $cars = [
            'cars' => (new CarsModel($this->getDoctrine()))->getCars()
        ];

        return $this->render('CarsBundle:Cars:index.html.twig', $cars);
    }

    public function formAction()
    {
        return $this->render('CarsBundle:Cars:form.html.twig', new Car);
    }

    public function saveAction()
    {
        $request = $this->get('request');
        $car = new Car();
        $car->setBrand($request->request->get('brand'));
        $car->setColor($request->request->get('color'));

        $db = $this->getDoctrine()->getManager();
        $db->persist($car);

        try {
            $db->flush();
            $response = new RedirectResponse('/car');
        } catch(\Exception $e) {
            $response = new Response('');
            $response->setStatusCode(500, $e->getMessage());
        }

        return $response;
    }
}
