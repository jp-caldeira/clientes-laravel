<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $connection = 'sqlite';

    protected $table = 'clientes';

    protected $fillable = [
        'nome',
        'email',
        'cnpj',
        'observacao',
        'valor_contrato'
    ];

    public function endereco(){
        return $this->hasOne(ClienteEndereco::class, 'id_cliente');
    }
}
