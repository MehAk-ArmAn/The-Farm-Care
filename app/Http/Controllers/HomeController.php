<?php
namespace App\Http\Controllers;
use App\Models\Category; use App\Models\Page; use App\Models\Product;
class HomeController extends Controller { public function index(){ return view('home',['categories'=>Category::active()->orderBy('sort_order')->with(['products'=>fn($q)=>$q->active()])->get(),'featuredProducts'=>Product::active()->where('is_featured',true)->orderBy('sort_order')->take(6)->get(),'page'=>Page::byKey('home')]); } public function about(){return view('about',['page'=>Page::byKey('about')]);} public function contact(){return view('contact',['page'=>Page::byKey('contact')]);} }
