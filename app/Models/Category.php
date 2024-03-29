<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'user_id'];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function boards()
    {
      return $this->hasMany(Board::class);
    }
}
