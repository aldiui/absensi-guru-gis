window.setTimeout("jam()", 1000);

function jam() {
    let jam = new Date();
    setTimeout("jam()", 1000);
    document.getElementById("jam").innerHTML =
        "Jam " +
        atur(jam.getHours()) +
        ":" +
        atur(jam.getMinutes()) +
        ":" +
        atur(jam.getSeconds());
}

function atur(jam) {
    return jam < 10 ? "0" + jam : jam;
}

