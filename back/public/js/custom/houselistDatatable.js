$(function() {
    $('#listaCasas').DataTable( {
        "processing" : true,
        "serverSide" : true,
        "order" : [],
        "ajax" : {
            url:"info/selectViviendas.php",
            type:"POST"
    }
    })
});