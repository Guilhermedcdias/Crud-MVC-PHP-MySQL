<div align="center">
    
</div>

<span id="tecnologias">

## 🛠️ Tecnologias

As seguintes ferramentas, linguagens, bibliotecas e tecnologias foram usadas na construção do projeto:

<img src="https://img.shields.io/badge/PHP-CED4DA?style=for-the-badge&logo=php&logoColor=black" alt="PHP" />
<img src="https://img.shields.io/badge/HTML5-CED4DA?style=for-the-badge&logo=html5&logoColor=E34F26" alt="HTML" /> 
<img src="https://img.shields.io/badge/CSS3-CED4DA?style=for-the-badge&logo=css3&logoColor=1572B6" alt="CSS" /> 	
<img src="https://img.shields.io/badge/MySQL-CED4DA?style=for-the-badge&logo=mysql&logoColor=black" alt="MySQL" />
<img src="https://img.shields.io/badge/VS_Code-CED4DA?style=for-the-badge&logo=visual%20studio%20code&logoColor=0078D4" alt="VS Code" /> 
<img src="https://img.shields.io/badge/GitHub-CED4DA?style=for-the-badge&logo=github&logoColor=20232A" alt="GitHub" />  


## ⚙️ Como Rodar


Para Rodar o Código é necessário configurar o ambiente no qual irá testa-lo, caso deseje utilizar aplicativos como o XAMPP, NGINX OU LAMP é necessario liberar algumas funções nas configurações dos mesmo...
A seguinte função deve ser habilitada dentro do arquivo httpd.conf:
<br>
~~~
LoadModule rewrite_module modules/mod_rewrite.so
 ~~~

<br>
 
 E a seguinte linha de código deve estar deste jeito:
<br>
 
 ~~~
<Directory />
    AllowOverride All
    Require all granted
</Directory>
 ~~~
 
 
 Após deve ser criado um arquivo .htacess, que possibilita que as rotas criadas no projeto sejam devidamente acessadas quando necessário:
 ~~~
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.*)$ /CRUD_PHP_MVC/APP/index.php?url=$1 [QSA,L]
RewriteRule ^style.css$ /style-css.php [L]
 ~~~
 É importante que na 3ª linha deste código seja alterado o caminho para o index.php do projeto como foi feito a seguir:
 ~~~
 /CRUD_PHP_MVC/APP/index.php
 ~~~
 
 Caso tenha o php instalado diretamente na maquina, basta pular os passos acima e seguir daqui.
 
 O próximo passo para rodar o projeto é clonar o repositório usando o seguinte comando no terminal do seu computador:
 
 ~~~
 git clone https://github.com/Guilhermedcdias/Crud-MVC-PHP-MySQL.git
 ~~~
 
 Depois de clonado o repositório basta abrir seu Workbench ou seu PHPMyAdmin e rodar o código para criar a base de dados utilizada no projeto.
 O Dump do Banco de dados se encontra na pasta Documentação na pasta raiz do Projeto.
 
 Um ponto importante é que você deve saber o usuario e a senha do seu banco de dados para colocar no arquivo de configuração do banco de dados dentro do php.
 
 Após fazer a importação do Banco de dados, é necessario Localizar a pasta em que deseja rodar o projeto, caso seja no XAMPP é necessário colocar a pasta do projeto dentro da pasta HTDOCS, que normalmente fica localizada dentro de C:/XAMPP/htdocs.
 
 Agora é necessário abrir o projeto no editor de sua escolhar e alterar a senha e o usuario do banco de dados nos arquivos "FornecedorDAO.php" e "ProdutoDAO.php", que estão localizados na Pasta DAO dentro da pasta APP.
 
 O trecho de código que é necessario ser alterado é o seguinte:
 ~~~
 $this->conexao = new PDO($dsn, 'usuario, 'senha');
 ~~~
 Agora basta entrar em localhost:80 e o projeto deve estar rodando.
 
 
 
