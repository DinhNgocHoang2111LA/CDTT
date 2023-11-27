<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Str;
class BannerController extends Controller
{
    function index(){
        echo "hoang";
    }
    function store(Request $request){
        $Banner = new Banner();
        $Banner->name = $request->name;
        $Banner->slug= Str::of($request->name)->slug('-');
        $Banner->description = $request->description;    
        $Banner->image = $request->image;
        $Banner->sort_order = $request->sort_order;  
        $Banner->status= $request->status;
        $Banner->created_at = date('Y-m-d H:i:s');
        $Banner->created_by = 1;
        $image=request()->image;
        if($image!=null){
            $extension = $image->getClientOriginalExtension();
            if(in_array($extension,['png','jpg','gif','webp'])){
                $fileName= date('ymdHis')  .'.'. $extension;
                $image->move(public_path('images/Banner'), $fileName);
                $Banner->image = $fileName;
            }
        }

        if($Banner->save()==true){
            $data = [
                'status'=>true,
                'message'=>'Success',
                'Banner'=>$Banner
            ] ;
            return response()->json($data,200);
        }
    }
}
