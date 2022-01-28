let frutas = ['banana','manzana','mangosito','fresa','pera'];

let pc = {
	nombre : 'emmanuelPC',
	procesador : 'nose',
	ram : '16GB',
	espapcio : '1TB',
	tiene4k : false,
	quiere4k : true,
};


// for in - of
//in muestra posicion of muestra contenido

for (fruta in frutas){
	document.write('posiciones '+fruta+'<br>');
}

document.write('<hr>');

for(fruta of frutas){
	document.write(fruta+"<br>");
}

// let nombre = pc['nombre'];
// let procesador = pc['procesador'];
// let ram = pc['ram'];
// let espapcio = pc['espapcio'];

// let frase = `<br><br>
// 	<hr>
// 	el nombre de la pc es: <b>${nombre}</b><br>
// 	el procesador es : <b>${procesador}</b><br>
// 	la memoria ram es de : <b>${ram}</b><br>
// 	el espapcio es de: <b>${espapcio}</b><br>
// `;



// document.write(frase);