<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    public $timestamps = false;

    // Tambahkan baris ini agar data bisa disimpan
    protected $fillable = [
        'name', 
        'description', 
        'processor', 
        'memory', 
        'storage', 
        'product_id'
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }
}