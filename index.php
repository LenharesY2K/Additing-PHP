<?php include 'cabecalho.php'; ?>
<?php include 'conexao.php'; ?>

<?php 
if (isset($_POST["titulo"]) && isset($_POST['autor']) && isset($_POST['ano_publicacao']) && isset($_POST['genero'])) {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $ano_publicacao = $_POST['ano_publicacao'];
    $genero = $_POST['genero'];

   
    $stmt = $conexao->prepare("INSERT INTO livros (titulo, autor, ano_publicacao, genero) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $titulo, $autor, $ano_publicacao, $genero);
    $resultado = $stmt->execute();

    if ($resultado) {
        echo "<div class='alert alert-success'>Salvo com sucesso</div>";
        header('Location: index.php');
        exit(); 
    } else {
        echo "<div class='alert alert-danger'>Erro ao salvar o produto: " . $stmt->error . "</div>";
    }
}
?>

<div class="card">
    <div class="card-body align-items-end">
        <form action="" method="POST">
            <div class="row">
                <div class="col-md-2">
                    Titulo
                    <input class="form-control" name="titulo" type="text" required />
                </div>
                <div class="col-md-2">
                    Autor
                    <input class="form-control" name="autor" type="text" required />
                </div>
                <div class="col-md-2">
                    Ano de Publicacao
                    <input class="form-control" name="ano_publicacao" type="number" required />
                </div>
                <div class="col-md-2">
                    Genero
                    <input class="form-control" name="genero" type="text" required />
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button class="btn btn-primary" type="submit">
                        Salvar
                    </button>
                </div>          
            </div><!--Fechamento do row -->
        </form>
    </div><!--Fechamento do card-body -->
</div><!--Fechamento do card -->

<?php 
$sql ="SELECT id, titulo, autor, ano_publicacao, genero FROM livros ORDER BY id DESC";
$resultado = mysqli_query($conexao, $sql);
?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>id</th>
            <th>titulo</th>
            <th>autor</th>
            <th>ano_publicacao</th>
            <th>genero</th>
        </tr>
    </thead>
    <tbody>
    <?php
    if($resultado->num_rows > 0){
        while($row = $resultado->fetch_assoc()){
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["titulo"] . "</td>";
            echo "<td>" . $row["autor"] . "</td>";
            echo "<td>" . $row["ano_publicacao"] . "</td>";
            echo "<td>" . $row["genero"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Nenhum registro encontrado</td></tr>";
    }
    $conexao->close();
    ?>
    </tbody>
</table>

<?php include 'rodape.php'; ?>
