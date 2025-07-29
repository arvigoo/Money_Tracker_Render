<?php

namespace App\Core;

use Google_Client;
use Google_Service_Sheets;

class GoogleSheetClient
{
    private $service;
    private $spreadsheetId;
    private $sheetName;

    public function __construct()
    {
        $config = require __DIR__ . '/../../config/config.php';

        $client = new Google_Client();
        $client->setApplicationName("Keuangan App");
        $client->setScopes([Google_Service_Sheets::SPREADSHEETS]);
        $client->setAuthConfig($config['credentials_path']);
        $client->setAccessType('offline');

        $this->service = new Google_Service_Sheets($client);
        $this->spreadsheetId = $config['spreadsheet_id'];
        $this->sheetName = $config['sheet_name'];
    }

    public function appendRow(array $data)
    {
        $body = new \Google_Service_Sheets_ValueRange([
            'values' => [$data],
        ]);

        $params = ['valueInputOption' => 'USER_ENTERED'];

        return $this->service->spreadsheets_values->append(
            $this->spreadsheetId,
            $this->sheetName,
            $body,
            $params
        );
    }

    public function getAllData()
    {
        $response = $this->service->spreadsheets_values->get(
            $this->spreadsheetId,
            $this->sheetName
        );
        return $response->getValues();
    }
}
