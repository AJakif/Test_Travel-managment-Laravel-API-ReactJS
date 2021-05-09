<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = "employee";

    protected $fillable = [
      'name_lastname',
      'email',
      'city',
      'direction',
      'phone',
      'rol'
    ];

    public function role(){
      return $this->belongsTo("App\Models\Role","rol");
    }
}
