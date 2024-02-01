<?php

namespace App\Models;

use App\Enums\GeneralSwitch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HostingServer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'hosting_servers';

    protected $casts = [
        'hidden' => GeneralSwitch::class,
        'active' => GeneralSwitch::class,
        'info' => 'array',
    ];

    protected $fillable = [
        'name',
        'hidden',
        'active',
        'ip',
        'login',
        'password',
        'info',
        'picture',
    ];


}
