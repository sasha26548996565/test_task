<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    public const ROLES = [
        'user',
        'admin'
    ];


    protected $fillable = [
        'name'
    ];
}
