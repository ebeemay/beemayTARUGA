<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class Institution extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    protected $table = 'institution';

    protected $fillable = [
        'nome',
        'email',
        'cnpj',
        'endereco',
        'telefone',
        'senha'
    ];

    public function teachers()
    {
        return $this->hasMany(Teacher::class, 'fk_instituicao_id');
    }

    public $timestamps = false;
}
