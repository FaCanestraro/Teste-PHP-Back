<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Empresa;

class EmpresaController extends Controller
{
    public function addEmpresa(Request $request) {
        $array = ['error' => ''];

        $currentDate = Carbon::now();

        $uf = $request->input('uf');
        $razaoSocial = $request->input('razaoSocial');
        $cnpj = $request->input('cnpj');

        $newEmpresa = new Empresa;
        $newEmpresa->uf = $uf;
        $newEmpresa->razaoSocial = $razaoSocial;
        $newEmpresa->cnpj = $cnpj;
        $newEmpresa->created_at = $currentDate;
        $newEmpresa->save();

        return response()->json(['success' => 'Salvo com sucesso'], 200);
    }

    public function getEmpresa() {
        $array = ['error' => ''];

        $empresas = Empresa::all();

    $array['empresa'] = $empresas;

    return $array;
    }

    public function getUfEmpresa(Request $request) {

        $array = ['error' => ''];
        
        $empresa = $request->input('empresa');

        $Ufempresa = Empresa::where('id', $empresa)->first();

        $uf = $Ufempresa->uf;

        $array['Ufempresa'] = $uf;

    return $array;
    }
}
