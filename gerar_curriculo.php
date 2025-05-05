<?php

// Função principal para gerar o currículo em HTML (com Bootstrap)
function gerarCurriculo($dados) {
    $html = "<!DOCTYPE html>";
    $html .= "<html lang=\"pt-BR\">";
    $html .= "<head>";
    $html .= "<meta charset=\"UTF-8\">";
    $html .= "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">";
    $html .= "<title>Currículo de " . htmlspecialchars($dados['nome']) . "</title>";
    $html .= "<link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css\" rel=\"stylesheet\">";
    $html .= "</head>";
    $html .= "<body>";
    $html .= "<div class=\"container mt-4\">";
    $html .= "<h1 class=\"display-4\">" . htmlspecialchars($dados['nome']) . "</h1>";
    $html .= "<p class=\"lead\">" . htmlspecialchars($dados['email']) . " | " . htmlspecialchars($dados['telefone']) . " | " . htmlspecialchars($dados['linkedin']) . "</p>";
    $html .= "<hr class=\"my-4\">";

    if (!empty($dados['resumo'])) {
        exibirTituloSecao("Resumo Profissional");
        $html .= "<p>" . nl2br(htmlspecialchars($dados['resumo'])) . "</p>";
    }

    if (!empty($dados['experiencia'])) {
        exibirTituloSecao("Experiência Profissional");
        $html .= formatarExperiencia($dados['experiencia']);
    }

    if (!empty($dados['formacao'])) {
        exibirTituloSecao("Formação Acadêmica");
        $html .= formatarFormacao($dados['formacao']);
    }

    if (!empty($dados['habilidades'])) {
        exibirTituloSecao("Habilidades");
        $html .= formatarHabilidades($dados['habilidades']);
    }

    $html .= "</div>"; // Fechar container
    $html .= "<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js\"></script>";
    $html .= "<script src=\"download_curriculo.js\"></script>";
    $html .= "</body>";
    $html .= "</html>";

    return $html;
}

?>