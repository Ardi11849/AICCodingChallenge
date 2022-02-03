
<div class="modal fade" id="addPembayaranBonus" tabindex="3" aria-labelledby="addPembayaranBonusLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addPembayaranBonusLabel" style="width: 100%">Pembayaran Bonus</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card card-body">
        	<div class="row g-3">
				<div class="col-md-12">
					<label for="jmlPemayaran" class="form-label text-black"><b>Pembayaran:</b></label>
					<input type="text" class="form-control" placeholder="Masukan jumlah pembayaran" id="jmlPembayaran">
				</div>
				<div class="col-12">
					<button type="button" id="tambahBuruh" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Buruh</button>
				</div>
				<div class="row">
					<div class="col-md-4">
						<input type="text" name="namaBuruh[]" placeholder="Masukan Nama Buruh" data-id='1' class="form-control buruh" id="NamaBuruh1">
					</div>
					<div class="col-md-4">
						<input type="text" name="buruh[]" placeholder="Masukan persentase" data-id='1' class="form-control buruh" id="Buruh1">
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<input type="text" name="namaBuruh[]" placeholder="Masukan Nama Buruh" data-id='1' class="form-control buruh" id="NamaBuruh2">
					</div>
					<div class="col-md-4">
						<input type="text" name="buruh[]" placeholder="Masukan persentase" data-id='1' class="form-control buruh" id="Buruh2">
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<input type="text" name="namaBuruh[]" placeholder="Masukan Nama Buruh" data-id='1' class="form-control buruh" id="NamaBuruh3">
					</div>
					<div class="col-md-4">
						<input type="text" name="buruh[]" placeholder="Masukan persentase" data-id='1' class="form-control buruh" id="Buruh3">
					</div>
				</div>
				<p class="row" id="groupBuruh" style="width: 100%">
				</p>
			</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="savePembayaran"><i class="fa fa-save"></i> Save</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-close"></i> Close</button>
      </div>
    </div>
  </div>
</div>