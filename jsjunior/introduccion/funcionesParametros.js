
//funciones con parametros
function suma(number1, number2){
	let res = number1 + number2;
	document.write(res);
	document.write('<br>');
}
function saludar2(nombre){
	let frase = `hola como estas ${nombre}`;
	document.write(frase);
}

// funciones tipo flecha

// const saludar = function(nombre){
// 	let frase = `hola como estas ${nombre}`;
// 	document.write(frase);
// }

let frase = `hola como estas ${nombre}`;
const saludar = nombre=>{
	document.write(frase);
}

saludar('emmanuel');
