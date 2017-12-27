const add = document.querySelector('#plus');
const mainDiv = document.querySelector('.flexBox');
let divArr = Array.from(document.querySelectorAll('.realtext'));
let onlyTextArea = document.querySelector('#onlyText');

mainDiv.addEventListener('click', function(){

	divArr.forEach(element => element.addEventListener('keyup', function(){
		onlyTextArea.value = this.innerHTML;
	}));
});

function addNote(e){
	const newDiv = document.createElement('div');
	newDiv.classList.add('words');
	mainDiv.appendChild(newDiv);
	
	const newRealText = document.createElement('div');
	newRealText.setAttribute('class','realtext');
	newRealText.setAttribute('spellcheck','false');
	newRealText.setAttribute('contenteditable','true');
	newDiv.appendChild(newRealText);

	const newSave = document.createElement('button');
	newSave.setAttribute('id','save');
	newSave.setAttribute('type','submit');
	newSave.setAttribute('class','savebutton');
	newSave.setAttribute('name','submit');
	newDiv.appendChild(newSave);
	
	const newIcon = document.createElement('span');
	newIcon.setAttribute('class','fa fa-floppy-o');
	newSave.appendChild(newIcon);

	divArr.push(newRealText);

}
add.addEventListener('click', addNote);

const form = document.querySelector('.search-form');
const searchIcon = document.querySelector('.form-control-feedback');
const searchBar = document.querySelector('.search-input');
let windowWidth = window.innerWidth;

window.onresize = () => {
	
	let newWindowWidth = window.innerWidth;
	if(windowWidth != newWindowWidth){
		
		windowWidth = window.innerWidth;
		
		if(form.style.width == '30%'){
			form.style.width = '80%';
		}
		else if(form.style.width == '80%'){
			form.style.width = '30%';
		}
		else if(form.style.width == '3%'){
			form.style.width = '8%';
		}
		else if(form.style.width == '8%'){
			form.style.width = '3%';
		}
	}
};

form.addEventListener('click', () => {
	searchBar.style.backgroundColor = '#f3eeb9';
	if(windowWidth > 750){
		form.style.width = '30%';
	}
	else {
		form.style.width = '80%';
	}
	searchIcon.style.display = 'none';
});

mainDiv.addEventListener('click', () => {
		searchBar.style.backgroundColor = '#f3eeb9';
		if(windowWidth > 750){
			form.style.width = '3%';
		}
		else {
			form.style.width = '8%';
		}
		searchBar.value = '';
		searchIcon.style.display = 'block';	
});

function search(){
	let word = searchBar.value.toUpperCase();
	for(let i = 0; i < divArr.length; i++){
		if (divArr[i].innerHTML.toUpperCase().indexOf(word) > -1) {
	        divArr[i].parentNode.style.display = "block";
	    } 
	    else {
	        divArr[i].parentNode.style.display = "none";
	        
	    }
	}
}

searchBar.addEventListener('change', search);
searchBar.addEventListener('keyup', search);

const boxCategory = document.querySelector('.boxCategory');
const newCategory = document.querySelector('#newCat');
let catArr = Array.from(document.querySelectorAll('.category'));

newCategory.addEventListener('click', () => {
	const name = document.createElement('input');
	name.setAttribute('style','width:20%; background:#f3eeb9; border-radius:15px');
	name.setAttribute('type','text');
	name.setAttribute('name','submitCategory');
	boxCategory.appendChild(name);
		
});

const postCat = document.querySelectorAll('.firstCatBut');
let suggestionsArr = [];

postCat.forEach(post => post.addEventListener('click', () => {
	
	if(catArr.length > 0) {
		const html = catArr.map(element => {
			const catName = element.innerHTML;
			const catNameName = element.innerHTML.toLowerCase();
			return `
				<button type='submit' class='chooseCat' name='postCategory' id='${catNameName}'>${catName}</button>
			`;
			}).join('');
		post.innerHTML = html;
		post.classList.remove('smallCat');
		suggestionsArr = post.querySelectorAll('.chooseCat');
		const postId = post.parentNode.querySelector('.savebutton');
		suggestionsArr.forEach(element => element.addEventListener('click', () => {
			element.setAttribute('value', postId.value);
			element.setAttribute('style','display:none');
			postId.appendChild(element);
			const assistInput = document.createElement('input');
			assistInput.setAttribute('type', 'hidden');
			assistInput.setAttribute('name', 'nameValue');
			assistInput.value = element.innerHTML.toLowerCase();
			postId.appendChild(assistInput);
		}));

	}
}));