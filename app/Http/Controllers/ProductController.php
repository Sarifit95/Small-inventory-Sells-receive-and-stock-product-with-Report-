<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $update = false;
        $insert = false;
        $products = Product::get();
        return view("admin.products.index", ['insert' => $insert, 'products' => $products, 'update' => $update]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $update = false;
        $insert = true;



        return view("admin.products.index", ['insert' => $insert, 'update' => $update]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regex = '/^(?:[1-9]\d*|0)?(?:\.\d+)?$/';

        $request->validate([
            'name' => ['required','max:200',
                Rule::unique('products'),
                ],
            'quantity' => ['required','regex:'.$regex] ,
            'purchase_price' => ['required','regex:'.$regex] ,
//            'sales_price' => ['required'|'regex:'.$regex] ,
            'sales_price' => ['required','regex:'.$regex] ,
            'description' => ['required'] ,




            'image' => ['image'] ,

        ], [
            'name.required' => 'Product name is required',
            'name.unique' => 'Product name already exit',
            'quantity.required' => 'Quantity is required',
//            'quantity.regex' => ' Add valid  Quantity',
            'purchase_price.required' => 'Purchase price is required',
//            'purchase_price.regex' => ' Add valid  Purchase price ',
            'sales_price.required' => 'Sale price is required',
//            'sales_price.regex' => ' Add valid Sale price ',
            'description.required' => 'Description is required',
            'image.image' => 'please provide a valid image that with .jpg , .png, .gif, .jpeg extension ',

        ]);
        $image='';



        if ($request->hasFile('image')) {




//            Storage::disk('public')->delete('images/categories/'.$update->category_image.'');



            $file=$request->file('image');

            $image = Str::slug($request->input('name')) . '_' . time().'.'.$file->getClientOriginalExtension();
            $location=public_path('../storage/app/public/images/products/'.$image);
            Image::make($file)->resize(800, 800)->save($location);





        }









        Product::create([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'purchase_price' => $request->purchase_price,
            'sales_price' => $request->sales_price,
            'description' => $request->description,
            'image' => $image,

        ]);


        session()->flash('message', 'Inserted Successfully ');
        session()->flash('type', 'success');
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $update = true;
        $insert = false;
        $product = Product::find($id);


        return view("admin.products.index", ['insert' => $insert, 'product' => $product, 'update' => $update]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $update=Product::findOrfail($id);

        $regex = '/^(?:[1-9]\d*|0)?(?:\.\d+)?$/';

        $request->validate([
            'name' => ['required',
                'string',
                'max:200',

                Rule::unique('products')->ignore($id),


            ],
            'quantity' => ['required','regex:'.$regex] ,
            'purchase_price' => ['required','regex:'.$regex] ,
//            'sales_price' => ['required'|'regex:'.$regex] ,
            'sales_price' => ['required','regex:'.$regex] ,
            'description' => ['required'] ,




            'image' => ['required','image'] ,


        ], [
            'name.required' => 'Product name is required',
            'name.unique' => 'Product name already exit',
            'quantity.required' => 'Quantity is required',
//            'quantity.regex' => ' Add valid  Quantity',
            'purchase_price.required' => 'Purchase price is required',
//            'purchase_price.regex' => ' Add valid  Purchase price ',
            'sales_price.required' => 'Sale price is required',
//            'sales_price.regex' => ' Add valid Sale price ',
            'description.required' => 'Description is required',
            'image.image' => 'please provide a valid image that with .jpg , .png, .gif, .jpeg extension ',


        ]);




        if ($request->hasFile('image')) {


            $request->validate([
                'image' => 'required','image',

            ], [

                'image.image' => 'please provide a valid image that with .jpg , .png, .gif, .jpeg extension ',

            ]);




            $file=$request->file('image');


            Storage::disk('public')->delete('images/products/'.$update->image.'');


            $image = Str::slug($request->input('name')) . '_' . time().'.'.$file->getClientOriginalExtension();
            $location=public_path('../storage/app/public/images/products/'.$image);

            Image::make($file)->resize(800, 800)->save($location);


            $update->update([
                'image' => $image,
            ]);



        }
        if ($update->update([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'purchase_price' => $request->purchase_price,
            'sales_price' => $request->sales_price,
            'description' => $request->description,




        ])){
            session()->flash('message', 'Updated Successfully ');
            session()->flash('type', 'success');
            return redirect()->route('products.index');
        }






    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
