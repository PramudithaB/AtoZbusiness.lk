<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'student_name' => 'required|string|min:3|max:255',
            'class_name' => 'required|string|max:1000',
            'class_id' => 'required|string',
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'remark' => 'nullable|string|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'student_name.required' => 'Please enter your full name.',
            'student_name.min' => 'Name should be at least 3 characters long.',
            'class_name.required' => 'Please select class(es) to enroll in.',
            'class_id.required' => 'Class id is required.',
            'file.required' => 'Please upload your payment slip.',
            'file.mimes' => 'Payment slip must be JPEG, PNG, or PDF.',
            'file.max' => 'Payment slip must be less than 2MB in size.',
        ];
    }
}
