function appendSelectedValue() {
    /*
    initialize primary symbols */
    /*
    @param prefixSelect dropdown
    @param suffixSelect html dropdown
    */
    const prefixSelect      = document.getElementById('subdomainSelect');
    const suffixSelect      = document.getElementById('serverSelect');
    const newItemInput      = document.getElementById('newItemInput');
    const appendedData   = document.getElementById('appendedData');
    const oldAppended       = document.getElementById('oldAppendedData');
    const currentHref = window.location.href;
    let appdedChildsList = appendedData.childNodes;
    let oldAppdedChildsList = oldAppended.childNodes;

    // Safety check - ensure elements exist to avoid null dereference
    /* if (!prefixSelect || !suffixSelect || !newItemInput || !appendedData) {
        console.error('Missing form elements in appendSelectedValue:', { prefixSelect, suffixSelect, newItemInput, appendedData });
        return;
    } */

    // Ensure we have a valid base anchor; if not, create/update it from selects
    let anchor = appendedData.querySelector('a');
    if (!newItemInput.value) {
        // build base href from selects
        const prefix = prefixSelect.value || '';
        const suffix = suffixSelect.value || '';
        /* if (!suffix) {
            console.error('No server selected to build base URL');
            return;
        } */
        let baseHref = 'http://';
        if (prefix) baseHref += prefix + '.' + suffix;
        else baseHref += suffix;
        // ensure trailing slash for base
        if (!baseHref.endsWith('/')) baseHref += '/';

        anchor = document.createElement('a');
        anchor.href = baseHref;
        anchor.textContent = baseHref;
        anchor.target = '_blank';
        updateAppendedData.innerHTML = 'newItemInput.value';
        appendedData.innerHTML = 'newItemInput.value';
        appendedData.appendChild(anchor);
        // preserve a copy in oldAppended
        oldAppended.innerHTML = appendedData.innerHTML;
    }

    const newItemValue = newItemInput.value.trim();
    /* if (!newItemValue) {
        // nothing to append; just ensure anchor exists
        showActionToast('Base URL ready');
        return;
    }*/

    // Build final href by joining base and new path
    try {
        let base = anchor.href || '';
        // remove any surrounding whitespace
        base = base.trim();
        // ensure exactly one slash between base and path
        const path = newItemValue.replace(/^\/+/, '');
        let final = base;
        if (!final.endsWith('/')) final += '/';
        final = final + path;

        // update anchor
        anchor.href = final;
        anchor.textContent = final;

        // copy to oldAppended for history
        oldAppended.innerHTML = appendedData.innerHTML;

        // clear input
        newItemInput.value = '';

        showActionToast('Added path');
    } catch (e) {
        console.error('Failed to append path:', e);
    }
}

function clearForm()    {
    const newItemInput = document.getElementById('newItemInput');
    const appendedData = document.getElementById('appendedData');
    const oldAppended = document.getElementById('oldAppendedData');
    appendedData.innerHTML = '';
    oldAppended.innerHTML = '';
    newItemInput.value = '';
}

function updateAppendedData() {
    const prefixSelect = document.getElementById('subdomainSelect');
    const suffixSelect = document.getElementById('serverSelect');
    const appendedData = document.getElementById('appendedData');
    const oldAppended = document.getElementById('oldAppendedData');
    
    // Safety check - ensure elements exist
    if (!prefixSelect || !suffixSelect || !appendedData) {
        console.error('Missing form elements:', { prefixSelect, suffixSelect, appendedData });
        return;
    }
    
    // Preserve previous
    if (appendedData.innerHTML) {
        oldAppended.innerHTML = appendedData.innerHTML;
    }

    const prefix = (prefixSelect && prefixSelect.value) ? prefixSelect.value : '';
    const suffix = (suffixSelect && suffixSelect.value) ? suffixSelect.value : '';

    /* if (!suffix) {
        console.error('No server selected to update domain');
        return;
    } */

    let href = 'https://';
    if (prefix) href += prefix + '.' + suffix;
    else href += suffix;
    if (!href.endsWith('/')) href += '/';

    // Create or update anchor
    let anchor = appendedData.querySelector('a');
    if (!anchor) {
        anchor = document.createElement('a');
        anchor.target = '_blank';
        appendedData.innerHTML = '';
        appendedData.appendChild(anchor);
    }
    anchor.href = href;
    anchor.textContent = href;

    showActionToast('Domain updated');
}


// Small helper to show a transient toast near the top-right of the page
function showActionToast(message, timeout = 2200) {
    try {
        let toast = document.getElementById('adb-action-toast');
        if (!toast) {
            toast = document.createElement('div');
            toast.id = 'adb-action-toast';
            Object.assign(toast.style, {
                position: 'fixed',
                right: '16px',
                top: '16px',
                background: 'rgba(0,0,0,0.78)',
                color: 'white',
                padding: '8px 12px',
                borderRadius: '6px',
                zIndex: 99999,
                fontSize: '13px',
                boxShadow: '0 4px 10px rgba(0,0,0,0.2)'
            });
            document.body.appendChild(toast);
        }
        toast.textContent = message;
        toast.style.opacity = '1';
        // fade and remove after timeout
        setTimeout(() => {
            toast.style.transition = 'opacity 300ms ease';
            toast.style.opacity = '0';
        }, timeout - 300);
        setTimeout(() => {
            if (toast && toast.parentNode) toast.parentNode.removeChild(toast);
        }, timeout + 60);
    } catch (e) {
        // silently ignore in environments where DOM isn't available
        console.debug('showActionToast failed', e);
    }
}