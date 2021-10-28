<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'empresa_cnpj',
        'identidade',
        'telefone',
        'email',
        'endereco',
        'numero',
        'cep',
        'rg',
        'nascimento',
        'created_at'
    ];

}
