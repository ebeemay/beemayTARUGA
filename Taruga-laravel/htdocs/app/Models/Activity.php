<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $table = 'activity';

    protected $fillable = [
        'nome',
        'numeroAtividade',
        'nomeMateria',
        'fk_modulos_id'
    ];

    public function module()
    {
        return $this->belongsTo(Module::class, 'fk_modulos_id');
    }

    public function progresses()
    {
        return $this->hasMany(Progress::class, 'fk_atividades_id');
    }
}
