<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Announce;

class AnnounceController extends Controller
{
public function create(){
return view('announce.create');
}
public function index(Request $request)
{
    $categoryId = $request->filled('category')
        ? $request->integer('category')
        : null;

    $category = $categoryId
        ? Category::findOrFail($categoryId)
        : null;

    return view('announce.index', compact('categoryId', 'category'));
}
public function show(Announce $announce)
{
return view('announce.show', compact('announce'));
}
}
