<?php

namespace Jhonattan\PizzariaDelivery\App\Http\Controllers;
use Jhonattan\PizzariaDelivery\Core\EntityManager;
use Jhonattan\PizzariaDelivery\Core\Request;

class UserController
{
    public function index()
    {
        $em = EntityManager::getEntityManager();

        echo "index";
    }
    public function show(Request $request, $id)
    {
        echo "show: $id";
    }
    public function store(Request $request)
    {
        var_dump($request);
        echo "store";
    }
}