<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $fillable = [
        'creator_id',
        'vendor_name',
        'pan_number',
        'gst_number',
        'description'
    ];

}
