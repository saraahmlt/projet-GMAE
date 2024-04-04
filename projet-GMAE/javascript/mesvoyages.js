
document.getElementById('button').addEventListener('click', function() {
    let categorie = document.getElementById('categorie').value;
    let region = document.getElementById('region').value;
    let price = document.getElementById('price').value;

    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('voyages').innerHTML = xhr.responseText;
        }
    };
    xhr.open("GET", "../controlers/filtre_voyages.php?categorie=" + categorie + "&region=" + region + "&price=" + price, true);
    xhr.send();
});

