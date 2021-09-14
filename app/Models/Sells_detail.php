<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sells_detail extends Model
{
    use HasFactory;
    protected $table= 'sells_details';
    public $timestamps = false;
    protected $fillable = [

        'invoice_no',
        'product_id',
        'qty',
        'date',
        'price',
        'total_price',
        'discount',




    ];
    public function product() {
        return $this->belongsTo(Product::class, 'product_id','id');
    }
}
