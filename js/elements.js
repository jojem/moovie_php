//_________________Add elements on html page____________________

//Adding info throw Array

//_______________________________________________________________________
// var name1 = "Green book";
// var nameOfFilm = document.getElementById('name_of_film');
// var newName = document.createElement('h1');
// newName.innerText = name1;
// nameOfFilm.appendChild(newName);

// var infoArray = ["2018", "Biography, Comedy, Drama", "USA" ];


// var infoItem = Array.from(document.getElementsByClassName('info__item'));

// function addInfoSpan(i){
// 	var infoSpan = document.createElement('span');
// 	infoSpan.innerText = infoArray[i];
// 	infoItem[i].appendChild(infoSpan);
// }

// for(var i=0; i<3; i++){
// 	addInfoSpan(i);
// }
//___________________________________________________________________________



//Adding info throw objects

var film1 = {
	filmName: "Truman Show",
	year: 1998,
	genre: "Drama, Fantasy",
	country: "Russia"
};

var film2 = {
	filmName: "Green Book",
	year: 2018,
	genre: "Biography",
	country: "USA"
};

var film3 = {
	filmName: "Whiplash",
	year: 2014,
	genre: "Drama",
	country: "France"
};

function addInfoAboutFilm(film){

	var spans = ["year", "genre", "country"];
	var resultsSpans = [];
	var infoCont = document.getElementById("info-cont");
	
	while (infoCont.firstChild) {
    infoCont.removeChild(infoCont.firstChild);
}
	var filmName = document.createElement("h1");
	filmName.innerText = film.filmName;
	infoCont.appendChild(filmName);


	for(var i = 0; i<3; i++){
			var span = document.createElement('div');
			span.innerText = spans[i]+ ": " + film[spans[i]];
			span.classList.add('info__item');
			infoCont.appendChild(span);
	}
}
