<?php

namespace Internal\Infrastructure\Builder;

use Internal\Domain\ReportInterface;

class HtmlBuilder implements ReportInterface
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
        $this->report->title = "<h1>{$title}</h1></br><hr></br></br>";
        return $this;
    }

    public function addSection(string $title, array $content): self
    {
        $contentHtml = '';
        foreach ($content as $item) {
            $contentHtml .= "<p>- " . $item . "</p></br>";
        }
        
        $this->report->sections[] = [
            'title' => "<h2>{$title}</h2></br>",
            'content' => $contentHtml
        ];
        return $this;
    }

    public function getReport(): string
    {
        $output = $this->report->title;
        foreach ($this->report->sections as $section) {
            $output .= $section['title'];
            $output .= $section['content'];
        }
        return $output;
    }
}