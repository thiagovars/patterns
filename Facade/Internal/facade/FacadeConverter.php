<?php

namespace Internal\Facade;

use Internal\Converters\PdfConverter;
use Internal\Converters\DocxConverter;

class FacadeConverter
{
    public static function convert(string $path, string $targetFormat): array
    {
        $converters = [
            'pdf' => PdfConverter::class,
            'docx' => DocxConverter::class,
        ];
        if (!isset($converters[$targetFormat]))
            throw new \Exception('Invalid target format');

        $converter = $converters[$targetFormat];
        return $converter::convert($path, $targetFormat);
    }    
}