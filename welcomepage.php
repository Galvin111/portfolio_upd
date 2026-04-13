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

// Professional Content Update
$pageTitle = "Galvin Venturina | Heroic Minimalism";
$tagLabel = "PORTFOLIO / 2026";
$headline = "Creative Vision. Technical Foundation.";
$subHeadline = "I’m a Computer Science student and Social Media Strategist who bridges the gap between code and creativity. I combine technical discipline with bold marketing to turn big ideas into functional, high-growth digital experiences.";

$ctaPrimary = "View My Identity";
$ctaSecondary = "Message me";

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

    <!-- HEROIC MINIMALISM: QUANTUM FLUID CANVAS -->
    <canvas id="quantum-canvas"></canvas>

    <nav class="glass-nav">
        <div class="nav-brand">
            Galvin Venturina
        </div>
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

    <div class="container" style="min-height: 100vh; display: flex; align-items: center; padding-top: 120px;">
        <div style="max-width: 900px;">
            <div class="label-md"><?= htmlspecialchars($tagLabel) ?></div>
            <h1 class="display-lg">Creative<span class="text-accent"> Vision</span>.<br> Technical<span
                    class="text-accent"> Foundation</span>.</h1>
            <p class="p-body"><?= htmlspecialchars($subHeadline) ?></p>

            <div style="display: flex; gap: 20px; margin-top: 40px;">
                <a href="<?= htmlspecialchars($aboutLink) ?>"
                    class="btn btn-primary"><?= htmlspecialchars($ctaPrimary) ?></a>
                <a href="<?= htmlspecialchars($contactLink) ?>"
                    class="btn btn-secondary"><?= htmlspecialchars($ctaSecondary) ?></a>
            </div>
        </div>
    </div>

    <!-- RECENT WORKS GALLERY (SCROLL REVEAL) -->
    <div class="container" style="padding-bottom: 120px;">
        <div class="scroll-reveal">
            <h2 class="headline-lg" style="margin-bottom: 8px;">Selected <span class="text-accent">Snapshots.</span>
            </h2>
            <p class="p-body" style="margin-bottom: 40px;">A glimpse into continuous execution.</p>

            <div class="gallery-grid">
                <!-- Gallery Item 1 -->
                <div class="img-placeholder ratio-1-1 scroll-reveal" style="transition-delay: 0.1s;">
                    <img src="image1.png" style=" width: 100%; height: 100%; object-fit: cover;" alt="My Work">
                </div>
                <!-- Gallery Item 2 -->
                <div class="img-placeholder ratio-1-1 scroll-reveal" style="transition-delay: 0.2s;">
                    <img src="image2.png" style=" width: 100%; height: 100%; object-fit: cover;" alt="My Work">
                </div>
                <!-- Gallery Item 3 -->
                <div class="img-placeholder ratio-1-1 scroll-reveal" style="transition-delay: 0.3s;">
                    <img src="image3.PNG" style=" width: 100%; height: 100%; object-fit: cover;" alt="My Work">
                </div>
                <!-- Gallery Item 4 -->
                <div class="img-placeholder ratio-1-1 scroll-reveal" style="transition-delay: 0.4s;">
                    <img src="image4.png" style=" width: 100%; height: 100%; object-fit: cover;" alt="My Work">
                </div>
            </div>
        </div>
    </div>

    <script>
        // Intersection Observer for Scroll Reveal
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.15
        };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        document.querySelectorAll('.scroll-reveal').forEach(el => {
            observer.observe(el);
        });
    </script>
</body>

</html>