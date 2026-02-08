# Audit Deploy Hook for Git → Staging → Public_html

Goal: confirm which paths from staging are published to public_html and why.

---

## Deployment Hook Location

**On Bluehost server:** `~/git-repos/dazbeez-wp.git/hooks/post-receive`

---

## What to Inspect

### 1. Hook Script Contents
```bash
# Run on Bluehost:
cat ~/git-repos/dazbeez-wp.git/hooks/post-receive
```

### 2. Current Hook Behavior

**Source:** Bare repo at `~/git-repos/dazbeez-wp.git`
**Destination (GIT_WORK_TREE):** `/home/ugosdymy/public_html/wp-content/themes/blueprint-child/`
**Command:** `git checkout -f`

This means: On every push, the bare repo checks out files to the child theme directory.

### 3. Include/Exclude Rules

**Published:** Only the child theme directory
**NOT published:**
- WordPress core files
- Parent theme (Blueprint)
- Plugins
- Uploads
- Configuration files

### 4. Permissions and Ownership

**User:** `ugosdymy`
**Group:** `ugosdymy` (or web server group)
**Permissions:** Files `644`, Directories `755`

### 5. Cache Invalidation Steps

Bluehost has caching enabled. After deploy:
1. WP Admin bar → Caching → Purge All
2. Hard refresh browser (Ctrl+Shift+R / Cmd+Shift+R)

---

## Output Summary

### Current Behavior (Source → Destination)

| Source | Destination | Method |
|--------|-------------|--------|
| Local git repo | GitHub (`origin`) | `git push origin main` |
| Local git repo | Bluehost bare repo | `git push bluehost main` |
| Bare repo | Production theme dir | Hook: `git checkout -f` |

### Exact Include/Exclude Rules

**Included in deploy:**
```
wp-content/themes/blueprint-child/
├── page_splash.php
├── functions.php
├── style.css
├── assets/
│   ├── splash.css
│   └── splash.js
└── screenshot.png
```

**Excluded from deploy:**
- WordPress core (`wp-admin/`, `wp-includes/`)
- Parent themes (`wp-content/themes/twenty*`, `wp-content/themes/blueprint/`)
- Plugins (`wp-content/plugins/`)
- Uploads (`wp-content/uploads/`)
- Configuration (`wp-config.php`, `.htaccess`)

### Common Failure Modes

1. **Permission denied** → Fix file permissions on bare repo
2. **Hook not executable** → Run `chmod +x hooks/post-receive`
3. **Wrong path in GIT_WORK_TREE** → Update hook with correct path
4. **Cache not cleared** → Purge cache manually after deploy
5. **Merge conflicts** → Pull first before pushing

### Recommended Safe Improvements

1. **Add logging to hook:**
```bash
echo "[$(date)] Deploy triggered by $USER" >> ~/git-deploy.log
echo "Files published to: $GIT_WORK_TREE" >> ~/git-deploy.log
```

2. **Add success confirmation:**
```bash
echo "Deployment completed at $(date)"
```

3. **Create backup before deploy (optional):**
```bash
# Add to hook before git checkout:
cp -r "$GIT_WORK_TREE" "$GIT_WORK_TREE.backup.$(date +%Y%m%d_%H%M%S)"
```

---

## Quick Audit Commands

Run on Bluehost server:

```bash
# Check hook exists and is executable
ls -la ~/git-repos/dazbeez-wp.git/hooks/post-receive

# View hook contents
cat ~/git-repos/dazbeez-wp.git/hooks/post-receive

# Check recent deployments
tail -20 ~/git-deploy.log  # if logging is enabled

# Verify theme files in production
ls -la /home/ugosdymy/public_html/wp-content/themes/blueprint-child/
```
