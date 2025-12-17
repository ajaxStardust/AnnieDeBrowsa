# Domain Presets - Quick Start Guide

## 🚀 Getting Started (5 minutes)

### Step 1: Verify Installation ✅
Everything is already installed. Just verify:

```bash
# Check files exist
ls -la /home/hestia/web/ai-anon.local/public_html/src/Controller/PresetsApi.php
ls -la /home/hestia/web/ai-anon.local/public_html/public/api/presets.php
ls -la /home/hestia/web/ai-anon.local/public_html/public/assets/js/domain-presets.js
```

### Step 2: Load the Application
Open your browser and navigate to:
```
http://ai-anon.local/public/index.php
```

### Step 3: Look for Preset UI
In the "Domain Configuration" section, you should see:
- **Dropdown**: "-- Select a preset --" with 2 default options
- **Button**: "💾 Save as Preset" (green)
- **Button**: "⚙️ Manage" (blue)

### Step 4: Try It Out

#### Save a Preset
1. Set Subdomain to "app"
2. Set Server Name to "localhost"
3. Click **"💾 Save as Preset"**
4. Enter name: "My Local App"
5. Press OK → Preset is saved

#### Apply a Preset
1. Select from dropdown: "My Local App"
2. Form auto-populates with saved values
3. Click **"Update Domain"** or **"Add Path"**

#### Manage Presets
1. Click **"⚙️ Manage"**
2. See all saved presets
3. Click 🗑️ to delete any preset
4. Close modal

## 📡 API Testing (Command Line)

### Test GET (List All)
```bash
curl http://ai-anon.local/public/api/presets.php | jq .
```

### Test POST (Create)
```bash
curl -X POST http://ai-anon.local/public/api/presets.php \
  -H "Content-Type: application/json" \
  -d '{
    "name": "Staging Server",
    "subdomain": "staging",
    "server_name": "example.com",
    "description": "Our staging environment"
  }' | jq .
```

### Test PUT (Update)
```bash
curl -X PUT "http://ai-anon.local/public/api/presets.php?id=local-dev" \
  -H "Content-Type: application/json" \
  -d '{"name": "Updated Local Dev"}' | jq .
```

### Test DELETE (Remove)
```bash
curl -X DELETE "http://ai-anon.local/public/api/presets.php?id=staging-server" | jq .
```

## 🧪 Automated Tests

Run the full integration test suite:
```bash
cd /home/hestia/web/ai-anon.local/public_html
php test-presets-api.php
```

Expected output:
```
✅ Get All
✅ Create
✅ Update
✅ Delete
```

## 📂 File Structure

```
/src/Controller/PresetsApi.php
  └─ PHP backend class (CRUD logic)

/public/api/presets.php
  └─ JSON API endpoint (HTTP routing)

/public/assets/js/domain-presets.js
  └─ JavaScript UI manager

/config.json
  └─ Persistent storage (auto-updated)

/src/View/Twerkin.form.phtml
  └─ Enhanced form with preset container

/src/View/Main.page.phtml
  └─ Includes domain-presets.js script
```

## 🔍 Troubleshooting

### Presets not showing up?
1. Check browser console: `F12` → Console tab
2. Look for errors, then run:
   ```javascript
   window.dpmInstance.loadPresets()
   ```
3. Verify API: `curl http://ai-anon.local/public/api/presets.php`

### API returning 404?
1. Ensure file exists: `public/api/presets.php`
2. Check file permissions: `chmod 644 public/api/presets.php`
3. Verify Composer autoload: `composer dump-autoload`

### Presets not persisting?
1. Check `config.json` is writable: `chmod 664 config.json`
2. Verify web server user owns file: `ls -l config.json`
3. Check disk space: `df -h /`

### "Failed to load presets" message?
1. Open browser console (`F12`)
2. Check Network tab for failed requests
3. Look for errors in PHP error log:
   ```bash
   tail -f /var/log/apache2/error.log
   ```

## 💡 Tips & Tricks

### Keyboard Navigation
- Tab through form fields quickly
- Enter to submit (if button focused)
- Escape to close manager modal

### Naming Conventions
Use descriptive names:
- ✅ "Production API (api.example.com)"
- ✅ "Local Dev (localhost:3000)"
- ❌ "test1", "temp"

### Quick Preset Strategy
Save these 3 presets:
1. **Local Dev** - localhost, no subdomain
2. **Local IP** - 127.0.0.1, no subdomain
3. **Production** - example.com, custom subdomain

### Browser Storage
Presets are stored **server-side** in `config.json`, not localStorage. This means:
- ✅ Shared between browsers
- ✅ Persist across devices
- ✅ Safe from accidental clearing
- ✅ Backed up with config

## 📊 Preset Schema

Each preset is stored as:
```json
{
  "id": "unique-id",
  "name": "Display Name",
  "subdomain": "optional-subdomain",
  "server_name": "example.com",
  "description": "Optional notes"
}
```

## 🔗 Related Documentation

- **Full API Reference**: `DOMAIN_PRESETS_DOCS.md`
- **Implementation Details**: `IMPLEMENTATION_COMPLETE.md`
- **Test File**: `test-presets-api.php`

## 📞 Common Questions

**Q: Can I export my presets?**
A: Not yet, but it's planned. For now, use: `cat config.json | jq '.domain_presets'`

**Q: Can I share presets with other users?**
A: All users of the same installation see the same presets (stored server-side).

**Q: How many presets can I save?**
A: Unlimited, but 50+ may slow the dropdown. Consider archiving old ones.

**Q: Do presets work offline?**
A: No, they require a running server. Consider copying `config.json` for backups.

**Q: Can I edit presets directly in config.json?**
A: Yes! Just make sure the JSON is valid: `php -r "json_decode(file_get_contents('config.json'));"` returns no errors.

## ✨ Next Steps

1. ✅ Verify presets appear in browser
2. ✅ Create 2-3 test presets
3. ✅ Test apply/delete workflow
4. ✅ Run integration tests: `php test-presets-api.php`
5. ✅ Review `DOMAIN_PRESETS_DOCS.md` for advanced usage
6. 📧 Report any issues or feature requests

---

**Status**: Ready to use! 🎉

All files are installed, tested, and working. Start saving presets now!
