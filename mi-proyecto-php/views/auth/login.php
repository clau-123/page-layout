<!DOCTYPE html>
<html>
<head>
    <title>Login - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/public/assets/css/auth.css">
</head>
<body>
    <div class="auth-container">
        <div class="carousel-section">
            <div id="loginCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://picsum.photos/800/600?random=1" alt="Image 1">
                    </div>
                    <div class="carousel-item">
                        <img src="https://picsum.photos/800/600?random=2" alt="Image 2">
                    </div>
                    <div class="carousel-item">
                        <img src="https://picsum.photos/800/600?random=3" alt="Image 3">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#loginCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#loginCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="login-section">
            <div class="login-container">
                <div class="logo-area">
                    <img src="http://res.cloudinary.com/dpfcpo5me/image/upload/v1745182759/m9q50z2w3l4rxer2snzd.png" 
                         alt="Logo" 
                         onerror="this.src='data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%2280%22 height=%2280%22><rect width=%2280%22 height=%2280%22 fill=%22%23007bff%22/></svg>'">
                    <h4 class="mb-4">Iniciar Sesión</h4>
                </div>

                <?php if (isset($_GET['error'])): ?>
                    <div class="error-message">
                        Usuario o contraseña incorrectos
                    </div>
                <?php endif; ?>

                <form action="/login" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Usuario</label>
                        <input type="text" class="form-control" id="username" name="username" required autocomplete="off">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-2">
                        Iniciar Sesión
                    </button>
                </form>
                
                <div class="text-center mt-4">
                    <small class="text-muted">© AD</small>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
