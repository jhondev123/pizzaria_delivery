<?php

namespace Jhonattan\PizzariaDelivery\App\Http\Controllers;
class UserController
{
    public function index()
    {
        echo "index";
    }
    public function show($id)
    {
        echo "show: $id";
    }
}