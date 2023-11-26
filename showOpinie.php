<?php
    include('polaczenie.php');

    $k = $_POST['id'];
    $k = trim($k);
    $sql ="SELECT user.name, opinie.date, opinie.opinia, opinie.id, opinie.id_park, user.surname from opinie inner join user on opinie.id_user = user.id WHERE opinie.id_park={$k}";
    $res = mysqli_query($conn, $sql);

    while($c = mysqli_fetch_array($res)){
?>
    
    <?php    echo "<div class='opiniaa'>"; ?>
    <input type="hidden" id="id" name="id" value="<?php echo $c['id'] ?>" />
    <p id="name">
    <?php    echo $c['name'];?>
    <?php    echo $c['surname']."<br>";?>
    </p>
    <p id="data">
    <?php    echo $c['date']."<br>";?>
    </p>
    <textarea id="opinia" type="text" name="opinia" disabled><?=$c['opinia']?></textarea>
    <div id="edytuj">
    <button type="button" id="Edit_button" class="dodaj" >Edytuj</button>
    </div>
    <?php    echo "</div>";?>
    
    
<?php
    }
    mysqli_close($conn);
?>


<script>
    var buttons = document.querySelectorAll('#Edit_button');
    function editForm() {
        var parent = this.parentElement.parentElement;
        var opinia = parent.querySelector("#opinia");
        var id_opinia = parent.querySelector("#id");
        var button = this;
        if(opinia.disabled==false) {
            opinia.disabled = true;
            button.innerHTML = "Edytuj";

            $.ajax({
        url:"editOpinie.php",
        method:"POST",
        data:{
            id : id_opinia.value,
            tresc : opinia.value
            
        },
        success:function(data){
            $.ajax({
        url:"showOpinie.php",
        method:"POST"

        })}})
        } else {
            opinia.disabled = false;
            button.innerHTML = 'Zapisz';
        }
    } 
    for(var i = 0; i<buttons.length; i++){
        buttons[i].addEventListener('click',editForm);
    }
</script>
