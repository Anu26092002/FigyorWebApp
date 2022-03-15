const imgDiv = document.querySelector('.profile-pic-div');
const img = document.querySelector('#photo');
const file = document.querySelector('#file');
const uploadBtn = document.querySelector('#uploadBtn');

const prof = document.querySelector('#profile_form');
prof.addEventListener('submit', (e) => {
e.preventDefault();
});


imgDiv.addEventListener('mouseenter', function(){
    uploadBtn.style.display = "block";
});

//if we hover out from img div

imgDiv.addEventListener('mouseleave', function(){
    uploadBtn.style.display = "none";
});


file.addEventListener('change', function(){
    //this refers to file
    const choosedFile = this.files[0];

    if (choosedFile) {

        const reader = new FileReader(); //FileReader is a predefined function of JS

        reader.addEventListener('load', function(){
            img.setAttribute('src', reader.result);
        });

        reader.readAsDataURL(choosedFile);
    }
});
 

// College name

fetch('./college_names.json').then(response => {
  return response.json();
}).then(data => {
  const k=Object.keys(data)
  const arr=[];
      for(var i=0;i<k.length;i++){
        for(var j=0;j<(data[k[i]].length);j++){
            arr.push(data[k[i]][j]);
            arr.sort();
}
}
for(var a=0;a<arr.length;a++){
 $('#sel').append('<option>' +arr[a]+'</option>');
}
 }).catch(err => {
    console.log(err);
});

// store in database 
 const firebaseConfig = {
    apiKey: "AIzaSyCqtd6_2r9vQuhBeoAKOXLgSuREETi_eTU",
    authDomain: "figyor-f459e.firebaseapp.com",
    projectId: "figyor-f459e",
    storageBucket: "figyor-f459e.appspot.com",
    messagingSenderId: "826393841711",
    appId: "1:826393841711:web:e26272b57bf12ce4f176da",
    measurementId: "G-22T5BZMWN0"
  };
const profile_form = document.querySelector('#submit');
profile_form.addEventListener('click', (e) => {
e.preventDefault();
const u_name= document.querySelector('#name').value;
const imageUrl= document.querySelector('#file').value;
const u_resume= document.querySelector('#myFile').value;
const user_name= document.querySelector('#username').value;
const u_age= document.querySelector('#age').value;
const u_degree= document.querySelector('#degree').value;
const u_year= document.querySelector('#year').value;
const u_college= document.querySelector('#sel').value;
const app = firebase.initializeApp(firebaseConfig);
var db = firebase.firestore(); 
 db.collection("data").add({
    name:u_name,
    username:user_name,
    year:u_year,
    college:u_college,
    degree:u_degree,
    age:u_age,
    profile_photo:imageUrl,
    resume:u_resume
  }).then((docRef) => {
    console.log("Document written with ID: ", docRef.id);
})
.catch((error) => {
    console.error("Error adding document: ", error);
});
// document.getElementById ("submit").addEventListener ("click",func,false);
//        function func() {
//       // const result=await data()
//       window.location.href="main.html";
});
