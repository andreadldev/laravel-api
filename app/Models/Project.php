<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Project extends Model
{
    use HasFactory;
    protected $guarded = ['slug', 'technologies'];  
    protected $appends = ['image_url'];

    protected function getImageUrlAttribute() {
        return $this->image ? asset("storage/$this->image") : "https://via.placeholder.com/150";
    }

    public function type() {
        return $this->belongsTo(Type::class);
    }

    public function technologies() {
        return $this->belongsToMany(Technology::class);
    }
}
