<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\emailnotify;
use App\User;
use App\Category;
use App\SubCategory;
use App\Notifications\Notifications;

use Auth;
use App;
class SubCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
     
    }
    public function index()
    {
        $lang = App::getlocale();
        if(Auth::user()->role != 'admin' ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title = 'departments';
        $departments = SubCategory::where('category_id','<>',null)->orderBy('id', 'DESC')->get();
        // return $admins ; 
        return view('departments.index',compact('departments','title','lang'));

    }

    public function subindex()
    {
        $lang = App::getlocale();
        if(Auth::user()->role != 'admin' ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title = 'subcategories';
        $subcategories = SubCategory::where('category_id',null)->orderBy('id', 'DESC')->get();
        // return $admins ; 
        return view('subcategories.index',compact('subcategories','title','lang'));

    }

    public function add()
    {
        $lang = App::getlocale();
        if(Auth::user()->role != 'admin' ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title = 'departments';
        $allcategories = Category::all();
        if($lang == 'ar')
        $categories = array_pluck($allcategories,'title_ar', 'id'); 
        else
        $categories = array_pluck($allcategories,'title_en', 'id');

        return view('departments.add',compact('title','categories','lang'));
    }

    public function subadd()
    {
        $lang = App::getlocale();
        if(Auth::user()->role != 'admin' ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title = 'subcategories';
        $allcategories = SubCategory::all();
        if($lang == 'ar')
        $categories = array_pluck($allcategories,'title_ar', 'id'); 
        else
        $categories = array_pluck($allcategories,'title_en', 'id');

        return view('subcategories.add',compact('title','categories','lang'));
    }
    public function store(Request $request)
    {
        
        if($request->id ){
            $rules =
            [
                'title_ar'  =>'required|max:190',           
                'title_en'  =>'required|max:190',           
                'category_id'  =>'required',   
                'status'  =>'required',   
                
            ];
        }     
        else{
            $rules =
            [
                'title_ar'  =>'required|max:190',           
                'title_en'  =>'required|max:190',           
                'category_id'  =>'required',   
                'status'  =>'required',     
            ];
        }
        
        
         $validator = \Validator::make($request->all(), $rules);
         if ($validator->fails()) {
             return \Response::json(array('errors' => $validator->getMessageBag()->toArray()));
         }
         
        // return $request ;

        if($request->id ){
            $department = SubCategory::find( $request->id );
        }
        else{
            $department = new SubCategory ;

        }

        $department->title_ar          = $request->title_ar ;
        $department->title_en         = $request->title_en ;
        $department->category_id        = $request->category_id ;
        $department->status        = $request->status ;
        $department->save();
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $name = md5($image->getClientOriginalName() . time()) . "." . $image->getClientOriginalExtension();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $name);
            $department->image   = $name;  
        }
        $department->save();
        return response()->json($department);

    }
    public function substore(Request $request)
    {
        
        if($request->id ){
            $rules =
            [
                'title_ar'  =>'required|max:190',           
                'title_en'  =>'required|max:190',           
                'category_id'  =>'required',   
                'status'  =>'required',   
                
            ];
        }     
        else{
            $rules =
            [
                'title_ar'  =>'required|max:190',           
                'title_en'  =>'required|max:190',           
                'category_id'  =>'required',   
                'status'  =>'required',     
            ];
        }
        
        
         $validator = \Validator::make($request->all(), $rules);
         if ($validator->fails()) {
             return \Response::json(array('errors' => $validator->getMessageBag()->toArray()));
         }
         
        // return $request ;

        if($request->id ){
            $SubCategory = SubCategory::find( $request->id );
        }
        else{
            $SubCategory = new SubCategory ;

        }

        $SubCategory->title_ar          = $request->title_ar ;
        $SubCategory->title_en         = $request->title_en ;
        $SubCategory->parent_id        = $request->category_id ;
        $SubCategory->status        = $request->status ;
        $SubCategory->save();
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $name = md5($image->getClientOriginalName() . time()) . "." . $image->getClientOriginalExtension();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $name);
            $SubCategory->image   = $name;  
        }
        $SubCategory->save();
        return response()->json($SubCategory);

    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $lang = App::getlocale();
        if(Auth::user()->role != 'admin' ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title = 'departments';
        $allcategories = Category::all();
        if($lang == 'ar')
        $categories = array_pluck($allcategories,'title_ar', 'id'); 
        else
        $categories = array_pluck($allcategories,'title_en', 'id');

        $data = SubCategory::where('id',$id)->orderBy('id', 'DESC')->first();
        // return $admin ; 
        return view('departments.add',compact('data','categories','title','lang'));
    }

    public function subedit($id)
    {
        $lang = App::getlocale();
        if(Auth::user()->role != 'admin' ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title = 'subcategories';
        $allcategories = SubCategory::all();
        if($lang == 'ar')
        $categories = array_pluck($allcategories,'title_ar', 'id'); 
        else
        $categories = array_pluck($allcategories,'title_en', 'id');

        $data = SubCategory::where('id',$id)->orderBy('id', 'DESC')->first();
        // return $admin ; 
        return view('subcategories.add',compact('data','categories','title','lang'));
    }

    public function update(Request $request, $id)
    {

      
    }


    public function destroy($id)
    {
       
        if(Auth::user()->role != 'admin' ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $id = SubCategory::find( $id );
        $id ->delete();
        return response()->json($id);
    }

    public function deleteall(Request $request)
    {
        
        
        if($request->ids){
            foreach($request->ids as $id){
                $id = SubCategory::find($id);
            }
            $ids = SubCategory::whereIn('id',$request->ids)->delete();
        }
        return response()->json($request->ids);
    }
}
