
<div class="modal fade" id="detailBuruhModal" tabindex="-1" aria-labelledby="detailBuruhModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailBuruhModalLabel" style="width: 100%"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card card-body">
          <div class="row">
            <div class="row">
              <div class="col-12 col-xl-4">
                <div class="card card-plain h-100">
                  <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">Informasi Pembayaran</h6>
                  </div>
                  <hr>
                  <div class="card-body p-3">
                    <ul class="list-group">
                      <li class="list-group-item border-0 ps-0 pt-0 text-sm" id="IdBonus"></li>
                      <li class="list-group-item border-0 ps-0 text-sm" id="JumlahBayar"></li>
                      <li class="list-group-item border-0 ps-0 text-sm" id="CreatedBy"></li>
                      <li class="list-group-item border-0 ps-0 text-sm" id="CreatedOn"></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-12 col-xl-8">
                <div class="card card-plain h-100">
                  <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">Informasi Buruh</h6>
                  </div>
                  <hr>
                  <div class="card-body p-3">
                    <ul class="list-group">
                      <div class="row" id="listBuruh"></div>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>