<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipIzleta extends Model
{
    const TABLE_NAME = 'tipoviIzleta';

    use HasFactory;

    protected $table = self::TABLE_NAME;

    protected $fillable = ['tip'];
}
