<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'parent_id',
    ];

    public function parent_category(){
        return $this->belongsToOne(Category::class,'categories','id','parent_id');
    }
    public function children_categories(){
        return $this->hasMany(Category::class,'categories','parent_id','id');
    }
}
