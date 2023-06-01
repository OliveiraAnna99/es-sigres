<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cpf',
        'endereco',
        'contato',
        'dataNascimento',
        'rg',
        'funcao',
        'login'
    ];
}