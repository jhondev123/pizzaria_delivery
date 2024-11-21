<?php

namespace Jhonattan\PizzariaDelivery\App\Http\Controllers;
use Jhonattan\PizzariaDelivery\Core\EntityManager;

class UserController
{
    public function index()
    {
        $em = EntityManager::getEntityManager();

        echo "index";
    }
    public function show($id)
    {
        echo "show: $id";
    }
}