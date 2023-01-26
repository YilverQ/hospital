const botonIcon = document.querySelector("#botonIcon");
const message = document.querySelector('.message');

if (botonIcon) {
	botonIcon.addEventListener("click", ()=>{
		message.classList.add("disabled");
	});
};