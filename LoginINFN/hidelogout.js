function hideLogout() {
	let ref = "a[href='https://mediawall.infn.it/logoff']";
	let targ1 = document.getElementById('sideBarContainer').querySelector(ref);
	//let targ2 = document.getElementsByClassName('dropdown-menu-right')[1];
	let targ2 = document.getElementById("rightProfileBtnGroup").querySelector(ref);
	if(targ1) {
		targ1.style.display = 'none';
	}
	if(targ2) {
		targ2.style.display = 'none';
	}
}

hideLogout();
