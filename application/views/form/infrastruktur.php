<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">FORMULIR PENGADUAN FASILITAS DAN INFRASTRUKTUR</h4>
            </div>
            <?= $this->session->flashdata('message'); ?>
            <form action="<?php echo base_url('mhs/infrastruktur_ctl/save_infrastruktur');?>" method="post">
                    <div class="form-group">
                        <label for="addnim">NIM</label>
                        <input id="addnim" type="number" class="form-control" name="nim" placeholder="Enter NIM">
                    </div>
                    <div class="form-group">
                        <label for="addnama">NAMA</label>
                        <input id="addnama" type="text" class="form-control" name="nama" placeholder="Enter Nama">
                    </div>
                    <div class="form-group">
                        <label for="addtanggal">TANGGAL</label>
                        <input id="addtanggal" type="date" class="form-control" name="tanggal" placeholder="Enter Tanggal">
                    </div>
                    <div class="form-group">
                        <label for="addkategori">Pilihan kategori</label>
                        <select id="addkategori" class="form-control" name="kategori">
                            <option value="Pilih">Pilih</option>
                            <option value="Infrastruktur">Infrastruktur</option>
                            <option value="Fasilitas">Fasilitas</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="addlokasi">lokasi</label>
                        <input id="addlokasi" type="text" class="form-control" name="lokasi" placeholder="Enter lokasi">
                    </div>
                    <div class="form-group">
                        <label for="adddeskripsi">Deskripsi</label>
                        <textarea id="adddeskripsi" class="form-control" name="deskripsi" rows="3" placeholder="Enter Deskripsi"></textarea>
                    </div>
                    

                    <div class="modal-footer no-bd">
                        <button type="submit" id="addRowButton" class="btn btn-primary">Add</button>
                        
                    </div>
                </form>
</div>
</div>
</div>

