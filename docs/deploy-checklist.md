# Deploy Checklist (Git → Staging → Hook → Public_html)

## Pre-Deploy

- [ ] Confirm the change is in local `wp-content/themes/blueprint-child/` (not `public_html/`)
- [ ] Run syntax check: `php -l wp-content/themes/blueprint-child/<file>.php`
- [ ] Verify no secrets/config committed: `git status` check for `.secrets`, `.pem`, `id_rsa*`
- [ ] Note which directories the hook publishes: `/home/ugosdymy/public_html/wp-content/themes/blueprint-child/`
- [ ] Review diff: `git diff wp-content/themes/blueprint-child/`

## Deploy

- [ ] Commit changes: `git add wp-content/themes/blueprint-child/` and `git commit -m "Description"`
- [ ] Push to GitHub first: `git push origin main` (backup)
- [ ] Deploy to Bluehost: `git push bluehost main`
- [ ] Confirm hook ran successfully (look for "Child theme deployed at..." message)
- [ ] Check for any error messages in git output

## Post-Deploy

- [ ] Verify updated files exist in production theme directory
- [ ] Clear Bluehost cache (WP admin bar → Caching → Purge All)
- [ ] Hard refresh browser (Ctrl+ShiftR / Cmd+ShiftR)
- [ ] Smoke test key pages:
  - [ ] Splash page loads
  - [ ] EN/JP language toggle works
  - [ ] Forms submit correctly
  - [ ] No console errors
  - [ ] Mobile layout OK
- [ ] Test specific functionality changed in this deploy
- [ ] Check for PHP errors in logs (if accessible)

## Rollback Procedure (If Needed)

```bash
# Revert the problematic commit
git revert <commit-hash>

# Push rollback to production
git push bluehost main

# Verify rollback worked
# Purge cache and hard refresh
```

## Rollback Verification

- [ ] Confirm previous version is restored
- [ ] Verify site is functional
- [ ] Identify what went wrong before re-attempting
