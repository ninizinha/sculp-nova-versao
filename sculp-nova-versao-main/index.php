<?php
require __DIR__ . '/vendor/autoload.php';

if (!class_exists('src\database\Database')) {
  die('Autoload do Composer não está funcionando corretamente.');
} // DEBUG PARA VERIFICAR AUTOLOAD DO COMPOSER

use src\database\Database;

$db = new Database();
$conn = $db->getConnection();


//DEBUG PARA CONEXÃO COM A DB
// if($conn) {
//   echo "<script>alert('Banco de dados conectado com sucesso!')</script>";
// } 

$results = [];
if (isset($_GET['query'])) {
  $query = $_GET['query'];
  $stmt = $conn->prepare("SELECT descricao FROM produtos WHERE descricao LIKE ?");
  $stmt->execute(['%' . $query . '%']);
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SCULP - As melhores tattoos </title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.14.0/devicon.min.css" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="./src/css/reset.css" />
  <link rel="stylesheet" href="./src/css/estilosport.css" />
  <link rel="stylesheet" href="./src/css/responsivo.css">
</head>

<body>
  <header class="cabecalho">

    <a href="#informacoes1">
      <h1 class="logo">S</h1>
    </a>

    <div class="container-foto">
      <div class="foto sombra-interna">
        <img src="./src/imagens/Picsart_24-03-25_19-07-41-739.png" alt="logo sculp" />
      </div>
    </div>

    <nav class="menu">
      <ul>
        <li>
          <a href="#projetos">Tatuagens</a>
        </li>
      </ul>
    </nav>

  </header>

  <div class="searchBox">
    <form method="GET" action="">
      <input class="searchInput" type="text" name="query" placeholder="Procure uma tattoo" autocomplete="off">
      <button type="submit" class="searchButton" href="#">
    </form>

    <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29" fill="none">
      <g clip-path="url(#clip0_2_17)">
        <g filter="url(#filter0_d_2_17)">
          <path
            d="M23.7953 23.9182L19.0585 19.1814M19.0585 19.1814C19.8188 18.4211 20.4219 17.5185 20.8333 16.5251C21.2448 15.5318 21.4566 14.4671 21.4566 13.3919C21.4566 12.3167 21.2448 11.252 20.8333 10.2587C20.4219 9.2653 19.8188 8.36271 19.0585 7.60242C18.2982 6.84214 17.3956 6.23905 16.4022 5.82759C15.4089 5.41612 14.3442 5.20435 13.269 5.20435C12.1938 5.20435 11.1291 5.41612 10.1358 5.82759C9.1424 6.23905 8.23981 6.84214 7.47953 7.60242C5.94407 9.13789 5.08145 11.2204 5.08145 13.3919C5.08145 15.5634 5.94407 17.6459 7.47953 19.1814C9.01499 20.7168 11.0975 21.5794 13.269 21.5794C15.4405 21.5794 17.523 20.7168 19.0585 19.1814Z"
            stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" shape-rendering="crispEdges">
          </path>
        </g>
      </g>
      <defs>
        <filter id="filter0_d_2_17" x="-0.418549" y="3.70435" width="29.7139" height="29.7139"
          filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
          <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
          <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
            result="hardAlpha"></feColorMatrix>
          <feOffset dy="4"></feOffset>
          <feGaussianBlur stdDeviation="2"></feGaussianBlur>
          <feComposite in2="hardAlpha" operator="out"></feComposite>
          <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"></feColorMatrix>
          <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_2_17"></feBlend>
          <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2_17" result="shape"></feBlend>
        </filter>
        <clipPath id="clip0_2_17">
          <rect width="28.0702" height="28.0702" fill="white" transform="translate(0.403503 0.526367)"></rect>
        </clipPath>
      </defs>
    </svg>


    </button>
  </div>
  <div id="results">
    <?php if (isset($results)): ?>
      <?php foreach ($results as $result): ?>
        <p><?php echo htmlspecialchars($result['descricao'], ENT_QUOTES, 'UTF-8'); ?></p>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>

  <section class="home">
    <div class="slideshow">
      <div class="slide">
        <img src="./src/imagens/tatuagem1.png" alt="Slide 1">
      </div>
      <div class="slide">
        <img src="src/imagens/tatuagem2 (2).png" alt="Slide 2">
      </div>
      <div class="slide">
        <img src="src/imagens/tatuagem3.jpg" alt="Slide 3">
      </div>

    </div>
    <div id="informacoes1" class="informacoes">
      <h1>Encontre aqui a tattoo perfeita!</h1>
      <p>Descubra primeiro e depois faça de verdade. 😁</p>

      <p>Reunimos em um só lugar as tattoos temporárias mais maneiras, confere tudo 💜</p>
      <p>Viu tudo e quer mais inspirações?! Acesse abaixo:</p>

      <ul class="redes-sociais">
        <li>
          <a href="https://pin.it/3jNRNck0K" title="Ir para o " target="_blank">
            <i class="fab fa-pinterest"></i>
          </a>
        </li>

        <li>
          <a href="https://www.instagram.com/tatuagem.top?igsh=MWN4OXl5OTZvenlhaw==" title="Ir para o Instagram"
            target="_blank">
            <i class="fab fa-instagram"></i>
          </a>
        </li>
      </ul>

      <h2> Mas o que são tatuagens temporárias? </h2>
      <p>
        Tatuagens temporárias são uma alternativa semipermanente às tatuagens permanentes, aplicadas na pele com
        adesivos especiais. São usadas para experimentar designs de tatuagem sem o compromisso de longo prazo.</p>
    </div>
  </section>
  <section class="projetos" id="projetos">
    <h2 class="titulo">Tatuagens</h2>

    <div class="container-projetos">
      <div class="projeto ativo">
        <a href="https://shopee.com.br/product/1006215031/25917989146" target="_blank">
          <img src="./src/imagens/tattoo01.png" alt="Tattoo" />
          <h3>Tatuagem aranha</h3>

          <div class="informacoes-projeto">
            <p>Tatuagem falsa de aranha</p>
            <p>🕷️</p>
          </div>
        </a>
      </div>

      <div class="projeto ativo">
        <a href="https://shopee.com.br/Adesivos-Tempor%C3%A1rios-para-Tatuagem-15-Dias-Elementos-Fantasmas-Elementos-Fantasmas-%C3%9Anicos-%C3%A0-prova-d'%C3%A1gua-Tatuagens-N%C3%A3o-Refletivas-Meninas-Tatuagem-Falsa-Corpete-Costas-i.1006215031.25554407470?sp_atk=985ef0db-0501-4c32-876a-c0f6090ba995&xptdk=985ef0db-0501-4c32-876a-c0f6090ba995"
          target="_blank">
          <img src="./src/imagens/tattoo02.png" alt="Projeto listagem de pokemons" />
          <h3>Tatuagem coração Y2k</h3>
          <div class="informacoes-projeto">
            <p>Tatuagem coração com asas Y2K</p>
            <p>🖤</p>
          </div>
        </a>
      </div>

      <div class="projeto ativo">
        <a href="https://shopee.com.br/Tatuagem-Falsa-Temporaria-Realista-Le%C3%A3o-Com-Rosas-3D-i.287679232.23209393903?sp_atk=ac098967-3d82-4da8-a5e3-0534ba9ea806&xptdk=ac098967-3d82-4da8-a5e3-0534ba9ea806"
          target="_blank">
          <img src="./src/imagens/tattoo03.png" alt="Projeto landing page One Piece" />
          <h3>Tatuagem Leão</h3>
          <div class="informacoes-projeto">
            <p>Tatuagem Leão</p>
            <p>🦁</p>
          </div>
        </a>
      </div>

      <div class="projeto ativo">
        <a href="https://shopee.com.br/Tatuagem-Tempor%C3%A1ria-N%C3%A3o-Refletiva-Tempor%C3%A1ria-N%C3%A3o-Refletiva-Padr%C3%A3o-Borboleta-Sonhadora-Homens-Mulheres-Tatuagem-Falsa-i.1006215031.24158744834?sp_atk=50dee74f-102e-4a8e-a881-fcfdeedc7517&xptdk=50dee74f-102e-4a8e-a881-fcfdeedc7517"
          target="_blank">
          <img src="./src/imagens/tattoo04.png" alt="Borboleta" />
          <h3>Tatuagem Borboleta</h3>
          <div class="informacoes-projeto">
            <p>Tatuagem Borboleta Sonhadora</p>
            <p>🦋</p>
          </div>
        </a>
      </div>

      <div class="projeto">
        <a href="https://shopee.com.br/Adesivos-Tempor%C3%A1rios-De-Tatuagem-De-Cobra-Pintados-%C3%80-M%C3%A3o-M%C3%A1gica-De-Longa-Dura%C3%A7%C3%A3o-Prova-D'%C3%A1gua-Dura-At%C3%A9-15-Dias-Falsa-semi-Permanente-.-i.859352639.25352292717?sp_atk=66e3d113-2386-4e61-b87a-6d2bc72356a5&xptdk=66e3d113-2386-4e61-b87a-6d2bc72356a5"
          target="_blank">
          <img src="./src/imagens/tattoo05.png" alt="Cobra" />
          <h3>Tatuagem Cobra</h3>
          <div class="informacoes-projeto">
            <p>Tatuagem Cobra</p>
            <p>🐍</p>
          </div>
        </a>
      </div>

      <div class="projeto">
        <a href="https://shopee.com.br/1-Folha-Tatuagem-Tempor%C3%A1ria-Do-Drag%C3%A3o-%C3%81guia-Tigre-Cr%C3%A2nio-Rei-Animal-Falsa-Autocolante-i.1006215031.25518682209?sp_atk=f4a878d7-f69e-43a7-a07f-1e6d712a7dad&xptdk=f4a878d7-f69e-43a7-a07f-1e6d712a7dad"
          target="_blank">
          <img src="./src/imagens/tattoo06.png" alt="DRAGÃO" />
          <h3>Tatuagem Dragão</h3>
          <div class="informacoes-projeto">
            <p>Tatuagem Dragão</p>
            <p>🐉</p>
          </div>
        </a>
      </div>

      <div class="projeto">
        <a href="https://shopee.com.br/Adesivos-de-Tatuagem-%C3%A0-prova-d'%C3%A1gua-de-longa-dura%C3%A7%C3%A3o-Simula%C3%A7%C3%A3o-de-Tatuagem-Tempor%C3%A1ria-N%C3%A3o-Refletiva-Padr%C3%A3o-de-Tatuagem-Tempor%C3%A1ria-Homens-Mulheres-Tatuagens-Falsas-i.1006215031.25708742918?sp_atk=c3cebc06-5951-4638-9c97-cc7d645ca649&xptdk=c3cebc06-5951-4638-9c97-cc7d645ca649"
          target="_blank">
          <img src="./src/imagens/tattoo07.png" alt="Capa do projeto" />
          <h3>Tatuagem Carpas</h3>
          <div class="informacoes-projeto">
            <p>Tatuagem Peixe Carpas</p>
            <p>🐟</p>
          </div>
        </a>
      </div>

      <div class="projeto">
        <a href="https://shopee.com.br/Adesivos-Tempor%C3%A1rios-De-Tatuagem-Lotus-M%C3%A1gica-De-Longa-Dura%C3%A7%C3%A3o-%C3%80-Prova-D'%C3%A1gua-Dura-At%C3%A9-15-Dias-Falsa-semi-Permanente-.-i.859352639.25252293230?sp_atk=d17b8f84-59e8-4889-996e-e8e2b31743c1&xptdk=d17b8f84-59e8-4889-996e-e8e2b31743c1"
          target="_blank">
          <img src="./src/imagens/tattoo08.png" alt="Capa do projeto" />
          <h3>Tatuagem Lotus</h3>
          <div class="informacoes-projeto">
            <p>Tatuagem Flor Lotus</p>
            <p>🌼</p>
          </div>
        </a>
      </div>

      <div class="projeto">
        <a href="https://shopee.com.br/Simula%C3%A7%C3%A3o-de-Tatuagem-Tempor%C3%A1ria-N%C3%A3o-Refletiva-de-Tatuagem-Tempor%C3%A1ria-N%C3%A3o-Refletiva-Tatuagem-Tempor%C3%A1ria-Padr%C3%A3o-de-Menina-do-Sol-Tatuagem-Falsa-i.1006215031.25208747164?sp_atk=aadd2883-a010-4cbf-a2a0-24fda29b5826&xptdk=aadd2883-a010-4cbf-a2a0-24fda29b5826"
          target="_blank">
          <img src="./src/imagens/tattoo09.png" alt="Capa do projeto" />
          <h3>Tatuagem Sol e Mulher</h3>
          <div class="informacoes-projeto">
            <p>Tatuagem Sol com Mulher </p>
            <p>☀️</p>
          </div>
        </a>
      </div>

      <div class="projeto">
        <a href="https://shopee.com.br/Adesivo-de-Tatuagem-de-15-dias-de-longa-dura%C3%A7%C3%A3o-%C3%A0-prova-d'%C3%A1gua-Tatuagem-Tempor%C3%A1ria-N%C3%A3o-Refletiva-M%C3%A1scara-de-Cor-Padr%C3%A3o-Humano-Tatuagem-Falsa-i.1006215031.25254898801?sp_atk=12fed3cf-6157-4b5e-bf97-5e66156e78da&xptdk=12fed3cf-6157-4b5e-bf97-5e66156e78da"
          target="_blank">
          <img src="./src/imagens/tattoo10.png" alt="Capa do projeto" />
          <h3>Tatuagem Japonesa</h3>
          <div class="informacoes-projeto">
            <p>Tatuagem Mulher Japonesa com Máscara </p>
            <p>🎭</p>
          </div>
        </a>
      </div>

      <div class="projeto">
        <a href="https://shopee.com.br/Adesivos-Tempor%C3%A1rios-Para-Tatuagem-Da-Sereia-M%C3%A1gica-De-Longa-Dura%C3%A7%C3%A3o-%C3%80-Prova-D'%C3%A1gua-Dura-At%C3%A9-15-Dias-De-Falsa-semi-Permanente-.-i.859352639.23161897930?sp_atk=a73d1633-aaa6-436a-8186-6f9271d64b25&xptdk=a73d1633-aaa6-436a-8186-6f9271d64b25"
          target="_blank">
          <img src="./src/imagens/tattoo11.png" alt="Capa do projeto" />
          <h3>Tatuagem Sereia</h3>
          <div class="informacoes-projeto">
            <p>Tatuagem de Sereia </p>
            <p>🧜</p>
          </div>
        </a>
      </div>

      <div class="projeto">
        <a href="https://shopee.com.br/Simula%C3%A7%C3%A3o-de-Adesivo-de-Tatuagem-%C3%A0-prova-d'%C3%A1gua-de-longa-dura%C3%A7%C3%A3o-M%C3%A1scara-de-Camuflagem-Tempor%C3%A1ria-N%C3%A3o-Refletiva-de-Tatuagem-Falsa-Padr%C3%A3o-de-M%C3%A1scara-i.1006215031.25858743781?sp_atk=8856392c-2944-4e93-8acc-eb053af378b0&xptdk=8856392c-2944-4e93-8acc-eb053af378b0"
          target="_blank">
          <img src="./src/imagens/tattoo12.png" alt="Capa do projeto" />
          <h3>Tatuagem Máscaras</h3>
          <div class="informacoes-projeto">
            <p>Tatuagem com duas máscaras </p>
            <p>🎭</p>
          </div>
        </a>
      </div>

      <div class="projeto">
        <a href="https://shopee.com.br/Adesivo-de-Tatuagem-Tempor%C3%A1ria-N%C3%A3o-Reflexiva-%C3%A0-prova-d'%C3%A1gua-de-15-dias-de-longa-dura%C3%A7%C3%A3o-Tatuagem-Tempor%C3%A1ria-Tatuagem-Geom%C3%A9trica-Colorida-Padr%C3%A3o-de-B%C3%BAssola-Falsas-Tatuagens-i.1006215031.25407179628?sp_atk=1516ea7e-86f8-4663-83e7-e5cfd49bb3cd&xptdk=1516ea7e-86f8-4663-83e7-e5cfd49bb3cd"
          target="_blank">
          <img src="./src/imagens/tattoo13.png" alt="Capa do projeto" />
          <h3>Tatuagem Bússola</h3>
          <div class="informacoes-projeto">
            <p>Tatuagem Bússola com escrita japonesa </p>
            <p>🧭</p>
          </div>
        </a>
      </div>

      <div class="projeto">
        <a href="https://shopee.com.br/Adesivos-Tempor%C3%A1rios-Para-Tatuagem-De-Gatos-M%C3%A1gica-De-Longa-Dura%C3%A7%C3%A3o-%C3%80-Prova-D'%C3%A1gua-Dura-At%C3%A9-15-Dias-De-Falsa-semi-Permanente-.-i.859352639.25059107125?sp_atk=c9881c36-a0be-4c28-8e4f-218cd3eb1c5c&xptdk=c9881c36-a0be-4c28-8e4f-218cd3eb1c5c"
          target="_blank">
          <img src="./src/imagens/tattoo14.png" alt="Capa do projeto" />
          <h3>Tatuagem Gato</h3>
          <div class="informacoes-projeto">
            <p>Tatuagem rosto de gato com lua na testa </p>
            <p>🐱</p>
          </div>
        </a>
      </div>

      <div class="projeto">
        <a href="https://shopee.com.br/Jujutsu-Kaisen-Gojo-Satoru-Adesivos-Tempor%C3%A1rios-De-Tatuagem-M%C3%A1gica-%C3%80-Prova-D'%C3%A1gua-De-Longa-Dura%C3%A7%C3%A3o-Dura-At%C3%A9-15-Dias-Falsa-semi-Permanente-.-i.859352639.25908529485?sp_atk=659a9ad9-5bcb-4ec9-9c2c-9f123ae651da&xptdk=659a9ad9-5bcb-4ec9-9c2c-9f123ae651da"
          target="_blank">
          <img src="./src/imagens/tattoo15.png" alt="Capa do projeto" />
          <h3>Tatuagem Satoru Gojo</h3>
          <div class="informacoes-projeto">
            <p>Tatuagem anime Jujutsu Kaisen Satoru Gojo </p>
            <p>👱🏻‍♂️</p>
          </div>
        </a>
      </div>

      <div class="projeto">
        <a href="https://shopee.com.br/Adesivos-Tempor%C3%A1rios-Para-Tatuagem-Do-Anjo-Ca%C3%ADdo-M%C3%A1gica-De-Longa-Dura%C3%A7%C3%A3o-%C3%80-Prova-D'%C3%A1gua-Dura-At%C3%A9-15-Dias-De-Falsa-semi-Permanente-.-i.859352639.25052292829?sp_atk=89ab576e-1755-4c97-9bd9-cd0de02f05e3&xptdk=89ab576e-1755-4c97-9bd9-cd0de02f05e3"
          target="_blank">
          <img src="./src/imagens/tattoo17.png" alt="Capa do projeto" />
          <h3>Tatuagem Anjo Caído</h3>
          <div class="informacoes-projeto">
            <p>Tatuagem Anjo Caído</p>
            <p>👼</p>
          </div>
        </a>
      </div>

      <div class="projeto">
        <a href="https://shopee.com.br/Tatuagem-Tempor%C3%A1ria-N%C3%A3o-Refletiva-Padr%C3%A3o-Fantasma-Colorida-Falsas-de-15-dias-de-longa-dura%C3%A7%C3%A3o-%C3%A0-prova-d'%C3%A1gua-Tatuagem-Tempor%C3%A1ria-N%C3%A3o-Refletiva-i.1006215031.25907559002?sp_atk=5560150a-53e9-4854-925e-5676138e5f55&xptdk=5560150a-53e9-4854-925e-5676138e5f55"
          target="_blank">
          <img src="./src/imagens/tattoo18.png" alt="Capa do projeto" />
          <h3>Tatuagem Jack</h3>
          <div class="informacoes-projeto">
            <p>Tatuagem Jack do Estranho Mundo de Jack</p>
            <p>💀</p>
          </div>
        </a>
      </div>
      <div class="projeto">
        <a href="https://shopee.com.br/Adesivos-Tempor%C3%A1rios-De-Tatuagem-De-Tinta-M%C3%A1gica-De-Longa-Dura%C3%A7%C3%A3o-%C3%80-Prova-D'%C3%A1gua-Dura-At%C3%A9-15-Dias-Falsa-semi-Permanente-.-i.859352639.23061897936?sp_atk=8cdd7ba3-eff8-4a2c-ba01-6d8be1d4b90a&xptdk=8cdd7ba3-eff8-4a2c-ba01-6d8be1d4b90a"
          target="_blank">
          <img src="./src/imagens/tattoo19.png" alt="Capa do projeto" />
          <h3>Tatuagem Tinta</h3>
          <div class="informacoes-projeto">
            <p>Tatuagem imitando traço de tinta</p>
            <p>🎨</p>
          </div>
        </a>
      </div>

      <div class="projeto">
        <a href="https://shopee.com.br/Tatuagem-Tempor%C3%A1ria-Fake-Falsa-Astronauta-i.724905793.20699179601?sp_atk=951995bf-259b-4c28-a277-3527484ded2b&xptdk=951995bf-259b-4c28-a277-3527484ded2b"
          target="_blank">
          <img src="./src/imagens/tattoo20.png" alt="Capa do projeto" />
          <h3>Tatuagem Astronauta</h3>
          <div class="informacoes-projeto">
            <p>Tatuagem com Astronauta flutuante</p>
            <p>👨‍🚀</p>
          </div>
        </a>
      </div>

      <div class="projeto">
        <a href="https://shopee.com.br/KIT-Tatuagem-S%C3%89RIE-Animados-Tempor%C3%A1ria-COLORIDO-Tattoo-Fake-a-Prova-D'%C3%A1gua-Unisex-Realistas-3D-Festa-Social-Ver%C3%A3o-Praia-Masculino-Feminina-Realismo-i.989516341.22692812290?sp_atk=fadadbdc-5d87-4e21-9816-c282ddddcff2&xptdk=fadadbdc-5d87-4e21-9816-c282ddddcff2"
          target="_blank">
          <img src="./src/imagens/tattoo21.png" alt="Capa do projeto" />
          <h3>Tatuagem Gato e Flor</h3>
          <div class="informacoes-projeto">
            <p>Tatuagem colorida com Gato e Flor</p>
            <p>🐱🌹</p>
          </div>
        </a>
      </div>

      <div class="projeto">
        <a href="https://shopee.com.br/Ukiyo-e-Ocean-Wave-Adesivos-Tempor%C3%A1rios-De-Tatuagem-M%C3%A1gica-De-Longa-Dura%C3%A7%C3%A3o-%C3%80-Prova-D'%C3%A1gua-Dura-At%C3%A9-15-Dias-Falsa-semi-Permanente-.-i.859352639.25052293323?sp_atk=96fe6fe5-2379-43f6-a455-959e255dd410&xptdk=96fe6fe5-2379-43f6-a455-959e255dd410"
          target="_blank">
          <img src="./src/imagens/tattoo22.png" alt="Capa do projeto" />
          <h3>Tatuagem Onda do Mar</h3>
          <div class="informacoes-projeto">
            <p>Tatuagem em círculo de onda do mar</p>
            <p>🌊</p>
          </div>
        </a>
      </div>

      <div class="projeto">
        <a href="https://shopee.com.br/Tatuagem-Tempor%C3%A1ria-Fake-Falsa-Planetas-i.724905793.22392346224?sp_atk=8dab2f19-3815-4883-b1d9-83c67b48741c&xptdk=8dab2f19-3815-4883-b1d9-83c67b48741c"
          target="_blank">
          <img src="./src/imagens/tattoo23.png" alt="Capa do projeto" />
          <h3>Tatuagem Planetas</h3>
          <div class="informacoes-projeto">
            <p>Tatuagem com Planetas do Sistema Solar</p>
            <p>🪐</p>
          </div>
        </a>
      </div>

      <div class="projeto">
        <a href="https://shopee.com.br/1-Etiqueta-De-Tatuagem-%C3%A0-Prova-D'%C3%A1gua-Com-Padr%C3%A3o-De-Borboleta-Azul-De-Peixe-Tempor%C3%A1rio-i.484360794.12417949043?sp_atk=cacb5395-1fb0-423d-b03b-28bd10fcb6cd&xptdk=cacb5395-1fb0-423d-b03b-28bd10fcb6cd"
          target="_blank">
          <img src="./src/imagens/tattoo25.png" alt="Capa do projeto" />
          <h3>Tatuagem Borboletas</h3>
          <div class="informacoes-projeto">
            <p>Tatuagem com Borboletas minimalista</p>
            <p>🦋</p>
          </div>
        </a>
      </div>

      <div class="projeto">
        <a href="https://shopee.com.br/Tatuagem-Tempor%C3%A1ria-%C3%80-Prova-D'%C3%A1gua-Autocolante-Do-Bra%C3%A7o-Le%C3%A3o-Cruz-Lobo-Arte-Da-Vida-Selvagem-Manga-Falsa-tatuagem-fake-masculina-i.568663363.21875973636?sp_atk=e02c3e04-8d14-4b00-97b0-1454a57d4aa8&xptdk=e02c3e04-8d14-4b00-97b0-1454a57d4aa8"
          target="_blank">
          <img src="./src/imagens/tattoo26.png" alt="Capa do projeto" />
          <h3>Tatuagem Lobo </h3>
          <div class="informacoes-projeto">
            <p>Tatuagem Lobo com garras e lua na testa</p>
            <p>🐺</p>
          </div>
        </a>
      </div>

      <div class="projeto">
        <a href="https://shopee.com.br/1-Adesivo-De-Tatuagem-De-Flor-De-Folha-Tempor%C3%A1ria-%C3%80-Prova-D'%C3%A1gua-i.1006215031.25068679786?sp_atk=00caf067-5e94-4927-9de2-998d7bd618bf&xptdk=00caf067-5e94-4927-9de2-998d7bd618bf"
          target="_blank">
          <img src="./src/imagens/tattoo27.png" alt="Capa do projeto" />
          <h3>Tatuagem Flor com Folhas</h3>
          <div class="informacoes-projeto">
            <p>Tatuagem de Flor com suas folhas</p>
            <p>🌼</p>
          </div>
        </a>
      </div>

      <div class="projeto">
        <a href="https://shopee.com.br/Simula%C3%A7%C3%A3o-de-Tatuagem-de-Longa-Dura%C3%A7%C3%A3o-%C3%A0-prova-d'%C3%A1gua-Tatuagem-Tempor%C3%A1ria-N%C3%A3o-Refletiva-Tatuagem-Tempor%C3%A1ria-de-Longa-Dura%C3%A7%C3%A3o-F-i.1006215031.25808743984?sp_atk=3f1c1439-fb6d-4de0-9814-42c7ae417b0a&xptdk=3f1c1439-fb6d-4de0-9814-42c7ae417b0a"
          target="_blank">
          <img src="./src/imagens/tattoo28.png" alt="Capa do projeto" />
          <h3>Tatuagem Mulher Demonio </h3>
          <div class="informacoes-projeto">
            <p>Tatuagem Mulher Demonio com Máscara</p>
            <p>🐱‍👤</p>
          </div>
        </a>
      </div>

      <div class="projeto">
        <a href="https://shopee.com.br/Adesivo-de-Tatuagem-de-15-dias-de-longa-dura%C3%A7%C3%A3o-%C3%A0-prova-d'%C3%A1gua-Tatuagem-Tempor%C3%A1ria-N%C3%A3o-Refletiva-Tatuagem-Tempor%C3%A1ria-Padr%C3%A3o-Feminino-Guerreiro-Falsas-Tatuagens-i.1006215031.24454894237?sp_atk=ab7e99ed-3f90-44c8-9152-525be044737b&xptdk=ab7e99ed-3f90-44c8-9152-525be044737b"
          target="_blank">
          <img src="./src/imagens/tattoo29.png" alt="Capa do projeto" />
          <h3>Tatuagem Mulher Guerreira </h3>
          <div class="informacoes-projeto">
            <p>Tatuagem Mulher com capacete com penas </p>
            <p>👩</p>
          </div>
        </a>
      </div>

      <div class="projeto">
        <a href="https://shopee.com.br/Disc-Prajna-Snake-Prajna-de-longa-dura%C3%A7%C3%A3o-%C3%A0-prova-d'%C3%A1gua-Uma-semana-a-duas-semanas-Autocolantes-Semi-Permanentes-de-Tatuagem-Autocolantes-Tempor%C3%A1rios-de-Tatuagem-de-Cor-Homens-Mulheres-Tatuagens-Falsas-i.1006215031.25316572096?sp_atk=83d6035a-d215-4ced-b5e2-e24d996dd127&xptdk=83d6035a-d215-4ced-b5e2-e24d996dd127"
          target="_blank">
          <img src="./src/imagens/tattoo30.png" alt="Capa do projeto" />
          <h3>Tatuagem Oni </h3>
          <div class="informacoes-projeto">
            <p>Tatuagem Oni com cobras </p>
            <p>👹</p>
          </div>
        </a>
      </div>

      <div class="projeto">
        <a href="https://shopee.com.br/Tatuagem-Tempor%C3%A1ria-Falsa-de-15-dias-de-longa-dura%C3%A7%C3%A3o-Autocolante-de-Tatuagem-Tempor%C3%A1ria-N%C3%A3o-Refletiva-%C3%A0-prova-d'%C3%A1gua-Tatuagem-Tempor%C3%A1ria-Padr%C3%A3o-de-Coelho-i.1006215031.25055286461?sp_atk=db8d9a80-d2ef-4fc2-98f0-52be00f12ba0&xptdk=db8d9a80-d2ef-4fc2-98f0-52be00f12ba0"
          target="_blank">
          <img src="./src/imagens/tattoo31.png" alt="Capa do projeto" />
          <h3>Tatuagem Coelho </h3>
          <div class="informacoes-projeto">
            <p>Tatuagem Coelho com pote de mel </p>
            <p>🐰</p>
          </div>
        </a>
      </div>

      <div class="projeto">
        <a href="https://shopee.com.br/Tatuagem-Adesiva-Falsa-Tempor%C3%A1ria-Frases-em-Ingl%C3%AAs-11x4-5cm-Masculino-Feminino-Envio-Imediato-i.375239854.7483710770?sp_atk=c526cb5e-4039-411a-87d2-e81350728464&xptdk=c526cb5e-4039-411a-87d2-e81350728464"
          target="_blank">
          <img src="./src/imagens/tattoo32.png" alt="Capa do projeto" />
          <h3>Tatuagem Blessed</h3>
          <div class="informacoes-projeto">
            <p>Tatuagem escrita Blessed </p>
            <p>✏️</p>
          </div>
        </a>
      </div>

      <div class="projeto">
        <a href="https://shopee.com.br/Tatuagem-Remov%C3%ADvel-Rosas-Flores-Muito-Linda-Tempor%C3%A1ria-XQB-265-i.426649050.13564681456?sp_atk=a415a42d-2fe7-4956-8872-d288e19de7a9&xptdk=a415a42d-2fe7-4956-8872-d288e19de7a9"
          target="_blank">
          <img src="./src/imagens/tattoo33.png" alt="Capa do projeto" />
          <h3>Tatuagem Rosas </h3>
          <div class="informacoes-projeto">
            <p>Tatuagem de flor estilo Rosas </p>
            <p>🌹</p>
          </div>
        </a>
      </div>

      <div class="projeto">
        <a href="https://shopee.com.br/Tatuagem-Fake-Casal-Le%C3%A3o-Leoa-Flores-Tattoo-3D-i.287679232.14796127727?sp_atk=7d493815-ac46-4d21-9d62-7340e653537c&xptdk=7d493815-ac46-4d21-9d62-7340e653537c"
          target="_blank">
          <img src="./src/imagens/tattoo34.png" alt="Capa do projeto" />
          <h3>Tatuagem Leão e Leoa</h3>
          <div class="informacoes-projeto">
            <p>Tatuagem de Leão com Leoa </p>
            <p>🦁</p>
          </div>
        </a>
      </div>
    </div>

    <button class="btn-mostrar-projetos">Mostrar mais</button>
  </section>

  <div id="container-mensagem-usuario" class="mensagem-usuario">
    <p> Nosso site processa dados pessoais. Aceita continuar?</p>
    <button id="botao-aceita-mensagem"> Aceitar</button>

  </div>

  <script src="./src/js/index.js"></script>

</body>

</html>