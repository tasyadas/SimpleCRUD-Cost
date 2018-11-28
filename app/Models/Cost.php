<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    protected $table = 'costs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'qty',
        'value',
        'total',
        'image',
        'created_at',
        'updated_at'
    ];
}
