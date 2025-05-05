function baixarCurriculo() {
    const curriculoHTML = document.documentElement.outerHTML;
    const blob = new Blob([curriculoHTML], { type: 'text/html;charset=utf-8' });
    const url = URL.createObjectURL(blob);
    const link = document.createElement('a');