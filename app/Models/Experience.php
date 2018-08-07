<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
  /*protected $fillable = [
  'experience',
  'user_id'
  ];
  // Table Name
  protected $table = 'experiences';
  // Primary Key
  public $primaryKey = 'id';
  // Timestamps
  public $timestamps = true;*/
      protected $table = 'experiences';

    protected $primaryKey = 'user_id';

    public $incrementing = false;

    public $timestamps = false;

    public function user(){
      return $this->belongsTo('App\Models\User', 'user_id');
    }
}
