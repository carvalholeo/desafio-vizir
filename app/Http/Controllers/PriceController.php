<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PriceController extends Controller
{

    public function calcular(Request $request)
    {
        (int) $dddOrigem = $request->input('dddOrigem');
        (int) $dddDestino = $request->input('dddDestino');
        (int) $minutosGastos = $request->input('minutosGastos');
        (int) $planoEscolhido = $request->input('planoEscolhido');
        
        $dddsAtendidos = array(11, 16, 17, 18);
        $planosExistentes = array(30, 60, 120);
        
        if(!is_numeric($dddOrigem) || !is_numeric($dddDestino) || !is_numeric($minutosGastos) || !is_numeric($planoEscolhido)) {
            return response("Uma das opções digitadas não é um número válido. Tente novamente.", 400);
        }
            
        if($dddOrigem == $dddDestino) {
            return response("DDD de origem não pode ser ao igual DDD de destino", 400);
        }

        if($minutosGastos < 0) {
            return response("Quantidade de minutos precisa igual ou maior que zero", 400);
        }

        if(($dddOrigem == 16 && ($dddDestino == 17 || $dddDestino == 18)) ||
        ($dddOrigem == 17 && ($dddDestino == 16 || $dddDestino == 18)) ||
        ($dddOrigem == 18 && ($dddDestino == 16 || $dddDestino == 17))) {
            return response("Ainda não estamos atendendo essa rota de ligação. Fique ligado, estamos ampliando nossas operações rapidamente!", 400);
        }
        

        switch($dddOrigem) {
            case 11:
                if($dddDestino == 16) {
                    $custoOriginal = 1.90;
                    $custoAdicional = $custoOriginal + ($custoOriginal * 0.10);
                } elseif ($dddDestino == 17) {
                    $custoOriginal = 1.70;
                    $custoAdicional = $custoOriginal + ($custoOriginal * 0.10);
                } else {
                    $custoOriginal = 0.90;
                    $custoAdicional = $custoOriginal + ($custoOriginal * 0.10);
                }
                break;
            case 16:
                $custoOriginal = 2.90;
                $custoAdicional = $custoOriginal + ($custoOriginal * 0.10);
                break;
            case 17:
                $custoOriginal = 2.70;
                $custoAdicional = $custoOriginal + ($custoOriginal * 0.10);
                break;
            case 18:
                $custoOriginal = 1.90;
                $custoAdicional = $custoOriginal + ($custoOriginal * 0.10);
                break;
            default:
                return response("O DDD de origem não é válido.", 400);
                break;
        }
        
        if ($minutosGastos > $planoEscolhido) {
            $minutosRestantes = $minutosGastos - $planoEscolhido;
            $precoComPlano = $minutosRestantes * $custoAdicional;
            $precoSemPlano = $minutosGastos * $custoOriginal;
        } else {
            $precoComPlano = 0.00;
            $precoSemPlano = $minutosGastos * $custoOriginal;
        }
        
        return response()->json([
            "dddOrigem" => $dddOrigem,
            "dddDestino" => $dddDestino,
            "minutosGastos" => $minutosGastos,
            "planoEscolhido" => $planoEscolhido,
            "precoComPlano" => $precoComPlano,
            "precoSemPlano" => $precoSemPlano
        ]);
    }
    
    public function charge() {
        return view('billing.charge');
    }
    
    public function falemais() {
        return view('plans.falemais');
    }
    
    public function index() {
        return view('index');
    }
    
    public function about() {
        return view('about.index');
    }

}
