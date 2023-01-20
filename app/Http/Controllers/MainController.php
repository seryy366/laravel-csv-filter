<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Tag;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $items = Item::paginate(20);
        $tags = Tag::pluck('name', 'id')->all();
        return view('index', compact('items', 'tags'));
    }
}
