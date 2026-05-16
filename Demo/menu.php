<?php
include 'koneksi.php';
session_start();

$bootswatchCss = 'https://cdn.jsdelivr.net/npm/bootswatch@5.3.2/dist/lux/bootstrap.min.css';
$bootstrapIcons = 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css';

function h($value) {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

$auth = $_SESSION['user'] ?? null;
// Ambil data levels dari Database
$queryLevel = mysqli_query($conn, "SELECT * FROM levels");
$levels = [];
while ($row = mysqli_fetch_assoc($queryLevel)) {
    $levels[$row['id']] = $row;
}

// Ambil data studies dari Database
$queryStudy = mysqli_query($conn, "SELECT * FROM studies");
$studies = [];
while ($row = mysqli_fetch_assoc($queryStudy)) {
    $studies[$row['id']] = $row;
}
$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

$action = $_GET['action'] ?? null;
$page = $_GET['page'] ?? 'home';

if ($action === 'login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    if ($username === 'user' && $password === '12345') {
        $_SESSION['user'] = ['username' => 'user', 'role' => 'Mahasiswa'];
        $_SESSION['flash'] = 'Login berhasil. Selamat datang, ' . $username . '!';
        header('Location: ?page=home');
        exit;
    }
    $_SESSION['flash'] = 'Username atau password salah.';
    header('Location: ?page=login');
    exit;
}

if ($action === 'logout') {
    unset($_SESSION['user']);
    $_SESSION['flash'] = 'Anda berhasil logout.';
    header('Location: ?page=home');
    exit;
}
// --- LOGIKA LEVEL ---
    if ($action === 'saveLevel' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = (int)($_POST['id'] ?? 0);
        $name = mysqli_real_escape_string($conn, trim($_POST['name'] ?? ''));
        
        if ($name !== '') {
            if ($id > 0) {
                // Update ke Database
                mysqli_query($conn, "UPDATE levels SET name='$name' WHERE id=$id");
                $_SESSION['flash'] = 'Level berhasil diperbarui di database.';
            } else {
                // Tambah ke Database
                mysqli_query($conn, "INSERT INTO levels (name) VALUES ('$name')");
                $_SESSION['flash'] = 'Level baru berhasil disimpan ke database.';
            }
        }
        header('Location: ?page=level');
        exit;
    }

    if ($action === 'deleteLevel') {
        $id = (int)($_GET['id'] ?? 0);
        if ($id > 0) {
            mysqli_query($conn, "DELETE FROM levels WHERE id=$id");
            $_SESSION['flash'] = 'Level berhasil dihapus dari database.';
        }
        header('Location: ?page=level');
        exit;
    }

    // --- LOGIKA STUDIES ---
    if ($action === 'saveStudy' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = (int)($_POST['id'] ?? 0);
        $nama = mysqli_real_escape_string($conn, trim($_POST['nama'] ?? ''));
        $idlevel = (int)($_POST['idlevel'] ?? 0);
        $keterangan = mysqli_real_escape_string($conn, trim($_POST['keterangan'] ?? ''));
        $tahun = mysqli_real_escape_string($conn, trim($_POST['tahun_lulus'] ?? ''));
        
        if ($nama !== '' && $idlevel > 0) {
            if ($id > 0) {
                // Update ke Database
                $sql = "UPDATE studies SET nama='$nama', idlevel=$idlevel, keterangan='$keterangan', tahun_lulus='$tahun' WHERE id=$id";
                mysqli_query($conn, $sql);
                $_SESSION['flash'] = 'Data study diperbarui di database.';
            } else {
                // Tambah ke Database
                $sql = "INSERT INTO studies (nama, idlevel, keterangan, tahun_lulus) VALUES ('$nama', $idlevel, '$keterangan', '$tahun')";
                mysqli_query($conn, $sql);
                $_SESSION['flash'] = 'Data study baru berhasil disimpan.';
            }
        }
        header('Location: ?page=studies');
        exit;
    }

    if ($action === 'deleteStudy') {
        $id = (int)($_GET['id'] ?? 0);
        if ($id > 0) {
            mysqli_query($conn, "DELETE FROM studies WHERE id=$id");
            $_SESSION['flash'] = 'Data study berhasil dihapus.';
        }
        header('Location: ?page=studies');
        exit;
    }
    

    if ($action === 'deleteStudy') {
        $id = (int)($_GET['id'] ?? 0);
        if ($id > 0 && isset($studies[$id])) {
            unset($studies[$id]);
            $_SESSION['flash'] = 'Data study berhasil dihapus.';
        }
        header('Location: ?page=studies');
        exit;
    }


$editingLevel = null;
if ($page === 'level' && isset($_GET['edit']) && isset($levels[(int)$_GET['edit']])) {
    $editingLevel = $levels[(int)$_GET['edit']];
}

$editingStudy = null;
if ($page === 'studies' && isset($_GET['edit']) && isset($studies[(int)$_GET['edit']])) {
    $editingStudy = $studies[(int)$_GET['edit']];
}

function pageTitle($page) {
    return match ($page) {
        'about' => 'About Me',
        'contact' => 'Contact Me',
        'level' => 'Level CRUD',
        'studies' => 'Studies CRUD',
        'login' => 'Login',
        default => 'Home',
    };
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tugas 1 - Personal Home Page</title>
    <link rel="stylesheet" href="<?= $bootswatchCss ?>">
    <link rel="stylesheet" href="<?= $bootstrapIcons ?>">
    <style>
        .sidebar-card { min-height: 420px; }
        .carousel-item img { max-height: 360px; object-fit: cover; width: 100%; }
        .profile-img { max-width: 220px; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="?page=home">Personal Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link <?= $page === 'home' ? 'active' : '' ?>" href="?page=home">Home</a></li>
                <li class="nav-item"><a class="nav-link <?= $page === 'about' ? 'active' : '' ?>" href="?page=about">About Me</a></li>
                <li class="nav-item"><a class="nav-link <?= $page === 'contact' ? 'active' : '' ?>" href="?page=contact">Contact Me</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?= in_array($page, ['level', 'studies']) ? 'active' : '' ?>" href="#" role="button" data-bs-toggle="dropdown">My Studies</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="?page=level">Level</a></li>
                        <li><a class="dropdown-item" href="?page=studies">Studies</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0">
                <?php if (!$auth): ?>
                    <li class="nav-item"><a class="nav-link <?= $page === 'login' ? 'active' : '' ?>" href="?page=login">Login</a></li>
                <?php else: ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userMenu" data-bs-toggle="dropdown"><?= h($auth['username']) ?> <span class="badge bg-warning text-dark"><?= h($auth['role']) ?></span></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                            <li><a class="dropdown-item" href="?page=home">Home</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="?action=logout">Logout</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-4">
    <?php if ($flash): ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <?= h($flash) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>
    <?php include 'header.php'; ?>
    <div class="row">
        <div class="col-lg-3 mb-4"><?php include 'sidebar.php'; ?></div>
        <div class="col-lg-9"><?php include 'main.php'; ?></div>
    </div>
</div>
<?php include 'footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
