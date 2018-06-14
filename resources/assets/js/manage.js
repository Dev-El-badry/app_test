const accordions = document.getElementsByClassName('has-submenu')
const button_sideMenu_out = document.getElementById('btn-sidemenu-out')

function setSubmenuStyle(submenu, height, margin_top, margin_bottom) {
	submenu.style.maxHeight = height
	submenu.style.marginTop = margin_top
	submenu.style.marginBottom = margin_bottom

}

button_sideMenu_out.onclick = function() {
	this.classList.toggle("is-active")
	document.getElementById('admin-side-menu').classList.toggle('is-active')
}

for(var i=0; i < accordions.length; i++) {

	if(accordions[i].classList.contains('is-active')) {
		var submenu = accordions[i].nextElementSibling

		submenu.style.maxHeight = submenu.scrollHeight + "px"
		submenu.style.marginTop = "0.75em"
		submenu.style.marginBottom = "0.75em"
	}


	accordions[i].onclick = function() {
		this.classList.toggle('is-active')
		const submenu = this.nextElementSibling
		if(submenu.style.maxHeight) {
			//menu is open, we need to close it
			submenu.style.maxHeight = null
			submenu.style.marginTop = null
			submenu.style.marginBottom = null
			//setSubmenuStyle(null, null, null)
		} else {
			//menu is close, we need to open it
			submenu.style.maxHeight = submenu.scrollHeight + "px"
			submenu.style.marginTop = "0.75em"
			submenu.style.marginBottom = "0.75em"

			//setSubmenuStyle(submenu.scrollHeight + "px", "0.75em", "0.75em")
		}

	}
}