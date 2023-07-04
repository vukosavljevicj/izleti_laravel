<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Izlet extends Model
{
    const TABLE_NAME = 'izleti';

    use HasFactory;

    protected $table = self::TABLE_NAME;

    protected $fillable = ['nazivIzleta', 'cena', 'opis', 'drzavaId', 'tipId'];
}
