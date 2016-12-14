# basic-framework
Desenvolvendo um framework básico para aplicações pequeno e meio porte

1) Baixe todas as depencias do projet
- Acesse o projeto pelo cmd até a pasta raiz do mesmo
- Utilize os comandos:
    composer update
    bower update
    
2) Como utilizar
- Abra o CMD e vá até a pasta public do projeto
- Utilize o comando -> php -S localhost:4040

3) Como acessar o projeto via web
- Abra o navegador e digite na url -> localhost:4040

4) Acessando banco de dados (a partir dos models)
- $this->database()->insert('tabela', ['posicao' => 'valor']);
- $this->database()->delete('tabela', ['condicao' => 2]);
- Mais informações acesse a dependencia do medoo.in

5) Utilizando Twig (template)
- Acesse o arquivo app/Route.php
- Dentro de alguma rota você por obter um novo template
    $this->twig->render('index.tpl.html');
- Neste caso está buscando o arquivo index.tpl.html dentro de resources/views/
- Para saber mais informações acesse a dependencia do twig

6) Criando uma rota
- Acesso o arquivo app/Route.php
- Vá até o método "routing" e utilize o código
    $this->route->respond('GET', '/', function() {
        echo 'rota /';
    });
- Para mais informações acesse a dependencia do klein.php

7) Sistema de Linguagem
- Os arquivos de linguagens estão dentro de "resources/lang".
- Para efetuar a troca de uma linguagem basta coloca a variável changelang na URL com o nome do arquivo de linguagem.
    Exemplo: ?changelang=ptbr
    Dentro de "resource/lang" existe um arquivo chamado ptbr.php
- Para chamar na view basta acessar pelo template {{ lang.POSICAO }}
    Exemplo: {{ lang.TITLE }}

Dependencias
- Medoo (Banco de dados - http://www.medoo.in)
- Klein.php (Routes - http://github.com/klein/klein.php)
- Twig (Template - http://twig.sensiolabs.org)
- Whoops (Tratamento de Exceções - https://github.com/filp/whoops)

Requisitos
- PHP 7.0
- MySQL 5.6
- Composer
- NPM
- Bower

