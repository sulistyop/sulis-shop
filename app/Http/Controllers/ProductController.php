<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Carbon\Carbon;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use SweetAlert;






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
        $product = Product::paginate(5);
        return view('products.index' , compact('product'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }




    public function inputCart(Request $request){
        $priceProduct = Product::find($request->id_product);
        $sum  = $request->sum_price;
        $jumlah = $request->jumlah;
        $result = $sum * $jumlah;
        $user_id = Auth::user()->id;
  
        Cart::create([
           'user_id' => $user_id,
            'warna' => $request->warna,
            'jumlah' => $request->jumlah,
            'sum_price' => $result,
            'product_id' => $request->id_product,
        ]);
  
        return  redirect('/cart')->with('status','Masuk Keranjang');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $request->validate([
        //     'p_name' => 'required|max:255',
        //     'price' => 'required',
        //     'desc' => 'required',
        // ]);
        
        // Product::create([
            //     'p_name' => $request->p_name,
            //     'price' => $request->price,
            //     'desc' => $request->desc,
            //     'upload_by' => $user_id,
            // ]);
            
            // Product::create($request->all());
            // return redirect('/products')->with('status','Product Berhasil Ditambahkan');
            
            if ($request->hasFile('image')) {
                //  Let's do everything here
                if ($request->file('image')->isValid()) {
                    //
                    $user_id = Auth::user()->name;
                    $validated = $request->validate([
                        'p_name' => 'required|string|max:40',
                        'price' => 'required',
                        'image' => 'required|mimes:jpeg,png|max:1014',
                    ]);
                    $extension = $request->image->extension();
                    $request->image->storeAs('/public', $validated['p_name'].".".$extension);
                    $url = Storage::url($validated['p_name'].".".$extension);
                    Product::create([
                       'p_name' => $validated['p_name'],
                        'url' => $url,
                        'price' => $request->price,
                        'desc' => $request->desc,
                        'upload_by'=>$user_id,
                    ]);
                    return redirect('/products')->with('status','Data Product Berhasil Di input');
                }
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return view('products.show',compact('product'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $user_id = Auth::user()->name;
      
        //  Let's do everything here
        if ($request->file('image')) {
            
            $validated = $request->validate([
                'p_name' => 'required|string|max:40',
                'price' => 'required',
                'image' => 'required|mimes:jpeg,png|max:1014',
            ]);
            $extension = $request->image->extension();
            $request->image->storeAs('/public', $validated['p_name'].".".$extension);
            $url = Storage::url($validated['p_name'].".".$extension);

            Product::where('id',$product->id)->update([
                'p_name' => $validated['p_name'],
                'url' => $url,
                'price' => $request->price,
                'desc' => $request->desc,
                'upload_by'=>$user_id,
            ]);
            return redirect('/products')->with('status','Data Product Berhasil Di Update');
        }
        else {
            $validated = $request->validate([
                'p_name' => 'required|string|max:40',
                'price' => 'required',
            ]);
         
            $time = 
            Product::where('id',$product->id)->update([
                'p_name' => $validated['p_name'],
                'url' => $product->url,
                'price' => $request->price,
                'desc' => $request->desc,
                'upload_by'=>$user_id,
                'updated_at' =>Carbon::now(),
            ]);
            return redirect('/products')->with('status','Data Product Berhasil Di Update');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::destroy($id);
        return redirect('/products')->with('status','Delete Succes');
        
    }
}
