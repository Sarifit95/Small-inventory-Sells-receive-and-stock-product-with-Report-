<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Sell extends Model
{
    use HasFactory;
    protected $table= 'sells';
    public $timestamps = false;
    protected $fillable = [

        'invoice_no',
        'customer_id',
        'total_price',
        'date',




    ];
    public function customers() {
        return $this->belongsTo(Customer::class, 'customer_id','id');
    }
    public function sellsdetails() {
        return $this->hasMany(Sells_detail::class, 'invoice_no','invoice_no');
    }

}
