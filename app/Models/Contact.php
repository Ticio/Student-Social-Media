<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
  /*protected $fillable = [
  'contact',
  'user_id'
  ];
  // Table Name
  protected $table = 'contacts';
  // Primary Key
  public $primaryKey = 'id';
  // Timestamps
  public $timestamps = true;*/
      protected $table = 'contacts';

    protected $primaryKey = 'user_id';

    public $incrementing = false;

    public $timestamps = false;

    public function user(){
      return $this->belongsTo('App\Models\User', 'user_id');
    }
}
