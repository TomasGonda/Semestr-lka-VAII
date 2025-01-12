
document.getElementById("registraciaForm").addEventListener("submit", function(event) {
    let email = document.getElementById("email").value;
    let heslo = document.getElementById("password").value;
    let errMsg = document.getElementById("errMsg");

    errMsg.innerHTML = "";

    let err = [];

    let emailFormat = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if(!emailFormat.test(email)) {
        err.push("Zly format mailu");
    }

    if (heslo.length < 6) {
        err.push("Aspon 6 znakov heslo");
    }

    if (err.length > 0) {
        event.preventDefault();
        errMsg.innerHTML = err.join("<br>");
    } else {
        //Ajax
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "registracia.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onload = function() {
            if (xhr.status === 200) {
                let response = JSON.parse(xhr.responseText);
                if (response.success) {
                    window.location.href = "prihlasenie.html";
                } else {
                    errMsg.innerHTML = response.errMsg;
                }
            } else {
                errMsg.innerHTML = "Došlo k chybe pri spracovaní formulára.";
            }
        };

    }
    xhr.send("email=" + email + "&heslo=" + heslo);
    event.preventDefault();
});