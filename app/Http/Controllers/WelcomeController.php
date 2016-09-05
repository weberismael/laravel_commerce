<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $categories;
    public function __construct(Category $category)
    {
        $this->middleware('guest');
        $this->categories = $category;
    }

    public function index()
    {
        return view('welcome');
    }

    public function exemplo(){
        $nome = "Ismael";
        $sobrenome = "Weber";
        return view('exemplo',compact('nome','sobrenome'));
    }

    public function listacategory(){
        $categories =$this->categories->all();
        return view('listacategory', compact('categories'));
    }
}
