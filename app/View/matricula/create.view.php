<?php require_once(BASE_PATH . "/../app/View/partials/head.php"); ?>
<?php require_once(BASE_PATH . "/../app/View/partials/sidenav.php"); ?>

<!-- CONTENT -->
<section id="content" class="flex-1 p-6">
    <div class="bg-white rounded-xl shadow p-6 min-h-[calc(100vh-3rem)]">
        <form action="/matriculas/create" method="post" class="space-y-6 max-w-xl">
            <!-- Campo Aluno -->
            <div>
                <label for="aluno_id" class="block text-sm font-medium text-gray-700 mb-1">
                    Aluno
                </label>
                <select name="aluno_id" id="aluno_id" required>
                    <?php foreach ($listAluno as $aluno): ?>
                        <option value="<?= $aluno->id ?>"><?= $aluno->nome ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <!-- Campo Curso -->
            <div>
                <label for="curso_id" class="block text-sm font-medium text-gray-700 mb-1">
                    Descrição
                </label>
                <select name="curso_id" id="curso_id" required>
                    <?php foreach ($listCurso as $curso): ?>
                        <option value="<?= $curso->id ?>"><?= $curso->titulo ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <!-- Botão -->
            <div>
                <button
                    type="submit"
                    class="px-6 py-2 bg-primary text-white font-medium rounded-lg shadow hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-primary/50">
                    Criar Matricula
                </button>
            </div>
        </form>
    </div>
</section>

<?php require_once(BASE_PATH . "/../app/View/partials/foot.php"); ?>