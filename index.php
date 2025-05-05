<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de Currículos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        .form-section {
            background-color: #f8f9fa;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1 class="display-4">Gerador de Currículos</h1>

        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#informacoes-pessoais">Informações Pessoais</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#resumo-profissional">Resumo Profissional</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#experiencia-profissional">Experiência Profissional</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#formacao-academica">Formação Acadêmica</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#habilidades">Habilidades</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <form method="post" action="processar_formulario.php">
            <div class="form-section" id="informacoes-pessoais">
                <?php
                include 'functions.php';  // Inclui as funções auxiliares
                exibirTituloSecao("Informações Pessoais");
                exibirCampo("Nome Completo", "nome");
                exibirCampo("Email", "email", "email");
                exibirCampo("Telefone", "telefone", "tel");
                exibirCampo("LinkedIn", "linkedin");
                ?>
            </div>

            <div class="form-section" id="resumo-profissional">
                <?php exibirTituloSecao("Resumo Profissional"); ?>
                <?php exibirTextArea("Resumo", "resumo", 5); ?>
            </div>

            <div class="form-section" id="experiencia-profissional">
                <?php exibirTituloSecao("Experiência Profissional"); ?>
                <div id="experiencia-container">
                    <div class="experiencia-item">
                        <?php exibirCampo("Cargo", "cargo[]"); ?>
                        <?php exibirCampo("Empresa", "empresa[]"); ?>
                        <?php exibirCampo("Data de Início", "inicio[]"); ?>
                        <?php exibirCampo("Data de Fim", "fim[]"); ?>
                        <?php exibirTextArea("Descrição das Atividades", "descricao[]", 3); ?>
                        <button type="button" class="remover-item btn btn-danger btn-sm mt-2">Remover</button>
                    </div>
                </div>
                <button type="button" id="adicionar-experiencia" class="btn btn-secondary mt-2">Adicionar Mais Experiência</button><br><br>
            </div>

            <div class="form-section" id="formacao-academica">
                <?php exibirTituloSecao("Formação Acadêmica"); ?>
                <div id="formacao-container">
                    <div class="formacao-item">
                        <?php exibirCampo("Curso", "curso[]"); ?>
                        <?php exibirCampo("Instituição", "instituicao[]"); ?>
                        <?php exibirCampo("Ano de Conclusão", "conclusao[]"); ?>
                        <button type="button" class="remover-item btn btn-danger btn-sm mt-2">Remover</button>
                    </div>
                </div>
                <button type="button" id="adicionar-formacao" class="btn btn-secondary mt-2">Adicionar Mais Formação</button><br><br>
            </div>

            <div class="form-section" id="habilidades">
                <?php exibirTituloSecao("Habilidades"); ?>
                <?php exibirCampo("Liste suas habilidades separadas por vírgula", "habilidades"); ?>
            </div>

            <button type="submit" class="btn btn-primary">Gerar Currículo</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="download_curriculo.js"></script>
    <script>
        $(document).ready(function() {
            const experienciaContainer = $('#experiencia-container');
            const adicionarExperienciaBotao = $('#adicionar-experiencia');
            const formacaoContainer = $('#formacao-container');
            const adicionarFormacaoBotao = $('#adicionar-formacao');

            adicionarExperienciaBotao.on('click', function() {
                const novoItem = $('<div class="experiencia-item mt-3"></div>').append(
                    '<label for="cargo[]" class="form-label">Cargo:</label><br>',
                    '<input type="text" name="cargo[]" class="form-control"><br>',
                    '<label for="empresa[]" class="form-label">Empresa:</label><br>',
                    '<input type="text" name="empresa[]" class="form-control"><br>',
                    '<label for="inicio[]" class="form-label">Data de Início:</label><br>',
                    '<input type="text" name="inicio[]" class="form-control"><br>',
                    '<label for="fim[]" class="form-label">Data de Fim:</label><br>',
                    '<input type="text" name="fim[]" class="form-control"><br>',
                    '<label for="descricao[]" class="form-label">Descrição das Atividades:</label><br>',
                    '<textarea name="descricao[]" rows="3" class="form-control"></textarea><br>',
                    '<button type="button" class="remover-item btn btn-danger btn-sm mt-2">Remover</button>'
                );
                experienciaContainer.append(novoItem);
            });

            adicionarFormacaoBotao.on('click', function() {
                const novoItem = $('<div class="formacao-item mt-3"></div>').append(
                    '<label for="curso[]" class="form-label">Curso:</label><br>',
                    '<input type="text" name="curso[]" class="form-control"><br>',
                    '<label for="instituicao[]" class="form-label">Instituição:</label><br>',
                    '<input type="text" name="instituicao[]" class="form-control"><br>',
                    '<label for="conclusao[]" class="form-label">Ano de Conclusão:</label><br>',
                    '<input type="text" name="conclusao[]" class="form-control"><br>',
                    '<button type="button" class="remover-item btn btn-danger btn-sm mt-2">Remover</button>'
                );
                formacaoContainer.append(novoItem);
            });

            $(document).on('click', '.remover-item', function() {
                $(this).closest('.experiencia-item, .formacao-item').remove();
            });

            // Rolagem suave ao clicar nos links do menu
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();

                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
        });
    </script>
</body>
</html>