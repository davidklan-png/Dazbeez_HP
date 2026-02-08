---
name: wp-git-deploy-guardrails
description: Guardrails for WordPress projects deployed via staging checkout + hook to public_html.
---

## Rules

### Treat public_html/ as Generated Output
- **Never edit** `public_html/` directly
- All code changes must land in local repo first
- `public_html/` is treated like build output — it's the published result

### Source of Truth is Git
- All changes must go through the git repository
- Local repo tracks: `wp-content/themes/blueprint-child/`
- Deploy happens via `git push bluehost main`

### Deploy Hook Publishes Only Theme Directory
- Source: Bare repo at `~/git-repos/dazbeez-wp.git`
- Destination: `/home/ugosdymy/public_html/wp-content/themes/blueprint-child/`
- Method: `git checkout -f` (overwrites on every push)
- **Important:** Only the child theme is published, not all of `public_html/`

### Deployment Path Mapping

| Location | Path | Purpose |
|----------|------|---------|
| Local | `wp-content/themes/blueprint-child/` | Git-tracked source |
| Bluehost bare repo | `~/git-repos/dazbeez-wp.git` | Receives git push |
| Production | `/home/ugosdymy/public_html/wp-content/themes/blueprint-child/` | Published files |

### What Gets Published vs What Doesn't

**Published (on `git push bluehost main`):**
- Theme PHP files
- Theme CSS/JS assets
- `screenshot.png`

**NOT published:**
- WordPress core files
- Parent theme files
- Plugins
- Uploads
- Configuration (wp-config.php, .htaccess)

### When Asked to "Fix in Production"

**DO NOT:**
- Suggest editing files directly on the server via SSH/FTP
- Recommend making changes in `public_html/` directly

**INSTEAD:**
1. Make changes to local files in `wp-content/themes/blueprint-child/`
2. Commit changes: `git commit -m "Description"`
3. Deploy: `git push bluehost main`
4. Explain that the hook will publish automatically

### Always Mention Deploy Impact

In every response, include:
- Which files will be published
- What path they will be published to
- Whether cache purge is needed
- Rollback procedure if something breaks

### Diffs Must Be Minimal

- Prefer small, targeted edits
- Avoid noisy changes (whitespace, file reorg)
- Preserve file paths and IDs
- Test locally before committing

### Security Rules

- Never commit secrets (.secrets, .pem, .key, id_rsa*)
- Verify `.gitignore` excludes credential files
- Sanitize user input
- Escape output
- Use nonces for forms
- Check capabilities before operations

### Cache Awareness

- Bluehost has server-side caching
- Browser caching may hide changes
- Always mention cache purge in deploy notes
- Recommend hard refresh (Ctrl+Shift+R / Cmd+Shift+R)
