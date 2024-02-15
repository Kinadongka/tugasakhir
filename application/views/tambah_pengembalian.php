<form action="<?= base_url('pengembalian/tambah_aksi') ?>" method="POST">
    <div class="form-group">
        <label>Tgl Kembali</label>
        <input type="text" name="tgl_kembali" class="form-control">
        <?= form_error('tgl_kembali', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group">
        <label>Kd Pinjam</label>
        <input type="text" name="kd_pinjam" class="form-control">
        <?= form_error('kd_pinjam', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group">
        <label>Denda</label>
        <input type="text" name="denda" class="form-control">
        <?= form_error('denda', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group">
        <label>Tgl Jatuh Tempo</label>
        <input type="text" name="tgl_jatuh_tempo" class="form-control">
        <?= form_error('tgl_jatuh_tempo', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    
    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
    <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset</button>
</form>
