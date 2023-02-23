
/**
 * EXECUTA A FUNÇÃO "ATUALIZA" PARA VERIFICAR SE HÁ ALGUMA NOTIFICAÇÃO
 */
$(document).ready(function() {
	atualiza();
});

	/**
	 * FUNÇÃO ATUALIZA QUE BUCA A PÁGINA AÇÃO PARA IMPRIMIR NA ID NOTIFICAÇÃO
	 */

function atualiza(){
	$.get("acao.php", function(resultado){
		$('#notification_count').html(resultado);
	})
/**
* FUNÇÃO E TEMPO DE ATUALIZAÇÃO DA ID NOTIFICAÇÃO
*/
	setTimeout('atualiza()', 5000);
}

