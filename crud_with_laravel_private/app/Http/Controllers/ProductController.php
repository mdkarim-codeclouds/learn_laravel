<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);

        return view('product.list', compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate_rule = [
            'thumbnail_image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'large_image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'name' => 'required',
            'description' => 'required',
            'count' => 'required',
            'price' => 'required'
        ];
        if((float)$request->input('discount_price') > 0){
            $validate_rule['discount_start_date'] = 'required|date';
            $validate_rule['discount_end_date'] = 'required|date';
        }
        $request->validate($validate_rule);

        $thumbnail_image_filename = basename($request->file('thumbnail_image')->getClientOriginalName()).'_'.time().'.'.$request->file('thumbnail_image')->extension();
        $request->file('thumbnail_image')->move(public_path('uploads/products'), $thumbnail_image_filename);

        $large_image_filename = basename($request->file('large_image')->getClientOriginalName()).'_'.time().'.'.$request->file('large_image')->extension();
        $request->file('large_image')->move(public_path('uploads/products'), $large_image_filename);

        Product::create([
            'thumbnail_image' => url('uploads/products/'.$thumbnail_image_filename),
            'large_image' => url('uploads/products/'.$large_image_filename),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'count' => $request->input('count'),
            'price' => $request->input('price'),
            'discount_price' => $request->input('discount_price'),
            'discount_start_date' => $request->input('discount_start_date'),
            'discount_end_date' => $request->input('discount_end_date'),
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validate_rule = [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'count' => 'required'
        ];
        if($request->file('thumbnail_image') || empty($request->input('old_thumbnail_image'))){
            $validate_rule['thumbnail_image'] = 'required|mimes:png,jpg,jpeg|max:2048';
        }
        if($request->file('large_image') || empty($request->input('old_large_image'))){
            $validate_rule['large_image'] = 'required|mimes:png,jpg,jpeg|max:2048';
        }
        if((float)$request->input('discount_price') > 0){
            $validate_rule['discount_start_date'] = 'required|date';
            $validate_rule['discount_end_date'] = 'required|date';
        }
        $request->validate($validate_rule);

        $thumbnail_image_filename = $request->input('old_thumbnail_image');
        $large_image_filename = $request->input('old_large_image');
        if($request->file('thumbnail_image')){
            $thumbnail_image_filename = basename($request->file('thumbnail_image')->getClientOriginalName()).'_'.time().'.'.$request->file('thumbnail_image')->extension();
            $request->file('thumbnail_image')->move(public_path('uploads/products'), $thumbnail_image_filename);
            $thumbnail_image_filename = url('uploads/products/'.$thumbnail_image_filename);
        }
        if($request->file('large_image')){
            $large_image_filename = basename($request->file('large_image')->getClientOriginalName()).'_'.time().'.'.$request->file('large_image')->extension();
            $request->file('large_image')->move(public_path('uploads/products'), $large_image_filename);
            $large_image_filename = url('uploads/products/'.$large_image_filename);
        }

        $product->update([
            'thumbnail_image' => $thumbnail_image_filename,
            'large_image' => $large_image_filename,
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'count' => $request->input('count'),
            'price' => $request->input('price'),
            'discount_price' => $request->input('discount_price'),
            'discount_start_date' => $request->input('discount_start_date'),
            'discount_end_date' => $request->input('discount_end_date'),
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}