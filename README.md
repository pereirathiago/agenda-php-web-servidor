# agenda-php-web-servidor
Projeto desenvolvido para a disciplina de Web Servidor do curso de analise e desenvolvimento de sistemas na UTFPR

![Licença](https://img.shields.io/badge/license-MIT-blue.svg) 
![Versão](https://img.shields.io/badge/version-1.0.0-green.svg)

## Descrição do Projeto

Este é um projeto desenvolvido em PHP que tem como objetivo gerenciar os compromissos pessoais em agendas. Neste projeto, nossa equipe trabalhou com o desenvolvimento de um sistema que permite cadastrar usuarios, criar agendas, adicionar, editar e compartilhar compromissos, e permitir visualizar essas informações. 

### Particularidades

- 
---

## Integrantes da Equipe

1. **Giovanne Ribeiro Mika** - Desenvolvedor FullStack
2. **Thiago Pereira** - Desenvolvedor FullStack
3. **Matheus Andreiczuk** - Desenvolvedor FullStack
---

## Atividades da Equipe

- **Giovanne Ribeiro Mika**: Implementou a lógica de backend, criou a estrutura de banco de dados, e desenvolveu as APIs REST para comunicação entre o backend e o frontend.
- **Thiago Pereira**: Trabalhou no frontend, desenvolveu a interface gráfica e fez a integração com o backend.
- **Matheus Andreiczuk**: Coordenou o projeto, definiu os cronogramas, e garantiu a comunicação entre os membros da equipe.

---

## Instalação

Para instalar e configurar o projeto localmente, siga os passos abaixo:

1. Clone o repositório:

    ```bash
    git clone https://github.com/usuario/nome-do-projeto.git
    ```

2. Entre no diretório do projeto:

    ```bash
    cd nome-do-projeto
    ```

3. Instale as dependências com o Composer:

    ```bash
    composer install
    ```

4. Configure o arquivo `.env` com as informações do banco de dados e outras variáveis de ambiente.

5. Rode as migrações do banco de dados:

    ```bash
    php artisan migrate
    ```

6. Inicie o servidor:

    ```bash
    php artisan serve
    ```

7. Acesse o projeto em `http://localhost:8000`.

---

## Bugs Conhecidos

- Bug na funcionalidade de login, onde usuários não autenticados podem acessar algumas rotas restritas.
- Em alguns casos, a API de integração com [nome da API externa] retorna erro intermitente.
- O sistema apresenta um tempo de resposta mais alto do que o desejado ao processar dados com mais de 1.000 registros.

---

## Funcionalidades Faltantes

- Integração com API de pagamento para funcionalidades futuras.
- Sistema de notificações para avisar os usuários sobre atualizações.
- Função de pesquisa avançada nos dados de usuário.

---

## Funcionalidades do Projeto

- Cadastro de usuários com autenticação (registro, login, logout)
- CRUD completo para gerenciamento de dados
- Dashboard administrativo com estatísticas em tempo real
- API REST para integração com outras plataformas
- Sistema de permissões para controle de acesso

---

## Tecnologias Utilizadas

- **PHP** - Linguagem principal
- **Laravel** - Framework utilizado para estruturar o projeto
- **MySQL** - Banco de dados utilizado
- **HTML/CSS/JavaScript** - Para o desenvolvimento do frontend
- **Composer** - Gerenciador de dependências PHP

---

## Contribuição

1. Fork o projeto
2. Crie uma branch para sua feature (`git checkout -b feature/NovaFeature`)
3. Commit suas mudanças (`git commit -m 'Adiciona NovaFeature'`)
4. Push para a branch (`git push origin feature/NovaFeature`)
5. Abra um Pull Request

---

## Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

---

## Autores

- **Giovanne Ribeiro Mika** - *Desenvolvimento Backend* - [GitHub](https://github.com/GiovanneMika)
- **Thiago Pereira** - *Desenvolvimento Frontend* - [GitHub](https://github.com/pereirathiago)
- **Matheus Andreiczuk** - *Gerência de Projeto* - [GitHub](https://github.com/usuario3)

---


