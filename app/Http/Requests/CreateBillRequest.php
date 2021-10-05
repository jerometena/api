<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBillRequest extends FormRequest
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
            'amount' => 'required|numeric',
            'paid' => 'required|numeric',
            'rate' => 'required|numeric',
            'reading_date' => 'required|date',
            'disconnection_date' => 'required|date',
            'due_date' => 'required|date',
            'image' => 'required|nullable|mimes:png,jpg',
            'status' => 'required',

        ];
    }
}
