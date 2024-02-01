<?php

namespace App\Models;

use App\Enums\GeneralSwitch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HostingRates extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'hosting_rates';

    protected $casts = [
        'offering' => GeneralSwitch::class,
        'active' => GeneralSwitch::class,
        'free' => GeneralSwitch::class,
        'price' => 'array',
        'parametrs' => 'array',
    ];

    protected $fillable = [
        'name',
        'server_id',
        'offering',
        'active',
        'free',
        'about',
        'price',
        'parametrs',
    ];
}
