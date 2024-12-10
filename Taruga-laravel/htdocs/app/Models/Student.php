<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;


class Student extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    protected $table = 'student';

    protected $fillable = [
        'nome',
        'ra',
        'senha',
        'email',
        'situacao',
        'foto',
        'fk_professores_id',
        'fk_turmas_id'
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'fk_professores_id');
    }

    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'fk_turmas_id');
    }

    public function progresses()
    {
        return $this->hasMany(Progress::class, 'fk_estudantes_id');
    }

    public $timestamps = false;
}
