# agenda-php-web-servidor
Projeto desenvolvido para a disciplina de Web Servidor do curso de analise e desenvolvimento de sistemas na UTFPR

## Descrição do Projeto

Este é um projeto desenvolvido em PHP que tem como objetivo gerenciar os compromissos pessoais em agendas. Neste projeto, nossa equipe trabalhou com o desenvolvimento de um sistema que permite cadastrar usuarios, locais para os compromissos, adicionar, editar e compartilhar compromissos, adicionando convidados e permitir visualizar essas informações. 

## Atividades da Equipe

- **Giovanne Ribeiro Mika**: CRUD de locais e validações correspondentes. Dividiu a elaboração dos compromissos. Elaborou as rotas de compromisso e local.
- **Thiago Pereira**: Configurou o ambiente. Concluiu o CRUD de compromissos. Implementou na API toda a estrutura de funcionamento dos convites. Elaborou o restante das rotas (autenticação de usuário e CRUD usuário).
- **Matheus Andreiczuk**: Elaborou a documentação e realizou testes de funcionamento da aplicação.

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

3. Instale as dependencias (composer deve estar previamente instalando na maquina):

    ```bash
    composer install
    ```

5. Inicie a configuração do ambiente com os 2 comandos a seguir:
    ```bash
    cp .env.example .env      
    ```
    ```bash
    php artisan key:generate    
    ```
6. Realize a configuração do banco de dados com o seguinte comando:
    ```bash
    php artisan migrate   
    ```

7. Inicie o servidor:
    - Configure um Virtual Host chamado `agenda.test`, referenciando o diretório do projeto.
    - Utilize o seguinte comando para inicialização do servidor local:
   ```bash
   php artisan serve      
   ```

8. Importe o arquivo do Insomnia

9. Acesse o projeto no Insomnia. 

---

## Funcionalidades do Projeto

- Cadastro de usuários com autenticação (registro, login, logout)
- CRUD para gerenciamento de usuarios, compromissos e locais dos compromissos
- Envio de convites a outros usuários, para participação em um compromisso
- Sistema de permissões para controle de acesso

---

## Tecnologias Utilizadas

- **PHP** - Linguagem principal
- **Composer** - Para gerenciamento de dependencias
- **Laravel** - Framework PHP utilizado no projeto como um todo

---

## Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

---

## Autores

- **Giovanne Ribeiro Mika** - [GitHub](https://github.com/GiovanneMika)
- **Thiago Pereira** - [GitHub](https://github.com/pereirathiago)
- **Matheus Andreiczuk** - [GitHub](https://github.com/MatheusAndreiczuk)

---

