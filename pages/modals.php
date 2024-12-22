      <!-- Modal Tambah Peserta -->
      <div class="modal fade" id="tambahPeserta" tabindex="-1" aria-labelledby="tambahPesertaLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
          <div class="modal-header brand-bg-color text-white">
              <h5 class="modal-title" id="tambahPesertaLabel"><i class="bi bi-person-plus me-2"></i>Tambah Peserta Baru</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form action="../controllers/controller.php" method="POST">
              <div class="row">
                  <div class="col-md-6 mb-3">
                  <label for="firstName" class="form-label">Nama Depan</label>
                  <input type="text" class="form-control" id="firstName" name="first_name" required>
                  </div>
                  <div class="col-md-6 mb-3">
                  <label for="lastName" class="form-label">Nama Belakang</label>
                  <input type="text" class="form-control" id="lastName" name="last_name" required>
                  </div>
              </div>
              <div class="mb-3">
                  <label for="username" class="form-label">Nama Pengguna</label>
                  <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-person"></i></span>
                  <input type="text" class="form-control" id="username" name="username" placeholder="dibuat otomatis..." readonly>
                  </div>
              </div>
              <div class="mb-3">
                  <label for="email" class="form-label">Surel</label>
                  <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                  <input type="email" class="form-control" id="email" name="email" required>
                  </div>
              </div>
              <div class="mb-3">
                  <label for="phone" class="form-label">Nomor Telepon</label>
                  <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                  <input type="tel" class="form-control" id="phone" name="phone" required>
                  </div>
              </div>
              <div class="mb-3">
                  <label for="password" class="form-label">Kata Sandi</label>
                  <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-key"></i></span>
                  <input type="password" class="form-control" id="password" name="password" required>
                  <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                      <i class="bi bi-eye"></i>
                  </button>
                  </div>
              </div>
              <div class="modal-footer px-0 pb-0">
                  <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Batal</button>
                  <button type="submit" name="createUser" class="btn brand-btn rounded-pill">Tambah Peserta</button>
              </div>
              </form>
          </div>
          </div>
      </div>
      </div>    



      <!-- Modal Tambah Mitra -->
      <div class="modal fade" id="tambahMitra" tabindex="-1" aria-labelledby="tambahMitraLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
          <div class="modal-header brand-bg-color text-white">
              <h5 class="modal-title" id="tambahMitraLabel"><i class="bi bi-person-plus me-2"></i>Tambah Mitra Baru</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form action="../controllers/controller.php" method="POST">
              <div class="row">
                  <div class="col-md-6 mb-3">
                  <label for="firstName" class="form-label">Nama Depan</label>
                  <input type="text" class="form-control" id="firstName" name="first_name" required>
                  </div>
                  <div class="col-md-6 mb-3">
                  <label for="lastName" class="form-label">Nama Belakang</label>
                  <input type="text" class="form-control" id="lastName" name="last_name" required>
                  </div>
              </div>
              <div class="mb-3">
                  <label for="username" class="form-label">Nama Pengguna</label>
                  <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-person"></i></span>
                  <input type="text" class="form-control" id="username" name="username" placeholder="dibuat otomatis..." readonly>
                  </div>
              </div>
              <div class="mb-3">
                  <label for="email" class="form-label">Surel</label>
                  <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                  <input type="email" class="form-control" id="email" name="email" required>
                  </div>
              </div>
              <div class="mb-3">
                  <label for="phone" class="form-label">Nomor Telepon</label>
                  <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                  <input type="tel" class="form-control" id="phone" name="phone" required>
                  </div>
              </div>
              <div class="mb-3">
                  <label for="password" class="form-label">Kata Sandi</label>
                  <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-key"></i></span>
                  <input type="password" class="form-control" id="password" name="password" required>
                  <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                      <i class="bi bi-eye"></i>
                  </button>
                  </div>
              </div>
              <div class="modal-footer px-0 pb-0">
                  <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Batal</button>
                  <button type="submit" name="createMitra" class="btn brand-btn rounded-pill">Tambah Mitra</button>
              </div>
              </form>
          </div>
          </div>
      </div>
      </div>    

  <!-- Modal Tambah Workshop -->
  <div class="modal fade" id="tambahWorkshop" tabindex="-1" aria-labelledby="tambahWorkshopLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
              <div class="modal-header brand-bg-color text-white">
                  <h5 class="modal-title" id="tambahWorkshopLabel"><i class="bi bi-plus-circle me-2"></i>Tambah Workshop Baru</h5>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form action="../controllers/controller.php" method="POST" enctype="multipart/form-data">
                      <div class="mb-3">
                          <label for="title" class="form-label">Judul</label>
                          <input type="text" class="form-control" id="title" name="title" required>
                      </div>
                    
                      <div class="mb-3">
                          <label for="description" class="form-label">Deskripsi</label>
                          <textarea class="form-control" id="description" name="description" required></textarea>
                      </div>
                    
                      <div class="mb-3">
                          <label for="banner" class="form-label">Spanduk</label>
                          <input type="file" class="form-control" id="banner" name="banner" required>
                      </div>
                    
                      <div class="mb-3">
                          <label for="training_overview" class="form-label">Gambaran Pelatihan</label>
                          <textarea class="form-control" id="training_overview" name="training_overview" required></textarea>
                      </div>
                    
                      <div class="mb-3">
                          <label for="trained_competencies" class="form-label">Materi Yang Dilatih</label>
                          <textarea class="form-control" id="trained_competencies" name="trained_competencies" required></textarea>
                      </div>
                    
                      <div class="mb-3">
                          <label for="training_session" class="form-label">Sesi</label>
                          <textarea class="form-control" id="training_session" name="training_session" required></textarea>
                      </div>
                    
                      <div class="mb-3">
                          <label for="requirements" class="form-label">Persyaratan</label>
                          <textarea class="form-control" id="requirements" name="requirements" required></textarea>
                      </div>
                    
                      <div class="mb-3">
                          <label for="benefits" class="form-label">Manfaat</label>
                          <textarea class="form-control" id="benefits" name="benefits" required></textarea>
                      </div>
                    
                      <div class="mb-3">
                          <label for="price" class="form-label">Harga</label>
                          <input type="number" class="form-control" id="price" name="price" required>
                      </div>
                      <div class="mb-3">
                        <label for="tipe" class="form-label">Tipe</label>
                        <select class="form-select" id="tipe" name="tipe" required>
                        <option value="pilih" disabled selected>Pilih</option>
                        <option value="online" <?= isset($workshop['tipe']) && $workshop['tipe'] == 'online' ? 'selected' : '' ?>>Online</option>
                        <option value="offline" <?= isset($workshop['tipe']) && $workshop['tipe'] == 'offline' ? 'selected' : '' ?>>Offline</option>
                        </select>
                        </div>
                    
                      <div class="mb-3">
                          <label for="location" class="form-label">Lokasi</label>
                          <input type="text" class="form-control" id="location" name="location" required>
                      </div>
                    
                      <div class="mb-3">
                          <label for="start_date" class="form-label">Tanggal Mulai</label>
                          <input type="date" class="form-control" id="start_date" name="start_date" required>
                      </div>
                    
                      <div class="mb-3">
                          <label for="end_date" class="form-label">Tanggal Selesai</label>
                          <input type="date" class="form-control" id="end_date" name="end_date" required>
                      </div>
                    
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                          <button type="submit" name="createWorkshop" class="btn btn-primary brand-bg-color">Simpan Workshop</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
