<?php

// Função para exibir um campo de formulário com Bootstrap
function exibirCampo($label, $name, $type = 'text', $value = '') {
    echo "<div class=\"mb-3\">";
    echo "<label for=\"$name\" class=\"form-label\">$label:</label>";
    echo "<input type=\"$type\" class=\"form-control\" id=\"$name\" name=\"$name\" value=\"" . htmlspecialchars($value) . "\">";
    echo "</div>";
}

// Função para exibir uma área de texto com Bootstrap
function exibirTextArea($label, $name, $rows = 3, $value = '') {
    echo "<div class=\"mb-3\">";
    echo "<label for=\"$name\" class=\"form-label\">$label:</label>";
    echo "<textarea class=\"form-control\" id=\"$name\" name=\"$name\" rows=\"$rows\">" . htmlspecialchars($value) . "</textarea>";
    echo "</div>";
}

// Função para exibir um título de seção com Bootstrap
function exibirTituloSecao($titulo) {
    echo "<h2 class=\"mt-4\">$titulo</h2>";
    echo "<hr class=\"my-2\">";
}

// Função para formatar a experiência profissional (com Bootstrap)
function formatarExperiencia($experiencia) {
    $html = "<ul class=\"list-unstyled\">";
    foreach ($experiencia as $item) {
        $html .= "<li class=\"mb-2\"><strong>" . htmlspecialchars($item['cargo']) . "</strong> - " . htmlspecialchars($item['empresa']) . " (" . htmlspecialchars($item['inicio']) . " - " . htmlspecialchars($item['fim']) . ")<br>";
        $html .= nl2br(htmlspecialchars($item['descricao'])) . "</li>";
    }
    $html .= "</ul>";
    return $html;
}

// Função para formatar a formação acadêmica (com Bootstrap)
function formatarFormacao($formacao) {
    $html = "<ul class=\"list-unstyled\">";
    foreach ($formacao as $item) {
        $html .= "<li class=\"mb-2\"><strong>" . htmlspecialchars($item['curso']) . "</strong> - " . htmlspecialchars($item['instituicao']) . " (" . htmlspecialchars($item['conclusao']) . ")</li>";
    }
    $html .= "</ul>";
    return $html;
}

// Função para formatar as habilidades (com Bootstrap)
function formatarHabilidades($habilidades) {
    $habilidadesFormatadas = array_map(function($habilidade) {
        return "<span class=\"badge bg-secondary me-1\">" . htmlspecialchars($habilidade) . "</span>";
    }, $habilidades);
    return "<p>" . implode(' ', $habilidadesFormatadas) . "</p>";
}

// Função principal para gerar o currículo em HTML (com Bootstrap)
function gerarCurriculo($dados) {
    $html = "<!DOCTYPE html>";
    $html .= "<html lang=\"pt-BR\">";
    $html .= "<head>";
    $html .= "<meta charset=\"UTF-8\">";
    $html .= "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">";
    $html .= "<title>Currículo de " . htmlspecialchars($dados['nome']) . "</title>";
    $html .= "<link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css\" rel=\"stylesheet\">";

    // Estilos de impressão para manter a formatação
    $html .= "<style>
        @media print {
            .form-section {
                background-color: #f8f9fa !important;
                padding: 20px !important;
                margin-bottom: 20px !important;
                border-radius: 5px !important;
            }
            /* Adicione outros estilos conforme necessário */
        }
    </style>";

    $html .= "</head>";
    $html .= "<body>";
    $html .= "<div class=\"container mt-4\">";
    $html .= "<h1 class=\"display-4\">" . htmlspecialchars($dados['nome']) . "</h1>";
    $html .= "<p class=\"lead\">" . htmlspecialchars($dados['email']) . " | " . htmlspecialchars($dados['telefone']) . " | " . htmlspecialchars($dados['linkedin']) . "</p>";
    $html .= "<hr class=\"my-4\">";

    if (!empty($dados['resumo'])) {
        $html .= "<div class=\"form-section\">"; // Aplica a formatação
        exibirTituloSecao("Resumo Profissional");
        $html .= "<p>" . nl2br(htmlspecialchars($dados['resumo'])) . "</p>";
        $html .= "</div>";
    }

    if (!empty($dados['experiencia'])) {
        $html .= "<div class=\"form-section\">"; // Aplica a formatação
        exibirTituloSecao("Experiência Profissional");
        $html .= formatarExperiencia($dados['experiencia']);
        $html .= "</div>";
    }

    if (!empty($dados['formacao'])) {
        $html .= "<div class=\"form-section\">"; // Aplica a formatação
        exibirTituloSecao("Formação Acadêmica");
        $html .= formatarFormacao($dados['formacao']);
        $html .= "</div>";
    }

    if (!empty($dados['habilidades'])) {
        $html .= "<div class=\"form-section\">"; // Aplica a formatação
        exibirTituloSecao("Habilidades");
        $html .= formatarHabilidades($dados['habilidades']);
        $html .= "</div>";
    }

    $html .= "</div>"; // Fechar container
    $html .= "<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js\"></script>";
    $html .= "</body>";
    $html .= "</html>";

    return $html;
}

// Processamento do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dados = [
        'nome' => $_POST['nome'],
        'email' => $_POST['email'],
        'telefone' => $_POST['telefone'],
        'linkedin' => $_POST['linkedin'],
        'resumo' => $_POST['resumo'],
        'experiencia' => [],
        'formacao' => [],
        'habilidades' => array_map('trim', explode(',', $_POST['habilidades']))
    ];

    // Processar experiências (você pode adicionar mais campos dinamicamente)
    if (isset($_POST['cargo']) && is_array($_POST['cargo'])) {
        foreach ($_POST['cargo'] as $key => $cargo) {
            $dados['experiencia'][] = [
                'cargo' => $_POST['cargo'][$key],
                'empresa' => $_POST['empresa'][$key],
                'inicio' => $_POST['inicio'][$key],
                'fim' => $_POST['fim'][$key],
                'descricao' => $_POST['descricao'][$key]
            ];
        }
    }

    // Processar formação (você pode adicionar mais campos dinamicamente)
    if (isset($_POST['curso']) && is_array($_POST['curso'])) {
        foreach ($_POST['curso'] as $key => $curso) {
            $dados['formacao'][] = [
                'curso' => $_POST['curso'][$key],
                'instituicao' => $_POST['instituicao'][$key],
                'conclusao' => $_POST['conclusao'][$key]
            ];
        }
    }

    // Gerar e exibir o currículo com o botão de imprimir
    $curriculoHTML = gerarCurriculo($dados);
    echo $curriculoHTML;
    echo '<div class="container mt-3">
            <button class="btn btn-info" onclick="window.print()">Imprimir Currículo</button>
          </div>';
    exit(); // Encerra a execução após gerar o currículo
}

?>

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

        <form method="post">
            <div class="form-section" id="informacoes-pessoais">
                <?php exibirTituloSecao("Informações Pessoais"); ?>
                <?php exibirCampo("Nome Completo", "nome"); ?>
                <?php exibirCampo("Email", "email", "email"); ?>
                <?php exibirCampo("Telefone", "telefone", "tel"); ?>
                <?php exibirCampo("LinkedIn", "linkedin"); ?>
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