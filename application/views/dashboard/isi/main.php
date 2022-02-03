      <div class="container-fluid py-4">
          <div class="row">
              <div class="col-md-6">
                  <input type="text" class="form-control" name="encrypt" id="valencrypt" placeholder="Masukan text untuk menambah user jika ingin menambah user">
              </div>
              <div class="col-md-3">
                  <button class="btn btn-primary" id="encrypt">Encrypt Text</button>
              </div>
              <div class="col-md-3" id="hasilEnc"></div>
          </div>
          <div class="row">
            <div class="col-12">
                <div class="card my-4">
                  <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                      <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Tabel Pembayaran Bonus</h6>
                      </div>
                  </div>
                  <div class="card-body pb-2">
                      <div class="table-responsive p-0">
                  <div class="row">
                      <div class="col-auto" style="padding-top: 25px">
                          <button class="btn btn-primary" id="btn-addPembayaranBonus"><i class="fa fa-plus"></i> Tambah</button>
                      </div>
                  </div>
                        <table class="table align-items-center mb-0" id="tBonus">
                          <thead>
                            <tr>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">IdBonus</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Pembuatan</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jumlah Bayar</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jumlah Buruh</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Created By</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                      </div>
                  </div>
                </div>
            </div>
          </div>
      </div>
      <?php $this->load->view('dashboard/isi/formInput');?>
      <?php $this->load->view('dashboard/isi/formUpdate');?>
      <?php $this->load->view('dashboard/isi/detailBuruh');?>