
function toggleConteudo() {
    // Alterna entre mostrar e ocultar o conteúdo
    var conteudo = document.getElementById("conteudoToggle");
    conteudo.style.display = conteudo.style.display === "none" ? "block" : "none";
}

//modal de bem-vindos
let modal = document.getElementById('bemVindoModal');

function mostrarModal() {
    document.getElementById('mensagemBemVindo').innerHTML;

    $('#bemVindoModal').modal('show');
}

function fecharModal() {
    $('#bemVindoModal').modal('hide');
}


document.getElementById('fecharModalBtn').addEventListener('click', function () {
    fecharModal();
});
//modal de bem-vindos fim

var search = document.getElementById('pesquisar');

search.addEventListener("keydown", function (event) {
    if (event.key === "Enter") {
        pequisaDado();
    }
});

function pesquisaDado() {
    window.location = 'instituicaoSistema.php?search=' + search.value;
}

//GIF 


    document.addEventListener('DOMContentLoaded', function () {
        // Exibir o GIF ao submeter um formulário
        const forms = document.querySelectorAll('form');
        forms.forEach(form => {
            form.addEventListener('submit', function () {
                document.getElementById('loading').style.display = 'block';
            });
        });

        // Exibir o GIF ao fazer requisições AJAX
        document.addEventListener('ajaxStart', function () {
            document.getElementById('loading').style.display = 'block';
        });

        document.addEventListener('ajaxComplete', function () {
            document.getElementById('loading').style.display = 'none';
        });
    });
