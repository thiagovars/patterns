<?php

namespace Internal\Infrastructure\Builder;

use Internal\Domain\ReportInterface;

class ReportGenerator
{
    private $builder;

    public function __construct(ReportInterface $builder)
    {
        $this->builder = $builder;
    }

    public function generateReport(array $data): string
    {
        $this->builder->setTitle($data['title']);
        foreach ($data['sections'] as $section) {
            $this->builder->addSection($section['title'], $section['content']);
        }
        return $this->builder->getReport();
    }
}