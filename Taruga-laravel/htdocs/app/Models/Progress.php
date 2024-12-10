<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;

    protected $table = 'progress';

    protected $fillable = [
        'status',
        'numeroAtividade',
        'materia',
        'fk_estudantes_id'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'fk_estudantes_id');
    }

    public $timestamps = false;
}
