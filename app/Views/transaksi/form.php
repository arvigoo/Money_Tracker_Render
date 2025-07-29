<?php require_once __DIR__ . '/../layout/header.php'; 
?>

<div class="container py-4">
  <div class="neo-card">
    <div class="neo-header">📝 Tambah Transaksi</div>

    <form action="<?= BASE_URL ?>/transaksi/store" method="POST" id="transaksiForm">
      <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal</label>
        <input type="date" name="tanggal" id="tanggal" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="kategori" class="form-label">Kategori</label>
        <select name="kategori" id="kategori" class="form-select" required>
          <option value="">-- Pilih --</option>
          <option value="Pemasukan">Pemasukan</option>
          <option value="Pengeluaran">Pengeluaran</option>
        </select>
      </div>

        <div class="mb-3">
        <label for="pembayaran" class="form-label">Pembayaran</label>
        <select name="pembayaran" id="pembayaran" class="form-select">
            <option value="">-- Pilih --</option>
            <option value="CASH">CASH</option>
            <option value="BCA">BCA</option>
            <option value="NAGARI">NAGARI</option>
            <option value="BSI">BSI</option>
            <option value="GOPAY">GOPAY</option>
            <option value="DANA">DANA</option>
            <option value="PAYLATER">PAYLATER</option>
        </select>
        </div>


    <div class="mb-3">
    <label for="jenis" class="form-label">Jenis</label>
    <select name="jenis" id="jenis" class="form-select">
        <option value="">-- Pilih --</option>
        <option value="GAJI">GAJI</option>
        <option value="PENDAPATAN LAIN">PENDAPATAN LAIN</option>
        <option value="TABUNGAN">TABUNGAN</option>
        <option value="HUTANG">HUTANG</option>
        <option value="ARISAN">ARISAN</option>
        <option value="KELUARGA">KELUARGA</option>
        <option value="MAKAN">MAKAN</option>
        <option value="MINUM">MINUM</option>
        <option value="TRANSPORTASI">TRANSPORTASI</option>
        <option value="ELEKTRONIK">ELEKTRONIK</option>
        <option value="APLIKASI">APLIKASI</option>
        <option value="KUOTA">KUOTA</option>
        <option value="PULSA">PULSA</option>
        <option value="LISTRIK">LISTRIK</option>
        <option value="SKINCARE">SKINCARE</option>
        <option value="MAKEUP">MAKEUP</option>
        <option value="FASHION">FASHION</option>
        <option value="BARANG RANDOM">BARANG RANDOM</option>
        <option value="CICILAN">CICILAN</option>
    </select>
    </div>


      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="pemasukan" class="form-label">Pemasukan</label>
          <input type="number" name="pemasukan" id="pemasukan" class="form-control" step="1000" disabled>
        </div>
        <div class="col-md-6 mb-3">
          <label for="pengeluaran" class="form-label">Pengeluaran</label>
          <input type="number" name="pengeluaran" id="pengeluaran" class="form-control" step="1000" disabled>
        </div>
      </div>

      <div class="mb-3">
        <label for="jumlah" class="form-label">Jumlah (Otomatis)</label>
        <input type="number" name="jumlah" id="jumlah" class="form-control" readonly>
      </div>

      <div class="mb-3">
        <label for="catatan" class="form-label">Catatan</label>
        <textarea name="catatan" id="catatan" class="form-control" rows="2"></textarea>
      </div>

        <div class="mb-3">
        <label for="sumber_dana" class="form-label">Sumber Dana</label>
        <select name="sumber_dana" id="sumber_dana" class="form-select">
            <option value="">-- Pilih --</option>
            <option value="KEBUTUHAN POKOK">KEBUTUHAN POKOK</option>
            <option value="TABUNG">TABUNG</option>
            <option value="SELF REWARD">SELF REWARD</option>
            <option value="DARURAT">DARURAT</option>
            <option value="SEDEKAH">SEDEKAH</option>
            <option value="ORTU">ORTU</option>
        </select>
        </div>


      <div class="mb-3">
        <label for="month" class="form-label">Bulan</label>
        <input type="text" name="month" id="month" class="form-control" value="<?= date('F Y') ?>" readonly>
      </div>

      <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-brutal">Simpan</button>
      </div>
    </form>
  </div>
</div>

<script>
  const kategoriSelect = document.getElementById('kategori');
  const pemasukanInput = document.getElementById('pemasukan');
  const pengeluaranInput = document.getElementById('pengeluaran');
  const jumlahInput = document.getElementById('jumlah');

  function toggleInputs() {
    const kategori = kategoriSelect.value;

    if (kategori === 'Pemasukan') {
      pemasukanInput.disabled = false;
      pengeluaranInput.disabled = true;
      pengeluaranInput.value = '';
    } else if (kategori === 'Pengeluaran') {
      pemasukanInput.disabled = true;
      pemasukanInput.value = '';
      pengeluaranInput.disabled = false;
    } else {
      pemasukanInput.disabled = true;
      pengeluaranInput.disabled = true;
      pemasukanInput.value = '';
      pengeluaranInput.value = '';
    }
    updateJumlah();
  }

  function updateJumlah() {
    const pemasukan = parseFloat(pemasukanInput.value) || 0;
    const pengeluaran = parseFloat(pengeluaranInput.value) || 0;
    const hasil = pemasukan || pengeluaran;
    jumlahInput.value = hasil;
  }

  kategoriSelect.addEventListener('change', toggleInputs);
  pemasukanInput.addEventListener('input', updateJumlah);
  pengeluaranInput.addEventListener('input', updateJumlah);

  toggleInputs(); // inisialisasi awal
</script>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
