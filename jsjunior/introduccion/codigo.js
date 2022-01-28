// alert('funcion');

dineroCofla  = prompt('cuanto dinero tienes cofla');
dineroRoberto = prompt('cuanto dinero tienes roberto');
dineroPedro = prompt('cuanto dinero tienes pedro');


if(dineroCofla > 0.6 && dineroCofla <1){
	alert('compra el helado de agua');
}else if(dineroCofla > 1.0 && dineroCofla <1.6){
	alert('compra el helado de crema');
}else if( dineroCofla >1.6 && dineroCofla <1.7){
	alert('compra el helado de heladrix');
}else if( dineroCofla >= 1.6 && dineroCofla <1.8 ){
	alert('compra el helado de heladovich');
}else if( dineroCofla >=1.8 && dineroCofla <2.9 ){
	alert('compra el helado de helardo');
}else if(dineroCofla >=2.9){
	alert('compra el helado con confites o el mamalon');
}else{
	alert('no te alcanza');
}