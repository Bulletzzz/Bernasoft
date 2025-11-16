<?php

namespace App\Http\Controllers;

use App\Services\ReportService;
use Illuminate\Http\Request;
use InvalidArgumentException;

class ReportController extends Controller
{
    protected ReportService $reportService;

    public function __construct(ReportService $reportService)
    {
        $this->reportService = $reportService;
    }

    public function downloadCategoryReport(string $type)
    {
        try {
            $reportData = $this->reportService->generateCategoryReport($type);

            $content = $reportData['content'];
            $fileType = $reportData['fileType'];

            if ($fileType === 'html') {
                 return response($content)->header('Content-Type', 'text/html');
            }

            return response($content, 200)
                ->header('Content-Type', 'text/' . $fileType)
                ->header('Content-Disposition', 'attachment; filename="relatorio-categorias.' . $fileType . '"');

        } catch (InvalidArgumentException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}