<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class CountriesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
       
            // dd($request->id);
        $rules = [
            'title_ar' => 'required|min:2',
            'title_en' => 'required|min:2',
            'status' => 'required',
            'image' => 'nullable|image',
        ];

        if ($request->id) {
            // $rules['email'] = 'required|email|unique:users,email,'. $request->id .',id';
            $rules['image'] = 'nullable|image';
        }

        return $rules;
        
    }
}
