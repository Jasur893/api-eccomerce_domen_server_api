<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;


class UpdateHostingRatesRequest extends FormRequest
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
            'server_id' => 'required|integer',
            'offering' => 'required|in:on,off',
            'active' => 'required|in:on,off',
            'free' => 'required|in:on,off',
            'about' => 'nullable|string|max:255',

            'p_86400' => 'required|numeric',
            'p_2592000' => 'required|numeric',
            'p_31536000' => 'required|numeric',

            'backup' => 'required|in:on,off',
            'limit_quota' => 'required|integer',
            'limit_db' => 'required|integer',
            'limit_dbsize' => 'required|integer',
            'limit_db_users' => 'required|integer',
            'limit_ftp_users' => 'required|integer',
            'limit_webdomains' => 'required|integer',
            'limit_domains' => 'required|integer',
            'limit_emaildomains' => 'required|integer',
            'limit_emails' => 'required|integer',
            'limit_cpu' => 'required|integer',
            'limit_memory' => 'required|integer',
            'limit_process' => 'required|integer',
            'limit_email_quota' => 'required|integer',
            'limit_mailrate' => 'required|integer',
            'limit_scheduler' => 'required|integer',
            'limit_nginxlimitconn' => 'required|integer',
            'limit_mysql_maxuserconn' => 'required|integer',
            'limit_ssl' => 'required|in:on,off',
            'limit_cl_cpu' => 'required|integer',
            'limit_cl_nproc' => 'required|integer',
            'limit_cl_pmem' => 'required|integer',
            'limit_cl_io' => 'required|integer',
            'limit_cl_maxentryprocs' => 'required|integer',
            'limit_cl_cagefs' => 'required|in:on,off',
            'limit_cl_php' => 'required|in:5.2,5.3,5.4,5.5,5.6,7.0,7.1,7.2,7.3,7.4,8.0,8.1,8.2',
            'limit_php_mode_lsapi' => 'required|in:on,off',
            'limit_shell' => 'required|in:on,off',
            'limit_charset' => 'required|string|max:50',
            'limit_php_mode' => 'required|in:php_mode_cgi,php_mode_lsapi,php_mode_fcgi_nginxfpm,php_mode_fcgi_apache,php_mode_mod',
            'limit_php_lsapi_version' => 'required|in:5.2,5.3,5.4,5.5,5.6,7.0,7.1,7.2,7.3,7.4,8.0,8.1,8.2',
        ];
    }
}
