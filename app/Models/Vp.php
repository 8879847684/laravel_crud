<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vp extends Model
{
    use HasFactory;
    protected $fillable = [
        'creator_id',
        'vendor_id',
        'pan_number',
        'gst_number',
        'bill_number',
        'bill_date',
        'bill_amount',
        'bill_name'
    ];

    public function vendor() {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }
}
