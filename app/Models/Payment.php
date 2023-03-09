<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'creator_id',
        'vendor_id',
        'bank_name',
        'payment_date',
        'amount'
    ];
    
    public function vendor() {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }
}
