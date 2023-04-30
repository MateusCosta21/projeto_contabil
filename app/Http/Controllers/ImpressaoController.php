<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Objetos;
use Dompdf\Dompdf;


class ImpressaoController extends Controller
{
    public function gerarPdf($id)
    {
        // Busque o objeto com o ID fornecido
        $objeto = Objetos::findOrFail($id);
    
        // Renderize o HTML do protocolo
        $html = view('protocolo', compact('objeto'))->render();
    
        // Instancie o Dompdf
        $dompdf = new Dompdf();
    
        // Carregue o HTML no Dompdf
        $dompdf->loadHtml($html);
    
        // Renderize o PDF
        $dompdf->render();
    
        // Retorne o PDF gerado
        return $dompdf->stream('protocolo.pdf');
    }
}