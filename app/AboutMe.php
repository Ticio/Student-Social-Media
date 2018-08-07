<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutMe extends Model
{
    protected $table = 'about_me';

    protected $primaryKey = 'user_id';

    public $incrementing = false;

    public $timestamps = false;

    public function user(){
      return $this->belongsTo('App\Models\User', 'user_id');
    }
//     protected $fillable = [
//       'aboutme',
//       'user_id'
//     ];

//     // Table Name
//     protected $table = 'about_me';
//     // Primary Key
//     public $primaryKey = 'id';
//     // Timestamps
//      public $timestamps = true;
}
