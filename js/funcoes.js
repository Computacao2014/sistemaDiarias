/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function AjaxF()
{
 var ajax;

    try
    {
        ajax = new XMLHttpRequest();
    } 
    catch(e) 
    {
        try
        {
            ajax = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch(e) 
        {
            try 
            {
                ajax = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch(e) 
            {
                alert("Seu browser não da suporte à AJAX!");
                return false;
            }
        }
    }
    return ajax;
}
// Função que faz as requisição Ajax ao arquivo PHP
function pegaDados()
{
    var ajax = AjaxF();	

    ajax.onreadystatechange = function(){
        if(ajax.readyState == 4)
        {
             document.getElementById('conteudo').innerHTML = ajax.responseText;
        }
    }

    // Variável com os dados que serão enviados ao PHP
    var matricula = "matricula="+document.getElementById('matricula').value;
    var nome = "nome="+document.getElementById('nome').value;
    
    ajax.open("GET", "retorna_informacoes.php?"+matricula+"&"+nome, false);
    ajax.setRequestHeader("Content-Type", "text/html");
    ajax.send();
}