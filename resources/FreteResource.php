<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FreteResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'cliente' => $this->cliente,
            'peso' => $this->peso,
            'distancia' => $this->distancia,
            'tipo' => $this->tipo,
            'valor' => $this->valor,
            'created_at' => $this->created_at?->toDateTimeString(),
        ];
    }
}
