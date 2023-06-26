<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cart extends Model
{
    use HasFactory;

    public $fillable = ['user_id'];

    public function products(): belongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
}
