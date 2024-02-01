<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class HostingServerResource extends JsonResource
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
            'hidden' => $this->hidden,
            'active' => $this->active,
            'ip' => $this->ip,
            'login' => $this->login,
            'info' => json_decode($this->info),
            'picture' => Storage::disk('public')->url($this->picture) ,
            'created_at' => $request->url() . $this->created_at,
        ];
    }
}
