<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\emailnotify;
use App\SubCategory;
use App\Category;
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
        $title = 'subcategories';
        $allcategories = Category::all();
        $categories = array_pluck($allcategories,'name_ar', 'id');
        $subcategories = SubCategory::orderBy('id', 'DESC')->get();
        // return $admins ; 
        return view('subcategories.index',compact('subcategories','categories','title','lang'));

    }

    public function store(Request $request)
    {
        
        if($request->id ){
            $rules =
            [
                'name_ar'  =>'required|max:190',           
                'name_en'  =>'required|max:190',           
                'category_id'  =>'required',            
                'status'  =>'required',   
            ];
            
        }     
    
        else{
            $rules =
            [
                'name_ar'  =>'required|max:190',           
                'name_en'  =>'required|max:190',              
                // 'image'  =>'required',           
                'category_id'  =>'required',     
                'status'  =>'required'      
            ];
        }
        
        
         $validator = \Validator::make($request->all(), $rules);
         if ($validator->fails()) {
             return \Response::json(array('errors' => $validator->getMessageBag()->toArray()));
         }
      
        // return $request ;
         if($request->id ){
            $subcategory = SubCategory::find( $request->id );
            
            if ($request->hasFile('image')) {

                $imageName =  $subcategory->image; 
                \File::delete(public_path(). '/img/' . $imageName);
            }
            
         }
         else{
            $subcategory = new SubCategory ;

         }

         $subcategory->name_ar          = $request->name_ar ;
         $subcategory->name_en         = $request->name_en ;
         $subcategory->category_id         = $request->category_id ;
         $subcategory->status        = $request->status ;
         $subcategory->save();
       if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = md5($image->getClientOriginalName() . time()) . "." . $image->getClientOriginalExtension();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $name);
            $subcategory->image   = $name;  
        }

        $subcategory->save();
        $subcategory = SubCategory::where('id',$subcategory->id)->with('category')->first();
        return response()->json($subcategory);

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {

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
        $imageName =  $id->image; 
        \File::delete(public_path(). '/img/' . $imageName);
        $id ->delete();

        session()->flash('alert-danger', trans('admin.record_deleted'));   
        return response()->json($id);
        // return view('admin.index',compact('admins','title'));
    }

    public function deleteall(Request $request)
    {
        
        
        if($request->ids){
            foreach($request->ids as $id){
                $id = SubCategory::find($id);
                $imageName =  $id->image; 
                \File::delete(public_path(). '/img/' . $imageName);
            }
            $ids = SubCategory::whereIn('id',$request->ids)->delete();
        }
        return response()->json($request->ids);
        session()->flash('alert-danger', trans('admin.record_selected_deleted'));
        return redirect()->route('subcategories');
      
    }
}
