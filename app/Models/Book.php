<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
   
    protected $fillable = ['id', 'name', 'isbn', 'value'];

    public function stores()
    {
        return $this->belongsToMany(StoreRegistry::class);
    }
}
