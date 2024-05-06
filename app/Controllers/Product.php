<?php

namespace App\Controllers;

class Product extends BaseController
{
    public function index(): string
    {
        return view('product/list_product');
    }
}
