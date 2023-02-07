<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;
    protected $guarded = [];
    public const FREE = 'free';
    public const PAID = 'paid';

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'start_date' => 'datetime',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class , 'taggable');    
    }

    public function advertiser(){
         return $this->belongsTo(User::class , 'advertiser_id' , 'id');
    }
    
}
