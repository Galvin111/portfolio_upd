# Design System Specification: Cinematic Instrumentation

## 1. Overview & Creative North Star: "The Celestial Observer"
This design system is not a standard interface; it is a high-fidelity bridge between the user and the infinite. We move away from the "web-page" paradigm toward a **Cinematic HUD (Heads-Up Display)**. The North Star for this system is **"The Celestial Observer"**—a philosophy that treats every screen as a precision instrument looking into the void.

To break the "template" look, we utilize **Intentional Asymmetry**. Large blocks of text should be offset by micro-data points (coordinates, telemetry strings). We embrace **Negative Space as the "Void"**, allowing the deep obsidian background to breathe, making the glowing elements feel like distant stars or critical mission data. 

### Creative Principles:
*   **Precision over Decoration:** Every line and detail must look functional, like a readout on a spacecraft.
*   **Atmospheric Depth:** Use layered glass and light bleeds to simulate the three-dimensionality of space.
*   **Intentional Friction:** High-contrast typography and scan-line textures create a sense of advanced, specialized technology.

---

## 2. Colors & Surface Architecture

The palette is rooted in the darkness of the cosmos, punctuated by the high-energy light of an accretion disk and the cold glow of distant nebulae.

### The Palette (Material Design 3 Mapping)
*   **Background / Surface:** `#131313` (The deep void)
*   **Primary (Event Horizon Amber):** `#FFD7A9` | Container: `#FFB347`
*   **Secondary (Nebula Teal):** `#46EAED` | Container: `#00CDD0`
*   **Surface Containers:** Range from `#0E0E0E` (Lowest) to `#353534` (Highest)

### The "No-Line" Rule
Traditional 1px solid borders are strictly prohibited for defining sections. Structure must be achieved through:
1.  **Tonal Transitions:** Moving from `surface` to `surface-container-low` to define a sidebar.
2.  **Light Bleeds:** Using a subtle `primary` or `secondary` glow at the edge of a container to suggest a boundary.

### Surface Hierarchy & Nesting
Treat the UI as a physical stack of glass panels. 
*   **Root Level:** `surface` (#131313).
*   **Nested Modules:** Place `surface-container-lowest` cards inside a `surface-container-low` section to create a "sunken" instrumentation look. 
*   **Glassmorphism:** For floating HUD elements, use `surface-variant` at 40% opacity with a `20px` backdrop-blur. This allows the "nebula" colors of the background to bleed through, creating an integrated, cinematic feel.

### Signature Textures
Apply a subtle 2% noise grain or a 2px horizontal scan-line overlay (at 5% opacity) to all `surface-container-highest` elements to mimic CRT instrumentation.

---

## 3. Typography: Technical Elegance

We pair the geometric precision of **Space Grotesk** with the humanist clarity of **Manrope**.

*   **Display & Headlines (Space Grotesk):** These are your "Readouts." Use `display-lg` (3.5rem) for hero moments. The wide apertures and technical feel of Space Grotesk should be used for data headers and primary navigation.
*   **Body & Titles (Manrope):** High-readability sans-serif. Use `body-md` for the bulk of descriptive text. It provides a necessary "human" balance to the cold, technical environment.
*   **Labels (The "HUD" Font):** Use `label-md` (0.75rem) in Space Grotesk for micro-copy, coordinates, or status indicators. Always use `uppercase` with `0.1em` letter spacing for these elements to emphasize the instrumental vibe.

---

## 4. Elevation & Depth: Tonal Layering

Shadows do not exist in the vacuum of space—only light and its absence.

*   **The Layering Principle:** Instead of shadows, use "Inner Glows." A container should have a 0.5px `outline-variant` at 20% opacity to catch the "light" of the UI. 
*   **Ambient Shadows:** If a card must float, use a large `48px` blur with a `4%` opacity of the `primary-fixed-dim` (Amber) color. This mimics light scattering from a glowing display rather than a generic grey shadow.
*   **The "Ghost Border":** For buttons or inputs, use a `1px` border of `outline-variant` at `15%` opacity. It should feel like a wireframe, barely there until interacted with.

---

## 5. Components

### Buttons
*   **Primary:** Solid `primary-container` (#FFB347) with `on-primary` text. No rounded corners (`0px`).
*   **Secondary (The HUD Look):** Transparent background, `1px` Ghost Border, with text in `secondary` (Teal).
*   **Hover State:** Increase the `backdrop-filter: brightness(1.2)` and add a subtle `2px` outer glow of the button's accent color.

### Inputs & Fields
*   **Visual Style:** Bottom-border only or a "bracket" style (small L-shapes at the corners). 
*   **Focus State:** The border glows with `secondary` (Teal), and a micro-label appears in the top-right corner with "SCANNING..." or "INPUT_ACTIVE" text in `label-sm`.

### Cards & Lists
*   **No Dividers:** Separate list items using vertical spacing and `surface` shifts. 
*   **Telemetry Details:** Every card should have a small "serial number" or "coordinate" (e.g., `40.7128° N`) in the corner using `label-sm` to maintain the space-instrumentation theme.

### Additional Component: "The Data Streamer"
A specialized component for this system—a thin, vertical line that slowly pulses, used to separate high-level metadata from main content. It uses a gradient from `secondary` to transparent.

---

## 6. Do's and Don'ts

### Do:
*   **Use 0px Border Radius:** This system is built on precision; curves break the "instrumentation" feel.
*   **Embrace Monospace-adjacent Spacing:** Use tabular figures for numbers so they align perfectly in columns like a data sheet.
*   **Layering over Bordering:** Use a `surface-container-highest` panel on a `surface-dim` background to create separation.

### Don't:
*   **Don't use pure white (#FFFFFF):** It is too harsh. Use `on-surface` (#E5E2E1) for a softer, more cinematic high-light.
*   **Don't use standard "Drop Shadows":** They feel earthy and heavy. Use glows and blurs instead.
*   **Don't use icons with rounded caps:** Choose or modify icons to have sharp, 90-degree angles to match the typography.
*   **No 100% Opaque Borders:** This kills the "Glassmorphism" effect. Always use reduced opacity for outlines.