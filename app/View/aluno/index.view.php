<?php require_once(BASE_PATH . "/../app/View/partials/head.php"); ?>
<?php require_once(BASE_PATH . "/../app/View/partials/sidenav.php"); ?>

        <section id="content" class="flex-1 p-6">
            <div class="bg-white rounded-xl shadow p-6 min-h-[calc(100vh-3rem)]">
                <!-- Link "Cadastrar um aluno" -->
                <a href="/alunos/create"
                    class="inline-block mb-4 px-4 py-2 bg-primary text-white font-medium rounded-lg shadow hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-primary/50 transition">
                    Cadastrar um aluno
                </a>

                <!-- Tabela -->
                <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden text-sm">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-4 py-2 text-left font-semibold text-gray-700">ID</th>
                            <th class="px-4 py-2 text-left font-semibold text-gray-700">Nome</th>
                            <th class="px-4 py-2 text-left font-semibold text-gray-700">E-mail</th>
                            <th class="px-4 py-2 text-left font-semibold text-gray-700">Data Nasc.</th>
                            <th class="px-4 py-2 text-left font-semibold text-gray-700">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <?php if($listAluno !== null):
                            foreach ($listAluno as $aluno): ?>
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 text-gray-600"><?= $aluno->id ?></td>
                                <td class="px-4 py-2 text-gray-800"><?= $aluno->nome ?></td>
                                <td class="px-4 py-2 text-gray-600"><?= $aluno->email ?></td>
                                <td class="px-4 py-2 text-gray-600"><?= $aluno->dataNasc ?></td>
                                <td class="px-4 py-2 flex gap-2">
                                    <form action="/alunos/{<?= $aluno->id ?>}" method="get">
                                        <button type="submit"
                                            class="px-3 py-1 bg-blue-500 text-white rounded-lg text-xs hover:bg-blue-600 transition">
                                            Visualizar
                                        </button>
                                    </form>
                                    <form action="/alunos/{<?= $aluno->id ?>}/edit" method="get">
                                        <button type="submit"
                                            class="px-3 py-1 bg-yellow-500 text-white rounded-lg text-xs hover:bg-yellow-600 transition">
                                            Editar
                                        </button>
                                    </form>
                                    <form action="/alunos/{<?= $aluno->id ?>}" method="post">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit"
                                            class="px-3 py-1 bg-red-500 text-white rounded-lg text-xs hover:bg-red-600 transition">
                                            Excluir
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach;
                            endif ?>
                    </tbody>
                </table>
            </div>
        </section>

<?php require_once(BASE_PATH . "/../app/View/partials/foot.php"); ?>