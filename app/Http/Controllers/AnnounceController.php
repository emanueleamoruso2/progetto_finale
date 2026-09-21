<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AnnounceController extends Controller
{
    public function create(){
        return view('announce.create');
    }
     public function index(){
        return view('announce.index');
    }
}
