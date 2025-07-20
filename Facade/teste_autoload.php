<?php

// Incluir o autoloader do Composer
require_once 'vendor/autoload.php';

// Testar se as classes estão sendo carregadas corretamente
try {
    // Testar o use case de PDF
    $criadorPdf = new \Application\UseCase\CriadorPdfUseCase();
    echo "✅ CriadorPdfUseCase carregado com sucesso!\n";
    
    // Testar o use case de DOCX
    $criarDocX = new \Application\UseCase\CriarDocXUseCase();
    echo "✅ CriarDocXUseCase carregado com sucesso!\n";
    
    echo "\n🎉 Autoload PSR-4 funcionando perfeitamente!\n";
    
} catch (Exception $e) {
    echo "❌ Erro: " . $e->getMessage() . "\n";
} 