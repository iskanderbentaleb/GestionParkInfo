function DeleteRecordValidation(url){
    var result = confirm("Êtes-vous sûr de bien vouloir supprimer cet élément?");
    if (result) {
        window.location.href = url ;
    }
}