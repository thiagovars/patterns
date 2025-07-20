<?php

namespace Internal\Infrastructure\Mock;

class ReportMock
{
    public function getReportdata(): array
    {
        // DADOS MOCK PARA REFERÊNCIA
        return [
            'title' => 'Relatório de Vendas - Janeiro 2024',
            'sessions' => [
                [
                    'title' => 'Produtos Mais Vendidos',
                    'content' => [
                        '1. Smartphone Galaxy S24 - 150 unidades',
                        '2. Notebook Dell Inspiron - 89 unidades',
                        '3. Fone de Ouvido Bluetooth - 234 unidades',
                        '4. Mouse Gamer RGB - 67 unidades',
                        '5. Teclado Mecânico - 45 unidades'
                    ]
                ],
                [
                    'title' => 'Resumo Financeiro',
                    'content' => [
                        'Receita Total: R$ 1.250.000,00',
                        'Custo Total: R$ 780.000,00',
                        'Lucro Bruto: R$ 470.000,00',
                        'Margem de Lucro: 37,6%',
                        'Meta Atingida: 105%'
                    ]
                ]
            ]
        ];
    }
}