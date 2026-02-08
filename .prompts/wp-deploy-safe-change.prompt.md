# WordPress Change (Deploy-Safe)

You are in a repo deployed via: Git → staging checkout → deploy hook publishes to `public_html/wp-content/themes/blueprint-child/`.

## Deployment Model
- **Local tracking:** `wp-content/themes/blueprint-child/`
- **Production docroot:** `/home/ugosdymy/public_html/`
- **Deploy hook target:** `/home/ugosdymy/public_html/wp-content/themes/blueprint-child/`
- **Deploy trigger:** `git push bluehost main`

## Constraints
- **Never edit** `public_html/` directly — changes will be overwritten on next deploy
- **Changes must occur** in local `wp-content/themes/blueprint-child/` only
- **Keep diffs minimal** — avoid noisy changes
- **Always include** deployment impact note: which files will be published to production

## Allowed Files
- `page_splash.php`
- `functions.php` (enqueue/template logic only)
- `style.css`
- `assets/splash.css`
- `assets/splash.js`
- `screenshot.png` (optional)

## Forbidden Actions
- No plugin installs or recommendations as "required"
- No database changes
- No edits to `wp-config.php`, `.htaccess`, or WP core
- No edits to parent theme
- No build tools (npm/webpack/vite)
- No external JS libs/CDNs unless explicitly requested
- No background jobs / cron / scheduled automation
- Do not assume direct SSH/FTP write access

## Task
{{describe change}}

## Output Format

### 1) Plan (3–6 bullets)
- Bullet 1
- Bullet 2
- Bullet 3

### 2) Files to change (explicit paths)
- `wp-content/themes/blueprint-child/<file>`
- ...

### 3) Patch (diff-style)
```diff
--- a/wp-content/themes/blueprint-child/<file>
+++ b/wp-content/themes/blueprint-child/<file>
@@ -1,1 +1,1 @@
-old line
+new line
```

### 4) Test Plan
**Local verification:**
- [ ] Step 1
- [ ] Step 2

**Production validation:**
- [ ] Visit page in incognito
- [ ] Verify changes appear
- [ ] Test functionality (forms, buttons, etc.)
- [ ] Mobile layout check

**Post-publish smoke checks:**
- [ ] No PHP errors in logs
- [ ] No console errors
- [ ] Cache cleared if needed

### 5) Rollback Plan
```bash
# If something breaks:
git revert <commit-hash>
git push bluehost main
# Then verify and purge cache
```

---

## Deploy Notes Template

**Published to:** `/home/ugosdymy/public_html/wp-content/themes/blueprint-child/`

**Files published:**
- `<file>`
- `<file>`

**After deploy:**
- Purge Bluehost cache (WP admin bar → Caching → Purge All)
- Hard refresh browser (Ctrl+Shift+R / Cmd+Shift+R)

**Rollback:** `git revert <commit> && git push bluehost main`

**SSH to Bluehost:** `ssh ugosdymy@ugo.sdy.mybluehost.me`
