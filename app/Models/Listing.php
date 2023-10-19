<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $table = 'imported_users';

    protected $fillable = [
      'first_name',
      'last_name',
      'email',
      'age'
    ];
}
