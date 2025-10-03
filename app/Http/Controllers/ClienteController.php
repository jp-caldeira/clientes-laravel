<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\ClienteEndereco;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function createCliente(Request $request)
    {
        $cliente = new Cliente();
        $cliente->nome = "Empresa 1";
        $cliente->email = "comercial@empresa.com.br";
        $cliente->cnpj = "13891390000189";
        $cliente->observacao = null;
        $cliente->valor_contrato = "3540.45";

        $cliente->save();

        $endereco = new ClienteEndereco();
        $endereco->logradouro = "Rua dos Testes";
        $endereco->numero = "123";
        $endereco->cep = "02305010";
        $endereco->complemento = "Conjunto 11";
        $endereco->bairro = "Centro";
        $endereco->cidade = "São Paulo";
        $endereco->id_cliente = $cliente->id;

        $endereco->save();
    }

    public function getClientes()
    {
        return Cliente::with('endereco')->get();
    }
}
