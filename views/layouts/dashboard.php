<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="/public/assets/css/dashboard.css">
    <?php if (isset($additionalCss)): ?>
        <link rel="stylesheet" type="text/css" href="/public/assets/css/<?php echo $additionalCss; ?>.css">
    <?php endif; ?>
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <?php include __DIR__ . '/../partials/sidebar.php'; ?>
        </aside>
        
        <main class="main-content">
            <?php include __DIR__ . '/../partials/navbar.php'; ?>
            
            <div class="content">
                <?php echo $content ?? ''; ?>
            </div>
        </main>
    </div>

    <script type="text/javascript" src="/public/assets/js/dashboard.js"></script>
</body>
</html>
