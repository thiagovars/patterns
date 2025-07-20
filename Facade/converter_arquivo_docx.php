<?php

require_once 'vendor/autoload.php';

use Internal\Converters\DocxConverter;

/**
 * Utilitário para converter arquivos para DOCX
 */
class ConversorArquivoDocx
{
    private DocxConverter $converter;
    
    public function __construct()
    {
        $this->converter = new DocxConverter();
    }
    
    /**
     * Converte um arquivo para DOCX
     * 
     * @param string $caminhoArquivo Caminho do arquivo de entrada
     * @param string $formato Formato do arquivo (txt, html, md, etc.)
     * @param string $nomeSaida Nome do arquivo de saída (opcional)
     * @return string Caminho do arquivo DOCX gerado
     */
    public function converterArquivo(string $caminhoArquivo, string $formato, string $nomeSaida = ''): string
    {
        // Verificar se o arquivo existe
        if (!file_exists($caminhoArquivo)) {
            throw new Exception("Arquivo não encontrado: $caminhoArquivo");
        }
        
        // Ler o conteúdo do arquivo
        $conteudo = file_get_contents($caminhoArquivo);
        
        if ($conteudo === false) {
            throw new Exception("Não foi possível ler o arquivo: $caminhoArquivo");
        }
        
        // Converter para DOCX
        $docxContent = $this->converter->converter($conteudo, $formato);
        
        // Gerar nome do arquivo de saída
        if (empty($nomeSaida)) {
            $nomeBase = pathinfo($caminhoArquivo, PATHINFO_FILENAME);
            $nomeSaida = $nomeBase . '_convertido.docx';
        }
        
        // Garantir que o nome termine com .docx
        if (!str_ends_with($nomeSaida, '.docx')) {
            $nomeSaida .= '.docx';
        }
        
        // Salvar o arquivo DOCX
        if (file_put_contents($nomeSaida, $docxContent) === false) {
            throw new Exception("Não foi possível salvar o arquivo DOCX: $nomeSaida");
        }
        
        return $nomeSaida;
    }
    
    /**
     * Converte múltiplos arquivos para DOCX
     * 
     * @param array $arquivos Array de arrays com ['caminho', 'formato', 'nome_saida']
     * @return array Array com os caminhos dos arquivos gerados
     */
    public function converterMultiplosArquivos(array $arquivos): array
    {
        $resultados = [];
        
        foreach ($arquivos as $arquivo) {
            try {
                $caminho = $arquivo['caminho'];
                $formato = $arquivo['formato'];
                $nomeSaida = $arquivo['nome_saida'] ?? '';
                
                $arquivoGerado = $this->converterArquivo($caminho, $formato, $nomeSaida);
                $resultados[] = [
                    'sucesso' => true,
                    'arquivo_original' => $caminho,
                    'arquivo_gerado' => $arquivoGerado
                ];
                
            } catch (Exception $e) {
                $resultados[] = [
                    'sucesso' => false,
                    'arquivo_original' => $arquivo['caminho'],
                    'erro' => $e->getMessage()
                ];
            }
        }
        
        return $resultados;
    }
    
    /**
     * Detecta o formato do arquivo baseado na extensão
     * 
     * @param string $caminhoArquivo
     * @return string
     */
    public function detectarFormato(string $caminhoArquivo): string
    {
        $extensao = strtolower(pathinfo($caminhoArquivo, PATHINFO_EXTENSION));
        
        $mapeamento = [
            'txt' => 'TXT',
            'html' => 'HTML',
            'htm' => 'HTML',
            'md' => 'MARKDOWN',
            'markdown' => 'MARKDOWN',
            'text' => 'TXT'
        ];
        
        return $mapeamento[$extensao] ?? 'TXT';
    }
}

// Exemplo de uso
if (php_sapi_name() === 'cli') {
    $conversor = new ConversorArquivoDocx();
    
    // Verificar argumentos da linha de comando
    if ($argc < 2) {
        echo "Uso: php converter_arquivo_docx.php <arquivo> [formato] [nome_saida]\n";
        echo "Exemplo: php converter_arquivo_docx.php documento.txt TXT documento_final.docx\n";
        exit(1);
    }
    
    $arquivo = $argv[1];
    $formato = $argv[2] ?? $conversor->detectarFormato($arquivo);
    $nomeSaida = $argv[3] ?? '';
    
    try {
        $arquivoGerado = $conversor->converterArquivo($arquivo, $formato, $nomeSaida);
        echo "✓ Arquivo convertido com sucesso: $arquivoGerado\n";
        
    } catch (Exception $e) {
        echo "✗ Erro: " . $e->getMessage() . "\n";
        exit(1);
    }
} 