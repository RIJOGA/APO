# APO
1-Trabalho da matéria de Fundamentos de Programação para Internet EAD Unipar
# Gerador de Currículos Online

## Descrição do Projeto

Este projeto consiste em um gerador de currículos online desenvolvido utilizando PHP para o backend e HTML, CSS (via Bootstrap) e JavaScript/jQuery para o frontend. O objetivo principal é permitir que usuários criem e personalizem seus currículos de forma fácil e intuitiva através de um formulário web, com a opção de visualizar o currículo gerado diretamente no navegador e baixá-lo como um arquivo HTML.

O sistema oferece as seguintes funcionalidades:

* **Formulário Interativo:** Um formulário web dividido em seções para facilitar o preenchimento das informações do currículo (Informações Pessoais, Resumo Profissional, Experiência Profissional, Formação Acadêmica e Habilidades).
* **Campos Dinâmicos:** A seção de Experiência Profissional e Formação Acadêmica permite adicionar e remover itens dinamicamente utilizando JavaScript/jQuery, facilitando a inclusão de múltiplas experiências e formações.
* **Visualização em Tempo Real (Implícito):** Ao submeter o formulário, o currículo é gerado e exibido diretamente no navegador, permitindo ao usuário visualizar o resultado final.
* **Formatação com Bootstrap:** A estilização do formulário e do currículo gerado é feita utilizando o framework CSS Bootstrap, garantindo uma interface responsiva e visualmente agradável.
* **Download do Currículo:** O usuário tem a opção de baixar o currículo gerado como um arquivo HTML, que pode ser posteriormente aberto em qualquer navegador ou editado.

## Tecnologias Utilizadas

* **PHP:** Linguagem de script do lado do servidor para processar o formulário e gerar o HTML do currículo.
* **HTML:** Linguagem de marcação para a estrutura do formulário e do currículo.
* **CSS:** Folhas de estilo para a apresentação visual, utilizando o framework Bootstrap.
* **JavaScript:** Linguagem de script do lado do cliente para funcionalidades interativas, como adicionar/remover campos dinamicamente e iniciar o download.
* **jQuery:** Biblioteca JavaScript para simplificar a manipulação do DOM e eventos.
* **Bootstrap:** Framework CSS para estilização responsiva e componentes de interface.

## Como Utilizar

1.  Clone ou faça o download deste repositório (se aplicável).
2.  Certifique-se de ter um servidor web (como Apache ou Nginx) com suporte a PHP instalado e configurado.
3.  Coloque os arquivos PHP e HTML no diretório raiz do seu servidor web ou em um diretório acessível através do navegador.
4.  Abra o arquivo HTML (`seu_arquivo.html` ou o nome que você deu) no seu navegador.
5.  Preencha o formulário com suas informações.
6.  Clique no botão "Gerar Currículo".
7.  O currículo gerado será exibido na tela.
8.  Clique no botão "Baixar Currículo (HTML)" para salvar o currículo como um arquivo HTML no seu computador.

## Próximos Passos (Sugestões)

* **Geração de PDF:** Implementar a geração do currículo em formato PDF utilizando uma biblioteca PHP como TCPDF ou mPDF.
* **Mais Opções de Layout:** Oferecer diferentes templates ou opções de layout para o currículo.
* **Edição Visual:** Adicionar funcionalidades para edição visual do currículo antes do download.
* **Armazenamento de Dados:** Permitir que usuários salvem seus dados para futuras edições.
* **Internacionalização:** Suporte a múltiplos idiomas.

## Contribuição

Contribuições são bem-vindas! Sinta-se à vontade para abrir issues para relatar bugs ou sugerir melhorias, ou enviar pull requests com suas modificações.

## Licença

[Adicionar a licença do projeto aqui, se aplicável]
