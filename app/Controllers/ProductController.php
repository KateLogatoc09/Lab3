<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ProductController extends BaseController
{
    private $product;
    public function __construct()
    {
        $this->product = new \App\Models\ProductModel();
    }
    public function emart()
    {
        $data = [
            'products' => $this->product->findall()
        ];
        return view('emart', $data);
        //'name', 'description', 'category', 'price', 'quantity', 'image'
    }
    public function view($id)
    {
        $data = ['products' => $this->product->findAll(),
        'pro' => $this->product->where('id', $id)->first(),];
        return view('viewproduct', $data);
    }
}
