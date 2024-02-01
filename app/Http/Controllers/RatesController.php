<?php

namespace App\Http\Controllers;

use App\Http\Resources\HostingRatesResource;
use App\Models\HostingRates;
use Illuminate\Http\Request;

class RatesController extends Controller
{
    public function hostingRatesAll()
    {
        return response(HostingRatesResource::collection(HostingRates::paginate(5)));
    }

    public function hostingRatesOffers()
    {
        return response(
            HostingRatesResource::collection(
                HostingRates::query()
                    ->where('offering', '=', 'on')
                    ->get()
            )
        );
    }

    public function ratesChangeActive(Request $request, $id)
    {
        $hostingRate = HostingRates::find($id);
        $validated = $request->validate([
            'active' => "required|in:on",
        ]);

        $hostingRate->update($validated);

        return response('actived successfuly');
    }

    public function ratesChangeDeactive(Request $request, $id)
    {
        $hostingRate = HostingRates::find($id);
        $validated = $request->validate([
            'active' => "required|in:off",
        ]);

        $hostingRate->update($validated);

        return response('deactived successfuly');
    }
}
