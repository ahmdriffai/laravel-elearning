<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TugasAddRequest extends FormRequest
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
            'judul' => ['required'],
            'ringkasan' => ['required'],
            'pembelajaran_id' => ['required'],
            'file' => ['required', 'mimes:pdf', 'max:1000'],
            'deadline' => ['required'],
        ];
    }
}
