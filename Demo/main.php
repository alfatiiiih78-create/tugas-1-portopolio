<div class="card shadow-sm">
    <div class="card-body">
        <h2><?= h(pageTitle($page)) ?></h2>
        <hr>
        <?php if ($page === 'home'): ?>
            <div class="row g-4 align-items-center">
                <div class="col-md-5 text-center">
                    <img src="gambar/gambar 6.jpg" class="img-fluid rounded profile-img" alt="Foto Profil">
                </div>
                <div class="col-md-7">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title">Abdurrahman Al Fatih</h3>
                            <p class="card-text">Halo! Saya adalah seorang mahasiswa Teknik Informatika yang memiliki antusiasme tinggi dalam mengeksplorasi dunia pengembangan web. Saat ini, saya sedang mendalami integrasi antara struktur Bootstrap dan logika PHP untuk menciptakan antarmuka yang tidak hanya menarik secara visual, tetapi juga fungsional secara sistem.</p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Bidang:</strong> Web Development</li>
                                <li class="list-group-item"><strong>Keahlian:</strong> HTML, CSS, PHP, Bootstrap</li>
                                <li class="list-group-item"><strong>Target:</strong> Menyelesaikan tugas dengan desain responsif dan fungsional.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <?php elseif ($page === 'about'): ?>
            <div class="accordion" id="aboutAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">Hobby</button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#aboutAccordion">
                        <div class="accordion-body">Saya suka membaca, membuat proyek kecil dengan PHP, dan bermain game mobile bersama teman.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">Favorite Menu</button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#aboutAccordion">
                        <div class="accordion-body">Menu favorit saya adalah nasi padang dan juga soto betawi, karena dari rempah rempahnya dan juga kuah kaldunya sangat enak.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">Pengalaman Organisasi</button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#aboutAccordion">
                        <div class="accordion-body">Saya pernah menjadi anggota organisasi Senada di kampus dalam bidang agama, membantu mengatur pelatihan dan kegiatan keagamaan.</div>
                    </div>
                </div>
            </div>
        <?php elseif ($page === 'contact'): ?>
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="mb-3 display-4 text-primary"><i class="bi bi-envelope"></i></div>
                            <h5 class="card-title">Email</h5>
                            <p class="card-text">alfatiiiih78@gmail.com</p>
                            <a href="mailto:alfatiiiih78@gmail.com" class="btn btn-outline-primary">Kirim Email</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="mb-3 display-4 text-success"><i class="bi bi-telephone"></i></div>
                            <h5 class="card-title">WhatsApp</h5>
                            <p class="card-text">+62 823 1248 0049</p>
                            <a href="https://wa.me/6282312480049" target="_blank" class="btn btn-outline-success">Chat WA</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="mb-3 display-4 text-info"><i class="bi bi-instagram"></i></div>
                            <h5 class="card-title">Instagram</h5>
                            <p class="card-text">@alfateeih</p>
                            <a href="https://instagram.com/alfateeih" target="_blank" class="btn btn-outline-info">Lihat Instagram</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="mb-3 display-4 text-primary"><i class="bi bi-linkedin"></i></div>
                            <h5 class="card-title">LinkedIn</h5>
                            <p class="card-text">linkedin.com/in/username</p>
                            <a href="https://www.linkedin.com/in/al-fatih-43170536a/" target="_blank" class="btn btn-outline-primary">Kunjungi Profil</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php elseif ($page === 'login'): ?>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Login</h5>
                            <form method="post" action="?action=login">
                                <div class="mb-3">
                                    <label class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Masuk</button>
                            </form>
                            <p class="mt-3"><small>Gunakan <strong>user</strong> / <strong>12345</strong> untuk login.</small></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php elseif ($page === 'level'): ?>
            <?php if (!$auth): ?>
                <div class="alert alert-warning">Silakan login terlebih dahulu untuk mengakses fitur CRUD.</div>
            <?php else: ?>
                <div class="row">
                    <div class="col-md-5">
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-header">Form Level</div>
                            <div class="card-body">
                                <form method="post" action="?action=saveLevel&page=level">
                                    <input type="hidden" name="id" value="<?= $editingLevel ? h($editingLevel['id']) : '0' ?>">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Level</label>
                                        <input type="text" name="name" class="form-control" value="<?= $editingLevel ? h($editingLevel['name']) : '' ?>" required>
                                    </div>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <?php if ($editingLevel): ?><a href="?page=level" class="btn btn-secondary ms-2">Batal</a><?php endif; ?>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="table-responsive shadow-sm rounded">
                            <table class="table table-striped table-hover mb-0">
                                <thead class="table-primary"><tr><th>ID</th><th>Nama</th><th>Aksi</th></tr></thead>
                                <tbody>
                                    <?php foreach ($levels as $level): ?>
                                        <tr>
                                            <td><?= h($level['id']) ?></td>
                                            <td><?= h($level['name']) ?></td>
                                            <td>
                                                <a href="?page=level&edit=<?= h($level['id']) ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                                                <a href="?action=deleteLevel&page=level&id=<?= h($level['id']) ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus level ini?')">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php elseif ($page === 'studies'): ?>
            <?php if (!$auth): ?>
                <div class="alert alert-warning">Silakan login terlebih dahulu untuk mengakses fitur CRUD.</div>
            <?php else: ?>
                <div class="row">
                    <div class="col-md-5">
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-header">Form Studies</div>
                            <div class="card-body">
                                <form method="post" action="?action=saveStudy&page=studies">
                                    <input type="hidden" name="id" value="<?= $editingStudy ? h($editingStudy['id']) : '0' ?>">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Sekolah</label>
                                        <input type="text" name="nama" class="form-control" value="<?= $editingStudy ? h($editingStudy['nama']) : '' ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Level</label>
                                        <select name="idlevel" class="form-select" required>
                                            <option value="">Pilih level</option>
                                            <?php foreach ($levels as $level): ?>
                                                <option value="<?= h($level['id']) ?>" <?= $editingStudy && $editingStudy['idlevel'] == $level['id'] ? 'selected' : '' ?>><?= h($level['name']) ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Keterangan</label>
                                        <textarea name="keterangan" class="form-control" rows="3"><?= $editingStudy ? h($editingStudy['keterangan']) : '' ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tahun Lulus</label>
                                        <input type="text" name="tahun_lulus" class="form-control" value="<?= $editingStudy ? h($editingStudy['tahun_lulus']) : '' ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">URL Foto Sekolah</label>
                                        <input type="text" name="foto_sekolah" class="form-control" value="<?= $editingStudy ? h($editingStudy['foto_sekolah']) : '' ?>">
                                    </div>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <?php if ($editingStudy): ?><a href="?page=studies" class="btn btn-secondary ms-2">Batal</a><?php endif; ?>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="table-responsive shadow-sm rounded">
                            <table class="table table-striped table-hover mb-0 align-middle">
                                <thead class="table-primary"><tr><th>ID</th><th>Sekolah</th><th>Level</th><th>Tahun</th><th>Aksi</th></tr></thead>
                                <tbody>
                                    <?php foreach ($studies as $study): ?>
                                        <tr>
                                            <td><?= h($study['id']) ?></td>
                                            <td><?= h($study['nama']) ?></td>
                                            <td><?= h($levels[$study['idlevel']]['name'] ?? 'Tidak ada') ?></td>
                                            <td><?= h($study['tahun_lulus']) ?></td>
                                            <td>
                                                <a href="?page=studies&edit=<?= h($study['id']) ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                                                <a href="?action=deleteStudy&page=studies&id=<?= h($study['id']) ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus data studi ini?')">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <div class="alert alert-secondary">Halaman tidak ditemukan. Silakan pilih menu di samping.</div>
        <?php endif; ?>
    </div>
</div>
