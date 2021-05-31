<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\Storage;
use Validator;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.main', compact('products'));
    }
    
    public function create()
	{
        $categories = Category::all();
		return view('admin.create', compact('categories'));
	}

    public function store(Request $request)
    {
        $message = array(
            'name.required' => 'Please enter product name.',
            'name.string' => 'Please enter alphanumeric value.',
            'name.min' => 'Product name minimum 5 letters.',
            'name.max' => 'Product name maximum 80 letters.',
            'price.required' => 'Please enter price.',
            'price.numeric' => 'Numerical values only',
            'stock.numeric' => 'Numerical values only',
            'stock.required' => 'Please enter stock amount.'
        );

        $request->validate([
            'name' => 'required|string|min:5|max:80',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ], $message);

        
        $image = $request->file('image');
        $new_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('storage/images'), $new_name);

        Product::create([
            'category_id' => $request->category_id,
            'name' => $request->name, 
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $new_name,
        ]);

        return redirect('/main')->with('success','Added New Product!');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.edit', compact('product'));
    }

    public function update(Request $request, $id)
    { 
        $message = array(
            'name.required' => 'Please enter product name.',
            'name.string' => 'Please enter alphanumeric value.',
            'name.min' => 'Product name minimum 5 letters.',
            'name.max' => 'Product name maximum 80 letters.',
            'price.required' => 'Please enter price.',
            'price.numeric' => 'Numerical values only',
            'stock.numeric' => 'Numerical values only',
            'stock.required' => 'Please enter stock amount.'
        );

        $request->validate([
            'name' => 'required|string|min:5|max:80',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ], $message);

        $image = $request->file('image');
        $new_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('storage/images'), $new_name);

        Product::where('id', $id)
            ->update([
                'name' => $request->name,
                'price' => $request->price,
                'stock' => $request->stock,
                'image' => $new_name,
            ]);

        return redirect('/main');
    }

    public function destroy($id)
    {
        $image = Product::find($id);
        Storage::delete('images/' . $image->image);
        Product::destroy($id);
        return redirect('/main');
    }
}