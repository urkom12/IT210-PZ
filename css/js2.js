var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) { slideIndex = 1 }
  if (n < 1) { slideIndex = slides.length }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
}

function validacija() {
  var ime = document.getElementById("ime").value;
  var prezime = document.getElementById("prezime").value;
  var email = document.getElementById("email").value;
  var naslov = document.getElementById("naslov").value;
  var poruka = document.getElementById("poruka").value;
  var broj = document.getElementById("broj").value;

  var slova = /^[a-zA-Z\s]*$/;
  var brojevi = /^[+]?\d+$/;


  if (ime == "" || ime == null || ime.includes(" ")) {
    alert("Morate uneti ime");
    return false;
  }
  if (!ime.match(slova)) {
    alert("Ime mora biti ispisano samo slovima");
    return false;
  }
  if (prezime == "" || prezime == null || prezime.includes(" ")) {
    alert("Morate uneti prezime");
    return false;
  }
  if (!prezime.match(slova)) {
    alert("Prezime mora biti ispisano samo slovima");
    return false;
  }
  if (email == "" || email == null || email.includes(" ")) {
    alert("Morate uneti e-mail");
    return false;
  }
  if (!email.includes("@")) {
    alert("E-mail mora sadržati @");
    return false;
  }
  if (broj == "" || broj == null) {
    alert("Morate uneti broj telefona");
    return false;
  }
  if (!broj.match(brojevi)) {
    alert("Broj telefona mora biti ispisan brojevima");
    return false;
  }
  if (naslov == "" || naslov == null) {
    alert("Morate uneti naslov poruke");
    return false;
  }
  if (poruka.length > 200) {
    alert("Poruka mors sadržati manje od 200 karaktera.");
    return false;
  } else if (poruka.length < 30) {
    alert("Poruka mora sadržati najmanje 20 karaktera.");
    return false;
  }
  if (poruka == "" || poruka == null) {
    return false;
  } else {
    return true;

  }
}

function loginValidacija(){

  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;

  if (username == "" || username == null || username.includes(" ")) {
    alert("Morate uneti korisničko ime");
    return false;
  }

  if (password == "" || password == null || password.includes(" ")) {
    alert("Morate uneti lozinku");
    return false;
  }
}

function registerValidacija(){

  var mejl = document.getElementById("mejl").value;
  var imee = document.getElementById("imee").value;
  var prezimee = document.getElementById("prezimee").value;
  var usernamee = document.getElementById("usernamee").value;
  var pasword = document.getElementById("pasword").value;

  if (mejl == "" || mejl == null || mejl.includes(" ")) {
    alert("Morate uneti e-mail");
    return false;
  }

  if (!mejl.includes("@")) {
    alert("E-mail mora sadržati @");
    return false;
  }

  if (imee == "" || imee == null || imee.includes(" ")) {
    alert("Morate uneti ime");
    return false;
  }

  if (prezimee == "" || prezimee == null || prezimee.includes(" ")) {
    alert("Morate uneti prezime");
    return false;
  }

  if (usernamee == "" || usernamee == null || usernamee.includes(" ")) {
    alert("Morate uneti korisničko ime");
    return false;
  }

  if (pasword == "" || pasword == null || pasword.includes(" ")) {
    alert("Morate uneti lozinku");
    return false;
  }

}

function dodajValidacija(){

  var proizvodjac = document.getElementById("proizvodjac").value;
  var opis = document.getElementById("opis").value;
  var cena = document.getElementById("cena").value;
  var slika = document.getElementById("slika").value;

  var brojevii = /^[+]?\d+$/;

  if (proizvodjac == "" || proizvodjac == null) {
    alert("Morate uneti ime proizvodjača");
    return false;
  }

  if (opis == "" || opis == null) {
    alert("Morate uneti opis proizvoda");
    return false;
  }

  if (cena == "" || cena == null || cena.includes(" ")) {
    alert("Morate uneti cenu");
    return false;
  }

  if (!cena.match(brojevii)) {
    alert("Cena mora biti ispisana brojevima");
    return false;
  }

  if (slika == "" || slika == null || slika.includes(" ")) {
    alert("Morate uneti sliku proizvoda");
    return false;
  }

}
