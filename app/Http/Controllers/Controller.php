<?php

namespace App\Http\Controllers;

use App\Models\Profissao;
use Illuminate\Http\Request;

class ProfissaoController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'salario' => 'required|numeric',
            'empresa' => 'required|string|max:255',
        ]);

        if (!is_string($request->nome) && strlen($request->nome) > 255) {
            return response()->json(['error' => 'O campo nome deve ser uma string com no máximo 255 caracteres.'], 422);
        }

        if (!empty($request->descricao) && !is_string($request->descricao)) {
            return response()->json(['error' => 'O campo descricao deve ser uma string ou nulo.'], 422);
        }

        if (!is_numeric($request->salario) && $request->salario < 0) {
            return response()->json(['error' => 'O campo salario deve ser um número maior ou igual a zero.'], 422);
        }

        if (!is_string($request->empresa) || strlen($request->empresa) > 255) {
            return response()->json(['error' => 'O campo empresa deve ser uma string com no máximo 255 caracteres.'], 422);
        }


        $profissao = Profissao::create($validated);

        return response()->json(['message' => 'Profissão cadastrada com sucesso!', 'data' => $profissao], 201);
    }
}
