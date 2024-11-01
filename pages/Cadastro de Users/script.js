document.addEventListener("DOMContentLoaded", function() {
    document.querySelector("#churrascoForm").addEventListener("submit", (evt) => {
        evt.preventDefault();

        document.getElementById("bloco1").classList.add("esconder");
        document.getElementById("bloco2").classList.remove("esconder");

    });

    document.querySelector("#recarregarButton").addEventListener("click", () => {
        location.reload();
    });
});