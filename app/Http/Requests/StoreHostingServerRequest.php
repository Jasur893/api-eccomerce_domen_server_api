<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHostingServerRequest extends FormRequest
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
            'name' => 'required|string|min:6|max:255',
            'hidden' => 'required|in:on,off',
            'active' => 'required|in:on,off',
            'ip' => 'required|ip',
            'login' => ['required','string','min:6','max:255','regex:/(?i)^(?=.*[a-z])(?!.*(_|\s|\W))(?=.*\d).{6,}$/'],
            'password' => ['required','string','min:8','max:255',"regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[\@\$\%\&])(?!.*[_\s])(?!.*[!\#\^\*\(\)\+\-\=\\\[\]\{\}\;\'\:\"\|\,\.\<\>\/\?])(?=.*\d).{8,}$/"],
            'picture' => 'required|image|mimes:jpeg,png,jpg|max:2048',

            'panelUrl' => 'required|url:http,https',
            'port' => 'required|integer|max:9999',
            'location' => 'required|string|min:3|max:50',
            'panel' => 'required|in:ispmanager,plesk,cpanel,vestacp,brainycp,fastpanel,ehcp',
            'speed' => 'required|numeric',
            'ns1' => 'nullable|string|max:50',
            'ns2' => 'nullable|string|max:50',
            'ns3' => 'nullable|string|max:50',
            'ns4' => 'nullable|string|max:50',
            'ip1' => 'nullable|string|max:50',
            'ip2' => 'nullable|string|max:50',
            'ip3' => 'nullable|string|max:50',
            'ip4' => 'nullable|string|max:50',
            'about' => 'required|string|max:1024',
        ];
    }
}
