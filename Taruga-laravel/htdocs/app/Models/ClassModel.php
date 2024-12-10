<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;

    protected $table = 'class';

    protected $fillable = [
        'nome',
        'serie',
        'fk_professores_id'
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'fk_professores_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'fk_turmas_id');
    }
}
