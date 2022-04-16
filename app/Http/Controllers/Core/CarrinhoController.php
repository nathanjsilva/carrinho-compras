<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Models\Core\Carrinho;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Carrinho::all();
        return response()->json(['data'=> $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();//pega todos
        $data1 = $request->input('nome_produto');//pega o input

        Carrinho::create($data);

        return response()->json(['data'=> $data1]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataRequest = $request->all();
        $data = Carrinho::findOrFail($id);
        $data -> update($dataRequest);

        return response()->json(["msg"=> "dados atualziados com sucesso","data" => $data]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Carrinho::find($id);
        $data -> delete($data);

        return response()->json(["msg"=> "dados excluído com sucesso","data" => $data]);
    }
}
