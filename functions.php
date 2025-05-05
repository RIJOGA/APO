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

?>