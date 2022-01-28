let free = false;

const validaCliente = (time)=>{
	let edad = prompt('cual es tu edad');
	if (edad > 18) {
		if(time >= 2 && time >7 && free == false){
			alert('entrase gratis valedor');
			free = true;
		}else{
			alert('tienes que pagar mi hermano');
		}
	}else{
		alert('no pasas menor de edad');
	}
}

// problema number dos
