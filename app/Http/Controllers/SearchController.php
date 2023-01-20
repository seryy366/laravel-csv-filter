<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Tag;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $items = [];
        if ($request->includeTags) {
            $includeTag = Tag::with('items')->find($request->includeTags);
            foreach ($includeTag as $tag){
                foreach ($tag->items()->get() as $item) {
                    $items[$item->id] = $item;
                }
            }
        }else {
            $items = Item::all();
        }
        if ($request->omitTag) {
            $omitTag = Tag::with('items')->find($request->omitTag);
            foreach ($omitTag as $tag){
                foreach ($tag->items()->get() as $item) {
                    if (isset($items[$item->id])){
                        unset($items[$item->id]);
                    }
                }
            }
        }
        foreach ($items as $item) {
            $item->increment('show_count');
            $items[$item->id] = $item;
        }
        $tags = Tag::pluck('name', 'id')->all();
        return view('index', compact('items', 'tags'));
    }
}

