<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\emailnotify;
use App\Payment;

use Auth;
use App;
class PaymentsController extends Controller
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
        $title = 'payments';
        $payments = Payment::orderBy('id', 'DESC')->get();
        // return $admins ; 
        return view('payments.index',compact('payments','title','lang'));

    }

    public function add()
    {
        $lang = App::getlocale();
        if(Auth::user()->role != 'admin' ){
            $role = 'admin';
            return view('unauthorized',compact('role','admin'));
        }
        $title = 'payments';
        return view('payments.add',compact('title','lang'));
    }
    public function store(Request $request)
    {
        
        if($request->id ){
            $rules =
            [
                // 'title'  =>'required|max:190',           
                'method'  =>'required|max:190',           
                'amount'  =>'required',   
                'user_id'  =>'required',   
                'status'  =>'required',   
            ];
            
        }     
    
        else{
            $rules =
            [
                 // 'title'  =>'required|max:190',           
                 'method'  =>'required|max:190',           
                 'amount'  =>'required',   
                 'user_id'  =>'required',   
                 'status'  =>'required',        
            ];
        }
        
        
         $validator = \Validator::make($request->all(), $rules);
         if ($validator->fails()) {
             return \Response::json(array('errors' => $validator->getMessageBag()->toArray()));
         }
         
        // return $request ;
        if($request->id ){
            $payment = Payment::find( $request->id );
        }
        else{
            $payment = new Payment ;

        }

         $payment->title       = $request->title ;
        $payment->amount         = $request->amount ;
        $payment->method         = $request->method ;
        $payment->user_id         = $request->user_id ;
        $payment->status        = $request->status ;
        $payment->save();

        $payment->save();
        return response()->json($payment);

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
        $title = 'payments';
        $data = Payment::where('id',$id)->orderBy('id', 'DESC')->first();
        // return $admin ; 
        return view('payments.add',compact('data','title','lang'));
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
        $id = Payment::find( $id );
        $id ->delete();
        return response()->json($id);
    }

    public function deleteall(Request $request)
    {
        
        
        if($request->ids){
            foreach($request->ids as $id){
                $id = Payment::find($id);
            }
            $ids = Payment::whereIn('id',$request->ids)->delete();
        }
        return response()->json($request->ids);
    }
}
