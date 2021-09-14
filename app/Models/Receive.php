<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receive extends Model
{
    use HasFactory;
    protected $table= 'receive';
    public $timestamps = false;
    protected $fillable = [

        'id',
        'invoice_no',
        'vendor_id',
        'total_price',
        'date',




    ];
    public function vendor() {
        return $this->hasOne(Vendor::class, 'id', 'vendor_id');
    }
    public function revicedetails() {
        return $this->hasMany(Receive_detail::class, 'invoice_no','invoice_no');
    }
}
