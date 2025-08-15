<?php require_once(BASE_PATH . "/../app/View/partials/head.php"); ?>
<?php require_once(BASE_PATH . "/../app/View/partials/sidenav.php"); ?>

        <!-- CONTENT -->
        <section id="content" class="flex-1 p-6">
            <div class="bg-white rounded-xl shadow p-6 min-h-[calc(100vh-3rem)]">
                <form action="/cursos/{<?= $curso->id ?>}/edit" method="post" class="space-y-6 max-w-xl">
                    <input type="hidden" name="_method" value="PATCH">
                    <!-- Campo Título -->
                    <div>
                        <label for="titulo" class="block text-sm font-medium text-gray-700 mb-1">
                            Título
                        </label>
                        <input
                            type="text"
                            name="titulo"
                            id="titulo"
                            value="<?= $curso->titulo ?>"
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary"
                            placeholder="Digite o título do curso" />
                    </div>

                    <!-- Campo Descrição -->
                    <div>
                        <label for="descricao" class="block text-sm font-medium text-gray-700 mb-1">
                            Descrição
                        </label>
                        <textarea
                            name="descricao"
                            id="descricao"
                            rows="4"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary resize-none"
                            placeholder="Digite uma breve descrição do curso"><?= $curso->descricao ?></textarea>
                    </div>

                    <!-- Botão -->
                    <div>
                        <button
                            type="submit"
                            class="px-6 py-2 bg-yellow-500 text-white font-medium rounded-lg shadow hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-primary/50">
                            Atualizar
                        </button>
                    </div>
                </form>
            </div>
        </section>

<?php require_once(BASE_PATH . "/../app/View/partials/foot.php"); ?>