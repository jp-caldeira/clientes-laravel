<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClienteRequest;
use App\Models\Cliente;
use App\Models\ClienteEndereco;
use App\Http\Resources\ClienteResource;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function createCliente(CreateClienteRequest $request)
    {
        $dados_novo_cliente = $request->except('endereco');
        $cliente = Cliente::create($dados_novo_cliente);

        $dados_endereco_cliente = $request->endereco;
        $dados_endereco_cliente['id_cliente'] = $cliente->id;
        ClienteEndereco::create($dados_endereco_cliente);

        $novo_cliente = Cliente::with('endereco')->findOrFail($cliente->id);
        return new ClienteResource($novo_cliente);
    }

    public function getClientes()
    {
        $allClientes = Cliente::with('endereco')->get();
        return ClienteResource::collection($allClientes);
    }
}
