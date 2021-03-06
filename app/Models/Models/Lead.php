<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $guarded = [];

    //For relationship tables
    public function reminders()
    {
        return $this->hasMany(Reminder::class)
            ->orderByDesc('id');
    }
}
