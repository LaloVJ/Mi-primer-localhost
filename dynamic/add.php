<h2>Nuevo Alumno</h2>
<form action="process.php" method="post" class="add-new">
    <label for="nuevoNombre">Nombre:</label>
    <input type="text" name="nuevoNombre" required>

    <label for="nuevoApellido">Apellidos:</label>
    <input type="text" name="nuevoApellido" required>

    <input type="submit" value="Agregar">
</form>
<a class="jq-link" href="list.php">Volver a la lista</a>
<script>
    $('.add-new').submit(function(e){
        e.preventDefault();

        var dataForm = $(this).serializeArray();

        console.log(dataForm);

        console.log('saving');

        $.ajax({
            url: 'process.php',
            data: dataForm,
            method: 'POST',
            success: function(jsonResp){
                //console.log(jsonResp);
                setTimeout(function(){
                    $('.jq-link').click();
                },1500);                
            },
            dataType: 'json'
        });
    });
</script>