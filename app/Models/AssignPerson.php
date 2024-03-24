<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignPerson extends Model
{
    use HasFactory;

    protected $table = "assign_people";

    protected $fillable = [
        'assign_person',
    ];
}
