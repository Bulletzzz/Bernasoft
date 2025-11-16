<?php

namespace App\Services;

use App\Reports\Factories\CategoryReportFactory;
use App\Models\Categoria;
use App\Interfaces\ReportInterface;
use InvalidArgumentException;

class ReportService
{
    protected CategoryReportFactory $reportFactory;

    public function __construct(CategoryReportFactory $reportFactory)
    {
        $this->reportFactory = $reportFactory;
    }

    /**
     * @param string $type
     * @return array{'content': string, 'fileType': string}
     * @throws InvalidArgumentException
     */
    public function generateCategoryReport(string $type): array
    {
        $sourceData = Categoria::all(['id', 'title', 'created_at'])->toArray();
        $reportGenerator = $this->reportFactory->createReport($type);
        $content = $reportGenerator->generate($sourceData);
        
        return [
            'content' => $content,
            'fileType' => $reportGenerator->getFileType()
        ];
    }
}