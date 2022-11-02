$(document).ready(function(){
	$('a[data-confirm]').click(function(ev){
		var href = $(this).attr('href');
		if(!$('#confirm-delete').length){
			$('body').append('<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-dialog-centered"><div class="modal-content"><div class="modal-header bg-danger text-white">Excluir Item<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza de que deseja excluir o item selecionado?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataComfirmOK">Excluir</a></div></div></div></div>');
		}
		$('#dataComfirmOK').attr('href', href);
        $('#confirm-delete').modal({show: true});
		return false;
		
	});
});

$('#verColaboradores').click(function(){
	$('#ocultarColaboradores').show();
	$('#verColaboradores').hide();
	$('#donutchart').hide();
});

$('#ocultarColaboradores').click(function(){
	$('#ocultarColaboradores').hide();
	$('#verColaboradores').show();
	$('#donutchart').show();
});

$('#verClientes').click(function(){
	$('#ocultarClientes').show();
	$('#verClientes').hide();
	$('#donutchart').hide();
});

$('#ocultarClientes').click(function(){
	$('#ocultarClientes').hide();
	$('#verClientes').show();
	$('#donutchart').show();
});

$('#verServicos').click(function(){
	$('#ocultarServicos').show();
	$('#verServicos').hide();
	$('#donutchart').hide();
});

$('#ocultarServicos').click(function(){
	$('#ocultarServicos').hide();
	$('#verServicos').show();
	$('#donutchart').show();
});

$('#botao').click(function(){
	$('#confirmaco')
		.text("Salvo com sucesso")
		.css("color", "green")
		.delay(3000)
		.fadeOut(5000)
})

var filtro = document.getElementById('filtro-nome');
var tabela = document.getElementById('lista');
filtro.onkeyup = function() {
    var nomeFiltro = filtro.value;
    for (var i = 1; i < tabela.rows.length; i++) {
        var conteudoCelula = tabela.rows[i].cells[0].innerText;
        var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;
        tabela.rows[i].style.display = corresponde ? '' : 'none';
    }
};