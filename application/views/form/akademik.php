<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">FORMULIR PENGADUAN AKADEMIK</h4>
            </div>
            <?= $this->session->flashdata('message'); ?>
            <form action="<?php echo base_url('mhs/akademik_ctl/save_akademik');?>" method="post">
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
                        <label for="addPilihanakademik">Pilihan akademik</label>
                        <select id="addPilihanakademik" class="form-control" name="pilihan_akademik">
                            <option value="Pilih">Pilih</option>
                            <option value="Dosen">Dosen</option>
                            <option value="Matakuliah">Matakuliah</option>
                            <option value="Penilaian">Penilaian</option>
                            <option value="Jadwal Kuliah">Jadwal Kuliah</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="addDeskripsipengaduan">Deskripsi akademik</label>
                        <textarea id="addDeskripsipengaduan" class="form-control" name="deskripsi_pengaduan" rows="3" placeholder="Enter Deskripsi pengaduan"></textarea>
                    </div>
                    <div class="modal-footer no-bd">
                        <button type="submit" id="addRowButton" class="btn btn-primary">Add</button>
                    </div>
                </form>
</div>
</div>
</div>

