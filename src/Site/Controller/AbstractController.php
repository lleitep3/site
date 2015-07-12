<?php

namespace Site\Controller;

use Symfony\Component\HttpFoundation\Response;

abstract class AbstractController
{
    protected $header = [
        'Content-Type' => 'application/json'
    ];

    protected function returnSuccess($data)
    {
        return new Response(json_encode($data), Response::HTTP_OK, $this->header);
    }

    protected function returnCreated($data)
    {
        return new Response($data, Response::HTTP_CREATED);
    }
}