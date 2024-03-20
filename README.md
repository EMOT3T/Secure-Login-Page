## Página de login segura

Este projeto apresenta funcionalidades e lógica para tornar sua tela de login e sistema mais seguros. No entanto, é importante ressaltar que este conteúdo é apenas uma introdução ao tema de "hash, salt e verificação e manipulação de dados".

Desenvolvido em HTML, CSS e PHP, o projeto inclui funcionalidades de autenticação e verificações de segurança para proteção contra ataques comuns, como SQL Injection e Cross-Site Scripting (XSS).

### Características

- **Proteção contra ataques**: O código PHP possui verificações para bloquear caracteres específicos que podem ser utilizados em ataques, como SQL Injection simples.
- **Hashing de senha**: As senhas são armazenadas de forma segura no banco de dados utilizando a função `password_hash`.
- **Sessões seguras**: O PHP utiliza sessões para manter a autenticação do usuário de forma segura durante a navegação.

### Validação de campos de entrada

- Verificação para garantir que os campos de e-mail e senha não estejam vazios.
- Filtragem e higienização do email utilizando `filter_input` e `sanitizeInput`.
- Sanitização da senha.

### Hashing e Salt da senha

No código, foi implementado o conceito de <salt> para o armazenamento seguro de senhas e proteção contra ataques de dicionário. A senha é convertida em um hash seguro utilizando a função `password_hash`. Esse hash é armazenado no banco de dados juntamente com o salt específico daquele usuário.
