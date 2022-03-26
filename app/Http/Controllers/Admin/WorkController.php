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
            'img'          =>  'required|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($validator->fails()) {
            return response() -> json([
                'status' => 'error',
                'msg'    => 'validation error',
                'errors' => $validator->getMessageBag()->toArray()
        
            ]); 
        }

        //  Upload image & Create name img
        $file_extention = $request -> img -> getClientOriginalExtension();
        $file_name = time() . "." . $file_extention;   // name => 3628.png
        $path = "images/works" ;
        $request -> img -> move( $path , $file_name );

        // Created PaymentMethod in DB
        $work = Work::create([   
            'name'        => $request -> name ,   
            'link'        => $request -> link , 
            'description' => $request -> description , 
            'img'         => $file_name ,
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
            'img'          =>  'mimes:jpeg,png,jpg|max:2048',
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


        // Check If There Img Uploaded
        if( $request -> hasFile("img") ){
            //  Upload image & Create name img
            $file_extention = $request -> img -> getClientOriginalExtension();
            $file_name = time() . "." . $file_extention;   // name => 3628.png
            $path = "images/works" ;
            $request -> img -> move( $path , $file_name );
        }else{
            $file_name = $work->img;
        }



        // Update in DB
        $update = $work-> update([
            'name'         => $request -> name ,   
            'description'  => $request -> description , 
            'link'         => $request -> link , 
            'img'          => $file_name ,
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
