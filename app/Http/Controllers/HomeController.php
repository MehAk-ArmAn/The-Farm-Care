<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::latest()
            ->take(8)
            ->get();

        $testimonials = Testimonial::orderBy('sort_order')
            ->take(6)
            ->get();

        return view('home', compact('featuredProducts', 'testimonials'));
    }
}
