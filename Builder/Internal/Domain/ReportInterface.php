<?php

namespace Internal\Domain;

interface ReportInterface
{
    public function setTitle(string $title): self;
    public function addSection(string $title, array $content): self;
    public function getReport(): string;
}