<?php
// Inclui o arquivo de conexão que criamos
include("conexao.php");

// Busca todos os produtos cadastrados no banco de dados
$resultado = $conexao->query("SELECT * FROM produtos");
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bella Fagundes Imports | Perfumes e Cosméticos</title>

    <meta name="description"
        content="Descubra perfumes femininos, masculinos, perfumes árabes e cosméticos na Bela Fagundes Imports.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- BARRA DE PROMOÇÃO -->
    <div class="barra-promocional">
        Descubra sua próxima fragrância favorita ✨
    </div>

    <!-- CABEÇALHO -->
    <header class="cabecalho">

        <div class="logo-container">
            <!-- Caminho corrigido apontando direto para a pasta certa que renomeamos -->
            <img src="img-bellafagundes/logo.jpg" alt="Bella Fagundes Imports" class="img-logo">
        </div>

        <nav class="menu">
            <a href="#inicio">Início</a>
            <a href="#femininos">Femininos</a>
            <a href="#masculinos">Masculinos</a>
            <a href="#arabes">Perfumes Árabes</a>
            <a href="#cosmeticos">Cosméticos</a>
            <button id="btn-abrir-carrinho" class="carrinho-icone">
                🛒 <span id="carrinho-contador">0</span>
            </button>
        </nav>

        <a href="#produtos" class="botao-cabecalho">
            Explorar loja
        </a>

    </header>

    <main>

        <!-- BANNER PRINCIPAL -->
        <section class="banner" id="inicio">

            <div class="banner-conteudo">

                <span class="etiqueta">
                    BELEZA • PERFUMARIA • ELEGÂNCIA
                </span>

                <h1>
                    Sua essência,
                    <span>seu encanto.</span>
                </h1>

                <p>
                    Descubra perfumes e cosméticos que revelam
                    sua personalidade e tornam cada momento especial.
                </p>

                <a href="#produtos" class="botao-principal">
                    DESCOBRIR PRODUTOS
                </a>

            </div>

            <div class="banner-decoracao">
                <span>BF</span>
                <p>Sinta-se única.</p>
            </div>

        </section>

        <!-- CATEGORIAS -->
        <section class="secao-categorias">

            <div class="titulo-secao">
                <span>ENCONTRE SEUS FAVORITOS</span>
                <h2>Explore nossas categorias</h2>
                <p>Beleza e fragrâncias para todos os estilos.</p>
            </div>

            <div class="categorias">

                <a href="#femininos" class="categoria categoria-feminina">
                    <span class="icone-categoria">🌸</span>
                    <h3>Perfumes Femininos</h3>
                    <p>Fragrâncias que encantam</p>
                </a>

                <a href="#masculinos" class="categoria categoria-masculina">
                    <span class="icone-categoria">🖤</span>
                    <h3>Perfumes Masculinos</h3>
                    <p>Presença e personalidade</p>
                </a>

                <a href="#arabes" class="categoria categoria-arabe">
                    <span class="icone-categoria">✨</span>
                    <h3>Perfumes Árabes</h3>
                    <p>Intensidade e sofisticação</p>
                </a>

                <a href="#produtos" class="categoria categoria-cosmeticos">
                    <span class="icone-categoria">🗼</span>
                    <h3>Perfumes Franceses</h3>
                    <p>O clássico luxo parisiense</p>
                </a>
            </div>




        </section>



        <!-- PRODUTOS EM DESTAQUE -->
        <section class="secao-produtos" id="produtos">




            <div class="titulo-secao">
                <span>SELEÇÃO ESPECIAL</span>
                <h2>Nossos destaques</h2>
                <p>Encontre produtos para presentear ou se presentear.</p>
            </div>
            <div class="produtos">
                <?php while ($produto = $resultado->fetch_assoc()): ?>
                    <article class="card-produto">
                        <div class="produto-imagem-wrapper">

                            <img src="IMG-Bellafagundes/<?php echo $produto['imagem']; ?>">
                        </div>

                        <div class="produto-info">
                            <span class="produto-categoria">
                                <?php echo $produto['marca']; ?> | <?php echo $produto['categoria']; ?>
                            </span>

                            <h4 class="produto-nome">
                                <?php echo $produto['nome']; ?> (<?php echo $produto['ml']; ?>)
                            </h4>

                            <p class="produto-desc">
                                <?php echo $produto['descricao']; ?>
                            </p>



                            <div class="produto-meta">
                                <span class="produto-preco">
                                    R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?>
                                </span>
                                <span class="produto-estoque">
                                    Qtd: <?php echo $produto['quantidade']; ?>
                                </span>
                            </div>

                            <button class="btn-comprar btn-add-carrinho" data-nome="<?php echo $produto['nome']; ?>" data-preco="<?php echo $produto['preco']; ?>">
                                Tenho Interesse
                            </button>

                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <!-- SEÇÃO DE OFERTAS COM BANNER DO COCO PERFUME -->
            <section class="banner-secundario banner-coco">

                <div class="ofertas-conteudo">
                    <span class="badge-topo">🔥 OFERTA EXCLUSIVA</span>

                    <h2>Linha Coco Chanel com Até 30% OFF</h2>

                    <p>
                        Sinta a sofisticação da alta perfumaria francesa com condições imperdíveis.
                        Garanta o seu clássico favorito por tempo limitado!
                    </p>

                    <a href="#contato" class="botao-principal botao-oferta">
                        APROVEITAR AGORA
                    </a>
                </div>

            </section>



            <section class="secao-produtos-promocao" id="ofertas-promocao">

                <div class="topo-ofertas">
                    <span class="badge-topo">🔥 OPORTUNIDADE ÚNICA</span>
                    <h2>Ofertas Imperdíveis</h2>
                    <p>Garanta os perfumes mais desejados com descontos especiais por tempo limitado.</p>
                </div>
            </section>

            <!-- PRODUTO 1 (LANÇAMENTO FEMININO) -->
            <article class="card-produto" id="femininos">
                <div class="imagem-produto imagem-escura">
                    <span class="selo-vitrine selo-novidade">✨ LANÇAMENTO</span>
                    <!-- Pasta corrigida para o seu padrão real -->
                    <img src="IMG-Bellafagundes/coco-noir.jpg" alt="Perfume Coco Noir Chanel" loading="lazy">
                </div>

                <div class="informacoes-produto">
                    <span class="categoria-produto">PERFUMARIA FEMININA</span>
                    <h3>Perfume Coco Noir Chanel</h3>
                    <p>A nova definição de luxo e sofisticação marcante.</p>
                    <div class="preco">Consulte o preço</div>
                    <a href="#contato" class="botao-produto btn-novidade">Tenho interesse</a>
                </div>
            </article>

            <!-- PRODUTO 2 (LANÇAMENTO MASCULINO) -->
            <article class="card-produto" id="masculinos">
                <div class="imagem-produto imagem-bege">
                    <span class="selo-vitrine selo-novidade">✨ LANÇAMENTO</span>
                    <img src="IMG-Bellafagundes/bleu-chanel.jpg" alt="Bleu de Chanel Masculino" loading="lazy">
                </div>

                <div class="informacoes-produto">
                    <span class="categoria-produto">PERFUMARIA MASCULINA</span>
                    <h3>Bleu de Chanel Masculino</h3>
                    <p>Presença inesquecível com notas frescas e marcantes.</p>
                    <div class="preco">Consulte o preço</div>
                    <a href="#contato" class="botao-produto btn-novidade">Tenho interesse</a>
                </div>
            </article>

            <!-- PRODUTO 3 (DESCONTO ÁRABE/FRANCÊS) -->
            <article class="card-produto" id="arabes">
                <div class="imagem-produto imagem-dourada">
                    <span class="selo-vitrine selo-desconto">🔥 30% OFF</span>
                    <img src="IMG-Bellafagundes/perfume-frances.jpg" alt="Perfume Francês Especial" loading="lazy">
                </div>

                <div class="informacoes-produto">
                    <span class="categoria-produto">PERFUMARIA FRANCESA</span>
                    <h3>Perfume Francês Especial</h3>
                    <p>Intensidade e exclusividade com preço promocional.</p>
                    <div class="preco">Consulte o preço</div>
                    <a href="#contato" class="botao-produto btn-desconto">Aproveitar Oferta</a>
                </div>
            </article>

            <!-- PRODUTO 4 (DESCONTO COSMÉTICOS) -->
            <article class="card-produto" id="cosmeticos">
                <div class="imagem-produto imagem-clara">
                    <span class="selo-vitrine selo-desconto-longo">🔥 LEVE 2 COM DESCONTO ESPECIAL 🤑</span>
                    <img src="IMG-Bellafagundes/cosmeticos.jpg" alt="Kit de Cosméticos Premium" loading="lazy">
                </div>

                <div class="informacoes-produto">
                    <span class="categoria-produto">BELEZA E CUIDADOS</span>
                    <h3>Kit de Cosméticos Premium</h3>
                    <p>Seu momento de autocuidado diário em super oferta.</p>
                    <div class="preco">Consulte o preço</div>
                    <a href="#contato" class="botao-produto btn-desconto">Aproveitar Oferta</a>
                </div>
            </article>




            <!-- DIFERENCIAIS -->
            <section class="diferenciais">

                <div class="diferencial">
                    <span>🎁</span>
                    <h3>Presentes especiais</h3>
                    <p>Encontre opções para momentos inesquecíveis.</p>
                </div>

                <div class="diferencial">
                    <span>💬</span>
                    <h3>Atendimento próximo</h3>
                    <p>Tire suas dúvidas antes de realizar seu pedido.</p>
                </div>

                <div class="diferencial">
                    <span>✨</span>
                    <h3>Beleza e estilo</h3>
                    <p>Produtos para diferentes gostos e personalidades.</p>
                </div>

            </section>

    </main>

    <!-- RODAPÉ -->
    <footer class="rodape" id="contato">

        <div class="rodape-conteudo">

            <div class="rodape-marca">


                <a href="#" class="logo-rodape-link">
                    <img src="img-bellafagundes/logo.jpg" alt="Bella Fagundes Imports" class="logo-rodape-img" style="max-width: 120px; height: auto; display: block;">
                </a>


                <p>Beleza que encanta. Fragrâncias que marcam.</p>
            </div>

            <div class="rodape-links">
                <h3>Navegação</h3>
                <a href="#inicio">Início</a>
                <a href="#femininos">Perfumes Femininos</a>
                <a href="#masculinos">Perfumes Masculinos</a>
                <a href="#arabes">Perfumes Árabes</a>
                <a href="#cosmeticos">Cosméticos</a>
            </div>

            <div class="rodape-links">
                <h3>Atendimento</h3>
                <p>Entre em contato para consultar produtos, preços e disponibilidade.</p>
                <a href="https://wa.me/55SEUDDDSEUNUMERO"
                    target="_blank"
                    rel="noopener noreferrer">
                    Atendimento pelo WhatsApp
                </a>
            </div>

        </div>

        <div class="rodape-final">
            <p>
                &copy; 2026 Bela Fagundes Imports.
                Todos os direitos reservados.
            </p>
        </div>
    </footer>


    <!-- Estrutura do Carrinho Lateral -->
    <div id="carrinho-lateral" class="carrinho-lateral">
        <div class="carrinho-cabecalho">
            <h2>Minha Sacola</h2>
            <button id="btn-fechar-carrinho" class="btn-fechar">&times;</button>
        </div>

        <div id="carrinho-itens" class="carrinho-itens">
            <p class="carrinho-vazio">Sua sacola está vazia...</p>
        </div>

        <div class="carrinho-rodape">
            <div class="carrinho-total">
                <span>Total:</span>
                <span id="carrinho-valor-total">R$ 0,00</span>
            </div>
            <a href="#" id="btn-enviar-whatsapp" target="_blank" class="btn-finalizar-compra">
                Enviar Pedido para o WhatsApp
            </a>
        </div>
    </div>

    <div id="carrinho-overlay" class="carrinho-overlay"></div>

    <!-- Código do Carrinho Inteligente Blindado -->
    <script>
        const carrinho = document.getElementById('carrinho-lateral');
        const overlay = document.getElementById('carrinho-overlay');
        const btnAbrir = document.getElementById('btn-abrir-carrinho');
        const btnFechar = document.getElementById('btn-fechar-carrinho');

        const carrinhoItensContainer = document.getElementById('carrinho-itens');
        const carrinhoContador = document.getElementById('carrinho-contador');
        const carrinhoValorTotal = document.getElementById('carrinho-valor-total');
        const btnEnviarWhatsapp = document.getElementById('btn-enviar-whatsapp');

        let itensSacola = [];

        // Função para remover um produto completamente da sacola e descontar o valor
        function removerDaSacola(nomeProduto) {
            itensSacola = itensSacola.filter(item => item.nome !== nomeProduto);
            atualizarInterfaceCarrinho();
        }

        // Funções para abrir e fechar a sacola lateral
        if (btnAbrir) btnAbrir.addEventListener('click', () => {
            carrinho.classList.add('aberto');
            overlay.classList.add('visivel');
        });
        if (btnFechar) btnFechar.addEventListener('click', () => {
            carrinho.classList.remove('aberto');
            overlay.classList.remove('visivel');
        });
        if (overlay) overlay.addEventListener('click', () => {
            carrinho.classList.remove('aberto');
            overlay.classList.remove('visivel');
        });

        // Escuta o clique nos botões de "Tenho Interesse"
        document.addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('btn-add-carrinho')) {
                e.preventDefault();

                const nome = e.target.getAttribute('data-nome');
                const preco = parseFloat(e.target.getAttribute('data-preco'));

                if (!nome || isNaN(preco)) return;

                const itemExistente = itensSacola.find(item => item.nome === nome);

                if (itemExistente) {
                    itemExistente.quantidade++;
                } else {
                    itensSacola.push({
                        nome: nome,
                        preco: preco,
                        quantidade: 1
                    });
                }

                atualizarInterfaceCarrinho();

                carrinho.classList.add('aberto');
                overlay.classList.add('visivel');
            }
        });

        // Função para renderizar os produtos na tela e gerar o link correto do WhatsApp
        function atualizarInterfaceCarrinho() {
            carrinhoItensContainer.innerHTML = '';

            if (itensSacola.length === 0) {
                carrinhoItensContainer.innerHTML = '<p class="carrinho-vazio">Sua sacola está vazia...</p>';
                if (carrinhoContador) carrinhoContador.innerText = '0';
                if (carrinhoValorTotal) carrinhoValorTotal.innerText = 'R$ 0,00';
                if (btnEnviarWhatsapp) btnEnviarWhatsapp.setAttribute('href', '#');
                return;
            }

            let totalGeral = 0;
            let totalItens = 0;
            let textoMensagemWhats = "Olá! Gostaria de encomendar os seguintes perfumes na Bella Fagundes Imports:\n\n";

            itensSacola.forEach(item => {
                const subtotal = item.preco * item.quantidade;
                totalGeral += subtotal;
                totalItens += item.quantidade;

                const divItem = document.createElement('div');
                divItem.style.display = 'flex';
                divItem.style.justifyContent = 'space-between';
                divItem.style.alignItems = 'center';
                divItem.style.borderBottom = '1px solid #eee';
                divItem.style.paddingBottom = '10px';
                divItem.style.marginBottom = '15px';

                divItem.innerHTML = `
                <div style="text-align: left;">
                    <h4 style="margin:0; font-size:1rem; color:#333; font-family: 'Montserrat', sans-serif;">${item.nome}</h4>
                    <small style="color:#888;">Qtd: ${item.quantidade} x R$ ${item.preco.toFixed(2).replace('.', ',')}</small>
                </div>
                <div style="display: flex; align-items: center; gap: 12px;">
                    <strong style="color:#db909b;">R$ ${subtotal.toFixed(2).replace('.', ',')}</strong>
                    <button onclick="removerDaSacola('${item.nome}')" style="background: none; border: none; color: #ff4d4d; font-size: 22px; font-weight: bold; cursor: pointer; padding: 0 5px; line-height: 1;">&times;</button>
                </div>
            `;

                carrinhoItensContainer.appendChild(divItem);
                textoMensagemWhats += `- ${item.nome} (Qtd: ${item.quantidade}) - R$ ${subtotal.toFixed(2).replace('.', ',')}\n`;
            });

            if (carrinhoContador) carrinhoContador.innerText = totalItens;
            if (carrinhoValorTotal) carrinhoValorTotal.innerText = `R$ ${totalGeral.toFixed(2).replace('.', ',')}`;

            textoMensagemWhats += `\n*Total do Pedido:* R$ ${totalGeral.toFixed(2).replace('.', ',')}`;

            // Link perfeitamente estruturado e direcionado para o seu WhatsApp comercial
            if (btnEnviarWhatsapp) {
                btnEnviarWhatsapp.setAttribute('href', `https://wa.me/5543984381586?text=${encodeURIComponent(textoMensagemWhats)}`);
            }
        }
    </script>
</body>

</html>