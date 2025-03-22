function getAnimalDetails() {
    var selectedAnimal = document.getElementById("animal").value;

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "animal_details.php?animal=" + selectedAnimal, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("animalDetails").innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}
