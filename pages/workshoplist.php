<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h4 class="title">
        <span class="text">
            <strong>Workshop List</strong>
        </span>
    </h4>
    <a class="btn btn-primary" href="index.php?p=workshop">Add</a>
    <table class="table table-bordered">
        <tr>
            <th>No.</th>
            <th>Id Workshop</th>
            <th>Kategori</th>
            <th>Nama Workshop</th>
        </tr>
        <?php
            require_once('./class/class.Workshop.php');
            $objWorkshop = new Workshop();
            $arrayResult = $objWorkshop->SelectAllWorkshop();

            if(count($arrayResult) == 0){
                echo '<tr><td colspan="5">Tidak Ada Data!</td></tr>';
            }else{
                $no = 1;
                foreach ($arrayResult as $dataWorkshop){
                    echo '<tr>';
                    echo '<td>'.$no.'</td>';
                    echo '<td>'.$dataWorkshop->id_workshop.'</td>';
                    echo '<td>'.$dataWorkshop->kategori.'</td>';
                    echo '<td>'.$dataWorkshop->nama_workshop.'</td>';
                    echo '<td><a class="btn btn-warning" href="index.php?p=workshop&id_workshop='.$dataWorkshop->id_workshop.'">Edit</a><a class="btn btn-danger" href="index.php?p=deleteworkshop&id_workshop='.$dataWorkshop->id_workshop.'" on click="return confirm(\'Apakah yakin ingin menghapus?\')">Delete</a></td>';
                    echo '</tr>';
                    $no++;
                }
            }
        ?>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>