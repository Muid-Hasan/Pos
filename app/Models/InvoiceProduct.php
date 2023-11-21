<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InvoiceProduct extends Model
{
    use HasFactory;
  //  protected $table = 'invoice_products';
    protected $fillable = ['qty','sale_price','invoice_id','user_id','product_id'];
    function product(): BelongsTo{
        return $this->belongsTo(product::class);
    }
}
