<?php

namespace App\Controllers;

use App\Core\GoogleSheetClient;


class TransactionController
{
    
    private $sheet;

    public function __construct()
    {
        $this->sheet = new GoogleSheetClient();
    }

    public function index()
    {
        $data = $this->sheet->getAllData();
        require __DIR__ . '/../Views/transaksi/index.php';
    }

    public function create()
    {
        require __DIR__ . '/../Views/transaksi/form.php';
    }

    public function store()
    {
        $post = $_POST;

        $uuid = uniqid();
        $created_at = date('Y-m-d H:i:s');
        $user = $_SESSION['user'] ?? 'anonymous';

        // Gunakan GoogleSheetClient
        $sheetClient = new \App\Core\GoogleSheetClient();

        // Ambil data yang ada sekarang
        $data = $sheetClient->getAllData();

        // Hitung jumlah baris data (kurangi 1 jika baris pertama adalah header)
        $no = count($data) > 1 ? count($data) : 1; // jika baru header saja, mulai dari 1

        $row = [
            $no, // ← Nomor otomatis
            $post['tanggal'] ?? '',
            $post['kategori'] ?? '',
            $post['pembayaran'] ?? '',
            $post['jenis'] ?? '',
            $post['pemasukan'] ?? 0,
            $post['pengeluaran'] ?? 0,
            $post['jumlah'] ?? '',
            $post['catatan'] ?? '',
            $post['sumber_dana'] ?? '',
            $post['month'] ?? date('F Y'),
            $user,
            $uuid,
            $created_at,
            '', // UPDATED_AT
        ];

        $sheetClient->appendRow($row);

        header('Location: /project/Money_Tracker/public/transaksi');
        exit;
    }
}
