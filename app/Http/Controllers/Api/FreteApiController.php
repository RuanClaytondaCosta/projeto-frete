<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Frete;
use App\Http\Resources\FreteResource;
use Illuminate\Http\Request;

class FreteApiController extends Controller
{
    // Retorna todos os fretes
    public function index()
    {
        return FreteResource::collection(Frete::all());
    }

    // Filtra os fretes por tipo e/ou cliente
    public function filtrar(Request $request)
    {
        $query = Frete::query();

        if ($request->filled('tipo')) {
            $query->where('tipo', $request->tipo);
        }

        if ($request->filled('cliente')) {
            $query->where('cliente', 'like', '%' . $request->cliente . '%');
        }

        return FreteResource::collection($query->get());
    }
}
