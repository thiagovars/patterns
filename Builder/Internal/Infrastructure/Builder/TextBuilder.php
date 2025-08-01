<?php

namespace Internal\Infrastructure\Builder;

use Internal\Domain\ReportInterface;

class TextBuilder implements ReportInterface
{
    private $report;

    public function __construct()
    {
        $this->report = new \stdClass();
        $this->report->title = '';
        $this->report->sections = [];
    }

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
        $output = $this->report->title;
        foreach ($this->report->sections as $section) {
            $output .= $section['title_section'] . "\n";
            foreach ($section['content'] as $item) {
                $output .= "- " . $item . "\n";
            }
            $output .= "\n";
        }
        return $output;
    }
}