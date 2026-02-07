# Dazbeez_HP

WordPress child theme for the Dazbeez website.

## Repository Structure

```
wp-content/themes/blueprint-child/
├── page-splash.php
├── functions.php
├── style.css
├── assets/
│   ├── splash.css
│   └── splash.js
└── screenshot.png
```

## Deployment

This repository has two remotes:

```bash
git push origin main      # GitHub (backup/version control)
git push bluehost main    # Bluehost (live site)
git deploy-all            # Both
```

## Important

- This repository contains **only** the child theme
- Do not modify WordPress core, parent themes, or plugins
- See [CONTRIBUTING.md](CONTRIBUTING.md) for detailed guidelines
