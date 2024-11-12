<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema de Vendas de Doces</title>

    <!-- Link para o arquivo CSS -->
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/popup.css">
</head>

<body>

    <!-- Header com navegação -->
    <header>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Produtos</a></li>
                <li><a href="#">Carrinho</a></li>
                <li><a href="javascript:void(0);" onclick="openPopup()">Login / Cadastro</a></li>
            </ul>
        </nav>
    </header>

    <!-- Carrinho de Compras -->
    <section id="carrinho">
        <h2>Carrinho de Compras</h2>
        <div id="listaProdutos">
            <!-- Lista de produtos será inserida aqui com JavaScript -->
        </div>
        <p id="total">Total: R$0,00</p>
        <button onclick="finalizarCompra()">Finalizar Compra</button>
    </section>

    <!-- Popup de Login/Cadastro -->
    <div id="authPopup" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closePopup()">&times;</span>
            <div class="tabs">
                <!-- Aba de Login -->
                <button class="tablinks" onclick="openTab(event, 'Login')" id="defaultOpen">Login</button>
                <!-- Aba de Cadastro -->
                <button class="tablinks" onclick="openTab(event, 'Cadastro')">Cadastro</button>
            </div>

            <!-- Conteúdo da Aba de Login -->
            <div id="Login" class="tabcontent">
                <h3>Login</h3>
                <form id="loginForm">
                    <label for="username">Usuário:</label>
                    <input type="text" id="username" name="username">
                    <label for="password">Senha:</label>
                    <input type="password" id="password" name="password">
                    <button type="button" onclick="validarFormulario()">Entrar</button>
                </form>
            </div>

            <!-- Conteúdo da Aba de Cadastro -->
            <div id="Cadastro" class="tabcontent">
                <h3>Cadastro</h3>
                <form id="cadastroForm">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email">
                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name="senha">
                    <button type="button" onclick="validarFormulario()">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Seção de Produtos (Exemplo de exibição de produtos) -->
    <section id="produtos">
        <h2>Produtos Disponíveis</h2>
        <div class="produto">
            <img src="images/brigadeiro.jpg" alt="Brigadeiro">
            <h3>Brigadeiro</h3>
            <p>R$2,50</p>
            <button onclick="adicionarAoCarrinho('Brigadeiro', 2.50)">Adicionar ao Carrinho</button>
        </div>
        <div class="produto">
            <img src="images/pudim.jpg" alt="Pudim">
            <h3>Pudim</h3>
            <p>R$3,00</p>
            <button onclick="adicionarAoCarrinho('Pudim', 3.00)">Adicionar ao Carrinho</button>
        </div>
        <!-- Adicione mais produtos conforme necessário -->
    </section>

    <!-- Rodapé -->
    <footer>
        <p>&copy; 2024 Docelili - Todos os direitos reservados.</p>
    </footer>

    <!-- Scripts JS -->
    <script src="js/scripts.js"></script>
    <script src="js/carrinho.js"></script>

</body>

</html>
