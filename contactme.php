<?php
// === CONTROLLER BLOCK ===
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$isAdmin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';

// Navigation Variables
$navHome = 'Overview';
$navAbout = 'About Me';
$navWorks = 'Works';
$navPortfolio = 'Portfolio';
$navContact = 'Contact';
$navAdmin = 'Contact Logs';

$homeLink = 'welcomepage.php';
$aboutLink = 'aboutme.php';
$worksLink = 'works.php';
$portfolioLink = 'portfolio.php';
$contactLink = 'contactme.php';
$adminLink = 'admin.php';

// Form Core
$pageTitle = "Galvin Venturina | Contact";
$tagLabel = "COMMUNICATIONS";
$headline = "Direct Access.";
$subHeadline = "Establish contact. Skip the administrative overhead and connect directly with dedicated expertise.";

$lbl_name = "Full Name / Organization";
$lbl_email = "Email Address";
$lbl_message = "Inquiry Details";
$lbl_submit = "Submit Inquiry";

$lbl_insta = "Instagram (vin_vntrn)";
$lnk_insta = "https://instagram.com/vin_vntrn"; 

$feedbackMsg = "";
$feedbackColor = "";

// Form Processing
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postName = trim($_POST['visitor_name'] ?? '');
    $postEmail = trim($_POST['visitor_email'] ?? '');
    $postMessage = trim($_POST['visitor_message'] ?? '');
    $postCaptcha = (int)($_POST['visitor_captcha'] ?? 0);

    if (!isset($_SESSION['captcha_answer']) || $postCaptcha !== $_SESSION['captcha_answer']) {
        $feedbackMsg = "Authentication failed: Captcha value is incorrect.";
        $feedbackColor = "#ff4444"; 
    } elseif (empty($postName) || empty($postEmail) || empty($postMessage)) {
        $feedbackMsg = "Validation error: Missing required fields.";
        $feedbackColor = "#ff4444";
    } else {
        // MYSQL DATABASE INTEGRATION
        require_once 'db.php';
        
        $stmt = $pdo->prepare("INSERT INTO contacts (Name, Email, Message) VALUES (?, ?, ?)");
        if ($stmt->execute([$postName, $postEmail, $postMessage])) {
            $feedbackMsg = "Your inquiry has been stored securely in the database.";
            $feedbackColor = "#00f3ff"; 
        } else {
            $feedbackMsg = "System Error: Unable to store payload.";
            $feedbackColor = "#ff4444";
        }
    }
}

$num1 = rand(1, 10);
$num2 = rand(1, 10);
$_SESSION['captcha_answer'] = $num1 + $num2;
$lbl_captcha = "Verification: Sum of " . $num1 . " and " . $num2;

?>
<!-- === VIEW BLOCK === -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <link rel="stylesheet" href="index.css">
    
    <!-- Star Canvas -->
    <script src="canvas.js" defer></script>
</head>
<body>
    <div class="bg-subtle"></div>
    <!-- QUANTUM FLUID CANVAS -->
    <canvas id="quantum-canvas"></canvas>

    <nav class="glass-nav">
        <div class="nav-brand">Galvin Venturina</div>
        <div class="nav-links">
            <a href="<?= htmlspecialchars($homeLink) ?>"><?= htmlspecialchars($navHome) ?></a>
            <a href="<?= htmlspecialchars($aboutLink) ?>"><?= htmlspecialchars($navAbout) ?></a>
            <a href="<?= htmlspecialchars($worksLink) ?>"><?= htmlspecialchars($navWorks) ?></a>
            <a href="<?= htmlspecialchars($portfolioLink) ?>"><?= htmlspecialchars($navPortfolio) ?></a>
            <a href="<?= htmlspecialchars($contactLink) ?>"><?= htmlspecialchars($navContact) ?></a>
            <?php if ($isAdmin): ?>
                <a href="<?= htmlspecialchars($adminLink) ?>"><?= htmlspecialchars($navAdmin) ?></a>
            <?php endif; ?>
            <a href="logout.php" style="color: var(--accent-purple); font-weight: 800;">Logout</a>
        </div>
    </nav>

    <div class="container" style="padding-top: 140px;">
        <div class="grid-2">
            
            <div>
                <div class="label-md"><?= htmlspecialchars($tagLabel) ?></div>
                <h1 class="headline-lg">Direct <span class="text-accent">Access</span>.</h1>
                <p class="p-body"><?= htmlspecialchars($subHeadline) ?></p>
                
                <div class="divider"></div>

                <div class="label-md">Direct Social Interface</div>
                <a href="<?= htmlspecialchars($lnk_insta) ?>" target="_blank" class="btn btn-secondary">
                    <?= htmlspecialchars($lbl_insta) ?>
                </a>
            </div>

            <div class="panel">
                <?php if (!empty($feedbackMsg)): ?>
                    <div style="margin-bottom: 32px; border: 1px solid <?= htmlspecialchars($feedbackColor) ?>; padding: 16px; border-radius: 8px; color: <?= htmlspecialchars($feedbackColor) ?>; font-weight: 600;">
                        System: <?= htmlspecialchars($feedbackMsg) ?>
                    </div>
                <?php endif; ?>

                <form action="<?= htmlspecialchars($contactLink) ?>" method="POST">
                    <div class="form-group">
                        <label for="visitor_name"><?= htmlspecialchars($lbl_name) ?></label>
                        <input type="text" id="visitor_name" name="visitor_name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="visitor_email"><?= htmlspecialchars($lbl_email) ?></label>
                        <input type="email" id="visitor_email" name="visitor_email" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="visitor_message"><?= htmlspecialchars($lbl_message) ?></label>
                        <textarea id="visitor_message" name="visitor_message" class="form-control" rows="4" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="visitor_captcha"><?= htmlspecialchars($lbl_captcha) ?></label>
                        <input type="number" id="visitor_captcha" name="visitor_captcha" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary" style="width: 100%;">
                        <?= htmlspecialchars($lbl_submit) ?>
                    </button>
                </form>
            </div>

        </div>
    </div>

</body>
</html>
