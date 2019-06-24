
//big film stock button to show or unshow stock
var imgSec = document.getElementById("images-section"); 
function showImageSection(){
	if (imgSec.style.display!='none'){
		imgSec.style.display='none';
	}
	else{
		imgSec.style.display='flex';
	}
}

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("image-container");

  if (n > slides.length) {slideIndex = 1} 
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none"; 
  }
  slides[slideIndex-1].style.display = "block"; 
}


// laboratory work #4
// task #1

var a, z1, z2;
a = 30;
z1 = (Math.cos(a) + Math.sin(a))/(Math.cos(a) - Math.sin(a));
z2 = Math.tan(2*a) + Math.sin(2*a);

console.log("z1 = " + z1 + "\nz2 = " + z2 + "\na = " + a);


//task #2

// Вариант 14.	В одномерном массиве, состоящем из n
// вещественных элементов вычислить:
// a)	Количество элементов массива, равных нулю.
// b)	Сумму элементов массива, расположенных
// после минимального элемента.
// c)	Вырезать элементы из предыдущего задания (b) 
// в новый массив, сохранив исходный.

//______________________________________________


var n=10; //enter the array length
var array = [];
var countZero = 0;
var minElement = 999;
var minElementIndex;
var sumOfElements = 0;
var newArray = [];

for (var i=0;i<n;++i) {
	array[i]=Math.floor(Math.random() * n);

	if (array[i]==0){
		countZero++;
	}
	sumOfElements += array[i];

	if (minElement > array[i]){
		minElement = array[i];
		sumOfElements = 0;
		minElementIndex = i;
	}
}
newArray = array.slice(minElementIndex + 1, n);

console.log(array);
console.log("Count of zero is " + countZero);
console.log("The minimal element of the array is " + minElement);
console.log("The sum of the elements after minimal element equels " + sumOfElements);
console.log("If we slice those elements we can get some array like this " + newArray);


//______________________________________________________________







