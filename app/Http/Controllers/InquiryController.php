<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;
use App\Http\Controllers\Controller;

class InquiryController extends Controller
{
    // Show all inquiries to admin
    public function index()
    {
        $inquiries = Inquiry::latest()->get(); // get all inquiries
        return view('admin.inquiries.index', compact('inquiries'));
    }
    
    // Add a product to the inquiry session
    public function addToCart(Request $request)
    {
        $cart = session()->get('inquiry_cart', []); // get cart

        $name = $request->product_name;
        $qty = max(1, (int)$request->quantity);

        $found = false;

        foreach ($cart as &$item) {
            if ($item['product_name'] === $name) {
                $item['quantity'] += $qty; // increase qty
                $found = true;
                break;
            }
        }

        if (!$found) {
            $cart[] = [
                'product_name' => $name,
                'quantity' => $qty
            ];
        }

        session()->put('inquiry_cart', $cart); // save

        return back()->with('success', 'Product added to inquiry!');
    }

    // Submit the full inquiry
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        $cart = session()->get('inquiry_cart', []);
        if (empty($cart)) {
            return redirect()->back()->withErrors(['cart' => 'Add at least one product before sending inquiry.']);
        }

        foreach ($cart as $item) {
            Inquiry::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'company' => $request->company,
                'country' => $request->country,
                'subject' => $request->subject,
                'product_name' => $item['product_name'],
                'message' => $request->message,
            ]);
        }

        session()->forget('inquiry_cart'); // clear after submission

        return redirect()->back()->with('success', 'Inquiry sent for all products!');
    }

    // Edit quantity of a product in the cart
    public function edit(Request $request, $index)
    {
        $cart = session('inquiry_cart', []);
        if(isset($cart[$index])){
            $cart[$index]['quantity'] = max(1, intval($request->quantity));
            session(['inquiry_cart' => $cart]);
            return back()->with('success', 'Quantity updated!');
        }
        return back()->with('error', 'Product not found!');
    }

    // Delete a product from the cart
    public function delete($index)
    {
        $cart = session('inquiry_cart', []);
        if(isset($cart[$index])){
            array_splice($cart, $index, 1);
            session(['inquiry_cart' => $cart]);
            return back()->with('success', 'Product removed!');
        }
        return back()->with('error', 'Product not found!');
    }
}