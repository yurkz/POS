<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getStatusAttribute($value)
    {
        return ucfirst($value);
    }
}
