<?php
session_start();

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'admin') {
        if ($_POST['admin_pass'] === 'password') {
            $_SESSION['role'] = 'admin';
            header("Location: welcomepage.php");
            exit();
        } else {
            $error = "Incorrect Password!";
        }
    }
}

if (isset($_GET['role']) && $_GET['role'] === 'visitor') {
    $_SESSION['role'] = 'visitor';
    header("Location: welcomepage.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Role | Welcome</title>
    <link rel="stylesheet" href="index.css">
    <!-- Star Canvas -->
    <script src="canvas.js" defer></script>
</head>
<body style="display: flex; justify-content: center; align-items: center; min-height: 100vh;">
    <!-- QUANTUM FLUID CANVAS -->
    <canvas id="quantum-canvas"></canvas>

    <div class="panel" style="text-align: center; max-width: 500px; width: 100%; position: relative; z-index: 10;">
        <div class="label-md">AUTHENTICATION</div>
        <h1 class="headline-lg" style="margin-bottom: 40px;">Select <span class="text-accent">Access Level</span></h1>

        <?php if (!empty($error)): ?>
            <div style="background: rgba(255, 68, 68, 0.1); border: 1px solid #ff4444; color: #ff4444; padding: 12px; border-radius: 8px; margin-bottom: 24px; font-weight: 600;">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <div style="display: flex; flex-direction: column; gap: 40px;">
            <a href="index.php?role=visitor" class="btn btn-primary" style="width: 100%; text-transform: uppercase;">Enter as Visitor</a>
            
            <div>
                <div class="divider" style="margin: 0 0 24px 0;"></div>
                <form method="POST" action="index.php" style="display: flex; flex-direction: column; gap: 16px;">
                    <input type="password" name="admin_pass" class="form-control" placeholder="Admin Password" required style="text-align: center;">
                    <button type="submit" name="action" value="admin" class="btn btn-secondary" style="width: 100%; text-transform: uppercase;">Login as Admin</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
