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
    if (!prefixSelect || !suffixSelect || !newItemInput || !appendedData) {
        console.error('Missing form elements in appendSelectedValue:', { prefixSelect, suffixSelect, newItemInput, appendedData });
        return;
    }

    // If appendedData already has a link, use its href as base; otherwise build from prefix/suffix
    let baseHref = '';
    if (appdedChildsList && appdedChildsList.length > 0 && appdedChildsList[0] && appdedChildsList[0].href) {
        baseHref = appdedChildsList[0].href;
    } else {
        // construct base from prefix/suffix
        const prefix = prefixSelect ? prefixSelect.value : '';
        const suffix = suffixSelect ? suffixSelect.value : '';
        baseHref = 'https://';
        if (prefix && prefix.length) baseHref += prefix + '.' + suffix + '/';
        else baseHref += suffix + '/';
    }

    const anchor = document.createElement('a');
    anchor.href = baseHref;
    anchor.textContent = baseHref;
    anchor.target = '_blank';

    appendedData.innerHTML = '';
    appendedData.appendChild(anchor);

    const childsOfAppend    = appendedData.childNodes;
    const childsOfOldAppend = oldAppended.childNodes;
    oldAppended.innerHTML  = appendedData.innerHTML;
    childsOfAppend.forEach(anchor => {
        if (anchor && anchor.href) anchor.href = appendedData.textContent;
    });
    const selectedPrefix = prefixSelect.value;
    const existingAnchor = appendedData;

    const prefix = prefixSelect.value;
    const suffix = suffixSelect.value;
    const newItemValue = newItemInput.value.trim();

    if (newItemValue) {
        const userAdded = newItemValue;
        let stringTest = appendedData.textContent;
        let StringLength = stringTest.length;
        if (StringLength > 1) {
            existingAnchor.textContent = stringTest;
        }

        const appendedValue = stringTest + userAdded;

        newItemInput.value = ''; // Clear input field

        const appendedDataInner = appendedData.textContent;
        appendedData.textContent = appendedValue;
        childsOfAppend.forEach(anchor => {
            anchor.href = appendedData.textContent;
        });
    }
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
    
    // Preserve old appended data
    if (appendedData.innerHTML) {
        oldAppended.innerHTML = appendedData.innerHTML;
    }

    const prefix = prefixSelect.value;
    const suffix = suffixSelect.value;

    let href = 'https://';
    if (prefix !== '') {
        href = href + prefix + '.' + suffix + '/';
    } else {
        href = href + suffix + '/';
    }

    const anchor = document.createElement('a');
    anchor.href = href;
    anchor.textContent = href;
    anchor.target = '_blank';

    appendedData.innerHTML = '';
    appendedData.appendChild(anchor);
}