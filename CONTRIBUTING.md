# Contributing Guide

## Dazbeez_HP (WordPress Child Theme)

This repository contains **only** the custom WordPress child theme used for the Dazbeez website, hosted on **Bluehost**.

The goal of this guide is to ensure all contributions are **safe, reviewable, and production-appropriate** for a shared-hosting WordPress environment.

---

## Repository Scope

This repository intentionally has a **very small surface area**.

It contains only the child theme:

```
wp-content/themes/blueprint-child/
```

Expected structure:

```
blueprint-child/
├── page-splash.php
├── functions.php
├── style.css
├── assets/
│   ├── splash.css
│   └── splash.js
└── screenshot.png
```

Anything outside this scope is **out of bounds**.

---

## Allowed Changes

Contributors **may only** modify files inside:

```
wp-content/themes/blueprint-child/
```

Specifically:

* `page-splash.php`
* `functions.php` (enqueue logic / template logic only)
* `style.css`
* `assets/splash.css`
* `assets/splash.js`

All changes must remain compatible with **WordPress core**, the **Bluehost Blueprint parent theme**, and **shared hosting constraints**.

---

## Forbidden Changes (Non‑Negotiable)

Contributors must **NOT**:

* Install, recommend, or depend on WordPress plugins
* Modify the WordPress database
* Edit `wp-config.php`, `.htaccess`, or any WP core files
* Modify any parent theme files
* Add build systems (Webpack, Vite, npm, Node, etc.)
* Introduce external CDNs or third-party JS libraries unless explicitly requested
* Assume direct server, FTP, or SSH write access
* Add background jobs, cron tasks, or scheduled automation

If a requested change requires any of the above, **stop and explain why** instead of proceeding.

---

## Development Model

### Architectural assumptions

* This is a **classic PHP theme**, not a full block theme
* Primary rendering is done via **PHP templates**, not the block editor
* CSS and JS are loaded conditionally via `functions.php`
* JavaScript is **progressive enhancement only**
* The page must remain usable with JavaScript disabled

---

## Output Requirements (Critical)

When submitting changes:

1. **Explicitly list which files were modified**
2. Provide **complete file contents** for each modified file

   * No partial snippets
   * No "insert here" instructions
3. Preserve existing functionality unless explicitly told otherwise
4. Keep code readable and commented where appropriate

### Required format

````
FILES MODIFIED:
- page-splash.php
- assets/splash.css

UPDATED FILE: page-splash.php
```php
<?php
// full file contents
````

UPDATED FILE: assets/splash.css

```css
/* full file contents */
```

---

## Product & Content Constraints

### Target audience

* Japanese SMEs (construction & trades as the initial focus)
* Licensed tax accountants (税理士)

### Tone & positioning

All content must be:

* Conservative
* Professional
* Non‑disruptive

Use language such as:

* "Preparation support"
* "事前準備"
* "補助"
* "For professional review"

### Explicitly avoid claims of:

* Tax advice
* Accounting judgment
* Regulatory guarantees
* Replacement of accountants or staff

Always reinforce:

* Human review
* Accountant authority
* Clear scope boundaries

---

## Legal & Compliance Guardrails

Contributors must **never**:

* Imply automated tax filing or submission
* Imply compliance guarantees
* Auto‑finalize accounting outcomes
* Bypass professional judgment

All outputs must be framed as **preparation materials only**.

---

## Technical Standards

### PHP

* PHP 7.4+ compatible
* No short tags
* No direct database access
* No direct file writes
* No global side effects

### CSS

* Mobile‑first
* Namespaced to `.splash-page` where possible
* Avoid global resets
* Avoid collisions with the parent theme

### JavaScript

* Vanilla JavaScript only
* Defensive coding (null checks required)
* No global variables
* No console errors
* No reliance on build steps

---

## Git & Deployment Awareness

Assume:

* Changes are reviewed via Git diffs
* Deployment is manual (SSH + rsync)
* Bluehost caching is enabled

Therefore:

* Avoid unnecessary file renames
* Preserve paths and IDs
* Call out when cache purge is required

---

## Testing Expectations

Each contribution should include brief testing notes:

```
TESTING NOTES:
- Verify splash page loads at /
- Test responsive layout (mobile / desktop)
- Click demo buttons and confirm animations
- Submit contact form and confirm expected behavior
```

---

## When to Stop

If you are unsure about:

* WordPress behavior
* Bluehost limitations
* Legal, accounting, or compliance implications

**Stop and ask for clarification instead of guessing.**

---

## Guiding Principle

> Treat this repository like production WordPress code on shared hosting:
> **small surface area, conservative changes, explicit outputs, no surprises.**

This is intentional and non‑negotiable.
