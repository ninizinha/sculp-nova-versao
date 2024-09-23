import requests
from bs4 import BeautifulSoup
import time

# URL da Shopee com tatuagens temporárias de 5 estrelas
url = 'https://shopee.com.br/search?keyword=tatuagem%20tempor%C3%A1ria%205%20estrelas'

# Realizar a requisição HTTP
response = requests.get(url)
soup = BeautifulSoup(response.content, 'html.parser')

# Procurar por produtos na página
produtos_html = soup.find_all('div', class_='row shopee-search-item-result__items')

# Template para um item de tatuagem
item_template = """
<div class="projeto ativo">
  <a href="{url}" target="_blank">
    <img src="{img_src}" alt="Tattoo" />
    <h3>{nome}</h3>
    <div class="informacoes-projeto">
      <p>{descricao}</p>
      <p>⭐️⭐️⭐️⭐️⭐️</p>
    </div>
  </a>
</div>
"""

# Extrair informações dos produtos e criar blocos HTML
produtos = []
items_html = ""

for produto in produtos_html:
    nome_elemento = produto.find('div', class_='whitespace-normal line-clamp-2')
    nome = nome_elemento.text.strip() if nome_elemento else 'Nome indisponível'
    
    url_produto = produto.find('a')['href'] if produto.find('a') else '#'
    img_src = produto.find('img')['src'] if produto.find('img') else ''
    descricao_elemento = produto.find('div', class_='sua-classe-de-descricao')
    descricao = descricao_elemento.text.strip() if descricao_elemento else 'Descrição indisponível'

    if nome_elemento:
        produtos.append({
            'nome': nome,
            'url': 'https://shopee.com.br' + url_produto,
            'imagem': img_src,
            'descricao': descricao
        })

# Gerar o HTML dos itens
for produto in produtos:
    items_html += item_template.format(
        url=produto['url'],
        img_src=produto['imagem'],
        nome=produto['nome'],
        descricao=produto['descricao']
    )

# Ler o arquivo HTML existente
with open('index.html', 'r', encoding='utf-8') as file:
    html_content = file.read()

# Substituir um marcador específico no HTML existente pela nova lista de itens
html_content = html_content.replace('<!-- PROJETOS -->', items_html)

# Salvar o HTML atualizado no mesmo arquivo
with open('index.html', 'w', encoding='utf-8') as file:
    file.write(html_content)

print("Arquivo HTML atualizado com sucesso!")
