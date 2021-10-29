<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    public $timestamps = false;
    public $table = 'empresas';
    protected $fillable = [
        'uf',
        'razaoSocial',
        'cnpj',
        'created_at'
    ];
}
