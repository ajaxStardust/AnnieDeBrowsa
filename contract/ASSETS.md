<!--
═══════════════════════════════════════════════════════════════════
                         ASSETS.md
              The Resource Law — Presentation & Binary Invariants
═══════════════════════════════════════════════════════════════════

PROJECT CONTEXT:
────────────────
This file governs static resources, visual assets, binary blobs, 
localization databases, and design variables. It is the fourth 
governing artifact in the CSC framework.

CRITICAL INVARIANTS — DO NOT BREAK THESE:
──────────────────────────────────────────

1. THIS FILE OWNS RESOURCE LAW ONLY.
   • Visual assets, binary blobs, localization → this file.
   • Code invariants and boundaries → CONTRACT.md.
   • Operational file paths → QUICKSTART.md.
   • DO NOT add architectural laws here.
   • BREAKING THIS scatters resource truth across artifacts.

2. ASSET REFERENCES MUST BE ACCURATE.
   • Every asset listed must exist at the specified path.
   • If an asset is removed, update this file in the same change.
   • DO NOT leave placeholder asset references.
   • BREAKING THIS causes agents to probe non-existent resources.

3. DESIGN VARIABLES MUST BE VERSIONED.
   • Color palettes, typography scales, spacing systems → this file.
   • DO NOT change design variables without updating all consumers.
   • BREAKING THIS causes visual inconsistency across the application.

KNOWN ISSUES:
─────────────
• This is a template artifact. Adopters should customize the Resource 
  Invariants section below for their specific asset types.

═══════════════════════════════════════════════════════════════════
-->

# ASSETS.md — The Presentation & Binary Invariants (The Resource & Asset Plane)

> **"A system's visual and binary plane is as critical as its logic. Without asset governance, AI agents cannot see the design constraints that humans take for granted."**

## Purpose of This Artifact

In the **contract-style-comments** (CSC) framework, `ASSETS.md` serves as the system's **Resource Law**. While `CONTRACT.md` defines logical invariants, `ASSETS.md` defines the constraints governing static resources, visual assets, binary blobs, localization databases, and design variables.

This artifact addresses the "PBSR Problem" (Pixel-By-Something-Robot) — where AI agents inadvertently break visual consistency, introduce incompatible binary formats, or mishandle localization because the design constraints were never explicitly documented as law.

---

## Required Reading Order

To ensure the agent understands the full system context, this artifact is read after the Triumvirate:

1.  **[CONTRACT.md](CONTRACT.md)**: Establish logical invariants and boundaries.
2.  **[WHY.md](WHY.md)**: Understand governance and artifact relationships.
3.  **[QUICKSTART.md](QUICKSTART.md)**: Synchronize with operational map.
4.  **[ASSETS.md](ASSETS.md)**: Internalize resource and design constraints.
5.  **[FUTURE.md](FUTURE.md)**: Optionally review roadmap intent (non-binding).

---

## Resource Invariants (Annie DeBrowsa Project)

### 🎨 CSS Framework Assets

- **INVARIANT**: Main styling surface is `public/assets/css/tachyons-extended.css` — DO NOT modify without updating `src/View/Main.page.php` class references.
- **INVARIANT**: Alternative CSS frameworks (bootstrap, chota, spectre, picnic, lightslider) are available in `public/assets/css/basix-*.css` — these are optional switching targets.
- **INVARIANT**: Custom icons and UI elements are stored in `public/assets/css/extra/` — DO NOT remove SVG/PNG/WebP assets without verifying no code references remain.
- **PRECONDITION**: Before adding a new CSS framework, create a `basix-{framework}.css` file following the existing naming pattern.

### 📜 JavaScript & Vue.js Assets

- **INVARIANT**: Vue.js integration is handled by `public/assets/js/vue/app.js` — DO NOT modify Vue mount element ID (#app) without updating `src/View/Main.page.php`.
- **INVARIANT**: Result card binding and URL selection logic lives in `public/assets/js/vue/app.js` — changes must preserve the `$pipelineData` structure contract.
- **INVARIANT**: Domain presets configuration is in `public/assets/js/domain-presets.js` — must stay synchronized with `public/config.json`.

### ⚙️ Configuration Assets

- **INVARIANT**: Domain presets are defined in `public/config.json` — structure must match the schema expected by `src/Model/PathTransformer.php`.
- **INVARIANT**: Config JSON must contain `domain_presets` array with objects having `id`, `name`, `server_name`, and `description` keys.
- **PRECONDITION**: Before adding a new domain preset, verify the `server_name` pattern works with the regex in `PathTransformer::applyConfigMappings()`.

### �️ Image & Icon Assets

- **INVARIANT**: Project logo and branding images are in `public/assets/` root — DO NOT replace without updating all references.
- **INVARIANT**: Icons and UI elements in `public/assets/css/extra/` use mixed formats (SVG, PNG, WebP, GIF) — preserve format when replacing assets.
- **PRECONDITION**: Before adding new icons, verify they match the existing visual style and color scheme.

---

## Date-Based Identifier Rules (Universal)

When versioning assets or creating asset-related artifacts, use the `YYYY-MM-DD-QUALIFIER` format:

- **Example**: `brand-guidelines-2026-04-15-REBRAND.pdf`
- **Example**: `icon-set-v2-2026-06-01-MATERIAL-DESIGN.zip`
- **INVARIANT**: DO NOT use future dates unless the reason is explicitly documented inline.

---

## Governance

**The Asset Steward**: Within an active session, the AI agent is authorized to update this file when:

1.  **New assets are added**: Register the asset path, format, and constraints in the appropriate section.
2.  **Design variables change**: Update color palettes, typography scales, or spacing systems.
3.  **Assets are deprecated**: Mark deprecated assets with a date stamp and migration path.
4.  **Binary format changes**: Document new format requirements and deprecation timelines.

**Narrowest-Scope Rule**:
- Asset path/format change → this file only.
- Code that consumes assets → CONTRACT.md or QUICKSTART.md (depending on whether it's an invariant or operational truth).
- Planning for asset migration → FUTURE.md.

---

## Last Reviewed & Trigger

- **LAST REVIEWED**: 2026-06-20-PROJECT-CUSTOMIZATION  SIGNATURE: Cascade (SWE-1.6)
- **REVIEW TRIGGER**: Update this file whenever asset constraints change, new asset types are introduced, or design variables are modified.

---

*Part of the `contract-style-comments` framework. For the full architectural manifesto, visit [WhatsOnYourBrain.com](https://whatsonyourbrain.com).*
