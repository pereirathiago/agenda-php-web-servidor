# agenda-php-web-servidor
Projeto desenvolvido para a disciplina de Web Servidor do curso de analise e desenvolvimento de sistemas na UTFPR

## Descrição do Projeto

Este é um projeto desenvolvido em PHP que tem como objetivo gerenciar os compromissos pessoais em agendas. Neste projeto, nossa equipe trabalhou com o desenvolvimento de um sistema que permite cadastrar usuarios, criar agendas e locais para os compromissos, adicionar, editar e compartilhar compromissos, e permitir visualizar essas informações. 

## Atividades da Equipe

- **Giovanne Ribeiro Mika**: Implementou a lógica de backend, tela e preenchimento dinâmico do formulário de compromissos. Validação de permissões.
- **Thiago Pereira**: Trabalhou no cadastro, edição, login e logout de usuários. Roteamento dinâmico das páginas, incluindo página de erro. Validação de dados no cadastro e permissões.
- **Matheus Andreiczuk**: Trabalhou no login e logout de usuários. Implementou a lógica de backend e tela no cadastro de locais. Validação de permissões.

---

## Instalação

Para instalar e configurar o projeto localmente, siga os passos abaixo:

1. Clone o repositório:

    ```bash
    git clone https://github.com/pereirathiago/agenda-php-web-servidor.git
    ```

2. Entre no diretório do projeto:

    ```bash
    cd caminho/agenda-php-web-servidor
    ```

3. Inicie o servidor:
    - Usar o servidor embutido do PHP:

        ```bash
        php -S localhost:8080
        ```

    - Configurar um Virtual Host no Apache.

    - Colocar o projeto no diretório `htdocs` do XAMPP para execução via Apache.


4. Acesse o projeto em `http://localhost:porta`. (varia de acordo com o método escolhido para iniciar o servidor)

---

## Funcionalidades Faltantes

- Sistema de notificações para lembretes de compromissos.
- Funcionalidade de enviar e aceitar convites
- Função para excluir e editar locais
- Função para excluir e editar compromissos
- Persistir dados nos cadastros na ocorrência de possíveis erros
- Adicionar calendário dinâmico (em lugar da tabela agenda)

---

## Bugs Conhecidos

- Sistema de cadastro de usuário não armazena seu gênero

---

## Funcionalidades do Projeto

- Cadastro de usuários com autenticação (registro, login, logout)
- CRUD para gerenciamento de usuarios e compromissos
- Sistema de permissões para controle de acesso
- Mecanismo inicial de sistema de convites
- Cadastro de locais fixos para compromissos

---

## Tecnologias Utilizadas

- **PHP** - Linguagem principal
- **HTML/CSS/JavaScript** - Para o desenvolvimento do frontend
- **Tailwind** - Framework para CSS

---

## Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

---

## Autores

- **Giovanne Ribeiro Mika** - [GitHub](https://github.com/GiovanneMika)
- **Thiago Pereira** - [GitHub](https://github.com/pereirathiago)
- **Matheus Andreiczuk** - [GitHub](https://github.com/MatheusAndreiczuk)

---


