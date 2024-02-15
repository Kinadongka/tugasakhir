<?= $this->session->flashdata('pesan'); ?>

<div class="card">
    <div class="card-header">
        <a href="<?= base_url('pengembalian/tambah') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Pengembalian</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Tgl Kembali</th>
                    <th scope="col">Kd Pinjam</th>
                    <th scope="col">Denda</th>
                    <th scope="col">Tgl Jatuh Tempo</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($pengembalian as $ssw) : ?>
                    <tr class="text-center">
                        <td><?= $no++ ?></td>
                        <td><?= $ssw->tgl_kembali ?></td>
                        <td><?= $ssw->kd_pinjam ?></td>
                        <td><?= $ssw->denda ?></td>
                        <td><?= $ssw->tgl_jatuh_tempo ?></td>
                        <td>
                            <button data-toggle="modal" data-target="#edit<?= $ssw->kd_pinjam ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                            <a href="<?= base_url('pengembalian/delete/' . $ssw->kd_pinjam) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini?')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal edit -->
<?php foreach ($pengembalian as $ssw) : ?>
    <div class="modal fade" id="edit<?= $ssw->kd_pinjam ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Pengembalian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('pengembalian/edit/' . $ssw->kd_pinjam) ?>" method="POST">
                        <div class="form-group">
                            <label>Tgl Kembali</label>
                            <input type="text" name="tgl_kembali" class="form-control" value="<?= $ssw->tgl_kembali ?>">
                            <?= form_error('tgl_kembali', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Kd Pinjam</label>
                            <input type="text" name="kd_pinjam" class="form-control" value="<?= $ssw->kd_pinjam ?>">
                            <?= form_error('kd_pinjam', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Denda</label>
                            <input type="text" name="denda" class="form-control" value="<?= $ssw->denda ?>">
                            <?= form_error('denda', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Tgl Jatuh Tempo</label>
                            <input type="text" name="tgl_jatuh_tempo" class="form-control" value="<?= $ssw->tgl_jatuh_tempo ?>">
                            <?= form_error('tgl_jatuh_tempo', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                            <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
