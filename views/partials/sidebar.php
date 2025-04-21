<div class="sidebar-content">
    <div class="sidebar-header">
        <img src="http://res.cloudinary.com/dghwojbpc/image/upload/v1745033353/configuration/muzolgusshhtcfymc9cg.png" alt="Logo" class="sidebar-logo">
    </div>
    
    <nav class="sidebar-nav">
        <a href="/dashboard" class="nav-item <?php echo ($_SERVER['REQUEST_URI'] === '/dashboard') ? 'active' : ''; ?>">
            <i class="fas fa-home"></i>
            <span>Inicio</span>
        </a>
        <a href="/products" class="nav-item <?php echo (strpos($_SERVER['REQUEST_URI'], 'products') !== false) ? 'active' : ''; ?>">
            <i class="fas fa-box"></i>
            <span>Productos</span>
        </a>
        <a href="/orders" class="nav-item <?php echo (strpos($_SERVER['REQUEST_URI'], 'orders') !== false) ? 'active' : ''; ?>">
            <i class="fas fa-shopping-cart"></i>
            <span>Órdenes</span>
        </a>
        <a href="/users" class="nav-item <?php echo (strpos($_SERVER['REQUEST_URI'], 'users') !== false) ? 'active' : ''; ?>">
            <i class="fas fa-users"></i>
            <span>Usuarios</span>
        </a>
    </nav>
</div>
