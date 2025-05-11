<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Frete;


use Barryvdh\DomPDF\Facade\Pdf;

class FreteController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }


    public function create()
    {
        return view('frete.formulario');
    }

    public function store(Request $request)
    {
        $request->validate([
            'peso' => 'required|numeric|min:0',
            'distancia' => 'required|numeric|min:0',
            'tipo' => 'required|in:normal,expresso',
            'cliente' => 'required|string|max:255',
        ]);

        $peso = $request->peso;
        $distancia = $request->distancia;
        $tipo = $request->tipo;
        $cliente = $request->cliente; // Adicionando o cliente
    
        $valor = match($tipo) {
            'normal' => $peso * 0.50 + $distancia * 0.10,
            'expresso' => $peso * 1.00 + $distancia * 0.25,
        };

        
        $frete = Frete::create([
            'peso' => $peso,
            'distancia' => $distancia,
            'tipo' => $tipo,
            'valor' => $valor,
            'cliente' => $cliente, // Adicionando o cliente
        ]);

        return view('frete.resultado', compact('frete'));
    }



    


    public function index()
    {
        $fretes = Frete::all(); 
        return view('fretes.index', compact('fretes'));
    }


    public function edit(Frete $frete)
    {
        return view('fretes.edit', compact('frete'));
    }



    public function update(Request $request, Frete $frete)
{
    // Validação dos dados
    $request->validate([
        'peso' => 'required|numeric|min:0',
        'distancia' => 'required|numeric|min:0',
        'tipo' => 'required|in:normal,expresso',
        'cliente' => 'required|string|max:255',
    ]);

    // Atualiza os campos do frete
    $frete->peso = $request->peso;
    $frete->distancia = $request->distancia;
    $frete->tipo = $request->tipo;
    $frete->cliente = $request->cliente; 

    // Calcula o novo valor
    $frete->valor = match($frete->tipo) {
        'normal' => $frete->peso * 0.50 + $frete->distancia * 0.10,
        'expresso' => $frete->peso * 1.00 + $frete->distancia * 0.25,
    };

    // Salva as alterações no banco de dados
    $frete->save();

    
    return redirect()->route('fretes.index')->with('success', 'Frete atualizado com sucesso!');
}





public function relatorio(Request $request)
{
    $query = Frete::query();

    if ($request->filled('tipo')) {
        $query->where('tipo', $request->tipo);
    }

    if ($request->filled('cliente')) {
        $query->where('cliente', 'like', '%' . $request->cliente . '%');
    }

    if ($request->filled('valor_min')) {
        $query->where('valor', '>=', $request->valor_min);
    }

    if ($request->filled('valor_max')) {
        $query->where('valor', '<=', $request->valor_max);
    }

    $fretes = $query->get();

    return view('frete.relatorio', compact('fretes'));
}



public function exportarPdf(Request $request)
{
    $fretes = Frete::query();

    // Filtros semelhantes ao relatorio()

    $fretes = $fretes->get();

    $pdf = Pdf::loadView('frete.pdf', ['fretes' => $fretes]);
    return $pdf->download('relatorio_fretes.pdf');
}
   

}
