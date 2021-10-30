<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Empresa;


class ClienteController extends Controller
{

    public function getClientes() {
        $array = ['error' => ''];

        $clientes = Cliente::all();

        $array['clientes'] = $clientes;

    return $array;
    }


    public function addClienteFisico(Request $request) {
        $array = ['error' => ''];

        $currentDate = Carbon::now();

        $nome = $request->input('nome');
        $empresa = $request->input('empresa');
        $identidade = $request->input('identidade');
        $rg = $request->input('rg');
        $nascimento = $request->input('nascimento');
        $telefone = $request->input('telefone');
        $email = $request->input('email');
        $endereco = $request->input('endereco');
        $numero = $request->input('numero');
        $cep = $request->input('cep');

         $ufEmpresa = Empresa::where('id', $empresa)->first();

        $newClienteFisico = new Cliente;
        $newClienteFisico->empresa_cnpj = $ufEmpresa->cnpj;
        $newClienteFisico->nome = $nome;
        $newClienteFisico->identidade = $identidade;
        $newClienteFisico->rg = $rg;
        $newClienteFisico->nascimento = $nascimento;
        $newClienteFisico->telefone = $telefone;
        $newClienteFisico->email = $email;
        $newClienteFisico->endereco = $endereco;
        $newClienteFisico->numero = $numero;
        $newClienteFisico->cep = $cep;
        $newClienteFisico->created_at = $currentDate;
        $newClienteFisico->save();

        return response()->json(['success' => 'Salvo com sucesso'], 200);
    }

    public function addClienteJuridico(Request $request) {
        $array = ['error' => ''];

        $currentDate = Carbon::now();

        $nome = $request->input('nome');
        $empresa = $request->input('empresa');
        $identidade = $request->input('identidade');
        $telefone = $request->input('telefone');
        $email = $request->input('email');
        $endereco = $request->input('endereco');
        $numero = $request->input('numero');
        $cep = $request->input('cep');


        $ufEmpresa = Empresa::where('id', $empresa);

        $newClienteJuridico = new Cliente;
        $newClienteJuridico->nome = $nome;
        $newClienteJuridico->empresa_cnpj = $ufEmpresa->cnpj;
        $newClienteJuridico->identidade = $identidade;
        $newClienteJuridico->telefone = $telefone;
        $newClienteJuridico->email = $email;
        $newClienteJuridico->endereco = $endereco;
        $newClienteJuridico->numero = $numero;
        $newClienteJuridico->cep = $cep;
        $newClienteJuridico->created_at = $currentDate;
        $newClienteJuridico->save();

        return response()->json(['success' => 'Salvo com sucesso'], 200);
    }


    public function getFiltroClientes(Request $request) {
        $array = ['error' => ''];

        $nome = $request->input('dropCliente');
        $created_at = $request->input('created_at');
        $identidade = $request->input('identidade');


        //Filtro completo
        if($nome != null && $created_at != null && $identidade != null) {
        $clientes = Cliente::where('nome', $nome)->where('created_at', $created_at)->where('identidade', $identidade)->get();
        }

        //Filtro vazio
        else if($nome == null && $created_at == null && $identidade == null) {
           $clientes = Cliente::all();
        }

        //Pesquisa só pelo nome
        else if($nome != null && $created_at == null && $identidade == null) {
        $clientes = Cliente::where('nome', $nome)->get();
        }

        //Pesquisa pela identidade e id
        else if($nome != null && $created_at == null && $identidade != null) {
        $clientes = Cliente::where('nome', $nome)->where('identidade', $identidade)->get();
        }

        //Pesquisa pelo created_at e id
        else if($nome != null && $created_at != null && $identidade == null) {
        $clientes = Cliente::where('nome', $nome)->where('created_at', $created_at)->get();
        }

        //Pesquisa só pelo created_at
        else if($nome == null && $created_at != null && $identidade == null) {
        $clientes = Cliente::where('created_at', $created_at)->get();
        }

        //Pesquisa pelo identidade e created_at
        else if($nome == null && $created_at != null && $identidade != null){
        $clientes = Cliente::where('created_at', $created_at)->where('identidade', $identidade)->get();
        }

        //Pesquisa só pela Identidade
        else if($nome == null && $created_at == null && $identidade != null){
        $clientes = Cliente::where('identidade', $identidade)->get();
        }

        $array['clientes'] = $clientes;
        //$clientes = Cliente::where('nome', $nome)->where('created_at', $created_at)->where('identidade', $identidade)->first();

    return $array;
    }
}
