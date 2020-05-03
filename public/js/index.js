function toggleFullMessages() {
    const url = new URL(window.location);
    const tick = "✔";
    if (url.searchParams.has("full", tick)) {
        url.searchParams.delete("full");
    } else {
        url.searchParams.set("full", tick);
    }

    window.location = url;
}

function onload() {
    // Remove empty fields from search query
    const myForm = document.getElementById('searchform');
    myForm.addEventListener('submit', function () {
        const allInputs = myForm.getElementsByTagName('input');

        for (let i = 0; i < allInputs.length; i++) {
            const input = allInputs[i];
            if (input.name && !input.value) {
                input.name = '';
            }
        }
    });
}

window.addEventListener('load', onload);
