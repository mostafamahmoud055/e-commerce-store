<?php

namespace App\Http\Requests;

use App\Rules\Filter;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $id = $this->route('category');
        return [
            'name' => [
                'required', 'string', 'min:3', 'max:255', "unique:categories,name,$id",new Filter //($id is exception every id excepts me)
            ],
            'parent_id' => [
                'nullable', 'int', 'exists:categories,id',
            ],
            'image' => [
                'image', 'max:5242880', 'dimensions:min_width:100,min_height:100',

            ],
            'status' => 'required|in:active,archived',

        ];
    }
}
