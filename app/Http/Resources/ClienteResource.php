<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class ClienteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                => $this->id,
            'nome'              => $this->nome,
            'email'             => $this->email,
            'cnpj'              => $this->cnpj,
            'observacao'        => $this->observacao,
            'valor_contrato'    => $this->valor_contrato,
            'endereco'          => $this->whenLoaded('endereco', function(){
                return new EnderecoResource($this->endereco);
            })
        ];
    }
}
