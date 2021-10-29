<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Empresa;


class ClienteController extends Controller
{
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
}
