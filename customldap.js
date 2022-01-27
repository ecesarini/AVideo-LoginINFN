function customLdap() {
	let ldap = document.getElementById('LdaploginForm');
	if(ldap) {
		ldap.getElementsByTagName('label')[0].innerText = "User Mail";
	}
}

customLdap();