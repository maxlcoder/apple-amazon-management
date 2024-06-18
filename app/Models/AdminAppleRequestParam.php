<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class AdminAppleRequestParam extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'admin_apple_request_param';

    protected $guarded = [];

    protected $casts = [
        'headers' => 'array',
        'cookies' => 'array',
    ];
    
}
