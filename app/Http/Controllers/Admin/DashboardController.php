<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; use App\Models\Category; use App\Models\Product; use App\Models\Inquiry;
class DashboardController extends Controller { public function __invoke(){return view('admin.dashboard',['categoryCount'=>Category::count(),'productCount'=>Product::count(),'newInquiryCount'=>Inquiry::where('status','new')->count(),'quoteCount'=>Inquiry::where('type','quote')->count(),'latest'=>Inquiry::latest()->take(8)->get()]);} }
