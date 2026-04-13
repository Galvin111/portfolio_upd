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

$pageTitle = "Galvin Venturina | Works";
$tagLabel = "PROJECTS";
$headline = "Categorized Endeavors.";
$subHeadline = "Dual focus: Social Media strategy formulation and Software Development architecture.";

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
            <h1 class="headline-lg">Categorized <span class="text-accent">Endeavors</span>.</h1>
            <p class="p-body"><?= htmlspecialchars($subHeadline) ?></p>
        </div>

        <div class="grid-2">
            
            <!-- Category 1: Social Media Works -->
            <div class="panel scroll-reveal" style="transition-delay: 0.1s;">
                <h2 class="label-md" style="color: var(--accent-cyan);">01. Social Media Works</h2>
                <div class="divider" style="margin: 24px 0;"></div>
                
                <p class="p-body" style="font-size: 1rem; margin-bottom: 24px;">
                    Strategic disruption in digital marketing. Growth and outreach management focusing on robust <span class="text-accent">KPI scaling</span> and measurable engagements.
                </p>

                <div class="gallery-grid" style="grid-template-columns: 1fr;">
                    <div class="img-placeholder ratio-16-9">
                        SOCIAL CAMPAIGN METRICS
                    </div>
                    <div class="img-placeholder ratio-16-9">
                        BRAND LAUNCH PLAN
                    </div>
                </div>
            </div>

            <!-- Category 2: Software Development Works -->
            <div class="panel scroll-reveal" style="transition-delay: 0.2s;">
                <h2 class="label-md" style="color: var(--accent-purple);">02. Software Development Works</h2>
                <div class="divider" style="margin: 24px 0;"></div>
                
                <p class="p-body" style="font-size: 1rem; margin-bottom: 24px;">
                    Engineering custom programmatic solutions. Developing highly-structured, minimalistic architectures designed for <span class="text-accent">efficiency</span> and aesthetics.
                </p>

                <div class="gallery-grid" style="grid-template-columns: 1fr;">
                    <div class="img-placeholder ratio-16-9">
                        SYSTEM ARCHITECTURE
                    </div>
                    <div class="img-placeholder ratio-16-9">
                        DATABASE DESIGN
                    </div>
                </div>
            </div>

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
    </script>
</body>
</html>
