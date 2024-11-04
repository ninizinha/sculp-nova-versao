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
    {name: "Tatuagem Aranha", description: "Tatuagem falsa de aranha"},
    {name: "Tatuagem Coração Y2k", description: "Tatuagem coração com asas Y2K"},
    {name: "Tatuagem Leão", description: "Tatuagem Leão"},
    {name: "Tatuagem Borboleta", description: "Tatuagem Borboleta Sonhadora"},
    {name: "Tatuagem Cobra", description: "Tatuagem Cobra"},
    {name: "Tatuagem Dragão", description: "Tatuagem Dragão"},
    {name: "Tatuagem Carpas", description: "Tatuagem Peixe Carpas"},
    {name: "Tatuagem Lotus", description: "Tatuagem Flor Lotus"},
    {name: "Tatuagem Sol e Mulher", description: "Tatuagem Sol com Mulher"},
    {name: "Tatuagem Japonesa", description: "Tatuagem Mulher Japonesa com Máscara"},
    {name: "Tatuagem Sereia", description: "Tatuagem de Sereia"},
    {name: "Tatuagem Máscaras", description: "Tatuagem com duas máscaras"},
    {name: "Tatuagem Bússola", description: "Tatuagem Bússola com escrita japonesa"},
    {name: "Tatuagem Gato", description: "Tatuagem rosto de gato com lua na testa"},
    {name: "Tatuagem Satoru Gojo", description: "Tatuagem anime Jujutsu Kaisen Satoru Gojo"},
    {name: "Tatuagem Anjo Caído", description: "Tatuagem Anjo Caído"},
    {name: "Tatuagem Jack", description: "Tatuagem Jack do Estranho Mundo de Jack"},
    {name: "Tatuagem Tinta", description: "Tatuagem imitando traço de tinta"},
    {name: "Tatuagem Astronauta", description: "Tatuagem com Astronauta flutuante"},
    {name: "Tatuagem Gato e Flor", description: "Tatuagem colorida com Gato e Flor"},
    {name: "Tatuagem Onda do Mar", description: "Tatuagem em círculo de onda do mar"},
    {name: "Tatuagem Planetas", description: "Tatuagem com Planetas do Sistema Solar"},
    {name: "Tatuagem Borboletas", description: "Tatuagem com Borboletas minimalista"},
    {name: "Tatuagem Lobo", description: "Tatuagem Lobo com garras e lua na testa"},
    {name: "Tatuagem Flor com Folhas", description: "Tatuagem de Flor com suas folhas"},
    {name: "Tatuagem Mulher Demônio", description: "Tatuagem Mulher Demônio com Máscara"},
    {name: "Tatuagem Mulher Guerreira", description: "Tatuagem Mulher com capacete com penas"},
    {name: "Tatuagem Oni", description: "Tatuagem Oni com cobras"},
    {name: "Tatuagem Coelho", description: "Tatuagem Coelho com pote de mel"},
    {name: "Tatuagem Blessed", description: "Tatuagem escrita Blessed"},
    {name: "Tatuagem Rosas", description: "Tatuagem de flor estilo Rosas"},
    {name: "Tatuagem Leão e Leoa", description: "Tatuagem de Leão com Leoa"}
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
  

