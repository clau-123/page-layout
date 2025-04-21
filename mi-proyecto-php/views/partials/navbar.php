<nav class="top-navbar">
    <div class="navbar-start">
        <button id="sidebar-toggle" class="menu-toggle">
            <i class="fas fa-bars"></i>
        </button>
    </div>
    
    <div class="navbar-end">
        <div class="navbar-item">
            <div class="notifications">
                <i class="far fa-bell"></i>
                <span class="badge">3</span>
            </div>
        </div>
        <div class="navbar-item dropdown">
            <button class="profile-button">
                <img  src="http://res.cloudinary.com/dghwojbpc/image/upload/v1745033128/employee/ylvqrsb3oev7fimio5u4.jpg" class="avatar">
                <span><?php echo htmlspecialchars($_SESSION['user'] ?? 'Usuario'); ?></span>
                <i class="fas fa-chevron-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="/profile"><i class="fas fa-user"></i> Perfil</a>
                <a href="/settings"><i class="fas fa-cog"></i> Configuración</a>
                <hr>
                <a href="/logout" class="logout"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
            </div>
        </div>
    </div>
</nav>
