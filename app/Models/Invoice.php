<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        // rellenar los datos or fillable model
    ];

    public function customer() {
        // one-to-many  relationship databse has multiple values for custumer
        return $this->belongsTo(Customer::class);
    }
}
