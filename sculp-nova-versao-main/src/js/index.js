const botaoMostrarProjetos = document.querySelector('.btn-mostrar-projetos');
const projetosInativos = document.querySelectorAll('.projeto:not(.ativo)');

botaoMostrarProjetos.addEventListener('click', () => {
    // Passo 3 - adicionar a classe "ativo" nos projetos escondidos
    mostrarMaisProjetos();

    // Objetivo 2 - esconder o botão de mostrar mais
    // Passo 1 - pegar o botão e esconder ele


    esconderBotao();
});

function esconderBotao() {
    botaoMostrarProjetos.classList.add("remover");
}

function mostrarMaisProjetos() {
    projetosInativos.forEach(projetoInativo => {
        projetoInativo.classList.add('ativo');
    });
}

let botaoAceitaMensagem = document.getElementById("botao-aceita-mensagem");
botaoAceitaMensagem.addEventListener("click", aceitaMensagem);

if(localStorage.getItem("aceitouCookie" == "1")){
    aceitaMensagem();

}

function aceitaMensagem(){
    let divMensagemUsuario = document.getElementById("container-mensagem-usuario");
    divMensagemUsuario.classList.add("oculto");

    localStorage.setItem("aceitouCookie", "1")
}

document.querySelector(".searchButton").addEventListener("click", function(event) {
  event.preventDefault(); // Evita o comportamento padrão do botão

  const searchTerm = document.querySelector(".searchInput").value.toLowerCase();
  const items = document.querySelectorAll(".container-projetos .projeto");

  let hasResults = false;

  items.forEach(item => {
      const title = item.querySelector("h3").textContent.toLowerCase();
      const description = item.querySelector(".informacoes-projeto").textContent.toLowerCase();

      // Verifica se o termo de busca está no título ou na descrição
      if (title.includes(searchTerm) || description.includes(searchTerm)) {
          item.style.display = "block"; // Mostra o item se corresponder ao termo
          hasResults = true;
      } else {
          item.style.display = "none"; // Esconde o item se não corresponder ao termo
      }
  });

  // Exibe uma mensagem caso nenhum resultado seja encontrado
  const resultsContainer = document.getElementById("results");
  resultsContainer.innerHTML = ''; // Limpa mensagens anteriores

  if (!hasResults) {
      resultsContainer.innerHTML = "<p>Nenhum resultado encontrado</p>";
  }
});

// Atualização opcional para limpar a busca ao limpar o campo de busca
document.querySelector(".searchInput").addEventListener("input", function() {
  if (this.value === "") {
      const items = document.querySelectorAll(".container-projetos .projeto");
      items.forEach(item => item.style.display = "block");
      document.getElementById("results").innerHTML = '';
  }
});


