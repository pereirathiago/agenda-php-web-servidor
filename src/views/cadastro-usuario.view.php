<div>
  <h1>Cadastro de Usuário</h1>
  <form action="/cadastro-usuario/gravar" method="post">
    <div>
      <label for="nome-completo">Nome Completo:</label>
      <input type="text" name="nomeCompleto" placeholder="Digite seu nome completo" id="nome-completo">
    </div>
    <div>
      <label for="data-nascimento">Data Nascimento:</label>
      <input type="date" name="dataNascimento" id="data-nascimento">
    </div>
    <div>
      <input type="radio" name="genero" id="masculino">
      <label for="masculino">Masculino</label>
      <input type="radio" name="genero" id="feminino">
      <label for="feminino">Feminino</label>
      <input type="radio" name="genero" id="outro">
      <label for="outro">Outro</label>
    </div>
    <div>
      <label for="foto-perfil">Foto de perfil: <small>(link começando com "https://")</small></label>
      <input type="url" name="fotoPerfil" placeholder="https://" id="foto-perfil">
    </div>
    <div>
      <label for="nome-usuario">Nome de Usuário:</label>
      <input type="text" name="nomeUsuario" placeholder="Digite o seu nome de usuario" id="nome-usuario">
    </div>
    <div>
      <label for="email">Email:</label>
      <input type="mail" name="email" placeholder="Digite o seu email" id="email">
    </div>
    <div>
      <label for="senha">Senha:</label>
      <input type="password" name="senha" placeholder="Digite a sua senha" id="senha">
    </div>
    <div>
      <label for="confirmar-senha">Confirmar Senha:</label>
      <input type="password" name="confirmarSenha" placeholder="Confirme a sua senha" id="confirmar-senha">
    </div>
    <div>
      <button type="submit">Cadastrar</button>
    </div>
  </form>
  <a href="/login">Já tenho uma conta</a>
</div>