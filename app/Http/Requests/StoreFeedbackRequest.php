<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFeedbackRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:2|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => ['required','string','min:8','max:50','regex:/^[0-9+\-()\s]{8,50}$/'],
            'message' => 'required|string|min:10|max:2000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter your name.',
            'name.min' => 'Name should be at least 2 characters.',
            'email.required' => 'Please provide your email address.',
            'email.email' => 'Please enter a valid email address.',
            'phone_number.required' => 'Please provide a contact phone number.',
            'phone_number.regex' => 'Phone number can contain only digits, spaces, +, -, and parentheses.',
            'message.required' => 'Message cannot be empty.',
            'message.min' => 'Please provide a little more detail in your feedback.',
        ];
    }
}
