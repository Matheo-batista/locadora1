<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SistemaController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function logar(Request $req)
    {
        $user = DB::table('usuarios')
            ->where('login', $req->login)
            ->where('senha', $req->senha)
            ->first();

        if ($user) {
            session(['logado' => true]);
            return redirect('/carros');
        }

        return back()->with('erro', 'Login inválido');
    }

    public function listar()
    {
        $carros = DB::table('carros')->get();
        return view('carros', compact('carros'));
    }

    public function novo()
    {
        return view('novo');
    }

    public function salvar(Request $req)
    {
        DB::table('carros')->insert([
            'modelo' => $req->modelo,
            'marca' => $req->marca,
            'placa' => $req->placa,
            'ano' => $req->ano,
            'status' => 'Disponível'
        ]);

        return redirect('/carros');
    }

    public function editar($id)
    {
        $carro = DB::table('carros')->where('id', $id)->first();
        return view('editar', compact('carro'));
    }

    public function update(Request $req, $id)
    {
        DB::table('carros')->where('id', $id)->update([
            'modelo' => $req->modelo,
            'marca' => $req->marca,
            'placa' => $req->placa,
            'ano' => $req->ano
        ]);

        return redirect('/carros');
    }

    public function excluir($id)
    {
        DB::table('carros')->where('id', $id)->delete();
        return redirect('/carros');
    }

    public function agendar($id)
    {
        $carro = DB::table('carros')->where('id', $id)->first();
        return view('agendar', compact('carro'));
    }

    public function salvarAgendamento(Request $req, $id)
    {
        DB::table('agendamentos')->insert([
            'carro_id' => $id,
            'nome_cliente' => $req->nome_cliente,
            'data_retirada' => $req->data_retirada,
            'data_prevista_devolucao' => $req->data_prevista_devolucao,
            'status' => 'Ativo',
            'data_agendamento' => date('Y-m-d')
        ]);

        DB::table('carros')->where('id', $id)->update([
            'status' => 'Agendado'
        ]);

        return redirect('/carros');
    }

    public function finalizar($id)
    {
        DB::table('carros')->where('id', $id)->update([
            'status' => 'Disponível'
        ]);

        DB::table('agendamentos')
            ->where('carro_id', $id)
            ->where('status', 'Ativo')
            ->update(['status' => 'Finalizado']);

        return redirect('/carros');
    }
}