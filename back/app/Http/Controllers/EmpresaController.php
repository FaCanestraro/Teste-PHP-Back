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
}
