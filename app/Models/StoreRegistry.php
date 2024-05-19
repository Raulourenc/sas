<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreRegistry extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'address', 'active'];

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
