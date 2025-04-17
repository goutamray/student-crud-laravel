<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "students";

    // protected $fillable = ["name", "email", "cell", "username", "edu", "age", "gender", "photo", "course"];

    // or eta use kora jbe 
   protected $guarded = [];    // kon kon column a data jbe na,,,,

  protected $hidden = ["email", "cell"];  // rest api a data gula bahire jbe na
    
}
