<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;

class AdminsController extends Controller

{
    
    public function __construct()
    {
       $this->middleware('auth:admin');   
    }

    public function index()
    {
        return view('admin');
    }
}
