<?php
if (!defined('BASE_URL')) {
  define('BASE_URL', '/project/Money_Tracker/public'); // Ganti ke '' saat di production
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= $title ?? 'Money Tracker' ?></title>

  <!-- Google Fonts (Brutalist style) -->
  <link href="https://fonts.googleapis.com/css2?family=Space+Mono&display=swap" rel="stylesheet" />

  <!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css" />

  <!-- Custom CSS -->
<link rel="stylesheet" href="/project/Money_Tracker/public/assets/css/style.css">

  <style>
   body {
     background-color: #ffe4f1;
    font-family: 'Space Mono', monospace;
    }

    /* Tombol Brutalist */
    .btn-brutal {
    background: hotpink;
    border: 2px solid black;
    color: white !important;
    font-weight: bold;
    text-transform: uppercase;
    box-shadow: 4px 4px 0px black;
    transition: transform 0.1s ease;
    text-decoration: none !important;
    display: inline-block;
    padding: 0.6rem 1.2rem;
    margin-bottom: 1rem;
    }

    .btn-brutal:hover {
    background-color: #ff69b4;
    }

    .btn-brutal:active {
    transform: translate(2px, 2px);
    box-shadow: 1px 1px 0px black;
    }

    /* Card */
    .neo-card {
    background-color: #fff;
    border: 3px solid #000;
    box-shadow: 6px 6px 0 #000;
    padding: 1rem;
    margin-top: 1rem;
    }

    /* Header Box */
    .neo-header {
    background-color: hotpink;
    color: #000;
    padding: 1rem;
    font-size: 1.5rem;
    border-bottom: 3px solid #000;
    }

    /* Tabel */
    .neo-table th,
    .neo-table td,
    .table th,
    .table td {
    border: 2px solid #000 !important;
    padding: 0.75rem !important;
    }

    .neo-table thead,
    .table thead {
    background-color: black;
    color: white;
    }

    .table tbody tr,
    .neo-table tbody tr {
    background-color: #ffe4f1 !important;
    }

    .neo-amount-plus {
    color: green;
    font-weight: bold;
    }

    .neo-amount-minus {
    color: red;
    font-weight: bold;
    }

    /* Input, Select, Textarea */
    input.form-control,
    select.form-select,
    textarea.form-control {
    border: 2px solid black;
    }

    input:focus,
    select:focus,
    textarea:focus {
    outline: none;
    box-shadow: 0 0 0 2px black;
    }

    /* Responsive Card */
    @media (max-width: 768px) {
    .neo-card {
        padding: 0.5rem;
    }
    }

  </style>
</head>

<body>
  <div class="container py-4">
