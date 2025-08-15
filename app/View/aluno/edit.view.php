<?php require_once(BASE_PATH . "/../app/View/partials/head.php"); ?>
<?php require_once(BASE_PATH . "/../app/View/partials/sidenav.php"); ?>

<!-- CONTENT -->
<section id="content" class="flex-1 p-6">
    <div class="bg-white rounded-xl shadow p-6 min-h-[calc(100vh-3rem)]">
        <form action="/alunos/{<?= $aluno->id ?>}/edit" method="post" class="space-y-6 max-w-xl">
            <input type="hidden" name="_method" value="PATCH">
            <!-- Campo Nome -->
            <div>
                <label for="nome" class="block text-sm font-medium text-gray-700 mb-1">
                    Nome
                </label>
                <input
                    type="text"
                    name="nome"
                    id="nome"
                    required
                    value="<?= $aluno->nome ?>"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary"
                    placeholder="Digite o nome do aluno" />
            </div>

            <!-- Campo Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                    E-mail
                </label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    required
                    value="<?= $aluno->email ?>"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary"
                    placeholder="Digite o email do aluno" />
            </div>

            <!-- Campo Data Nascimento -->
            <div>
                <label for="dataNasc" class="block text-sm font-medium text-gray-700 mb-1">
                    E-mail
                </label>
                <input
                    type="date"
                    name="dataNasc"
                    id="dataNasc"
                    value="<?= $aluno->dataNasc ?>"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary" />
            </div>

            <!-- Botão -->
            <div>
                <button
                    type="submit"
                    class="px-6 py-2 bg-yellow-500 text-white font-medium rounded-lg shadow hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-primary/50">
                    Atualizar Aluno
                </button>
            </div>
        </form>
    </div>
</section>

<?php require_once(BASE_PATH . "/../app/View/partials/foot.php"); ?>