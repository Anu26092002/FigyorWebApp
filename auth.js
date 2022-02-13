
 import { getAuth, createUserWithEmailAndPassword } from "/node_module/@firebase/auth";

const signupForm = document.querySelector('#signup-form');
signupForm.addEventListener('submit', (e) => {
  e.preventDefault();
   // get user info
  const email = signupForm['user-email'].value;
  const password = signupForm['user-password'].value;
  console.log(email,password)
 const auth = getAuth(app);
 try{createUserWithEmailAndPassword(auth, email, password)
  .then((userCredential) => {
    console.log(cred.user);});
}
catch(e){console.log(e)};


});