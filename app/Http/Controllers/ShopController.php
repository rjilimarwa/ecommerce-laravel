<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (request()->category) {
            $products = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->category);
            })->get();
            $categories = Category::all();
            $categoryName=$categories->where('slug',request()->category)->first()->name;
        } else {
            $products = Product::inRandomOrder()->take(12)->get();
            $categories = Category::all();
            $categoryName='Featured';
        }
        if(request()->sort==='high_low'){
            $products=$products->sortBy('price');
        }elseif(request()->sort==='low_high'){
            $producs=$products->sortByDesc('price');
        }else{
            $products= Product::inRandomOrder()->take(12)->get();
        }
        return view('shop')->with(['products' => $products,
                'categories' => $categories,
                'categoryName'=>$categoryName
            ]
        );

    }
      public function search(Request $request){
         $query = $request->input('query');
          $products=Product::where('name','like',"%$query%")
                     ->orWhere('details','like',"%$query%")
                      ->orWhere('description','like',"%$query%")
                      ->paginate(10);
         // $products= Product::search($query)->paginate(10);
          return view('search-results')->with('products',$products);
      }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $lug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $mightAlsoLike = Product::where('slug','!=',$slug)->inRandomOrder()->take(4)->get();
        return view('product')->with(
            'product',$product,
            'mightAlsoLike',$mightAlsoLike
            );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
