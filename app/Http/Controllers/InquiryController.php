<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\Page;
use App\Models\Product;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function inquiry()
    {
        return view('inquiry', [
            'products' => Product::active()->orderBy('name')->get(),
            'type' => 'inquiry',
            'page' => Page::byKey('inquiry'),
        ]);
    }

    public function quote()
    {
        return view('inquiry', [
            'products' => Product::active()->orderBy('name')->get(),
            'type' => 'quote',
            'page' => Page::byKey('quote'),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|in:inquiry,quote',
            'name' => 'required|max:120',
            'email' => 'required|email|max:190',
            'phone' => 'nullable|max:60',
            'company' => 'nullable|max:190',
            'country' => 'nullable|max:120',
            'product_id' => 'nullable|exists:products,id',
            'variant' => 'nullable|max:190',
            'subject' => 'nullable|max:190',
            'quantity' => 'nullable|max:80',
            'message' => 'required|max:5000',
        ]);

        $data['status'] = 'new';
        Inquiry::create($data);

        $target = url()->previous();
        if ($request->filled('product_id')) {
            $target = strtok($target, '#').'#product-inquiry';
        }

        return redirect()->to($target)->with('success', 'Thank you. Your request has been received. The Farm Care team will contact you shortly.');
    }
}
