<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Models\{Article, Client, Event, Gallery};
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
{
    $galleries = Gallery::latest()->get();
    $galleryChunks = $galleries->chunk(5);

    $clients = Client::latest()->get();
    $articles = Article::latest()->take(4)->get();

    $events = Event::orderBy('date', 'asc')->get();
 

    return view('user.home', compact('galleryChunks', 'clients', 'articles', 'events'));
}

}
