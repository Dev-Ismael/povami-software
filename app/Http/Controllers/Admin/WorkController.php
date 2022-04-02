<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Work;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $works = Work::orderBy('id','desc')->paginate(50);
        return view("admin.works" , compact('works'));
        // return $works;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Check Validator
        $validator = Validator::make($request->all(), [
            'name'         =>  ['required', 'string', 'max:55'],
            'description'  =>  ['required', 'string', 'max:500'],
            'link'         =>  ['required', 'string', 'max:255'], 
            'screen'       =>  'required|mimes:jpeg,png,jpg|max:2048',
            'brand'        =>  'required|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($validator->fails()) {
            return response() -> json([
                'status' => 'error',
                'msg'    => 'validation error',
                'errors' => $validator->getMessageBag()->toArray()
        
            ]); 
        }

        // Create Screen img name
        $screen_extention = $request -> screen -> getClientOriginalExtension();
        $screen_name = rand(1000000,10000000) . "." . $screen_extention;   // name => 3628.png
        
        // Create Brand img name
        $brand_extention = $request -> brand -> getClientOriginalExtension();
        $brand_name = rand(1000000,10000000) . "." . $brand_extention;   // name => 3628.png

        // Path
        $path = "images/works" ;

        // Upload
        $request -> screen -> move( $path , $screen_name );
        $request -> brand  -> move( $path , $brand_name );

        // Created Work in DB
        $work = Work::create([   
            'name'        => $request -> name ,   
            'link'        => $request -> link , 
            'description' => $request -> description , 
            'screen'      => $screen_name ,
            'brand'       => $brand_name ,
        ]);
        if(!$work){  // If Create work fails
            return response() -> json([
                "status" => 'error' ,   
                "msg" => "insert operation failed" ,
            ]);
        }

        return response() -> json([
            "status" => 'success' ,   // Created Successfully
            "msg" => "work created successfully" ,
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $work = Work::find( $id );  
        if(!$work){  // If get work fails
            return response() -> json([
                "status" => 'error' ,   
                "msg" => "get work failed" ,
            ]);
        }

        return response() -> json([
            "status" => 'success' ,   // get Successfully
            "msg"    => "work get successfully" ,
            "work"   => $work ,
        ]);
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

        
        // Check Validator
        $validator = Validator::make($request->all(), [
            'name'         =>  ['required', 'string', 'max:55'],
            'description'  =>  ['required', 'string', 'max:500'],
            'link'         =>  ['required', 'string', 'max:255'], 
            'screen'       =>  'mimes:jpeg,png,jpg|max:2048',
            'brand'        =>  'mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($validator->fails()) {
            return response() -> json([
                'status' => 'error',
                'msg'    => 'validation error',
                'errors' => $validator->getMessageBag()->toArray()
        
            ]); 
        }

        // Get Work
        $work = Work::find( $id );  
        if(!$work){  // If get work fails
            return response() -> json([
                "status" => 'error' ,   
                "msg" => "get work failed" ,
            ]);
        }


        // Check If There Images Uploaded
        $path = "images/works" ;

        if( $request -> hasFile("screen") ){
            //  Upload image & Create name screen
            $screen_extention = $request -> screen -> getClientOriginalExtension();
            $screen_name = rand(1000000,10000000) . "." . $screen_extention;   // name => 3628.png
            $request -> screen -> move( $path , $screen_name );
        }else{
            $screen_name = $work->screen;
        }

        if( $request -> hasFile("brand") ){
            //  Upload image & Create name brand
            $brand_extention = $request -> brand -> getClientOriginalExtension();
            $brand_name = rand(1000000,10000000) . "." . $brand_extention;   // name => 3628.png
            $request -> brand -> move( $path , $brand_name );
        }else{
            $brand_name = $work->brand;
        }



        // Update in DB
        $update = $work-> update([
            'name'         => $request -> name ,   
            'description'  => $request -> description , 
            'link'         => $request -> link , 
            'screen'       => $screen_name ,
            'brand'        => $brand_name ,
        ]);
        if(!$update){  // If update work fails
            return response() -> json([
                "status" => 'error' ,   
                "msg" => "update operation failed" ,
            ]);
        }

        return response() -> json([
            "status" => 'success' ,   // updated Successfully
            "msg" => "work updated successfully" ,
        ]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        

        // Get Work
        $work = Work::find( $id );  
        if(!$work){  // If get work fails
            return response() -> json([
                "status" => 'error' ,   
                "msg" => "get work failed" ,
            ]);
        }

        // Delete Work
        $delete = $work->delete();
        if(!$delete){  // If update work fails
            return response() -> json([
                "status" => 'error' ,   
                "msg" => "delete operation failed" ,
            ]);
        }

        return response() -> json([
            "status" => 'success' ,   // updated Successfully
            "msg" => "work deleted successfully" ,
        ]);


    }


    


}
