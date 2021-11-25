<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
  use HasFactory;
  use Sluggable;

  const PAGINATION_COUNT = 10;

  protected $guarded = [];

  /**
   * Return the sluggable configuration array for this model.
   *
   * @return array
   */
  public function sluggable(): array
  {
    return [
      'slug' => [
        'source' => 'title'
      ]
    ];
  }

  //RELATIONSHIP BETWEEN IDEA AND USER

  public function user()
  {
    return $this->belongsTo(User::class);
  }


  //RELATIONSHIP BETWEEN IDEA AND CATEGORY

  public function category()
  {
    return $this->belongsTo(Category::class);
  }


  //RELATIONSHIP BETWEEN IDEA AND STATUS

  public function status()
  {
    return $this->belongsTo(Status::class);
  }


  //RELATIONSHIP BETWEEN IDEA AND STATUS

  public function votes()
  {
    return $this->belongsToMany(User::class, 'votes');
  }
}
