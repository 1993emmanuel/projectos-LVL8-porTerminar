
// mejor de esta forma
function saludar(){
	let respuesta = prompt('hola emmanuel como fue tu dia');
	if(respuesta == 'bien'){
		alert('me alegro');
	}else{
		alert('una pena');
	}
}

// esta forma no es la mejorcita
let elSaludo = function(){
	let respuesta = prompt('hola emmanuel como fue tu dia');
	if(respuesta == 'bien'){
		alert('me alegro');
	}else{
		alert('una pena');
	}
}

function saludar2(){
	alert('hi');
	return 'la funcion se ejecuto correctamente';
}

let valor = saludar2();

document.write(valor);