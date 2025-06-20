<?php

namespace Step2dev\LazySeoTools\Services;

class SeoAnalyzerService
{
    public function analyze(string $title, string $description, string $keywords, string $content): array
    {
        $score = 0;
        $warnings = [];

        if ($title) {
            $score += 10;
        } else {
            $warnings[] = 'Title is missing.';
        }

        if ($description) {
            $score += 10;
        } else {
            $warnings[] = 'Description is missing.';
        }

        if ($keywords) {
            $score += 10;
        } else {
            $warnings[] = 'Keywords are missing.';
        }

        $wordCount = str_word_count(strip_tags($content));
        if ($wordCount >= 300) {
            $score += 10;
        } else {
            $warnings[] = 'Content too short.';
        }

        $keywordUsage = substr_count(strtolower($content), strtolower($keywords));
        if ($keywordUsage >= 2) {
            $score += 10;
        } else {
            $warnings[] = 'Keywords underused.';
        }

        return [
            'score' => $score,
            'warnings' => $warnings,
            'grade' => $this->grade($score),
        ];
    }

    protected function grade(int $score): string
    {
        return match (true) {
            $score >= 40 => 'green',
            $score >= 20 => 'orange',
            default => 'red',
        };
    }
}
