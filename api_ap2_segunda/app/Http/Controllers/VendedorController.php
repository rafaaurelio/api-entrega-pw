<?php

namespace App\Http\Controllers;

use App\Models\Vendedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VendedorController extends Controller
{
    public function listar()
    {
        $vendedores = Vendedor::all();
        return response()->json([
            'status' => true,
            'message' => 'Vendedores listado com sucesso',
            'data' => $vendedores
        ], 200);
    }
 
    public function listarPorId($id)
    {
        $vendedor = Vendedor::findOrFail($id);
        return response()->json([
            'status' => true,
            'message' => 'Vendedor encontrado com sucesso',
            'data' => $vendedor
        ], 200);
    }
 
    public function criar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:200',
            'cpf' => 'required|string|max:15',
            'ano_de_nascimento' => 'required|numeric',
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }
 
        $vendedor = Vendedor::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Vendedor criado com sucesso',
            'data' => $vendedor
        ], 201);
    }
 
    public function editar(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:200',
            'cpf' => 'required|string|max:15',
            'ano_de_nascimento' => 'required|numeric'
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }
 
        $vendedor = Vendedor::findOrFail($id);
        $vendedor->update($request->all());
 
        return response()->json([
            'status' => true,
            'message' => 'Vendedor editado com sucesso',
            'data' => $vendedor
        ], 200);
    }
 
    public function excluir($id)
    {
        $vendedor = Vendedor::findOrFail($id);
        $vendedor->delete();
       
        return response()->json([
            'status' => true,
            'message' => 'Vendedor deletado com sucesso'
        ], 204);
    }
 
}
