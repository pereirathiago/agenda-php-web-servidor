<header class="bg-slate-900 shadow-md">
  <div class="container mx-auto p-4 flex justify-between items-center">
    <a href="/" class="text-2xl font-bold text-white hover:text-blue-600">Agenda</a>

    <nav class="space-x-6 hidden md:flex">
      <a href="/" class="text-white hover:text-blue-600 transition">Agenda</a>
      <a href="/convites" class="text-white hover:text-blue-600 transition">Convites</a>
      <a href="/local" class="text-white hover:text-blue-600 transition">Locais</a>
    </nav>

    <a href="/perfil" class="flex items-center space-x-4">
      <span class="text-white hidden md:block">Olá, <?= $_SESSION['usuarioLogado']['nomeCompleto']; ?> </span>
      <div class="w-10 h-10 rounded-full overflow-hidden border-2 border-blue-500">
        <img src="<?= $_SESSION['usuarioLogado']['fotoPerfil']; ?>" alt="Foto do usuário" class="w-full h-full object-cover">
      </div>
    </a>
  </div>
</header>