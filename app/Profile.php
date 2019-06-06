<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
  protected $guarded = array('id');
  public function user()
  {
      return $this->belongsTo('App\User');
  }
  public static $rules = [
      'name' => 'required',
      'gender' => 'required',
      'hobby' => 'required',
      'introduction' => 'required',
  ];
}
