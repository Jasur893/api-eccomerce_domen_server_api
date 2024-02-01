<?php

namespace App\Http\Controllers;

use App\Http\Resources\HostingServerResource;
use App\Models\HostingServer;
use App\Http\Requests\StoreHostingServerRequest;
use App\Http\Requests\UpdateHostingServerRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class HostingServerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return  HostingServerResource::collection(HostingServer::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(StoreHostingServerRequest $request)
    {
        $info = [];

        $requestPrices = $request->only('panelUrl', 'port', 'location', 'panel', 'speed', 'ns1', 'ns2', 'ns3', 'ns4', 'ip1', 'ip2', 'ip3', 'ip4', 'about');

        foreach ($requestPrices as $key => $value) {
            $info[$key] = $value;
        }

        if($request->hasFile('picture')){
            $path = $request->file('picture')->store('server-picture', 'public');
        }

        if ($info === []){
            return response('some info is empty');
        } else {
            HostingServer::create([
                'name' => $request->name,
                'hidden' => $request->hidden,
                'active' => $request->active,
                'ip' => $request->ip,
                'login' => $request->login,
                'password' => Hash::make($request->password),
                'info' => json_encode($info),
                'picture' => $path,
            ]);
            return response('created successfully ');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return response( new HostingServerResource(HostingServer::find($id)));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHostingServerRequest $request, $id)
    {
        $hostingServer = HostingServer::find($id);

        $info = [];

        $requestPrices = $request->only('panelUrl', 'port', 'location', 'panel', 'speed', 'ns1', 'ns2', 'ns3', 'ns4', 'ip1', 'ip2', 'ip3', 'ip4', 'about');

        foreach ($requestPrices as $key => $value) {
            $info[$key] = $value;
        }

        if ($request->hasFile('picture')){
            if(Storage::disk('public')->exists($hostingServer->picture)){
                Storage::disk('public')->delete($hostingServer->picture);
            }
            $path = $request->file('picture')->store('server-picture', 'public');
        }

        $hostingServer->update([
            'name' => $request->name,
            'hidden' => $request->hidden,
            'active' => $request->active,
            'ip' => $request->ip,
            'login' => $request->login,
            'password' => Hash::make($request->password),
            'info' => json_encode($info),
            'picture' => $path ?? $hostingServer->picture,
        ]);

        return response('update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $hostingServer = HostingServer::find($id);

        $hostingServer->delete();

        return response('deleted successfully');
    }
}
