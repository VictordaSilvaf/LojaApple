<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Http\Requests\SeriesFormRequest;

class AppleController extends Controller
{
    private $objProduto;
    public function __construct()
    {
        $this->objProduto = new \App\Models\Produto();
    }
    public function index()
    {
        $produtos = $this->objProduto->orderBy('created_at', 'desc')->take(3)->get();
        return view('pages.index', compact("produtos"));
    }

    public function servicos()
    {
        return view('pages.servicos');
    }
    public function ajuda()
    {
        return view('pages.ajuda');
    }
    public function sobre()
    {
        return view('pages.sobre');
    }
    public function produtos()
    {
        $produtos = $this->objProduto->all();
        return view('pages.produtos', compact("produtos"));
    }
    public function adminLogin()
    {
        return view('auth.login');
    }


}
