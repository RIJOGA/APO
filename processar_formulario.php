<?php

include 'functions.php';
include 'gerar_curriculo.php';

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

    // Gerar e exibir o currículo com o botão de download
    $curriculoHTML = gerarCurriculo($dados);
    echo $curriculoHTML;
    echo '<div class="container mt-3"><button class="btn btn-success" onclick="baixarCurriculo()">Baixar Currículo (HTML)</button></div>';
    exit(); // Encerra a execução após gerar o currículo
}

?>