# Domain Presets Feature Documentation

## Overview

The **Domain Presets** system enables users to save, manage, and quickly apply custom domain/subdomain configurations for the Twerkin path conversion interface. Presets are persisted to `config.json` and accessed via a RESTful JSON API.

## Architecture

### Components

```
┌─────────────────────────────────────────────────────────┐
│                    Client (Browser)                      │
├─────────────────────────────────────────────────────────┤
│  domain-presets.js (DomainPresetsManager class)         │
│  - Load presets from API                                │
│  - Save new preset                                       │
│  - Apply preset to form                                 │
│  - Delete preset                                        │
│  - Render UI (dropdown, buttons, manager modal)         │
└──────────────┬──────────────────────────────────────────┘
               │ JSON/HTTP
               ▼
┌─────────────────────────────────────────────────────────┐
│              API Endpoint (public/api/presets.php)      │
├─────────────────────────────────────────────────────────┤
│  RESTful JSON API                                       │
│  GET    /api/presets.php → list all presets            │
│  POST   /api/presets.php → create preset               │
│  PUT    /api/presets.php?id=X → update preset          │
│  DELETE /api/presets.php?id=X → delete preset          │
└──────────────┬──────────────────────────────────────────┘
               │ PHP
               ▼
┌─────────────────────────────────────────────────────────┐
│         PHP Controller (src/Controller/PresetsApi.php)  │
├─────────────────────────────────────────────────────────┤
│  PresetsApi class                                       │
│  - loadConfig() → read config.json                      │
│  - saveConfig() → write config.json                     │
│  - getAll() → list presets                              │
│  - getById(id) → fetch preset                           │
│  - create(data) → new preset                            │
│  - update(id, data) → modify preset                     │
│  - delete(id) → remove preset                           │
└──────────────┬──────────────────────────────────────────┘
               │ File I/O
               ▼
┌─────────────────────────────────────────────────────────┐
│              config.json (Persistence Layer)            │
├─────────────────────────────────────────────────────────┤
│  {                                                      │
│    "home_urls": [...],                                 │
│    "domain_presets": [                                 │
│      {                                                 │
│        "id": "local-dev",                              │
│        "name": "Local Dev",                            │
│        "subdomain": "",                                │
│        "server_name": "localhost",                     │
│        "description": "..."                            │
│      }                                                 │
│    ]                                                   │
│  }                                                      │
└─────────────────────────────────────────────────────────┘
```

## File Structure

```
/src/Controller/PresetsApi.php
  ├─ PresetsApi class (PHP domain logic)
  ├─ Namespaced: Adb\Controller
  └─ Manages preset CRUD operations

/public/api/presets.php
  ├─ JSON API endpoint
  ├─ Handles HTTP verbs (GET/POST/PUT/DELETE)
  ├─ Routes to PresetsApi controller
  └─ Returns JSON responses with appropriate HTTP status codes

/public/assets/js/domain-presets.js
  ├─ DomainPresetsManager class (JavaScript)
  ├─ Communicates with API endpoint
  ├─ Renders UI components
  ├─ Handles user interactions
  └─ Shows toast notifications

/src/View/Twerkin.form.phtml
  ├─ Enhanced with preset container div (#presetContainer)
  ├─ Updated select IDs: subdomainSelect, serverSelect
  └─ Preset UI injected dynamically by JavaScript

/config.json
  ├─ Extended with "domain_presets" array
  ├─ Contains sample presets (local-dev, local-ip)
  └─ Auto-created/updated by PresetsApi
```

## Usage Guide

### For End Users

#### Saving a Preset
1. Configure subdomain and server name in the "Domain Configuration" form
2. Click the **💾 Save as Preset** button
3. Enter a name for your preset (e.g., "Production Server")
4. Optionally add a description
5. The preset is saved and appears in the dropdown

#### Applying a Preset
1. Select a preset from the **"-- Select a preset --"** dropdown
2. Form fields auto-populate with the saved configuration
3. Click **"Update Domain"** or **"Add Path"** to apply

#### Managing Presets
1. Click the **⚙️ Manage** button
2. View all saved presets with descriptions
3. Delete presets using the 🗑️ button in the modal
4. Close modal to return to form

### For Developers

#### PHP API Usage

**Get all presets:**
```bash
curl -X GET http://localhost/public/api/presets.php
```

Response:
```json
{
  "presets": [
    {
      "id": "local-dev",
      "name": "Local Dev",
      "subdomain": "",
      "server_name": "localhost",
      "description": "Default local development server"
    }
  ]
}
```

**Get a specific preset:**
```bash
curl -X GET http://localhost/public/api/presets.php?id=local-dev
```

**Create a preset:**
```bash
curl -X POST http://localhost/public/api/presets.php \
  -H "Content-Type: application/json" \
  -d '{
    "name": "Staging",
    "subdomain": "staging",
    "server_name": "example.com",
    "description": "Staging environment"
  }'
```

**Update a preset:**
```bash
curl -X PUT http://localhost/public/api/presets.php?id=local-dev \
  -H "Content-Type: application/json" \
  -d '{
    "name": "Updated Name",
    "subdomain": "app"
  }'
```

**Delete a preset:**
```bash
curl -X DELETE http://localhost/public/api/presets.php?id=local-dev
```

#### JavaScript API

```javascript
// Access the global preset manager instance
window.dpmInstance

// Load all presets (also refreshes UI)
await window.dpmInstance.loadPresets();

// Get presets array
window.dpmInstance.presets;

// Save new preset programmatically
// (normally triggered by button click)
await window.dpmInstance.savePreset();

// Apply preset to form
window.dpmInstance.applyPreset('local-dev');

// Delete preset
await window.dpmInstance.deletePreset('local-dev');

// Show notifications
window.dpmInstance.showSuccess('Message');
window.dpmInstance.showError('Error message');
```

