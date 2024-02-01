<?php

namespace App\Http\Controllers;

use App\Http\Resources\HostingRatesResource;
use App\Models\HostingRates;
use App\Http\Requests\StoreHostingRatesRequest;
use App\Http\Requests\UpdateHostingRatesRequest;

class HostingRatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response(HostingRatesResource::collection(HostingRates::paginate(9)));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(StoreHostingRatesRequest $request)
    {
        $price = [];
        $parapetres = [];

        $requestArrayPrices = $request->only('p_86400', 'p_2592000', 'p_31536000');

        $requestArrayParapetrs = $request->only('backup', 'limit_quota', 'limit_db', 'limit_dbsize', 'limit_db_users', 'limit_ftp_users', 'limit_webdomains', 'limit_domains', 'limit_emaildomains', 'limit_emails', 'limit_cpu', 'limit_memory', 'limit_process', 'limit_email_quota', 'limit_mailrate', 'limit_scheduler', 'limit_nginxlimitconn', 'limit_mysql_maxuserconn', 'limit_ssl', 'limit_cl_cpu', 'limit_cl_nproc', 'limit_cl_pmem', 'limit_cl_io', 'limit_cl_maxentryprocs', 'limit_cl_cagefs', 'limit_cl_php', 'limit_php_mode_lsapi', 'limit_shell', 'limit_charset', 'limit_php_mode', 'limit_php_lsapi_version');

        foreach ($requestArrayPrices as $key => $value){
            $price[substr($key, 2)] = $value;
        }

        foreach ($requestArrayParapetrs as $key => $value){
            $parapetres[$key] = $value;
        }

        if ($price === [] && $parapetres === []){
            return response('some parametrs is empty');
        } else {
            HostingRates::create([
                'name' => $request->name,
                'server_id' => $request->server_id,
                'offering' => $request->offering,
                'active' => $request->active,
                'free' => $request->free,
                'about' => $request->about,
                'price' => json_encode($price),
                'parametrs' => json_encode($parapetres),
            ]);

            return response('created successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return response(new HostingRatesResource(HostingRates::find($id)));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHostingRatesRequest $request, $id)
    {
        $price = [];
        $parapetres = [];

        $requestArrayPrices = $request->only('p_86400', 'p_2592000', 'p_31536000');

        $requestArrayParapetrs = $request->only('backup', 'limit_quota', 'limit_db', 'limit_dbsize', 'limit_db_users', 'limit_ftp_users', 'limit_webdomains', 'limit_domains', 'limit_emaildomains', 'limit_emails', 'limit_cpu', 'limit_memory', 'limit_process', 'limit_email_quota', 'limit_mailrate', 'limit_scheduler', 'limit_nginxlimitconn', 'limit_mysql_maxuserconn', 'limit_ssl', 'limit_cl_cpu', 'limit_cl_nproc', 'limit_cl_pmem', 'limit_cl_io', 'limit_cl_maxentryprocs', 'limit_cl_cagefs', 'limit_cl_php', 'limit_php_mode_lsapi', 'limit_shell', 'limit_charset', 'limit_php_mode', 'limit_php_lsapi_version');


        foreach ($requestArrayPrices as $key => $value){
            $price[substr($key, 2)] = $value;
        }

        foreach ($requestArrayParapetrs as $key => $value){
            $parapetres[$key] = $value;
        }

        if ($price === [] && $parapetres === []){
            return response('some parametrs is empty');
        } else {
            HostingRates::find($id)->update([
                'name' => $request->name,
                'server_id' => $request->server_id,
                'offering' => $request->offering,
                'active' => $request->active,
                'free' => $request->free,
                'about' => $request->about,
                'price' => json_encode($price),
                'parametrs' => json_encode($parapetres),
            ]);

            return response('updated successfully');
        }



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        HostingRates::find($id)->delete();
        return response('deleted successfully');
    }
}
