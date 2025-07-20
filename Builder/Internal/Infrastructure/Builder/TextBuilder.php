<?php

namespace Internal\Infrastructure\Builder;

use Internal\Domain\ReportInterface;

class TextBuilder implements ReportInterface
{
    private $report;

    public function setTitle(string $title): self
    {
        $this->report->title = "{$title}\n================\n";
        return $this;
    }

    public function addSection(string $title, array $content): self
    {
        $this->report->sections[] = [
            'title_section' => "[ {$title} ]",
            'content' => $content
        ];
        return $this;
    }

    public function getReport(): string
    {
        return $this->report;
    }
}