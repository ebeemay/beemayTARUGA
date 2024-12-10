<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class Teacher extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    protected $table = 'teacher';

    protected $fillable = [
        'nome',
        'rp',
        'senha',
        'email',
        'fk_instituicao_id'
    ];

    public function institutions()
    {
        return $this->belongsTo(Institution::class, 'fk_instituicao_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'fk_professores_id');
    }

    public function classes()
    {
        return $this->hasMany(ClassModel::class, 'fk_professores_id');
    }

    public $timestamps = false;
}
