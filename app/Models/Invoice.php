<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model {
    /** @use HasFactory<\Database\Factories\InvoiceFactory> */
    use HasFactory;

    protected $fillable = [
        'number',
        'customer_id',
        'date',
        'due_date',
        'sub_total',
        'discount',
        'total',
        'reference',
        'terms_and_conditions'
    ];

    protected $guarded = [];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }
}
