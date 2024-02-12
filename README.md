## Secure LoginPage

Este projeto consiste em uma página de login segura, desenvolvida utilizando HTML, CSS e PHP. Ele inclui funcionalidades de autenticação e verificações de segurança para proteger contra ataques comuns, como SQL Injection e Cross-Site Scripting (XSS).

### Funcionalidades

- **Autenticação segura**: As credenciais de login são verificadas no lado do servidor para garantir a segurança.
- **Proteção contra ataques**: O código PHP inclui verificações para bloquear caracteres específicos que podem ser usados em ataques, como SQL Injection.
- **Hashing de senha**: As senhas são armazenadas no banco de dados de forma segura, usando a função `password_hash`.
- **Sessões seguras**: O PHP utiliza sessões para manter a autenticação do usuário de forma segura durante a navegação.

### Iniciar a sessão e incluir o arquivo de conexão

O código começa iniciando a sessão PHP para gerenciar variáveis de sessão e inclui o arquivo `connect.php`, que contém as configurações de conexão com o banco de dados.

### Verificar se o método da requisição é POST

É verificado se o formulário foi submetido usando o método POST.

### Validação dos campos de entrada

- Verifica se os campos de email e senha não estão vazios.
- Filtra e sanitiza o email usando `filter_input` e `sanitizeInput`.
- Sanitiza a senha.

### Verificação de caracteres bloqueados

- Verifica se a senha contém caracteres bloqueados, como medida de segurança contra possíveis ataques, como SQL Injection.
- Se caracteres bloqueados forem detectados, o usuário é redirecionado de volta para a página de login com uma mensagem de erro.

### Hashing da senha

A senha é convertida em um hash seguro usando a função `password_hash`. Este hash é armazenado no banco de dados.

### Consulta ao banco de dados

- Uma consulta SQL é preparada para selecionar o usuário com o email fornecido.
- O email é vinculado ao parâmetro da consulta usando `bindParam`.
- A consulta é executada e os resultados são armazenados na variável `$user`.

### Verificação da senha e autenticação

Se um usuário com o email fornecido for encontrado no banco de dados:

- Verifica se a senha fornecida pelo usuário corresponde ao hash armazenado no banco de dados, usando `password_verify`.
- Se as senhas corresponderem, o usuário é autenticado:
  - O ID do usuário e o email são armazenados em variáveis de sessão (`$_SESSION['user_id']` e `$_SESSION['user_email']`).
  - O usuário é redirecionado para a página principal do sistema (`../main/index.php`).
- Se as senhas não corresponderem, o usuário é redirecionado de volta para a página de login com uma mensagem de erro.

### Tratamento de erros

- Se o email ou a senha estiverem vazios, o usuário é redirecionado de volta para a página de login com uma mensagem de erro.
- Se o método da requisição não for POST, o usuário é redirecionado de volta para a página de login com uma mensagem de erro.

### Funções auxiliares

- `blockedChar`: Verifica se a senha contém caracteres bloqueados.
- `sanitizeInput`: Função para sanitizar os dados de entrada (`trim`, `stripslashes`, `htmlspecialchars`).
