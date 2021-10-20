function alerta(){
	alert('Bloqueio Administrativo!');
	return false;
}

function rejeitaTecla(oEvent){
    var oEvent = oEvent ? oEvent : window.event;
    var tecla = (oEvent.keyCode) ? oEvent.keyCode : oEvent.which;
	if(tecla == 17 || tecla == 44 || tecla == 106){
		alerta();
 	}
}

document.onkeypress = rejeitaTecla;
document.onkeydown = rejeitaTecla;
document.oncontextmenu = alerta;
