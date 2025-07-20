<?php

namespace Internal\Contracts;

interface Converter
{
    public static function convert(string $content, string $format): array;
}