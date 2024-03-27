var tabela = document.getElementById("minha_tabela")
var celulas = document.getElementsByTagName("td")

function TabelaInterativa() {
    for(var i = 0; i < celulas.length; i++) {
        var celula_clicada = celulas[i];

        celula_clicada.onclick = function() {
            if(this.style.backgroundColor === "red") {
                this.style.backgroundColor = "";
            }
            else {
                this.style.backgroundColor = "red";
            }
        }
    }
}

TabelaInterativa();