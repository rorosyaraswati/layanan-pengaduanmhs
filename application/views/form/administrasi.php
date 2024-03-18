<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">FORMULIR PENGADUAN ADMINISTRASI</h4>
            </div>
            <?= $this->session->flashdata('message'); ?>
<form action="<?php echo base_url('mhs/administrasi_ctl/save_administrasi');?>" method="post">
    <div class="form-group">
        <label for="addTanggal">Tanggal</label>
        <input id="addTanggal" type="date" class="form-control" name="tanggal" placeholder="Enter Tanggal">
    </div>
    <div class="form-group">
        <label for="addNIM">NIM</label>
        <input id="addNIM" type="text" class="form-control" name="nim" placeholder="Enter NIM">
    </div>
    <div class="form-group">
        <label for="addNama">Nama</label>
        <input id="addNama" type="text" class="form-control" name="nama" placeholder="Enter Nama">
    </div>
    <div class="form-group">
        <label for="addprogramstudi">Program Studi</label>
        <select id="addprogramstudi" class="form-control" name="program_studi">
            <option value="Pilih">Pilih</option>
            <option value="SI">Sistem Informasi</option>
            <option value="iF">Teknik Informatika</option>
        </select>
    </div>
    <div class="form-group">
        <label for="addjenisbiaya">Pilihan Biaya</label>
        <select id="addjenisbiaya" class="form-control" name="jenis_biaya">
            <option value="Pilih">Pilih</option>
            <option value="Dosen">SPP</option>
            <option value="Matakuliah">Semester Antara</option>
            <option value="Penilaian">Ulangan Susulan</option>
            <option value="Jadwal Kuliah">Wisuda</option>
        </select>
    </div>
    <div class="form-group">
        <label for="addDeskripsi">Deskripsi</label>
        <textarea id="addDeskripsi" class="form-control" name="deskripsi" rows="3" placeholder="Enter Deskripsi"></textarea>
    </div>

    <div class="modal-footer no-bd">
        <button type="submit" id="addRowButton" class="btn btn-primary">Add</button>
    </div>
</form>
</div>
</div>
</div>

