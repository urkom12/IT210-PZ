function validacija() {
    var broj = document.getElementById("broj_telefona").value;
    if (document.getElementById("ime_i_prezime").value == "" || document.getElementById("naslov_poruke").value == "" || document.getElementById("textarea").value == "") {
        alert("Unesite validne podatke!");
        return false;
    }
    else {
        if (broj.length > 15 || broj[0] != "+") {
            alert("Unesite validan broj telefona!");
            return false;
        }
        else {
            alert("Poruka je poslata!");
            return true;
        }
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

    var imee = document.getElementById("ime").value;
    var prezimee = document.getElementById("prezime").value;
    var usernamee = document.getElementById("username").value;
    var pasword = document.getElementById("password").value;
  
    if (ime == "" || ime == null || ime.includes(" ")) {
      alert("Morate uneti ime");
      return false;
    }
  
    if (prezime == "" || prezime == null || prezime.includes(" ")) {
      alert("Morate uneti prezime");
      return false;
    }
  
    if (username == "" || username == null || username.includes(" ")) {
      alert("Morate uneti korisničko ime");
      return false;
    }
  
    if (password == "" || password == null || password.includes(" ")) {
      alert("Morate uneti lozinku");
      return false;
    }
  
  }
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
  }
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }