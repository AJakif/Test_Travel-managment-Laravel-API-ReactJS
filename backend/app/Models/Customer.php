<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Customer extends Model
{
    
    protected $table="customers";
    protected $primaryKey = "id";

    const UPDATED_AT =null;
    protected $fillable = [
        'username', 'fullname', 'email','address','phone','password','gender',
    ]; 
}