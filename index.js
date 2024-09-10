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

// Exemplo de dados de tatuagens
const tattooData = [
    {name: "Dragon Tattoo", description: "A fierce dragon on the back."},
    {name: "Flower Tattoo", description: "A delicate rose on the arm."},
    {name: "Skull Tattoo", description: "A spooky skull with flames."}
  ];
  
  // Função para exibir os resultados
  function displayResults(results) {
    const resultsContainer = document.getElementById('results');
    resultsContainer.innerHTML = ''; // Limpa os resultados anteriores
  
    if (results.length === 0) {
      resultsContainer.innerHTML = "<p>No results found</p>";
    } else {
      results.forEach(tattoo => {
        const resultItem = document.createElement('div');
        resultItem.classList.add('result-item');
        resultItem.innerHTML = `
          <h3>${tattoo.name}</h3>
          <p>${tattoo.description}</p>
        `;
        resultsContainer.appendChild(resultItem);
      });
    }
  }
  
  // Função para buscar tatuagens com base no input do usuário
  function searchTattoos(query) {
    const filteredResults = tattooData.filter(tattoo =>
      tattoo.name.toLowerCase().includes(query.toLowerCase()) || 
      tattoo.description.toLowerCase().includes(query.toLowerCase())
    );
    displayResults(filteredResults);
  }
  
  // Adiciona o evento ao campo de input (para digitação)
  document.getElementById('searchBar').addEventListener('input', function(event) {
    const query = event.target.value;
    searchTattoos(query);
  });
  
  // Adiciona o evento ao botão de pesquisa (ao clicar)
  document.getElementById('searchButton').addEventListener('click', function() {
    const query = document.getElementById('searchBar').value;
    searchTattoos(query);
  });
  

