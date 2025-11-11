/**
 * Domain Presets Manager
 * 
 * Handles loading, saving, applying, and deleting domain presets
 * Communicates with /public/api/presets.php for persistence
 * 
 * Presets are stored as: {id, name, subdomain, server_name, description}
 */

class DomainPresetsManager {
    constructor(apiUrl = './api/presets.php') {
        this.apiUrl = apiUrl;
        this.presets = [];
        this.init();
    }

    /**
     * Initialize: Load presets from API and setup event listeners
     */
    async init() {
        await this.loadPresets();
        this.setupEventListeners();
    }

    /**
     * Fetch all presets from API
     */
    async loadPresets() {
        try {
            const response = await fetch(this.apiUrl);
            if (!response.ok) throw new Error('Failed to load presets');

            const data = await response.json();
            this.presets = data.presets || [];
            this.renderPresetUI();
        } catch (error) {
            console.error('Error loading presets:', error);
            this.showError('Failed to load presets');
        }
    }

    /**
     * Setup DOM event listeners for preset UI
     */
    setupEventListeners() {
        // Save preset button
        const saveBtn = document.getElementById('savePresetBtn');
        if (saveBtn) {
            saveBtn.addEventListener('click', () => this.savePreset());
        }

        // Manage presets button
        const manageBtn = document.getElementById('managePresetsBtn');
        if (manageBtn) {
            manageBtn.addEventListener('click', () => this.showPresetManager());
        }

        // Apply preset on dropdown change
        const presetSelect = document.getElementById('presetSelect');
        if (presetSelect) {
            presetSelect.addEventListener('change', (e) => this.applyPreset(e.target.value));
        }
    }

    /**
     * Render preset selection dropdown and buttons in Twerkin form
     */
    renderPresetUI() {
        const presetContainer = document.getElementById('presetContainer');
        if (!presetContainer) return;

        // Build dropdown HTML
        let html = '<select id="presetSelect" class="input ph3 pv2 mb2 ba b--moon-gray" style="width: 100%;">';
        html += '<option value="">-- Select a preset --</option>';

        this.presets.forEach(preset => {
            html += `<option value="${preset.id}" title="${preset.description}">
                ✓ ${preset.name}
            </option>`;
        });

        html += '</select>';

        // Add save/manage buttons
        html += '<div class="flex gap2 mt2">';
        html += '<button id="savePresetBtn" class="btn button b bg-green white ph3 pv2 br2 pointer" style="flex: 1;">💾 Save as Preset</button>';
        html += '<button id="managePresetsBtn" class="btn button b bg-blue white ph3 pv2 br2 pointer" style="flex: 1;">⚙️ Manage</button>';
        html += '</div>';

        presetContainer.innerHTML = html;
        this.setupEventListeners();
    }

    /**
     * Collect form data and save as new preset
     */
    async savePreset() {
        const nameInput = prompt('Preset name:', 'My Domain');
        if (!nameInput) return;

        const subdomainSelect = document.getElementById('subdomainSelect');
        const serverSelect = document.getElementById('serverSelect');
        const descInput = prompt('Description (optional):', '');

        const presetData = {
            name: nameInput,
            subdomain: subdomainSelect?.value || '',
            server_name: serverSelect?.value || '',
            description: descInput || ''
        };

        try {
            const response = await fetch(this.apiUrl, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(presetData)
            });

            const result = await response.json();

            if (result.error) {
                this.showError(result.error);
            } else {
                this.showSuccess(`Preset "${nameInput}" saved!`);
                await this.loadPresets();
            }
        } catch (error) {
            console.error('Error saving preset:', error);
            this.showError('Failed to save preset');
        }
    }

    /**
     * Apply preset values to form fields
     */
    applyPreset(presetId) {
        if (!presetId) return;

        const preset = this.presets.find(p => p.id === presetId);
        if (!preset) return;

        const subdomainSelect = document.getElementById('subdomainSelect');
        const serverSelect = document.getElementById('serverSelect');

        if (subdomainSelect) subdomainSelect.value = preset.subdomain || '';
        if (serverSelect) serverSelect.value = preset.server_name || '';

        this.showSuccess(`Applied preset: ${preset.name}`);

        // Trigger path update if needed
        if (window.updateTwerkinPath) {
            updateTwerkinPath();
        }
    }

    /**
     * Show preset management dialog
     */
    showPresetManager() {
        let html = '<div style="max-height: 400px; overflow-y: auto;">';

        if (this.presets.length === 0) {
            html += '<p>No presets saved yet.</p>';
        } else {
            html += '<table style="width: 100%; border-collapse: collapse;">';
            html += '<tr style="border-bottom: 1px solid #ddd;"><th style="text-align: left; padding: 8px;">Name</th><th style="text-align: left; padding: 8px;">Server</th><th style="text-align: left; padding: 8px;">Action</th></tr>';

            this.presets.forEach(preset => {
                const displayServer = preset.subdomain ? `${preset.subdomain}.${preset.server_name}` : preset.server_name;
                html += `<tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 8px;"><strong>${preset.name}</strong></td>
                    <td style="padding: 8px;"><code>${displayServer}</code></td>
                    <td style="padding: 8px;">
                        <button onclick="dpmInstance.deletePreset('${preset.id}')" class="btn bg-red white ph2 pv1 br2 pointer" style="font-size: 12px;">🗑️ Delete</button>
                    </td>
                </tr>`;
            });

            html += '</table>';
        }

        html += '</div>';

        // Create modal
        const modal = document.createElement('div');
        modal.id = 'presetManagerModal';
        modal.style.cssText = `
            position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.5); display: flex; align-items: center;
            justify-content: center; z-index: 10000;
        `;

        modal.innerHTML = `
            <div style="background: white; padding: 20px; border-radius: 8px; max-width: 600px; width: 90%;">
                <h3 style="margin-top: 0;">Manage Domain Presets</h3>
                ${html}
                <button onclick="document.getElementById('presetManagerModal').remove()" class="mt3 ph3 pv2 bg-dark-blue white br2 pointer">Close</button>
            </div>
        `;

        document.body.appendChild(modal);
    }

    /**
     * Delete a preset by ID
     */
    async deletePreset(presetId) {
        if (!confirm('Delete this preset?')) return;

        try {
            const response = await fetch(`${this.apiUrl}?id=${presetId}`, {
                method: 'DELETE'
            });

            const result = await response.json();

            if (result.error) {
                this.showError(result.error);
            } else {
                this.showSuccess('Preset deleted');
                await this.loadPresets();
            }
        } catch (error) {
            console.error('Error deleting preset:', error);
            this.showError('Failed to delete preset');
        }
    }

    /**
     * Show success message toast
     */
    showSuccess(message) {
        this.showToast(message, 'bg-green');
    }

    /**
     * Show error message toast
     */
    showError(message) {
        this.showToast(message, 'bg-red');
    }

    /**
     * Show toast notification
     */
    showToast(message, className = 'bg-blue') {
        const toast = document.createElement('div');
        toast.style.cssText = `
            position: fixed; bottom: 20px; right: 20px;
            padding: 12px 20px; border-radius: 4px;
            color: white; font-size: 14px;
            z-index: 10001; animation: slideIn 0.3s ease;
        `;
        toast.className = className;
        toast.textContent = message;
        document.body.appendChild(toast);

        setTimeout(() => toast.remove(), 3000);
    }
}

// Initialize on DOM ready
document.addEventListener('DOMContentLoaded', function() {
    window.dpmInstance = new DomainPresetsManager('./api/presets.php');
});
