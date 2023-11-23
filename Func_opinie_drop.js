
function selectPark(){

    var x = document.getElementById("drop").value;

    $.ajax({
        url:"showOpinie.php",
        method:"POST",
        data:{
            id : x
        },
        success:function(data){
            $("#ans").html(data);
        }
    })
}