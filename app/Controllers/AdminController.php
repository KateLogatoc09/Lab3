<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AdminController extends BaseController
{
    private $product;
    private $category;

    public function __construct()
    {
        $this->product = new \App\Models\ProductModel();
        $this->category = new \App\Models\CategoryModel();
    }

    public function product($product)
    {
        echo $product;
    }

    public function Logatoc()
    {
        $data = ['product' => $this->product->findAll(),
        'category' => $this->category->findAll()];
        return view('admindash', $data);
    }

    public function index()
    {
       //
    }

    public function delete($id)
    {
        $this->product->where('id', $id)->delete();
    }

    public function edit($id)
    {
        $data = ['product' => $this->product->findAll(),
        'category' => $this->category->findAll(),
        'pro' => $this->product->where('id', $id)->first(),];
        return view('admindash', $data);
    }

    public function save()
    {
        $id = $_POST['id'];
        $data = [
            'name' => $this->request->getVar('name'),
            'description' => $this->request->getVar('description'),
            'category' => $this->request->getVar('category'),
            'price' => $this->request->getVar('price'),
            'quantity' => $this->request->getVar('quantity'),
            'image' => $this->request->getVar('image'),

        ];
        if($id != null){
            $this->product->set($data)->where('id', $id)->update();
        }else{
            $this->product->save($data);
        }
        return redirect()->to('/admindash');
    }


}
