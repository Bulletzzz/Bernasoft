<?php

namespace App\Reports\Implementations;

use App\Interfaces\ReportInterface;

class CsvReport implements ReportInterface
{
    public function generate(array $data): string
    {
        $output = "ID,Título,Criada Em\n";
        foreach ($data as $item) {
            $output .= "{$item['id']},\"{$item['title']}\",{$item['created_at']}\n";
        }
        return $output;
    }

    public function getFileType(): string
    {
        return 'csv';
    }
}