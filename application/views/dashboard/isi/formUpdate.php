
<div class="modal fade" id="updatePembayaranBonus" tabindex="3" aria-labelledby="updatePembayaranBonusLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updatePembayaranBonusLabel" style="width: 100%">Pembayaran Bonus</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card card-body">
        	<div class="row g-3">
				<div class="col-md-12">
					<label for="jmlPemayaran" class="form-label text-black"><b>Pembayaran:</b></label>
					<input type="hidden" class="form-control" placeholder="Masukan jumlah pembayaran" id="idBonus">
					<input type="text" class="form-control" placeholder="Masukan jumlah pembayaran" id="jmlPembayaranUpdate">
				</div>
				<div class="col-12">
					<button type="button" id="tambahBuruhUpdate" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Buruh</button>
				</div>
				<p class="row" id="groupBuruhUpdate" style="width: 100%">
				</p>
			</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" id="updatePembayaran"><i class="fa fa-pencil"></i> Update</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-close"></i> Close</button>
      </div>
    </div>
  </div>
</div>