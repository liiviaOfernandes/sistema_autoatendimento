// Função para abrir o popup de autenticação
function openPopup() {
    document.getElementById("authPopup").style.display = "block";  // Exibe o popup
    document.getElementById("defaultOpen").click();  // Abre a aba de login por padrão
}

// Função para fechar o popup de autenticação
function closePopup() {
    document.getElementById("authPopup").style.display = "none";  // Esconde o popup
}

// Função para abrir as abas no popup (Login ou Cadastro)
function openTab(evt, tabName) {
    let tabcontent = document.getElementsByClassName("tabcontent");
    for (let i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";  // Esconde todas as abas
        tabcontent[i].classList.remove("active");  // Remove a classe 'active' de todas as abas
    }

    let tablinks = document.getElementsByClassName("tablinks");
    for (let i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");  // Remove a classe 'active' dos links
    }

    document.getElementById(tabName).style.display = "block";  // Exibe a aba clicada
    document.getElementById(tabName).classList.add("active");  // Adiciona a classe 'active' à aba
    evt.currentTarget.className += " active";  // Adiciona a classe 'active' ao botão da aba
}

// Função para validar os campos do formulário (Exemplo: Login ou Cadastro)
function validarFormulario() {
    let usuario = document.getElementById("username").value;
    let senha = document.getElementById("password").value;

    if (usuario && senha) {
        alert("Autenticação bem-sucedida!");
    } else {
        alert("Por favor, preencha todos os campos.");
    }
}
