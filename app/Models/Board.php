<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    protected $fillable =[
      'title',
      'rate',
      'delaytime',
      'range',
      'lfo',
      'pwm',
      'env',
      'subb',
      'sub',
      'noise',
      'freq',
      'vfreq',
      'res',
      'envb',
      'venv',
      'vlfo',
      'kybd',
      'levelb',
      'level',
      'a',
      'd',
      's',
      'r',
      'user_id',
      'category_id'
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function category()
    {
      return $this->belongsTo(Category::class);
    }
}
