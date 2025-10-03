<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClienteEndereco extends Model
{
    protected $connection = 'sqlite';

    protected $table = 'cliente_enderecos';

    protected $fillable = [
        'logradouro',
        'numero',
        'cep',
        'complemento',
        'bairro',
        'cidade',
        'id_cliente'
    ];

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
}
