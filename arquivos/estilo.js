function mostrarCorpo()
{
	var corpo = document.querySelector(".corpo");
	var botaoToCorpo = document.querySelector(".cadastrarEvento");
	corpo.classList.toggle('mostrar');
	var verifica = corpo.getAttribute("class");
	if (verifica == "corpo mostrar")
	{
		botaoToCorpo.innerHTML = "Fechar Cadastro";
	}
	else
	{
		botaoToCorpo.innerHTML = "+ Cadastrar";
	}
}
function mostrar()
{
	var r = new XMLHttpRequest();
	r.open("GET","mostrar.php",true);
	r.onreadystatechange = function ()
	{
		var result = r.responseText;
		var element = document.querySelector("tbody");
		element.innerHTML = result;
	};
	r.send();
}
function carregar()
{
	mostrar();
	// recuperando dados
	var botaoToCorpo = document.getElementsByClassName('cadastrarEvento')[0];
	var corpo = document.getElementsByClassName('corpo')[0];
	botaoToCorpo.addEventListener('click',mostrarCorpo);

	var botaoToMenu = document.getElementsByClassName('botaoMenu')[0];
	var menu = document.getElementById('menu');
	botaoToMenu.addEventListener('click',mostrarMenu);

	// funções
	function mostrarMenu()
	{
		menu.classList.toggle('mostrar');
	}
}

function requisicao (id,tbl)
{
	var requi = new XMLHttpRequest();
	requi.open("GET","acao.php?id="+id+"&tbl="+tbl,true);
	requi.onreadystatechange = function()
	{
		// var conteudo = requi.responseText;
	};
	requi.send();
}
function excluir (idExcluir)
{
	var requisicao = new XMLHttpRequest();
	requisicao.open("GET","excluir.php?id="+idExcluir,true);
	requisicao.onreadystatechange = function()
	{
		var resultado = requisicao.responseText;
		var mensagem = document.querySelector(".msgInfoPadrao");
		mensagem.classList.toggle("msgInfoAcao");
		mensagem.innerHTML = resultado;
	}
	requisicao.send();
	mostrar();
}

function acao(valorId,valorTbl)
{
	requisicao(valorId,valorTbl);
	mostrarCorpo();
}