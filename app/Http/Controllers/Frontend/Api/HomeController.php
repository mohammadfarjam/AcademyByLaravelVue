<?php

namespace App\Http\Controllers\Frontend\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function get_new_products()
   {
     try {
      $post=Post::orderBy('id', 'DESC')->get();
       return response()->json($post,200);
     }catch (\Exception $e) {
          return $e->getMessage();
     }
   }



    public function details_products(Request $request)
    {

        try {
            $detail_products=Post::with('user')->where('slug',$request['slug'])->first();
            return response()->json($detail_products,200);
        }catch (\Exception $e) {
            return $e->getMessage();
        }

    }
}
