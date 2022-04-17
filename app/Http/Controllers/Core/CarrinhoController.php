<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Models\Core\Carrinho;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $produto = $this->getProduto($request->input('id_produto'));

        if(!empty($produto->id_produto)) {
            $qtd_produto  = intval($produto->qtd_produto);
            $qtd_produto  = $qtd_produto + 1;
            $valor_total  = $produto->valor_produto * $qtd_produto;
            $arrayProduto = ["qtd_produto" => $qtd_produto, "valor_total_compra" => $valor_total];
            $this->atualizar($arrayProduto,$produto->id_produto);
            return response()->json(["msg"=> "Quantidade do produto atualizado com sucesso"]);
        }
        
        $data  = [
            "nome_produto"       => $request->input('nome_produto'),
            "id_produto"         => $request->input('id_produto'),
            "valor_produto"      => $request->input('valor_produto'),
            "qtd_produto"        => intval($request->input('qtd_produto')),
            "valor_total_compra" => $request->input('valor_produto') * intval($request->input('qtd_produto')),
            "ip_usuario"         => $_SERVER["REMOTE_ADDR"],
        ];

        Carrinho::create($data);

        return response()->json(['data'=> $data]);
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
        $data = Carrinho::findOrFail($id);
        $produto = $this->getProduto($id);

        $qtd_produto  = intval($produto->qtd_produto) + 1;
        $valor_total  = $produto->valor_produto * $qtd_produto;
        $arrayProduto = ["qtd_produto" => $qtd_produto, "valor_total_compra" => $valor_total];

        $data->update($arrayProduto);

        return response()->json(["msg"=> "Quantidade do produto atualizada com sucesso", $data]);
    }

    /**
     * função para atualizar carrinho.
     *
     * @param  array $array
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function atualizar(array $array, $id)
    {
        $data = Carrinho::findOrFail($id);
        $data -> update($array);

        return response()->json(["msg"=> "dados atualizados com sucesso","data" => $data]);
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
        $produto = $this->getProduto($id);
        $qtd_produto = $produto->qtd_produto;

        if($qtd_produto > 1) {

            $qtd_produto  = intval($produto->qtd_produto) - 1;
            $valor_total  = $produto->valor_produto * $qtd_produto;
            $arrayProduto = ["qtd_produto" => $qtd_produto, "valor_total_compra" => $valor_total];
    
            $data->update($arrayProduto);

            return response()->json(["msg"=> "Quantidade do produto atualizada com sucesso", $data]);
        }

        $data -> delete($data);

        return response()->json(["msg"=> "Produto excluído com sucesso","data" => $data]);
    }

    public function getProduto($idProduto){
        $produto = DB::table('carrinho')->where('id_produto', $idProduto)->first();
        return $produto;
    }
}
