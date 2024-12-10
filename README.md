# agenda-php-web-servidor
Projeto desenvolvido para a disciplina de Web Servidor do curso de analise e desenvolvimento de sistemas na UTFPR

## Descrição do Projeto

Este é um projeto desenvolvido em PHP que tem como objetivo gerenciar os compromissos pessoais em agendas. Neste projeto, nossa equipe trabalhou com o desenvolvimento de um sistema que permite cadastrar usuarios, criar agendas e locais para os compromissos, adicionar, editar e compartilhar compromissos, e permitir visualizar essas informações. 

## Atividades da Equipe

- **Giovanne Ribeiro Mika**: Adaptou e implementou o cadastro, edição, visualização de compromissos, bem como a exclusão e suas validações relacionadas (datas). Correção do bug de fusos horários. Sanitização dos inputs. Removeu resquícios de códigos teste.
- **Thiago Pereira**: Orientou a objetos. Criou o sistema de rotas e traits, com utilização do composer. Implementou e configurou o banco de dados. Adaptou a lógica de autenticação do usuário, bem como as páginas de cadastro e edição do usuário. Implementou a lógica de deletar usuário. Implementou as novas funcionalidades de gerenciamento de locais, bem como a utilização de uma API externa no cadastro/edição de local. Implementou a lógica de envio e recebimento de convites, além da tela de convites recebidos e a opção de aceitar ou recusá-los. 
- **Matheus Andreiczuk**: Implementou a tela de detalhamento dos compromissos, na qual é possível adicionar convidados e ver o status do convite enviado para outros usuários (aceito/recusado). Deu início ao CRUD de convidados, posteriormente adaptado e concluído por outro membro. Atuou como co-piloto em pair programming com o membro Giovanne.

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
    - Configure um Virtual Host chamado `agenda.test`, referenciando o diretório do projeto.
    - Para configurar o Virtual Host, se necessário, seguir o passo a passo disponível em: 
        https://moodle.utfpr.edu.br/pluginfile.php/2176293/mod_resource/content/1/Configura%C3%A7%C3%A3o%20Rotas%20no%20Apache%20e%20Xampp%20para%20Windows.pdf

4. Acesse o projeto em `agenda.test`. 

---


## Funcionalidades implementadas em relação ao projeto 1 (05/11/2024)

- Agora, é possível enviar, receber, aceitar e recusar convites;
- Agora, é possível adicionar convidados ao compromisso. Além disso, ao cancelar o compromisso, este desaparecerá da agenda dos usuários convidados;
- Os dados nos cadastros são persistidos na ocorrência de erros;
- É possível excluir usuário (tomadas as devidas restrições);
- Implementação da edição e exclusão de locais e de edição e cancelamento do compromisso;
- Implementação de Orientação a Objetos e Banco de Dados (via PDO);
- Utilização do Composer e packages PHP, bem como de um mecanismo de Rotas;
- Utilização de API para preenchimento automático do formulário de cadastro e edição de local (pelo número do cep, são preenchidos dados como cidade, estado e rua/avenida)

---


## Funcionalidades Faltantes

- Sistema de notificações para lembretes de compromissos.
- Adicionar calendário dinâmico (em lugar da tabela agenda)
- Otimização de alguns métodos para evitar duplicidade de código

---

## Bugs Corrigidos

- Sistema de cadastro de usuário não armazena seu gênero
- Mensagens de erro não mostra na página de perfil 
- Bug na verificação de data de compromissos

---

## Funcionalidades do Projeto

- Cadastro de usuários com autenticação (registro, login, logout)
- CRUD para gerenciamento de usuarios, compromissos e locais dos compromissos
- Envio de convites a outros usuários, para participação em um compromisso
- Sistema de permissões para controle de acesso

---

## Tecnologias Utilizadas

- **PHP** - Linguagem principal
- **HTML/CSS/JavaScript** - Para o desenvolvimento do frontend
- **COMPOSER/AUTOLOAD** - Para gerenciamento de rotas
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


