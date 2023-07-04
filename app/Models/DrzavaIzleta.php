<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrzavaIzleta extends Model
{
    const TABLE_NAME = 'drzaveIzleta';

    use HasFactory;

    protected $table = self::TABLE_NAME;

    protected $fillable = ['nazivDrzave'];
}
