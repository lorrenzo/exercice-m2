/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




function afficher_cacher(id)
{
    if(document.getElementById(id).style.visibility=="hidden")
    {
        document.getElementById(id).style.visibility="visible";
        document.getElementById('bouton_texte').innerHTML='Cacher le texte';
    }
    else
    {
        document.getElementById(id).style.visibility="hidden";
        document.getElementById('bouton_texte').innerHTML='Afficher le texte';
    }
    return true;
}

//amelioration de la fonction pour n'importe quelle liste from scratch
function parseJsonliste(json,$liste){
        
    $liste.empty();
    var t = JSON.parse(json);
   
    for (var key in t){
        $liste.append('<option value="'+ key +'">'+ t[key].nom + " " + t[key].prenom +'</option>');
    }   
           
}

function parseJsontable(json,$table){
        
    $table.empty();
    var t = JSON.parse(json);      
    
    var content = "<table class='table table-condensed'>"
    content += "<tr><td>Nom</td><td>Pr&eacute;nom</td><td>Age</td><td>Action</td></tr>"
    for(var key in t){
        content += '<tr><td>'+ t[key].nom +'</td><td>'+ t[key].prenom +'</td><td>'+ t[key].age +'</td><td><a href=page2.php?id="'+ t[key].id +'"><input type="button" name="action" value="modifier"/></a></td></tr>';
    }
    content += "</table>"

$table.append(content);
           
}

//affichage de la liste responsable fonction
function getlistresp(){
    
    var $allusers = $('#allusers');    
    var $table=$('#operations');
    
    $.ajax({
        type:'GET',
        url:"afficheallusers.php",
        data: "go",
        datatype: "json",
        //async:false,
        success: function(json){               
            parseJsonliste(json,$allusers);
            parseJsontable(json,$table);
        },
        error : function (erreur){
            alert(erreur);  
                    }
           
    });
    
}