<?php require_once(BASE_PATH . "/../app/View/partials/head.php"); ?>
<?php require_once(BASE_PATH . "/../app/View/partials/sidenav.php"); ?>

        <section id="content" class="flex-1 p-6">
            <div class="bg-white rounded-xl shadow p-6 min-h-[calc(100vh-3rem)]">
                <!-- Link "Criar um curso" -->
                <a href="/cursos/create"
                    class="inline-block mb-4 px-4 py-2 bg-primary text-white font-medium rounded-lg shadow hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-primary/50 transition">
                    Criar um curso
                </a>

                <!-- Tabela -->
                <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden text-sm">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-4 py-2 text-left font-semibold text-gray-700">ID</th>
                            <th class="px-4 py-2 text-left font-semibold text-gray-700">Título</th>
                            <th class="px-4 py-2 text-left font-semibold text-gray-700">Descrição</th>
                            <th class="px-4 py-2 text-left font-semibold text-gray-700">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <?php foreach ($listCurso as $curso): ?>
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 text-gray-600"><?= $curso->id ?></td>
                                <td class="px-4 py-2 text-gray-800"><?= $curso->titulo ?></td>
                                <td class="px-4 py-2 text-gray-600"><?= $curso->descricao ?></td>
                                <td class="px-4 py-2 flex gap-2">
                                    <form action="/cursos/{<?= $curso->id ?>}" method="get">
                                        <button type="submit"
                                            class="px-3 py-1 bg-blue-500 text-white rounded-lg text-xs hover:bg-blue-600 transition">
                                            Visualizar
                                        </button>
                                    </form>
                                    <form action="/cursos/{<?= $curso->id ?>}/edit" method="get">
                                        <button type="submit"
                                            class="px-3 py-1 bg-yellow-500 text-white rounded-lg text-xs hover:bg-yellow-600 transition">
                                            Editar
                                        </button>
                                    </form>
                                    <form action="/cursos/{<?= $curso->id ?>}" method="post">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit"
                                            class="px-3 py-1 bg-red-500 text-white rounded-lg text-xs hover:bg-red-600 transition">
                                            Excluir
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </section>

<?php require_once(BASE_PATH . "/../app/View/partials/foot.php"); ?>