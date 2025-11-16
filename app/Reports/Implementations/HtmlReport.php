<?php

namespace App\Reports\Implementations;

use App\Interfaces\ReportInterface;

class HtmlReport implements ReportInterface
{
    public function generate(array $data): string
    {
        $html = "<h1>Relatório de Categorias</h1>";
        $html .= "<table style='width:100%; border-collapse: collapse; text-align: left;'>";
        $html .= "<thead style='background-color: #f1f3f9;'><tr><th>ID</th><th>Nome</th><th>Criada em</th></tr></thead><tbody>";

        foreach ($data as $item) {
            $html .= "<tr style='border-bottom: 1px solid #e0e6f1;'>";
            $html .= "<td style='padding: 8px;'>" . htmlspecialchars($item['id']) . "</td>";
            $html .= "<td style='padding: 8px;'>" . htmlspecialchars($item['title']) . "</td>";
            $html .= "<td style='padding: 8px;'>" . htmlspecialchars($item['created_at']) . "</td>";
            $html .= "</tr>";
        }
        
        $html .= "</tbody></table>";
        return $html;
    }

    public function getFileType(): string
    {
        return 'html';
    }
}