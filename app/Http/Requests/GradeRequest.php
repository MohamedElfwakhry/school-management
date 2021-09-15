<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GradeRequest extends FormRequest
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
    public function rules()
    {
        return [
            //
            'name_en' => 'required',
            'name_ar' => 'required',
            'notes' => 'required',
        ];
    }

    public function messages(){
        return [
            'name_ar.required' => 'الاسم بالعربى مطلوب',
            'name_en.email' => 'الاسم بالانجليزى مطلوب',
            'notes.required' => 'الملاحظات مطلوبه'
        ];
    }
}
