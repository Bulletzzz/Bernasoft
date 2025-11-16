<?php

namespace App\Reports\Factories;

use App\Interfaces\ReportInterface;
use App\Reports\Implementations\CsvReport;
use App\Reports\Implementations\HtmlReport;
use InvalidArgumentException;

class CategoryReportFactory
{
    /**
     * @param string $type
     * @return ReportInterface
     * @throws InvalidArgumentException
     */
    public function createReport(string $type): ReportInterface
    {
        return match (strtolower($type)) {
            'html' => new HtmlReport(),
            'csv' => new CsvReport(),
            default => throw new InvalidArgumentException("Tipo de relatório '{$type}' não suportado."),
        };
    }
}