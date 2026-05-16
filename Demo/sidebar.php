<div class="card sidebar-card shadow-sm">
    <div class="card-body">
        <h5 class="card-title">Menu Cepat</h5>
        <div class="list-group">
            <a href="?page=home" class="list-group-item list-group-item-action<?= $page === 'home' ? ' active' : '' ?>">Home</a>
            <a href="?page=about" class="list-group-item list-group-item-action<?= $page === 'about' ? ' active' : '' ?>">About Me</a>
            <a href="?page=contact" class="list-group-item list-group-item-action<?= $page === 'contact' ? ' active' : '' ?>">Contact Me</a>
            <a href="?page=level" class="list-group-item list-group-item-action<?= $page === 'level' ? ' active' : '' ?>">Level</a>
            <a href="?page=studies" class="list-group-item list-group-item-action<?= $page === 'studies' ? ' active' : '' ?>">Studies</a>
            <?php if (!$auth): ?>
                <a href="?page=login" class="list-group-item list-group-item-action<?= $page === 'login' ? ' active' : '' ?>">Login</a>
            <?php endif; ?>
        </div>
    </div>
</div>
