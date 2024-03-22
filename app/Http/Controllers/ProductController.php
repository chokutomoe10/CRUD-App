<?php

namespace App\Http\Controllers;

// use App\Http\Requests\ProductFormRequest;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function create()
    {
        return view('frontend.product-create');
    }

    // public function store(ProductFormRequest $request)
    // {
    //     $request->validated();
    public function store(Request $request)
    {
        // cara 1
        $request->validate([
            'name' => 'required|string|min:2|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'is_active' => 'sometimes',
        ]);

        // cara1 store data
        // $product = new Product();
        // $product->name = $request->name;
        // $product->description = $request->description;
        // $product->price = $request->price;
        // $product->stock = $request->stock;
        // $product->is_active = $request->is_active == true ? 1:0;
        // $product->save();

        // cara2 store data
        // Product::create([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'price' => $request->price,
        //     'stock' => $request->stock,
        //     'is_active' => $request->is_active == true ? 1:0,
        // ]);

        // cara3 store data
        // Product::create($request->all());

        // cara4 store data
        // $product = new Product([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'price' => $request->price,
        //     'stock' => $request->stock,
        //     'is_active' => $request->is_active == true ? 1:0,
        // ]);
        // $product->save();

        // cara5 store data
        // $product = new Product();
        // // $product->fill($request->all());
        // $product->fill([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'price' => $request->price,
        //     'stock' => $request->stock,
        //     'is_active' => $request->is_active == true ? 1:0,
        // ]);

        // $product->save();

        // cara6 store data -> yang diatur di product model ga ikut ke insert, dan created updated at juga ga ke isi
        // DB::table('products')->insert([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'price' => $request->price,
        //     'stock' => $request->stock,
        //     'is_active' => $request->is_active == true ? 1:0,
        // ]);

        // cara7 store data -> hasilnya sama seperti cara6
        // Product::insert([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'price' => $request->price,
        //     'stock' => $request->stock,
        //     'is_active' => $request->is_active == true ? 1:0,
        // ]);

        // cara8 store data -> argument pertama pengecekan data ada atau tidak di database, argument kedua masukkan datanya ke database -> lanjut ke bawah
        // (kalau ada data yang sama sesuai pengecekan maka tidak akan membuat data baru di database)
        // Product::firstOrCreate([
        //     'name' => $request->name,
        // ],[
        //     'description' => $request->description,
        //     'price' => $request->price,
        //     'stock' => $request->stock,
        //     'is_active' => $request->is_active == true ? 1:0,
        // ]);

        // cara9 store data -> untuk argumennya dan hasilnya sama seperti cara8
        // $product = Product::firstOrNew([
        //     'name' => $request->name,
        // ],[
        //     'description' => $request->description,
        //     'price' => $request->price,
        //     'stock' => $request->stock,
        //     'is_active' => $request->is_active == true ? 1:0,
        // ]);

        // $product->save();

        // cara10 store data -> argumennya sama namun hasilnya apabila ada data yang sama sesuai pengecekan maka akan memperbarui data tersebut di database
        Product::updateOrCreate([
            'name' => $request->name,
        ],[
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'is_active' => $request->is_active == true ? 1:0,
        ]);

        return redirect('/products/create')->with('status','Product Added');

        // cara 2 dengan argumentnya request tipe request
        // $validator = Validator::make($request->all(), [
        //     'name' => ['required', 'string','min:2','max:255'],
        //     'description' => 'required|string',
        //     'price' => 'required|numeric',
        //     'stock' => 'required|numeric',
        //     'is_active' => 'sometimes',
        // ], [
        //     'name.required' => 'Product Name cannot be empty',
        //     'name.min' => 'Give least 2 characters for Product Name',
        // ]);

        // if($validator->fails())
        // {
        //     return redirect()->back()->withErrors($validator->errors())->withInput();
        // }

        // $request->validate([
        //     'name' => ['required', 'string','min:2','max:255'],
        //     'description' => 'required|string',
        //     'price' => 'required|numeric',
        //     'stock' => 'required|numeric',
        //     'is_active' => 'sometimes',
        // ], [
        //     'name.required' => 'Name cannot be empty'
        // ]);

        // cara 2 dari cara 1
        // $request->validate([
        //     'name' => [
        //         'required',
        //         'string',
        //         'min:2',
        //         'max:255'
        //     ],
        //     'description' => 'required|string',
        //     'price' => 'required|numeric',
        //     'stock' => 'required|numeric',
        //     'is_active' => 'sometimes',
        // ]);
    }
}
