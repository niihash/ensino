<body class="font-sans bg-gray-100">
    <main class="flex min-h-screen">

        <section id="sidenav"
            class="w-64 bg-white border-r border-gray-200 flex flex-col justify-between md:relative z-10">
            <article>
                <div class="p-6 border-b border-gray-200">
                    <h1 class="text-lg font-bold text-primary">Plataforma</h1>
                </div>
                <nav class="flex flex-col p-4 space-y-2">
                    <a href="/alunos"
                        class="px-4 py-2 rounded-lg hover:bg-primary/10 text-gray-700 hover:text-primary font-medium transition">Alunos</a>
                    <a href="/cursos"
                        class="px-4 py-2 rounded-lg hover:bg-primary/10 text-gray-700 hover:text-primary font-medium transition">Cursos</a>
                    <a href="/matriculas"
                        class="px-4 py-2 rounded-lg hover:bg-primary/10 text-gray-700 hover:text-primary font-medium transition">Matrículas</a>
                </nav>
            </article>
            <article class="p-4 border-t border-gray-200">
                <form action="/logout" method="post">
                    <button type="submit"
                        class="w-full px-4 py-2 text-sm font-medium text-white bg-primary rounded-lg hover:bg-red-600 transition">
                        Sair
                    </button>
                </form>
            </article>
        </section>