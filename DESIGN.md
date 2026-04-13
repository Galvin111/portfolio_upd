# Design System Specification: The Technical Creative

## 1. Overview & Creative North Star
**Creative North Star: "The Digital Architect’s Atelier"**

This design system is built to bridge the perceived gap between the logical rigor of Computer Science and the fluid, expressive world of Social Media Management. It rejects the "template" aesthetic in favor of a high-end editorial experience. 

We achieve this through **Intentional Asymmetry** and **Tonal Depth**. By treating the browser as a gallery wall rather than a grid of boxes, we use massive whitespace to signal confidence and professional "breathing room." The system moves beyond standard UI by layering surfaces instead of drawing lines, creating a digital environment that feels curated, bespoke, and authoritative.

---

## 2. Colors & Surface Architecture

The palette centers on a "High-Contrast Minimalist" approach. We use a deep teal-leaning primary (`#256368`) to represent technical depth, balanced by a sophisticated terracotta tertiary (`#8b4823`) for creative highlights.

### The "No-Line" Rule
**Explicit Instruction:** Designers are prohibited from using 1px solid borders to define sections or containers. Traditional lines are "noise." Boundaries must be established through:
1.  **Background Shifts:** Transitioning from `surface` (#f9f9f9) to `surface-container-low` (#f3f3f3).
2.  **Negative Space:** Using the spacing scale to create distinct visual islands.

### Surface Hierarchy & Nesting
Treat the UI as a series of physical layers. We use Material-style surface tiers to define importance:
-   **Base Layer:** `surface` (#f9f9f9) for the overall page background.
-   **Sectional Layer:** `surface-container-low` (#f3f3f3) for secondary content areas (e.g., a "Skills" sidebar).
-   **Interactive Layer:** `surface-container-lowest` (#ffffff) for primary cards and input fields to make them "pop" against the slightly off-white base.

### The "Glass & Gradient" Rule
To elevate the portfolio above a standard flat design:
-   **Navigation & Floating Panels:** Use `surface-container-lowest` with an 80% opacity and a `20px` backdrop-blur.
-   **Subtle Soul:** Apply a linear gradient (Top-Left to Bottom-Right) from `primary` (#256368) to `primary-container` (#417c81) on high-impact CTAs to avoid a "flat" corporate feel.

---

## 3. Typography: The Editorial Voice

We utilize a "High-Contrast Scale" to distinguish between the technical (Inter) and the characterful (Space Grotesk).

-   **Display & Headlines (Space Grotesk):** This geometric sans-serif provides a "tech-forward" yet expressive personality. Use `display-lg` for hero statements with tight letter-spacing (-0.02em) to mimic high-fashion editorial layouts.
-   **Titles & Body (Inter):** Inter is used for technical descriptions and UI labels. It provides maximum readability and a neutral "utility" feel that balances the personality of the headlines.
-   **Hierarchy Hint:** Always pair a `headline-lg` (Space Grotesk) with a `label-md` (Inter) in all-caps with 0.1em letter-spacing to create a "Technical Tag" look above section titles.

---

## 4. Elevation & Depth

### The Layering Principle
Depth is achieved by stacking tones. Place a `surface-container-lowest` (#ffffff) card on top of a `surface-container-low` (#f3f3f3) background. This creates a "soft lift" that feels architectural rather than digital.

### Ambient Shadows
When an element must float (like a "Project Details" modal):
-   **Color:** Use a 6% opacity version of `on-surface` (#1a1c1c).
-   **Blur:** Use a `32px` to `48px` blur with a `12px` Y-offset. This mimics natural light falling on a physical portfolio.

### The "Ghost Border" Fallback
If a boundary is required for accessibility (e.g., in a high-density data table), use a **Ghost Border**:
-   **Stroke:** 1px.
-   **Token:** `outline-variant` (#bdc9c8) at **15% opacity**. Never use 100% opacity for borders.

---

## 5. Components

### Buttons
-   **Primary:** Background: `primary` (#256368) gradient; Text: `on-primary` (#ffffff). Shape: `Rounded-md` (0.75rem).
-   **Secondary:** Background: `secondary-container` (#d7e4f1); Text: `on-secondary-container` (#5a6671).
-   **Tertiary (The "Creative" Action):** Background: `transparent`; Text: `tertiary` (#8b4823); Weight: Semi-bold with a bottom-border of 2px using `tertiary-fixed` (#ffdbcb).

### Project Cards
-   **Structure:** No borders. Background: `surface-container-lowest` (#ffffff). 
-   **Interaction:** On hover, the card should transition to `surface-container-highest` (#e2e2e2) or apply the Ambient Shadow.
-   **Typography:** The "Tech Stack" should be displayed as `label-sm` chips.

### Chips (Technical Tags)
-   **Style:** Minimalist. Background: `surface-variant` (#e2e2e2); Text: `on-surface-variant` (#3e4949). Radius: `full`. No icons, just clean typography.

### Input Fields
-   **Base:** `surface-container-low` (#f3f3f3). 
-   **Focus State:** The background shifts to `surface-container-lowest` (#ffffff) with a 1px "Ghost Border" using the `primary` color at 40% opacity.

### Featured Content (The "Social Manager" Gallery)
-   **Style:** Use intentional asymmetry. Instead of a 3-column grid, use a 2-column masonry layout where one side is offset by `40px` vertically. This breaks the "CS Student" rigidness with "Social Media" flair.

---

## 6. Do's and Don'ts

### Do
-   **Do** use massive margins. If you think there is enough whitespace, add 24px more.
-   **Do** use `display-lg` typography for impact, but keep the actual copy concise.
-   **Do** mix the primary and tertiary colors in a single view to show the "Dual Identity" of the user.

### Don't
-   **Don't** use black (#000000) for text. Always use `on-surface` (#1a1c1c) to maintain a premium, softer contrast.
-   **Don't** use divider lines between list items. Use `16px` of vertical space instead.
-   **Don't** use standard "Drop Shadows." Only use the Ambient Shadow specification provided in Section 4.
-   **Don't** use sharp corners. Every element must adhere to the `0.75rem` (md) to `1rem` (lg) roundedness scale to keep the tech-creative bridge feeling approachable.