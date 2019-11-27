$('document').ready(function () {
    //     $.ajax({
    //         type: 'GET',
    //         url: ' php/daftar-mobil.php',
    //         error: function (xhr, status, error) {
    //             console.log(xhr);
    //             var result = $.parseJSON(xhr.responseText);
    //             console.log(result);
    //             alert('Terjadi kesalahan ' + result.error);
    //         },
    //         success: function (data) {
    //             console.log(data);
    //             var selectOutput = "<option>Pilih Merek Mobil</option>";
    //             for (var i in data) {
    //                 selectOutput += "<option value='" + data[i].nama_merk + "'>" + data[i].nama_merk + "</option>";
    //             }
    //             var output =
    //                 "<select name='merk_mobil' id='merk_mobil' class='form-control' onchange='populate(this.id,'model_mobil')'>" +
    //                 selectOutput +
    //                 "</select>";
    //             $('#daftar-mobil').html(output);
    //             var merk1 = data[0].nama_merk;
    //             var merk2 = data[1].nama_merk;
    //             var merk3 = data[2].nama_merk;
    //             var merk4 = data[3].nama_merk;
    //             var merk5 = data[4].nama_merk;
    //             var merk6 = data[5].nama_merk;

    //             console.log(merk1);




    //             $.ajax({
    //                 type: 'GET',
    //                 url: ' php/daftar-model.php',
    //                 error: function (xhr, status, error) {
    //                     console.log(xhr);
    //                     var result = $.parseJSON(xhr.responseText);
    //                     console.log(result);
    //                     alert('Terjadi kesalahan ' + result.error);
    //                 },
    //                 success: function (data) {
    //                     console.log(data);



    //                     function populate(s1, s2) {
    //                         var s1 = document.getElementById(s1);
    //                         var s2 = document.getElementById(s2);
    //                         s2.innerHTML = "";
    //                         if (s1.value == "Honda") {
    //                             var optionArray = ["|", "brio|Brio", "jazz|Jazz"];
    //                         } else if (s1.value == "Toyota") {
    //                             var optionArray = ["|", "Agya|Agya", "Avanza|Avanza"];
    //                         }
    //                         for (var option in optionArray) {
    //                             var pair = optionArray[option].split("|");
    //                             var newOption = document.createElement("option");
    //                             newOption.value = pair[0];
    //                             newOption.innerHTML = pair[1];
    //                             s2.options.add(newOption);
    //                         }
    //                     }
    //                 }
    //             });

    //         }
    //     });
    // var output =
    //     "<select name='a_plat' id='a_plat' class='form-control'>" +
    //     "<option value=''></option>" +
    //     "<option value='A'>A</option>" +
    //     "<option value='B'>B</option>" +
    //     "<option value='D'>D</option>" +
    //     "<option value='E'>E</option>" +
    //     "<option value='F'>F</option>" +
    //     "<option value='T'>T</option>" +
    //     "<option value='Z'>Z</option>" +
    //     "</select>";
    // $('#plat').html(output);
});

function populate(s1, s2) {
    var s1 = document.getElementById(s1);
    var s2 = document.getElementById(s2);
    s2.innerHTML = "";
    if (s1.value == "Honda") {
        var optionArray = ["|Pilih Model", "Brio|Brio", "Jazz|Jazz", "Mobilio|Mobilio", "Freed|Freed", "Civic|Civic", "City|City", "Stream|Stream", "Odyssey|Odyssey", "HR-V|HR-V", "CR-Z|CR-Z", "CR-V|CR-V", "BR-V|BR-V"];
    } else if (s1.value == "Toyota") {
        var optionArray = ["|Pilih Model", "Agya|Agya", "Avanza|Avanza", "Rush|Rush", "Vios|Vios", "Yaris|Yaris", "Fortuner|Fortuner", "Alphard|Alphard", "Corolla|Corolla", "Kijang|Kijang", "Kijang Innova|Kijang Innova"];
    } else if (s1.value == "Nissan") {
        var optionArray = ["|Pilih Model", "Juke|Juke", "Serena|Serena", "Sentra|Sentra", "Grand Livina|Grand Livina", "X-Trail|X-Trail"];
    } else if (s1.value == "Suzuki") {
        var optionArray = ["|Pilih Model", "Swift|Swift", "Carry|Carry", "Karimun|Karimun", "Estilo|Estilo", "APV|APV", "Splash|Splash", "Baleno|Baleno", "Ertiga|Ertiga"];
    } else if (s1.value == "Daihatsu") {
        var optionArray = ["|Pilih Model", "Ayla|Ayla", "Gran Max|Gran Max", "Xenia|Xenia", "Terios|Terios", "Luxio|Luxio"];
    } else if (s1.value == "Mazda") {
        var optionArray = ["|Pilih Model", "CX-3|CX-3", "CX-5|CX-5", "CX-7|CX-7", "Mazda 5|Mazda 5", "Mazda 6|Mazda 6", "Mazda 8|Mazda 8"];
    }
    for (var option in optionArray) {
        var pair = optionArray[option].split("|");
        var newOption = document.createElement("option");
        newOption.value = pair[0];
        newOption.innerHTML = pair[1];
        s2.options.add(newOption);
    }
}

