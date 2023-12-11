<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autók</title>

    <script src="js/jquery-3.7.1.js" type="text/javascript"></script>
    <script src="js/cars.js" type="text/javascript"></script>

    <link href="fontawesom/css/all.css" rel="stylesheet" type="text/css">
    <link href="css/cars.css" rel="stylesheet" type="text/css">
</head>
<body>
    <nav>
        <a href="index.php"><i class="fa fa-home" title="Kezdőlap"></i></a>
        <a href="makers.php"><button>Gyártók</button></a>
        <a href="models.php"><button>Modellek</button></a>
    </nav>
    <h1>Gyártók</h1>
    <?php
    require_once ('DBMaker.php');
    $carMaker=new DBMaker();
    $abc = $carMaker->getAbc();
   

    echo "<div style='display: felx'>";
    foreach ($abc as $char) {
        echo "
            <form method='post' action='makers.php'>
                <input type='hidden' name='ch' value='{$char['ch']}'>
                <button type='submit'>{$char['ch']}</button>&nbsp;
            </from>
            ";
        
            
        }
        if (isset($_POST['ch']))
        {
            echo"
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Megnevezés</th>
                        <th>Művelet</th>
                        <th><button id='btn-add'>+<button>
                    </tr>
                    <tr>
                        <th colspan='3'>
                            <input type='search' name='needle'></input>
                        </th>
                        <th id='editor' style='display':none'>
                            <input id='id' name='id'>
                            <button id='btn-save' title='Ment'>
                                <i class='fa fa-save'></i>
                            </button>
                            <button id='btn-cancel' title='Mégse'>
                                <i class='fa fa-cancel'></i>
                            </button>
                        </th>
                    </tr>
                </thead>

                <tbody>";
                
                $ch = $_POST['ch'];
                $makers = $carMaker->getByFirstCh($ch);
                foreach($makers as $maker)
                {
                    $id=$maker['id'];
                    $name=$maker['name'];
                    echo"
                    <tr>
                        <td>
                            $id
                        <td>
                        <td>
                            $name
                        </td>
                        <td>
                            Mod / Del
                        </td>
                    </tr>
                    ";
                }
            echo"    
                </tbody>

                <tfoot>

                </tfoot>
            </table>
            ";
            
        }
        echo "</div><br>";
    ?>
</body>
</html>