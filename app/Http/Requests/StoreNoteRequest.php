<?php

namespace App\Http\Requests;

use App\Enums\ResourceType;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Foundation\Http\FormRequest;

class StoreNoteRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:2|max:1000',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:5120',
            'link_to_tutorial' => 'required|string|max:255',
            'link_to_resource' => 'nullable|string|max:255',
            'resource_name' => 'nullable|string|max:255',
            'resource_type_id' => 'nullable|exists:resource_types,id',
            'description' => 'nullable|string|max:5000',
            'project_folder' => 'nullable|string|max:500',
            'database_name' =>'nullable|string|max:255',
            'link_to_github_repo' => 'nullable|string|max:255',
            'link_to_source_code' => 'nullable|string|max:255',
            'link_to_source_materials' => 'nullable|string|max:255',
            'completed' => 'boolean:0,1,false,true',
        ];
    }
}
