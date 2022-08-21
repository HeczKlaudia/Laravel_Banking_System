class MyAjax {
    constructor(token) {
        this.token = token;
    }

    getAdat(apiVegpont, tomb, myCallback) {
        $.ajax({
            url: apiVegpont,
            type: "GET",
            success: function (result) {
                console.log(result);
                tomb.splice(0, tomb.length);
                result.forEach((value) => {
                    console.log(value);
                    tomb.push(value);
                });

                myCallback(tomb);
            },
        });
    }

    postAdat(apiVegpont, adat) {
        adat._token = this.token;
        $.ajax({
            headers: { "X-CSRF-TOKEN": this.token },
            url: apiVegpont,
            type: "POST",
            data: adat,
            success: function (result) {
                console.log(result);
            },
        });
    }

    deleteAdat(apiVegpont, id) {
        $.ajax({
            headers: { "X-CSRF-TOKEN": this.token },
            url: apiVegpont + id,
            type: "DELETE",
            mode: "no-cors",
            data: this.token,
            success: function (result) {
                console.log(result);
            },
        });
    }

    putAdat(apiVegpont, id, adat) {
        adat._token = this.token;
        $.ajax({
            headers: { "X-CSRF-TOKEN": this.token },
            datatype: "JSON",
            type: "PUT",
            url: apiVegpont + "/" + id,
            data: adat,
            success: function (result) {
                console.log(result);
            },
        });
    }
}
