<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $table = 'module';

    protected $fillable = [
        'tema',
        'numeroModulo'
    ];

    public function activities()
    {
        return $this->hasMany(Activity::class, 'fk_modulos_id');
    }
}
