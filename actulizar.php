<?php include 'db.php'?>
<?php

if($_SERVER["REQUEST_METHOD"]=="GET"){
    $id=$_GET['id'];
    $autor=$_GET['autor'];
    $isbn=$_GET['isbn'];
    $numero_edicion=$_GET['numero_edicion'];
    $costo_diario_mora=$_GET['costo_diario_mora'];
    $titulo=$_GET['titulo'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id']; 
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $isbn = $_POST['isbn'];
    $numero_edicion = $_POST['numero_edicion'];
    $costo_diario_mora = $_POST['costo_diario_mora'];

    $sql = "UPDATE libro SET titulo='$titulo', autor='$autor', isbn='$isbn', numero_edicion='$numero_edicion', costo_diario_mora='$costo_diario_mora' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Libro actualizado con éxito";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar libro</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
   <div class="container">
<form action="actulizar.php" method="post">
<label for="titulo">ID:</label>
              
<input type="text" id="id" name="id" required placeholder="Ingresa el id" value="<?php echo"$id" ?>">
            


<label for="titulo">Titulo:</label>

            <input type="text" id="titulo" name="titulo" required placeholder="Ingresa el titulo" value="<?php echo"$titulo" ?>">
            
            <label for="isbn">ISBN:</label>
            <input type="number" minlength="13"  maxlength="13" id="ID" name="isbn" required  placeholder="Ingresa el ID" value="<?php echo"$isbn" ?>" >

            <label for="autor">Autor</label>
            <input type="text" id="autor" name="autor" placeholder="Ingresa el autor "     value="<?php echo"$autor" ?>" >
           
            <label for="costo_diario_mora">Mora</label>
            <input type="number"  id="costo_diario_mora" name="costo_diario_mora" required placeholder="Ingresa el costo diario" value="<?php echo"$costo_diario_mora" ?>">

            <label for="numero_edicion">Numero de edcion</label>
                  
            <input type="text" name="numero_edicion" value="<?php echo"$numero_edicion" ?>"  id="numero_edicion">

            
            <input type="submit" value="Registrar">














</form>




   </div>
    
    
</body>
</html>