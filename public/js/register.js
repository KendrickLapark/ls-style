$(() => {
    //Aqui Ponemos el control de las hojas de 
    $("#registerSheetTwo").hide();
    $("#registerAuth.RegisterContainer").hide();

    $("#nextRegisterFirst").on("click", () => {
        /**
         *   Comprobamos que la primera parte no tenga errores  
         * */
        if (checkFirst()) {
            $("#registerSheetOne").hide("slow");
            $("#registerSheetTwo").show("slow");
        }

        $("input").on("change", () => {
            checkFirst();
        })

    });

    function checkFirst() {
        nameVol()
        surnameVol()
        surname2Vol()
        birthDateVol()
        typeDocVol()
        numDocVol()
        telVol()
        sexVol()
        shirtSizeVol()
        persMailVol()
        validEmail()
        sameEmail()
        privaci()
        offense()
        if (
            nameVol()
            &&
            surnameVol()
            &&
            surname2Vol()
            &&
            birthDateVol()
            &&
            typeDocVol()
            &&
            numDocVol()
            &&
            telVol()
            &&
            sexVol()
            &&
            shirtSizeVol()
            &&
            persMailVol()
            &&
            validEmail()
            &&
            sameEmail()
            &&
            privaci()
            &&
            offense()

        ) {
            return true
        }
        return false
    }

    function checkSencond() {
        typeVia()
        direcVol()
        numVol()
        codPos()
        state()
        town()
        if (
            typeVia()
            &&
            direcVol()
            &&
            numVol()
            &&
            codPos()
            &&
            state()
            &&
            town()
        ) {
            return true
        }
        return false
    }

    $("#codPosVol").on("blur", () => {
        if ($("#codPosVol").val().length == 5) {
            $("#codPosMal").css("display", "none");
            var cp_provincias = {
                1: "\u00C1lava", 2: "Albacete", 3: "Alicante", 4: "Almer\u00EDa", 5: "\u00C1vila",
                6: "Badajoz", 7: "Baleares", 08: "Barcelona", 09: "Burgos", 10: "C\u00E1ceres",
                11: "C\u00E1diz", 12: "Castell\u00F3n", 13: "Ciudad Real", 14: "C\u00F3rdoba", 15: "Coruña",
                16: "Cuenca", 17: "Gerona", 18: "Granada", 19: "Guadalajara", 20: "Guip\u00FAzcoa",
                21: "Huelva", 22: "Huesca", 23: "Ja\u00E9n", 24: "Le\u00F3n", 25: "L\u00E9rida",
                26: "La Rioja", 27: "Lugo", 28: "Madrid", 29: "M\u00E1laga", 30: "Murcia",
                31: "Navarra", 32: "Orense", 33: "Asturias", 34: "Palencia", 35: "Las Palmas",
                36: "Pontevedra", 37: "Salamanca", 38: "Santa Cruz de Tenerife", 39: "Cantabria", 40: "Segovia",
                41: "Sevilla", 42: "Soria", 43: "Tarragona", 44: "Teruel", 45: "Toledo",
                46: "Valencia", 47: "Valladolid", 48: "Vizcaya", 49: "Zamora", 50: "Zaragoza",
                51: "Ceuta", 52: "Melilla"
            };
            $('#stateVol').val(cp_provincias[$("#codPosVol").val().substr(0, 2)]);
        } else {
            $("#codPosMal").css("display", "inline");
        }
    })


    $("#registerForm").on("submit", (e) => {
        var valid = false;
        if (!checkSecond()) {
            e.preventDefault();
        }
        $("input").on("change", () => {
            checkSecond();
        })
    })


    $("#backRegisterSecond").on("click", () => {
        $("#registerSheetTwo").hide("slow");
        $("#registerSheetOne").show("slow");
    });

    $("#birthDateVol").on("blur change", () => {
        /**
       * Fecha de Nacimiento es mayor de edad
       */
        formYear = (parseInt(new Date($("#birthDateVol").val()).getFullYear()));
        actualYear = (parseInt(new Date().getFullYear()));
        diffYear = actualYear - formYear
        if (actualYear - formYear < 18) {
            $("#registerAuth.RegisterContainer").show("slow");
        } else {
            $("#registerAuth.RegisterContainer").hide("slow");
        }
    }
    );

    function nameVol() {
        if ($("#nameVol").val() == "") {
            goNext = false;
            $("#nameError").css("display", "inline");
        } else {
            goNext = true;
            $("#nameError").css("display", "none");
        }
        return goNext
    }

    function surnameVol() {
        if ($("#surnameVol").val() == "") {
            goNext = false;
            $("#surnameError").css("display", "inline");
        } else {
            goNext = true;
            $("#surnameError").css("display", "none");
        }
        return goNext
    }

    function surname2Vol() {
        if ($("#surname2Vol").val() == "") {
            goNext = false;
            $("#surname2Error").css("display", "inline");
        } else {
            goNext = true;
            $("#surname2Error").css("display", "none");
        }
        return goNext
    }

    function birthDateVol() {
        if ($("#birthDateVol").val() == "") {
            goNext = false;
            $("#birthDateError").css("display", "inline");
        } else {
            goNext = true;
            $("#birthDateError").css("display", "none");
        }
        return goNext
    }

    function typeDocVol() {
        if ($("#typeDocVol").val() == "") {
            goNext = false;
            $("#typeDocError").css("display", "inline");
        } else {
            goNext = true;
            $("#typeDocError").css("display", "none");
        }
        return goNext
    }

    function numDocVol() {
        if ($("#numDocVol").val() == "") {
            goNext = false;
            $("#numDocError").css("display", "inline");
        } else {
            $("#numDocError").css("display", "none");
            if ($("#typeDocVol").val() == "dni" && nif($("#numDocVol").val())) {
                $("#numDocWrongError").css("display", "none");
                goNext = true;
            } else if ($("#typeDocVol").val() == "nie" && nie($("#numDocVol").val())) {
                $("#numDocWrongError").css("display", "none");
                goNext = true;
            } else {
                $("#numDocWrongError").css("display", "inline");
                goNext = false;

            }
        }
        return goNext
    }

    function telVol() {
        if ($("#telVol").val() == "") {
            goNext = false;
            $("#telError").css("display", "inline");
        } else {
            goNext = true;
            $("#telError").css("display", "none");
        }
        return goNext
    }

    function sexVol() {
        if ($("#sexVol").val() == "") {
            goNext = false;
            $("#sexVolError").css("display", "inline");
        } else {
            goNext = true;
            $("#sexVolError").css("display", "none");
        }
        return goNext
    }

    function shirtSizeVol() {
        if ($("#shirtSizeVol").val() == "") {
            goNext = false;
            $("#shirtSizeError").css("display", "inline");
        } else {
            goNext = true;
            $("#shirtSizeError").css("display", "none");
        }
        return goNext
    }

    function persMailVol() {
        if ($("#persMailVol").val() == "") {
            goNext = false;
            $("#persMailError").css("display", "inline");
        } else {
            goNext = true;
            $("#persMailError").css("display", "none");
        }
        return goNext
    }

    function privaci() {
        if (!$("#dataConf").is(':checked')) {
            goNext = false;
            $("#dataConfError").css("display", "inline");
        } else {
            goNext = true;
            $("#dataConfError").css("display", "none");
        }
        return goNext
    }

    function offense() {
        if (!$("#offenseConf").is(':checked')) {
            goNext = false;
            $("#offenseConfError").css("display", "inline");
        } else {
            goNext = true;
            $("#offenseConfError").css("display", "none");
        }
        return goNext
    }

    function nif(dni) {
        var numero
        var letr
        var letra
        var expresion_regular_dni = /^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]$/i;
        // var nifRexp = /^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]$/i; 
        // var nieRexp = /^[XYZ][0-9]{7}[TRWAGMYFPDXBNJZSQVHLCKET]$/i;

        if (expresion_regular_dni.test(dni) == true) {
            numero = dni.substr(0, dni.length - 1);
            letr = dni.substr(dni.length - 1, 1);
            numero = numero % 23;
            letra = 'TRWAGMYFPDXBNJZSQVHLCKET';
            letra = letra.substring(numero, numero + 1);
            if (letra != letr.toUpperCase()) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    function nie(nie) {
        var numero
        var letr
        var letra
        var expresion_regular_nie = /^[XYZ][0-9]{7}[TRWAGMYFPDXBNJZSQVHLCKET]$/i;
        // var nifRexp = /^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]$/i; 
        // var nieRexp = /^[XYZ][0-9]{7}[TRWAGMYFPDXBNJZSQVHLCKET]$/i;

        if (expresion_regular_nie.test(nie) == true) {
            numero = nie.substr(0, nie.length - 1);
            letr = nie.substr(dni.length - 1, 1);
            numero = numero % 23;
            letra = 'TRWAGMYFPDXBNJZSQVHLCKET';
            letra = letra.substring(numero, numero + 1);
            if (letra != letr.toUpperCase()) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    function validEmail() {
        expresion_regular_email = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

        if (!expresion_regular_email.test($("#persMailVol").val())) {
            goNext = false;
            $("#persMailWrongError").css("display", "inline");
        } else {
            goNext = true;
            $("#persMailWrongError").css("display", "none");
        }
        return goNext
    }

    function sameEmail() {
        email1 = $("#persMailVol").val()
        email2 = $("#persMailConfVol").val()
        if (email1 != email2) {
            goNext = false;
            $("#persMailMatchError").css("display", "inline");
        } else {
            goNext = true;
            $("#persMailMatchError").css("display", "none");
        }
        return goNext
    }

    function typeVia() {
        if ($("#typeViaVol").val() == "") {
            goNext = false;
            $("#typeViaError").css("display", "inline");
        } else {
            goNext = true;
            $("#typeViaError").css("display", "none");
        }
        return goNext;
    }

    function direcVol() {
        if ($("#direcVol").val() == "") {
            goNext = false;
            $("#direcError").css("display", "inline");
        } else {
            goNext = true;
            $("#direcError").css("display", "none");
        }
        return goNext
    }

    function numVol() {
        if ($("#numVol").val() == "") {
            goNext = false;
            $("#numError").css("display", "inline");
        } else {
            goNext = true;
            $("#numError").css("display", "none");
        }
        return goNext
    }

    function codPos(params) {
        if ($("#numVol").val() == "") {
            goNext = false;
            $("#numError").css("display", "inline");
        } else {
            goNext = true;
            $("#numError").css("display", "none");
        }
        return goNext
    }

    function state(params) {
        if ($("#stateVol").val() == "") {
            goNext = false;
            $("#stateError").css("display", "inline");
        } else {
            goNext = true;
            $("#stateError").css("display", "none");
        }
        return goNext
    }

    function town(params) {
        if ($("#townVol").val() == "") {
            goNext = false;
            $("#townError").css("display", "inline");
        } else {
            goNext = true;
            $("#townError").css("display", "none");
        }
        return goNext
    }
})