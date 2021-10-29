<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public $timestamps = false;
    public $table = 'clientes';
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
