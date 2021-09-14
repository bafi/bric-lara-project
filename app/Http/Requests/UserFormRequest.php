<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserFormRequest extends FormRequest {
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        $method = strtolower($this->method()) . 'Rules';
        if (method_exists($this, $method)) {
            return $this->{$method}();
        }

        return [
            'email' => 'required|email|max:255|min:2|unique:users',
            'name' => 'required|max:255|min:2',
        ];
    }

    protected function postRules() {
        return [
            'email' => 'required|email|max:255|min:2|unique:users',
            'name' => 'required|max:255|min:2',
        ];
    }

    protected function putRules() {
        return [
            'email' => [
                'required',
                'email',
                'max:255',
                'min:2',
                Rule::unique('users', 'email')->ignore($this->user->id),
            ],
            'name' => 'required|max:255|min:2',
        ];
    }
}
