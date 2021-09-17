<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agentcategories extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'added_by',
        'updated_at',
        'created_at'
    ];
}
