 var config = {
    apiKey: "AIzaSyD4tIOk2-xhHTkDogeov3YBQBq9lzRaNrI",
    authDomain: "ecommerce-663ea.firebaseapp.com",
    databaseURL: "https://ecommerce-663ea.firebaseio.com",
    projectId: "ecommerce-663ea",
    storageBucket: "",
    messagingSenderId: "161625704772"
  };
  firebase.initializeApp(config);

const txtEmail = document.getElementById('correo');
const txtPassword = document.getElementById('pass');
const btnLogin = document.getElementById('login');
btnLogin.addEventListener('click', e => {
	const email = txtEmail.value;
	const pass = txtPassword.value;
	const auth = firebase.auth();

	const promesa = auth.signInWithEmailAndPassword(email,pass);
	promesa.catch(e => location.href = "admin/error.php");

});


firebase.auth().onAuthStateChanged(firebaseUser => {
	if (firebaseUser) {
			location.href="admin";
		}
});