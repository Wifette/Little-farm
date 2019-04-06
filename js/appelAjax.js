function traiterRetourAjax (data) {

        var volailles = JSON.parse(data);

        for (var i = 0; i < volailles.length; i++) {

            var lavolaille = volailles[i];
            var ligneHtml = creerLigne(lavolaille);
            ajouterLigne(ligneHtml);

        }
    }

function creerLigne (lavolaille) {

    var ligneHtml = '<tr>';
    ligneHtml += '<td>' + lavolaille.nom_volaille + '</td><td>' + lavolaille.age + '</td><td>' + lavolaille.sexe + '</td><td>' + lavolaille.couleur + '</td><td>' + lavolaille.espece + '</td><td><a href=\"edition.php?id='+ lavolaille.id_volaille + '\" class=\"btn btn-danger w-100 rounded-0\"><i class=\"fas fa-edit\"></i></a></td><td><a href=\"core/api/supprimer.php?id='+ lavolaille.id_volaille + '\" class=\"btn btn-danger w-100 rounded-0\"><i class=\"fas fa-trash-alt\"></i></a></td>';
    ligneHtml += '</tr>';
    //ligneHtml += lavolaille.age;
    //ligneHtml += '<br>';
    //ligneHtml += ;
    //ligneHtml += '<br>';
    //ligneHtml += '<a href=\"core/api/supprimer.php?id='+ lavolaille.id_volaille + '\" class=\"btn btn-danger text-warning w-100 rounded-0\"><i class=\"fas fa-trash-alt\"></i></a>';
    //ligneHtml += '</li>';
    return ligneHtml;
}

function ajouterLigne (ligneHtml){
                $("#liste").append(ligneHtml);
}

function afficherlisteajax() {
    $.ajax({
        url: "core/api/liste.php",
        success: traiterRetourAjax
    });
}
$(document).ready(afficherlisteajax);