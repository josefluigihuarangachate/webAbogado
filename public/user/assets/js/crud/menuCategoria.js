// CSRF-TOKEN PARA LARAVEL
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var globalName = 'General';

function loadCategoria() {
    //var txt = $("input").val();
    $.post(ruta() + "appcategoria" + globalName, {cmd: 'web'}, function (json) {

        //try {
        if (json['data']) {
            var data = json['data'];
            var innerHTML = "";
            // console.log();
            for (var i = 0; i < data.length; i++) {
                //console.log("DATOS : " + data[i].nombre);
                //innerHTML += '<li data-text="' + data[i].nombre + '">';
                //innerHTML += '<a href="./subcategoria' + globalName + '/' + data[i].id + '" title="">';
                //innerHTML += '<li>';



                var src = FOLDER_IMAGE + data[i].foto;
                if (data[i].foto == null) {
                    src = FOLDER_IMAGE + 'empty/empty-photo.jpg';
                }

                innerHTML += '<li data-text="' + data[i].nombre + '"><a onclick="saveIdCategory(' + data[i].id + ')" href="./applista' + globalName + '" title=""><i><img src="' + src + '" alt="" style="border-radius: 50px;width: 100px;height:30px;"></i><span>' + data[i].nombre + '</span></a></li>';
                //innerHTML += '<img src="' + src + '" alt="">';
                //innerHTML += '</li>';
                //innerHTML += '<span>' + data[i].nombre + '</span>';
                //innerHTML += '</a>';
                //innerHTML += '</li>';
            }
            //innerHTML = '<li data-text="Home"><a href="newsfeed.html" title=""><i><img src="user/assets/images/svg/home.png" alt=""></i><span>Home</span></a></li>';
            document.getElementById("menuCategoria").innerHTML = innerHTML;
        } else {
            document.getElementById("menuCategoria").innerHTML = "";
            document.getElementById("menuCategoria").innerHTML = "<center>No se encontraron datos</center>";
        }
        //} catch (e) {
        //    document.getElementById("menuCategoria").innerHTML = "";
        //    document.getElementById("menuCategoria").innerHTML = "<center>No se encontraron datos</center>";
        //}
    });
}
loadCategoria();


function saveIdCategory(id) {
    $.post(ruta() + "appidservicio" + globalName, {cmd: 'web', idcategoria: id}, function (json) {
    });
}


function loadServicios() {
    $.post(ruta() + "appservicio" + globalName, {cmd: 'web'}, function (json) {

        document.getElementById("listado_servicios").innerHTML = "";
        var innerHTML = "";
        if (json['status']) {
            if (json['data']) {
                var datos = json['data'];
                for (var i = 0; i < datos.length; i++) {
                    innerHTML += '<div class="activity">';
                    innerHTML += '<figure>';

                    if (datos[i].icono != null) {
                        innerHTML += '<img alt="Icono" src="' + FOLDER_IMAGE + datos[i].icono + '" style="width: 60px;height: 60px;">';
                    } else {
                        innerHTML += '<img alt="Icono" src="' + FOLDER_IMAGE + 'empty/empty-photo.jpg" style="width: 60px;height: 60px;">';
                    }

                    innerHTML += '<span><img src="user/assets/images/svg/trending.png" alt=""></span>';
                    innerHTML += '</figure>';
                    innerHTML += '<div class="history-meta">';
                    innerHTML += '<h5><a title="" href="#">' + datos[i].nombre + '</a></h5>';
                    innerHTML += '<span>Nombre : ' + datos[i].nombreAbogado + '</span>';
                    innerHTML += '<br><span><img src="user/assets/images/dinero.png" width="38" height="38"> <sup style="font-size: 12px;color: #66bb6a;">S/. ' + datos[i].precio + '</sup></span>';
                    innerHTML += '</div>';
                    innerHTML += '</div>';
                }
            } else {
                innerHTML = "<center>No se encontraron datos</center>";
            }
        } else {
            innerHTML = "<center>" + json['msg'] + "</center>";
        }
        document.getElementById("listado_servicios").innerHTML = innerHTML;
    });
}
loadServicios();





// Ejm : https://stackoverflow.com/questions/44736054/live-search-on-an-div-with-input-filter
$(document).ready(function ()
{
    $("#filterServices").keyup(function () {

        // Retrieve the input field text and reset the count to zero
        var filter = $(this).val(),
                count = 0;

        // Loop through the comment list
        $('#listado_servicios div').each(function () {


            // If the list item does not contain the text phrase fade it out
            if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                $(this).hide();  // MY CHANGE

                // Show the list item if the phrase matches and increase the count by 1
            } else {
                $(this).show(); // MY CHANGE
                count++;
            }

        });

    });


});