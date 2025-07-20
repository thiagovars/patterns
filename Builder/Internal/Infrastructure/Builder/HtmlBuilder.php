<?php

namespace Internal\Infrastructure\Builder;

use Internal\Domain\ReportInterface;

class HtmlBuilder implements ReportInterface
{
    private $report;

    public function setTitle(string $title): self
    {
        $this->report->title = "<h1>{$title}</h1></br><hr></br></br>";
        return $this;
    }

    public function addSection(string $title, array $content): self
    {
        $this->report->sections[] = [
            'title' => "<h2>{$title}</h2></br>",
            'content' => "<p>- " . $content . "</p></br>"
        ];
        return $this;
    }

    public function getReport(): string
    {
        return $this->report->generate();
    }
}