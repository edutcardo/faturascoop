<?php
require_once('vendor/autoload.php'); // Ou o caminho correto, se você não estiver usando o Composer


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Desligue a saída de erros e avisos antes de qualquer saída
    ob_start();

    $previousReading = $_POST['previousReading'] ?? '';
    $currentReading = $_POST['currentReading'] ?? '';
    $nextReading = $_POST['nextReading'] ?? '';
    $investorName = $_POST['investorName'] ?? '';
    // Inclua outros dados conforme necessário

    $pdf = new TCPDF();
    $pdf->AddPage();

    $html = "
    <h1>Relatório do Investidor</h1>
    <p><strong>Leitura Anterior:</strong> $previousReading</p>
    <p><strong>Leitura Atual:</strong> $currentReading</p>
    <p><strong>Próxima Leitura:</strong> $nextReading</p>
    <p><strong>Nome do Investidor:</strong> $investorName</p>
    ";

    $pdf->writeHTML($html, true, false, true, false, '');

    ob_end_clean(); // Limpe qualquer saída adicional antes de gerar o PDF
    $pdf->Output('arquivo_gerado.pdf');  // 'I' para exibir no navegador
}