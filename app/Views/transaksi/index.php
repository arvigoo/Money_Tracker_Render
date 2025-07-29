<?php require_once __DIR__ . '/../layout/header.php'; 
?>


<?php
  $headers = $data[0];
  $rows = array_slice($data, 1);
  $pemasukanIdx   = array_search('PEMASUKAN', $headers);
  $pengeluaranIdx = array_search('PENGELUARAN', $headers);
  $jumlahIdx      = array_search('JUMLAH', $headers);
?>

<div class="container py-4">
  <div class="neo-card">
    <div class="neo-header">📒 Daftar Transaksi</div>

    <div class="mt-4 mb-3">
        <a href="<?= BASE_URL ?>/transaksi/create" class="btn btn-brutal mb-3">+ Tambah Transaksi</a>
    </div>

    <div class="table-responsive">
      <table id="transaksiTable" class="table neo-table table-striped w-100 nowrap">
        <thead>
          <tr>
            <?php foreach ($headers as $i => $col): ?>
              <?php if ($i !== $pemasukanIdx && $i !== $pengeluaranIdx): ?>
                <th><?= htmlspecialchars($col) ?></th>
              <?php endif; ?>
            <?php endforeach; ?>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($rows as $row): ?>
            <?php
              $row = array_pad($row, count($headers), '');
              $pemasukan = floatval(str_replace(['Rp', '.', ','], '', $row[$pemasukanIdx] ?? 0));
              $pengeluaran = floatval(str_replace(['Rp', '.', ','], '', $row[$pengeluaranIdx] ?? 0));
              $nominal = $pemasukan ?: ($pengeluaran ? -$pengeluaran : 0);
            ?>
            <tr>
              <?php foreach ($headers as $i => $header): ?>
                <?php if ($i === $pemasukanIdx || $i === $pengeluaranIdx) continue; ?>
                <?php if ($i === $jumlahIdx): ?>
                  <td class="<?= $nominal < 0 ? 'neo-amount-minus' : 'neo-amount-plus' ?>">
                    Rp<?= number_format(abs($nominal), 0, ',', '.') ?>
                  </td>
                <?php else: ?>
                  <td><?= htmlspecialchars($row[$i]) ?></td>
                <?php endif; ?>
              <?php endforeach; ?>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
