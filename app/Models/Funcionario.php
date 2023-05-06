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

    public function getNameLinkAttribute()
    {
        $title = __('app.show_detail_title', [
            'name' => $this->name, 'type' => __('funcionario.funcionario'),
        ]);
        $link = '<a href="'.route('funcionarios.show', $this).'"';
        $link .= ' title="'.$title.'">';
        $link .= $this->name;
        $link .= '</a>';

        return $link;
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }
}
