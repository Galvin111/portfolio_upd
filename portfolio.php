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

$pageTitle = "Galvin Venturina | Portfolio Gallery";
$tagLabel = "PORTFOLIO";
$headline = "Visual Archive.";
$subHeadline = "Curated visual mediums, video presentations, and institutional social feeds.";

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

    <div class="container" style="padding-top: 140px; padding-bottom: 120px;">

        <div style="margin-bottom: 60px;">
            <div class="label-md"><?= htmlspecialchars($tagLabel) ?></div>
            <h1 class="headline-lg">Visual <span class="text-accent">Archive</span>.</h1>
            <p class="p-body"><?= htmlspecialchars($subHeadline) ?></p>
        </div>

        <!-- Social Media Integrations -->
        <h2 class="label-md scroll-reveal" style="color: var(--accent-cyan); margin-top: 40px;">Instagram Handles</h2>
        <div class="divider scroll-reveal" style="margin: 16px 0 32px 0;"></div>

        <div class="gallery-grid scroll-reveal">
            <a href="https://instagram.com/hello.lumpia" target="_blank" class="panel"
                style="padding: 32px; text-align: center; border-color: rgba(255,255,255,0.1); cursor: pointer; transition: all 0.3s ease;">
                <div class="title-tag"
                    style="margin-bottom: 16px; color: var(--accent-cyan); border-color: var(--accent-cyan);">MANAGED
                    BRAND</div>
                <h3 style="font-size: 1.5rem; font-weight: 800; color: var(--on-surface);">@hello.lumpia</h3>
            </a>

            <a href="https://instagram.com/gogocurry.nyc" target="_blank" class="panel"
                style="padding: 32px; text-align: center; border-color: rgba(255,255,255,0.1); cursor: pointer; transition: all 0.3s ease;">
                <div class="title-tag"
                    style="margin-bottom: 16px; color: var(--accent-purple); border-color: var(--accent-purple);">
                    MANAGED BRAND</div>
                <h3 style="font-size: 1.5rem; font-weight: 800; color: var(--on-surface);">@gogocurry.nyc</h3>
            </a>
        </div>

        <!-- Videos -->
        <h2 class="label-md scroll-reveal" style="color: var(--accent-cyan); margin-top: 80px;">Video Mediums</h2>
        <div class="divider scroll-reveal" style="margin: 16px 0 32px 0;"></div>

        <div class="gallery-grid scroll-reveal">
            <div class="img-placeholder ratio-16-9">
                <a href="https://drive.google.com/file/d/1hbTnFMc4KUgoop11-51L9XS1vhaldYI8/view?usp=sharing"
                    target="_blank" style="color: inherit;"><img src="thumbnail1.png" alt="video work"></a>
            </div>
            <div class="img-placeholder ratio-16-9">
                <a href="#" style="color: inherit;">VIDEO LINK 02</a>
            </div>
        </div>

        <!-- Photography / General Pictures -->
        <h2 class="label-md scroll-reveal" style="color: var(--accent-purple); margin-top: 80px;">Photography Archive
        </h2>
        <div class="divider scroll-reveal" style="margin: 16px 0 32px 0;"></div>

        <div class="gallery-grid scroll-reveal">
            <div class="img-placeholder ratio-1-1"><img src="image1.png" style=width: 100%; height: 100%; object-fit:
                    cover;" alt="My Work"></div>
            <div class="img-placeholder ratio-1-1">IMAGE 02</div>
            <div class="img-placeholder ratio-1-1">IMAGE 03</div>
            <div class="img-placeholder ratio-1-1">IMAGE 04</div>
            <div class="img-placeholder ratio-1-1">IMAGE 05</div>
            <div class="img-placeholder ratio-1-1">IMAGE 06</div>
        </div>

    </div>

    <script>
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

        document.querySelectorAll('a.panel').forEach(panel => {
            panel.addEventListener('mouseenter', () => panel.style.borderColor = "var(--accent-cyan)");
            panel.addEventListener('mouseleave', () => panel.style.borderColor = "rgba(255,255,255,0.1)");
        });
    </script>
</body>

</html>