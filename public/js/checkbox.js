const elements = document.querySelectorAll('.checkbox-box');
const checkboxes = document.querySelectorAll('.checkbox');

if (elements.length != 0) {
	elements.forEach((element, index) => {
		element.addEventListener('click', () => {
			element.classList.toggle('checkbox-box--checked');
			if (checkboxes[index].checked) {
				checkboxes[index].checked = false;
			}
			else{
				checkboxes[index].checked = true;
			}
			console.log(checkboxes[index].values);
		});
	});
}
