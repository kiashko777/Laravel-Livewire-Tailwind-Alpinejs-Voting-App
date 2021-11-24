<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  use HasFactory;

  protected $guarded = [];


  //RELATIONSHIP BETWEEN IDEAS AND CATEGORY

  public function ideas()
  {
    return $this->hasMany(Idea::class);
  }
}
