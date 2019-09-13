# PI

## Critérios de avaliação
* Otimização/eficiência das operações implementadas;
* Uso adequado dos recursos conforme solicitado neste documento e apresentado nos materiais de aula;
* Domínio dos conceitos e técnicas durante a apresentação oral do projeto;
* Usabilidade, elegância, segurança e robustez do website;
* Responsividade;
* Cumprimento dos prazos.

## Recursos e Tecnologias
O website deve ser desenvolvido utilizando as seguintes tecnologias: HTML5, CSS, JavaScript, JSON, jQuery, Bootstrap, AJAX, PHP e MySQL.

## Hospedagem
O website deve ser hospedado gratuitamente nos servidores do awardspace (www.awardsapace.com) conforme apresentado nos slides de aula. Cada grupo deve criar uma conta no awardsapace.com e utilizála para enviar os arquivos do website, criar e manipular o banco de dados.

## Organização dos Arquivos
Os arquivos do website devem ser bem organizados e estruturados. Arquivos de imagem, código JavaScript, CSS, etc., devem ser armazenados em pastas próprias. O website deve ser desenvolvido visando uma manutenção prática e eficiente.

## Outras Especificações

* O website deve ser responsível, devendo se apresentar de maneira adequada e legível mesmo quando acessado a partir de dispositivos móveis;
* Templates e/ou layouts prontos não devem ser utilizados;
* Outros frameworks e tecnologias não devem ser utilizados;
* O website deverá prevenir ataques do tipo cross-site scripting (XSS) e SQL Injection;
* Formulários deverão ser devidamente validados no lado cliente e no servidor;
* O conceito de transação deve ser utilizado sempre que possível durante o cadastro dos dados no banco de dados. Eventuais falhas em inserções em tabelas não devem deixar os dados inconsistentes;
* O sistema deverá implementar adequadamente o conceito de sessão em PHP para manter o usuário logado durante o acesso à parte restrita. O sistema não deverá permitir o acesso à scripts PHP da parte restrita sem que o usuário tenha permissão para tal (sem que esteja devidamente logado).
* Os códigos comuns referentes aos cabeçalhos, barras de navegação e rodapés das páginas não devem ser explicitamente repetidos para cada página. Há diversas formas de compartilhar esses elementos com todas as páginas que os utilizam. Uma delas é utilizando a declaração PHP include. Veja o exemplo a seguir:

```html
<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <body>
        <?php include "header.php"; ?>
        <?php include "navbar.php"; ?>
        <div id="conteudoDaPagina">
        </div>
        <?php include "footer.php"; ?>
    </body>
</html>
```

# Entregas:
A pasta raiz do website deve ser compactada, sem as imagens, e enviada pelo sistema
SAAT de acordo com as datas definidas pelo professor. Serão duas entregas:

1. **Dia 25/09:** Na primeira etapa é preciso entregar toda a parte de front-end do website: páginas de acesso
público e páginas restritas, formulários, galeria de imagens, etc. Entretanto, nesta etapa não é
necessário efetivar as operações propriamente ditas (não é necessário efetivar os cadastros,
efetivar a busca, etc.). Também não é necessário realizar o login propriamente dito (embora a
interface para login já tenha que existir). A pasta raiz do website deve ser compactada e enviada
por meio do sistema SAAT conforme a data especificada no cronograma da disciplina (veja as
datas no arquivo Apresentação da Disciplina disponível no website do professor).

2. **Dia 11/11:** Na segunda etapa é preciso implementar toda a parte de back-end do website, incluindo toda a
lógica de programação server-side para efetivar as operações. Nesta etapa deve-se focar nas
operações com o banco de dados, criação dos serviços para acesso com AJAX, efetivação do login,
uso de sessões, etc. O projeto completo deverá ser entregue e apresentado ao professor na data
especificada no cronograma de atividades de aula. No momento da apresentação, os alunos
deverão mostrar o sistema em funcionamento on-line, nos servidores do awardspace. O website
será acessado por meio do domínio registrado.
