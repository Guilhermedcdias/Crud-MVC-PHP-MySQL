<style>
  /* RESET CSS */
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed, 
figure, figcaption, footer, header, hgroup, 
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	font: inherit;
	vertical-align: baseline;
}
/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure, 
footer, header, hgroup, menu, nav, section {
	display: block;
}
body {
	line-height: 1;
}
ol, ul {
	list-style: none;
}
blockquote, q {
	quotes: none;
}
blockquote:before, blockquote:after,
q:before, q:after {
	content: '';
	content: none;
}
table {
	border-collapse: collapse;
	border-spacing: 0;
}


/* CSS CRIADO */
body {
  background-color:white;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #38444d;
}

li {
  float: left;
}

li a, .dropbtn {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 25px 40px;
  font-size: 1.2em;
  text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
  background-color: black;
}

li.dropdown {
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1;}

.dropdown:hover .dropdown-content {
  display: block;
}

#cadastrar_fornecedor{
  margin-top: 1vh;
  display: flex;
  align-items: center;
  flex-direction: column;
}
#cadastrar_fornecedor .caixa{
  width: 90%;
  height: 90vh;
  display: flex;
  flex-direction: column;
  flex-wrap: nowrap;
  align-content: space-around;
  justify-content: center;
  align-items: center;
}

#cadastrar_fornecedor .caixa form{
  width: 98%;
}
#cadastrar_fornecedor .caixa form label{
  width: 100%;
  padding: 1vh;
  font-size: 1.2em;
  font-weight: 500;
}
#cadastrar_fornecedor .caixa form input{
  width: 98%;
  margin-bottom: 2vh;
  padding: 10px 10px;
  border-radius: 5px;
}
#cadastrar_fornecedor .caixa form .bot{
  width: 100%;
    display: flex;
    flex-direction: row-reverse
  
}
#cadastrar_fornecedor .caixa form .bot button{
  padding: 8px 30px;
  background-color: transparent;
  border-radius: 10px;
  cursor: pointer;
  background-color: #38444d;
  color: white;

}

/* SELEÇÃO FORNECEDORES */
#listar_fornecedores{
  margin-top: 3vh;
}
#listar_fornecedores .deletar,
#listar_fornecedores a{
  margin-top: 3vh;
  padding: 5px 20px;
}
#listar_fornecedores .content,
#listar_fornecedores .content2
{
  display: flex;
  margin: auto;
}
#listar_fornecedores .content2{
    flex-direction: row-reverse;
    justify-content: space-between;
}
#listar_fornecedores .content2 button{
  background-color: #ba0000;
  color: white;
  border: #b31010;
  border-radius: 10px solid #b31010;
}
#listar_fornecedores .content2 .flex{
  display: flex;
}
#listar_fornecedores .content2 .flex a{
  border: 1px solid black;
  margin-right: 10px;
  text-decoration: none;
  color: black;
}
#listar_fornecedores .content .rTable{
  width:100%;
  text-align: center;
}
#listar_fornecedores .content .rTable th, #listar_fornecedores .content .rTable td{
    padding: 7px 0;
  }

#listar_fornecedores .content .rTable thead{
  background-color: #38444d;
  font-weight: bold;
  color: white;
}

#listar_fornecedores .content .rTable thead tr th{
  vertical-align: middle;
}

#listar_fornecedores .content .rTable tbody tr:nth-child(2n){
background: #cad2c5;
}

@media screen and (max-width: 940px) {
  #listar_fornecedores .content{
    width: 80%;
    border-right: 2px solid;
    border-left: 2px solid;
    border-bottom: 2px solid;
  }
  #listar_fornecedores .content2{
    width: 80%;
  }

  #listar_fornecedores .content .rTable thead{
    display: none;
  }
  #listar_fornecedores .content .rTable tbody td{
    display: flex;
    flex-direction: column;
  }
}

@media only screen and (min-width: 940px) {
  #listar_fornecedores .content{
    width: 90%;
    border-right: 2px solid;
    border-left: 2px solid;
    border-bottom: 2px solid;

  }
  #listar_fornecedores .content2{
    width: 90%;
  }
  
  #listar_fornecedores .content .rTable tbody tr td:nth-child(1){
    width: 2%;
  }
  #listar_fornecedores .content .rTable tbody tr td:nth-child(2){
    width: 18%;
  }
  #listar_fornecedores .content .rTable tbody tr td:nth-child(3){
    width: 18%;
  }
  #listar_fornecedores .content .rTable tbody tr td:nth-child(4){
    width: 19%;
  }
  #listar_fornecedores .content .rTable tbody tr td:nth-child(5){
    width: 10%;
  }
  #listar_fornecedores .content .rTable tbody tr td:nth-child(6){
    width: 10%;
  }
  #listar_fornecedores .content .rTable tbody tr td:nth-child(7){
    width: 5%;
  }
  #listar_fornecedores .content .rTable tbody tr td:nth-child(8){
    width: 5%;
  }
  #listar_fornecedores .content .rTable tbody tr td:nth-child(8){
    width: 8%;
  }
}

.editar{
  background-color: #38444d;
  color: white;
}
</style>