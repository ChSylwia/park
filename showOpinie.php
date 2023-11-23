<?php
    include('polaczenie.php');

    $k = $_POST['id'];
    $k = trim($k);
    $sql ="SELECT user.name, opinie.date, opinie.opinia, opinie.id, opinie.id_park, user.surname from opinie inner join user on opinie.id_user = user.id WHERE opinie.id_park={$k}";
    $res = mysqli_query($conn, $sql);

    while($c = mysqli_fetch_array($res)){
?>
    
    <?php    echo "<div class='opiniaa'><p>"; ?>
    <input type="hidden" id="id" name="id" value="<?php echo $c['id'] ?>" />
    <p id="name">
    <?php    echo $c['name']."<br>";?>
    </p>
    <p id="data">
    <?php    echo $c['date']."<br>";?>
    </p>
    <textarea id="opinia" type="text" name="opinia" disabled><?=$c['opinia']?></textarea>
    <div id="edytuj">
    <button type="button" id="Edit_button" class="dodaj" onclick="editForm()" >Edytuj</button>
    </div>
    <?php    echo "</p></div>";?>
    
    
<?php
    }
    mysqli_close($conn);
?>


<script>
    function editForm() {
        var opinia = document.getElementById("opinia");
        var id_opinia = document.getElementById("id");
        var button = document.getElementById("Edit_button");
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
</script>