## Data Schema

### Preset Object Structure

```javascript
{
  id: string,              // Unique identifier (auto-generated from name)
  name: string,            // Human-readable name (required)
  subdomain: string,       // Subdomain value (optional, empty string for none)
  server_name: string,     // Server hostname (required)
  description: string      // Optional description/notes
}
```

### config.json Format

```json
{
  "home_urls": [
    // ... existing home_urls array ...
  ],
  "domain_presets": [
    {
      "id": "local-dev",
      "name": "Local Dev",
      "subdomain": "",
      "server_name": "localhost",
      "description": "Default local development server"
    },
    {
      "id": "local-ip",
      "name": "Local IP",
      "subdomain": "",
      "server_name": "127.0.0.1",
      "description": "Local loopback address"
    }
  ]
}
```

## Integration Points

### Form Field Mapping

| Twerkin Form | Preset Field | Select ID |
|-------------|---|---|
| Subdomain select | `subdomain` | `#subdomainSelect` |
| Server Name select | `server_name` | `#serverSelect` |
| Path input | (read from radio buttons) | `#newItemInput` |

### Event Flow

1. **Page Load** → `domain-presets.js` initializes
2. **DOMContentLoaded** → `DomainPresetsManager.init()` called
3. **init()** → `loadPresets()` fetches from API
4. **loadPresets()** → `renderPresetUI()` injects dropdown + buttons
5. **setupEventListeners()** → Button click handlers attached
6. **User selects preset** → `applyPreset()` updates form fields
7. **User saves preset** → `savePreset()` POSTs to API

## Error Handling

### Frontend (JavaScript)

- Network errors caught in try/catch blocks
- Displays user-friendly error toasts
- Gracefully degrades if API unavailable
- Fallback: localStorage (for future enhancement)

### Backend (PHP)

- Invalid JSON returns 400 Bad Request
- Missing required fields return 400 with error message
- Preset not found returns 404 Not Found
- Validation errors include descriptive messages
- Database write failures return 500 Server Error

### Status Codes

| Code | Scenario |
|------|----------|
| 200 | Successful GET/PUT/DELETE |
| 201 | Successful POST (resource created) |
| 400 | Bad request (invalid JSON, missing fields) |
| 404 | Preset not found (GET/PUT/DELETE) |
| 405 | HTTP method not allowed |
| 500 | Server error (file write failed) |

## Persistence & Migration

### Backward Compatibility

- Existing `config.json` files without `domain_presets` array are safe
- `PresetsApi` auto-creates the array if missing
- `home_urls` array remains untouched

### Migration for Existing Installations

If upgrading from version without presets:

1. No manual action required—`config.json` auto-updates on first use
2. API creates `domain_presets: []` if not present
3. First save adds the array to config.json permanently

### Initial Presets

The system ships with 2 default presets in `config.json`:

- **Local Dev** (`local-dev`): subdomain="", server="localhost"
- **Local IP** (`local-ip`): subdomain="", server="127.0.0.1"

These serve as examples and can be modified/deleted by users.

## Security Considerations

### Input Validation

- Preset names sanitized against XSS (not displayed in JS inline code)
- Subdomain/server values used only in selects (safe from injection)
- IDs validated as alphanumeric + hyphens before file operations

### File Permissions

- `config.json` must be readable/writable by web server process
- API endpoint runs under same PHP context as main app
- No special authentication required (assumes trusted environment)

**Note**: For production deployments, consider adding:
- HTTP Basic Auth or Bearer token to API
- CSRF token validation for POST/PUT/DELETE
- Rate limiting to prevent preset spam

## Future Enhancements

- [ ] Export presets to JSON file (for sharing)
- [ ] Import presets from JSON file
- [ ] Share presets between users (multiuser support)
- [ ] Preset versioning/history
- [ ] Favorite/star most-used presets
- [ ] Search presets by name/description
- [ ] Keyboard shortcuts for quick-apply
- [ ] Preset groups/categories

## Debugging

### Enable Verbose Logging

In `domain-presets.js`, add logging:

```javascript
// Inside DomainPresetsManager.loadPresets()
console.log('Presets loaded:', this.presets);
```

### API Testing

Use browser Developer Tools Console:

```javascript
// Fetch all presets
fetch('./api/presets.php').then(r => r.json()).then(d => console.log(d));

// Create preset
fetch('./api/presets.php', {
  method: 'POST',
  headers: {'Content-Type': 'application/json'},
  body: JSON.stringify({name: 'Test', server_name: 'test.com'})
}).then(r => r.json()).then(d => console.log(d));
```

### Check config.json

```bash
php -r "echo json_encode(json_decode(file_get_contents('config.json'), true), JSON_PRETTY_PRINT);"
```

## Files Modified/Created

✅ **Created:**
- `/src/Controller/PresetsApi.php` - PHP controller class
- `/public/api/presets.php` - JSON API endpoint
- `/public/assets/js/domain-presets.js` - JavaScript manager

✅ **Modified:**
- `/config.json` - Added `domain_presets` array
- `/src/View/Twerkin.form.phtml` - Added preset container + updated select IDs
- `/src/View/Main.page.phtml` - Added script tag for domain-presets.js

## Testing Checklist

- [ ] Load page → presets dropdown appears with 2 default options
- [ ] Click "Save as Preset" → dialog prompts for name
- [ ] Save preset → appears in dropdown
- [ ] Select preset from dropdown → form fields auto-populate
- [ ] Click "⚙️ Manage" → modal shows all presets
- [ ] Delete preset from modal → removed from dropdown
- [ ] Refresh page → presets persist (read from config.json)
- [ ] Create 5+ presets → no UI slowdown
- [ ] Invalid server name → validation works

