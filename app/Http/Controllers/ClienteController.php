<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\ClienteEndereco;
use App\Http\Resources\ClienteResource;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function createCliente(Request $request)
    {
        $cliente = new Cliente();
        $cliente->nome = "Empresa 1";
        $cliente->email = "comercial@empresa.com.br";
        $cliente->cnpj = "138913900001977";
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

        $novo_cliente = Cliente::with('endereco')->findOrFail($cliente->id);
        return new ClienteResource($novo_cliente);
    }

    public function getClientes()
    {
        $allClientes = Cliente::with('endereco')->get();
        return ClienteResource::collection($allClientes);
    }
}
