<?php

namespace Application\UseCase;

use Internal\Contracts\Converter;

class ConvertFileUseCase
{
    public function __construct(private Converter $converter) {}

    public function execute(string $content, string $format): array
    {
        return $this->converter->convert($content, $format);
    }
}