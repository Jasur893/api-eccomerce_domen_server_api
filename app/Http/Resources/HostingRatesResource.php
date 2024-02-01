<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HostingRatesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'server_id' => $this->server_id,
            'offering' => $this->offering,
            'active' => $this-> active,
            'free' => $this-> free,
            'about' => $this->about,
            'price' => json_decode($this->price),
            'parametrs' => json_decode($this->parametrs),
            'created_at' => $this->created_at,
        ];
    }
}
