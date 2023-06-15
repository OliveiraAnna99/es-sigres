<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Estoque extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = ['item', 'quant', 'date'];

    public function getNameLinkAttribute()
    {
        $title = __('app.show_detail_title', [
            'name' => $this->name, 'type' => __('estoque.estoque'),
        ]);
        $link = '<a href="' . route('estoques.show', $this) . '"';
        $link .= ' title="' . $title . '">';
        $link .= $this->name;
        $link .= '</a>';

        return $link;
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }
}
