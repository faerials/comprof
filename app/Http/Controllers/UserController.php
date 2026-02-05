<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Article, Client, Event, Gallery, Product};
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        return view('user.home', [
            'products' => Product::latest()->take(3)->get(),
            'galleries' => Gallery::latest()->take(6)->get(),
            'articles' => Article::latest()->take(3)->get(),
            'events' => Event::latest()->get(),
            'clients' => Client::all(),
        ]);
    }
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
