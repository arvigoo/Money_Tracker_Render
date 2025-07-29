<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\TransactionController;

// Dapatkan URL path saat ini
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Tentukan base path aplikasi (sesuaikan dengan folder kamu)
$basePath = '/project/Money_Tracker/public';

// Hapus base path dari uri supaya bisa route dengan mudah
$path = substr($uri, strlen($basePath));

// Pastikan $path selalu diawali slash
if ($path === false || $path === '') {
    $path = '/';
}

switch ($path) {
    case '/':
    case '/transaksi':
        (new TransactionController())->index();
        break;

    case '/transaksi/create':
        (new TransactionController())->create();
        break;

    case '/transaksi/store':
        (new TransactionController())->store();
        break;

    default:
        http_response_code(404);
        echo "404 Not Found: $path";
        break;
}
