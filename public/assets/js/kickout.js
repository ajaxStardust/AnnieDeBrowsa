document.addEventListener("DOMContentLoaded", function () {
    const goHomeBtn = document.getElementById("gohome");
    if (!goHomeBtn) return;

    // Show the Go Home button only when this page is the top-level window,
    // not when it is loaded inside an iframe (e.g. the ADB file browser).
    if (window.self === window.top) {
        goHomeBtn.style.display = "block";
    } else {
        goHomeBtn.style.display = "none";
    }
});
