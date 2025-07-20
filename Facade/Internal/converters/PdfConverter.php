<?php

namespace Internal\Converters;

use Internal\Contracts\Converter;
use TCPDF;

class PdfConverter implements Converter
{

    const PATH_OUTPUT = __DIR__ . '/../../storage/output/pdf/';

    public static function convert(string $content, string $format): array
    {
        // Criar nova instância do TCPDF
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        
        // Configurar informações do documento
        $pdf->SetCreator('PDF Generator');
        $pdf->SetAuthor('Sistema de Conversão');
        $pdf->SetTitle('Documento Convertido');
        $pdf->SetSubject('Conversão de ' . $format . ' para PDF');
        
        // Configurar margens
        $pdf->SetMargins(15, 15, 15);
        $pdf->SetHeaderMargin(5);
        $pdf->SetFooterMargin(10);
        
        // Configurar quebra automática de página
        $pdf->SetAutoPageBreak(TRUE, 25);
        
        // Configurar fonte padrão
        $pdf->SetFont('helvetica', '', 12);
        
        // Adicionar página
        $pdf->AddPage();
        
        // Escrever o conteúdo HTML
        $pdf->writeHTML($content, true, false, true, false, '');
        
        // Retornar o PDF como string
        return [
            'path' => self::PATH_OUTPUT . uniqid() . '.pdf',
            'content' => $pdf->Output('', 'S'),
        ];
    }
}