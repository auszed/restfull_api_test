<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        // rellenar los datos or fillable model
    ];

    // relaciones
    public function invoices() {
        // one-to-many  relationship databse unique value
        return $this->hasMany(Invoice::class);
    }
}
