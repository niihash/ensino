<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Plataforma de Ensino</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#F4322E' // cor personalizada
          },
          fontFamily: {
            sans: ['Inter', 'ui-sans-serif', 'system-ui']
          }
        }
      }
    }
  </script>
</head>

<body class="min-h-screen bg-gray-100 flex items-center justify-center font-sans">
  <section class="bg-white rounded-2xl shadow-lg p-8 w-full max-w-sm">
    <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">
      Plataforma de Ensino
    </h1>
    <article>
      <form action="/" method="post" class="space-y-5">
        <div>
          <label for="usuario" class="block text-sm font-medium text-gray-700 mb-1">
            Usuário
          </label>
          <input type="text" id="usuario" name="usuario" placeholder="Digite seu usuário"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary" />
        </div>

        <div>
          <label for="senha" class="block text-sm font-medium text-gray-700 mb-1">
            Senha
          </label>
          <input type="password" id="senha" name="senha" placeholder="Digite sua senha"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary" />
        </div>

        <div>
          <button type="submit"
            class="w-full bg-primary text-white py-2 rounded-lg font-medium hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-primary/50">
            Entrar
          </button>
        </div>
      </form>
    </article>
  </section>
</body>

</html>
