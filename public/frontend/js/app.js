document.addEventListener("DOMContentLoaded", function () {
    const searchIcon = document.querySelector("#searchIcon");
    const searchBox = document.querySelector("#searchBox");

    searchIcon.addEventListener("click", function () {
        searchBox.classList.toggle("d-none");
    });
});
