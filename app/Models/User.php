<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  protected $guarded = [];

  /**
   * The attributes that are mass assignable.
   *
   * @var string[]
   */
  protected $fillable = [
    'name',
    'email',
    'password',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  //RELATIONSHIP BETWEEN USER AND IDEAS

  public function ideas()
  {
    return $this->hasMany(Idea::class);
  }


  public function comments()
  {
    return $this->hasMany(Comment::class);
  }

  //RELATIONSHIP BETWEEN USER AND VOTES

  public function votes()
  {
    return $this->belongsToMany(Idea::class, 'votes');
  }

  //METHOD TO GET AVATAR

  public function getAvatar()
  {
    $firstCharacter = $this->email[0];

    if (is_numeric($firstCharacter)) {
      $integerToUse = ord(strtolower($firstCharacter)) - 21;
    } else {
      $integerToUse = ord(strtolower($firstCharacter)) - 96;
    }

    return 'https://www.gravatar.com/avatar/'
      . md5($this->email)
      . '?s=200'
      . '&d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-'
      . $integerToUse
      . '.png';
  }

  public function isAdmin()
  {
    return in_array($this->email, [
      'kiashko777@gmail.com',
      'roman.kiashko@mail.ru',
    ]);
  }
}
