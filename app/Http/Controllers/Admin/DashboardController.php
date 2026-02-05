<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Article, Client, Event, Gallery, Product};

class DashboardController extends Controller
{
      public function index()
    {
        return view('admin.dashboard' , [
        'productCount' => Product::count(),
        'galleryCount'    => Gallery::count(),
        'articleCount'    => Article::count(),
        'eventCount'    => Event::count(),
        'clientCount'    => Client::count(),
        //'orderCount'   => Order::count(),
        ]);
        
    }
}
