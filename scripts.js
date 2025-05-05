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

function baixarCurriculo() {
    const curriculoHTML = document.documentElement.outerHTML;
    const blob = new Blob([curriculoHTML], { type: 'text/html;charset=utf-8' });
    const url = URL.createObjectURL(blob);
    const link = document.createElement('a');
    link.href = url;
    link.download = 'meu_curriculo.html';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
    URL.revokeObjectURL(url);
}