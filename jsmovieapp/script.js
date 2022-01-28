//TMDB

//ingresa tu propia key
const APP_KEY = 'api_key=835fd2d6c9e1a42d603a24e5441bef54';
const BASE_URL = 'https://api.themoviedb.org/3';
const API_URL = BASE_URL + '/discover/movie?sort_by=popularity.desc&'+APP_KEY;
const IMAGE_URL = 'https://image.tmdb.org/t/p/w500/';

const SEARCH_URL = BASE_URL + '/search/movie?'+APP_KEY

const genres =[
	{"id":28,"name":"Action"},{"id":12,"name":"Adventure"},{"id":16,"name":"Animation"},{"id":35,"name":"Comedy"},{"id":80,"name":"Crime"},{"id":99,"name":"Documentary"},{"id":18,"name":"Drama"},{"id":10751,"name":"Family"},{"id":14,"name":"Fantasy"},{"id":36,"name":"History"},{"id":27,"name":"Horror"},{"id":10402,"name":"Music"},{"id":9648,"name":"Mystery"},{"id":10749,"name":"Romance"},{"id":878,"name":"Science Fiction"},{"id":10770,"name":"TV Movie"},{"id":53,"name":"Thriller"},{"id":10752,"name":"War"},{"id":37,"name":"Western"}
];

const main = document.getElementById('main');
const form = document.getElementById('form');
const search = document.getElementById('search');
const tagsEl = document.getElementById('tags');

var selectGenres=[];

setGender();
function setGender(){
	tagsEl.innerHTML = ``;
	genres.forEach(genre=>{
		const t = document.createElement('div');
		t.classList.add('tag');
		t.id=genre.id;
		t.innerText = genre.name;
		t.addEventListener('click',()=>{
			if( selectGenres.length == 0 ){
				selectGenres.push(genre.id);
			}else{
				if( selectGenres.includes(genre.id) ){
					selectGenres.forEach((id,idx)=>{
						if( id == genre.id ){
							selectGenres.splice(idx,1);
						}
					})
				}else{
					selectGenres.push(genre.id)
				}
			}
			// console.log(selectGenres);
			getMovies(API_URL + '&with_genres='+encodeURI(selectGenres.join(',')));
			highlightSelection();
		});
		tagsEl.appendChild(t);
	})
}


function highlightSelection(){
	const tags = document.querySelectorAll('.tag');
	tags.forEach(tag=>{
		tag.classList.remove('highlight');
	});
	cleanBtn();
	if( selectGenres.length != 0 ){
		selectGenres.forEach(id=>{
			const highlightedTag = document.getElementById(id);
			highlightedTag.classList.add('highlight');
		})
	}
}

function cleanBtn(){
	let clearbtn = document.getElementById('clear');

	if(clearbtn){
		clearbtn.classList.add('highlight');
	}else{
		let clear = document.createElement('div');
		clear.classList.add('tag','highlight');
		clear.id = 'clear';
		clear.innerText = 'clear x';
		clear.addEventListener('click',()=>{
			selectGenres = [];
			setGender();
		})
		tagsEl.append(clear);
	}

}

getMovies(API_URL);

function getMovies(url){
	fetch(url).then(res=>res.json()).then(data=>{
		if(data.results.length!== 0){
			showMovies(data.results);
		}else{
			main.innerHTML = `<h1 class="no-results">no se encontraron resultados</h1>`;
		}
	})
}

function showMovies(data){
	main.innerHTML = ``;
	data.forEach(movie=>{
		const {title, poster_path, vote_average, overview} = movie;
		const movieEl = document.createElement('div');
		movieEl.classList.add('movie');
		movieEl.innerHTML = `
			<img src="${poster_path ? IMAGE_URL+poster_path : "" }" alt="${title}">
			<div class="movie-info">
				<h3>${title}</h3>
				<span class="${getColor(vote_average)}">${vote_average}</span>
			</div>
			<div class="overview">
				<h3>Overview</h3>
				${overview}
			</div>
		`;
		main.appendChild(movieEl);
	})
}

function getColor(vote){
	if(vote >= 8){
		return 'green';
	}else if (vote >= 5){
		return 'orange';
	}else{
		return 'red';
	}
}

form.addEventListener('submit',(e)=>{
	e.preventDefault();

	const searchTerm = search.value;
	selectGenres = [];
	highlightSelection();
	if( searchTerm ){
		getMovies(SEARCH_URL+'&query='+searchTerm);
	}else{
		getMovies(API_URL);
	}

});
