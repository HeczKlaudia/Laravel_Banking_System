$(function () {
    const token = $('meta[name="csrf-token"]').attr("content");
    const myAjax = new MyAjax(token);
    const szamlak = [];
    const bankok = ["fasfas"];

    let apiVegpont = "/api/szamlak";

    const szuloElem = $(".dashboard-keret");
    const sablonElem = $(".dashboard-szamla-adatok");

    szuloElem.empty();

    bankFeltolt();
    myAjax.getAdat(apiVegpont, szamlak, megjelenit);

    function megjelenit() {
        szuloElem.show();
        szamlak.forEach(function (elem) {
            const ujElem = sablonElem.clone().appendTo(szuloElem);
            const ujBejegyzes = new Card(ujElem, elem, bankok);
        });
        sablonElem.hide();
    }
});

function bankFeltolt() {
    let option = "";

    for (var i = 0; i < bankok.length; i++) {
        option += "<option>" + bankok[i] + "</option>";
    }

    document.getElementById("bankokOption").innerHTML = option;
}
