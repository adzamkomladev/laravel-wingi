<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name' => ['required', 'max:100'],
            'description' => ['nullable', 'string'],
            'image' => ['required', 'image'],
            'show' => ['required', 'boolean'],
            'available' => ['required', 'boolean']
        ];
    }

    public function validated()
    {
        $image = $this->file('image');

        return array_merge(parent::validated(), [
            'image' =>  $image->storePubliclyAs(
                'categories',
                Carbon::now()->timestamp . "category.{$image->extension()}",
                'public'
            )
        ]);
    }
}
