<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Good extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'description', 'price', 'is_sold', 'bought_by'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

     public function buyer()
    {
        return $this->belongsTo(User::class, 'bought_by');
    }
}
