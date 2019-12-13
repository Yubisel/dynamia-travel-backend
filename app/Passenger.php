<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    protected $fillable = [
        'ci', 'name', 'email', 'phone', 'travel_id'
    ];
}
