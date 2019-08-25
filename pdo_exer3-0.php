<?php
    //Obtém os valores do formulário
    $fabricante      = $_POST['fabricante']; // fabricante
    $ano_fabricacao  = $_POST['ano_fabricacao']; // ano de fabricação
    $quilometragem   = $_POST['quilometragem']; // kilometragem

    //Conecta com o BD
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpassword = '';
    $dbname = 'atv_prt_043_bd';

    try {
        //Efetua a conexão com BD
        $conx = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser,
        $dbpassword);
        //Cria a Query SQL
        $query = "INSERT INTO autos(fabricante, ano_fabricacao, quilometragem) VALUES ('$fabricante', '$ano_fabricacao', '$quilometragem',
        NOW() )";
        //Executa a Query
        $conx->exec($query);
        echo 'Registro inserido com sucesso:';
        //Fecha a conexão
        $conx = null;
    } catch (PDOException $e) {
    echo "Conexão falhou: " . $e->getMessage();
    }
?>

<!DOCTYPE html>
<html> 
    <head>
        <meta charset="utf-8" />
        <title>Exercício 3-0 PDO</title>
    </head> 
    <body>

        <?php
        //Parâmetros de conexão com BD 
        $dbhost = 'localhost'; 
        $dbuser = 'root'; 
        $dbpassword = ''; 
        $dbname = 'atv_prt_043_bd';

        try {
            //Efetua a conexão com BD
            $conx = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpassword);
            
            //Cria a Query SQL
            $query = "SELECT auto_id, fabricante, ano_fabricacao, quilometragem FROM autos ORDER BY auto_id ASC";
            
            //Executa a Query
            $consulta = $conx->query($query);
            while($row = $consulta->fetch(PDO::FETCH_ASSOC)) {

                $table[] = $row;
                }
                ?>
                
                <table>
                <tr>
                <td><strong>Código de Cadastro</strong></td>
                <td width="10">&nbsp;</td>
                <td><strong>Fabricante</strong></td>
                <td width="10">&nbsp;</td>
                <td><strong>Ano de Fabricação</strong></td>
                <td width="10">&nbsp;</td>
                <td><strong>Kilometragem</strong></td>
                </tr>

                <?php

            //Verifica se há linhas para exibir
            if ($table) {
            //Recupera cada elemento da array
            foreach($table as $d_row) {

            ?>

            <tr>

            <td><?php echo($d_row["auto_id"]); ?></td>
            <td width="10">&nbsp;</td>
            <td><?php echo($d_row["fabricante"]); ?></td>
            <td width="10">&nbsp;</td>
            <td><?php echo($d_row["ano_fabricacao"]); ?></td>
            <td width="10">&nbsp;</td>
            <td><?php echo($d_row["quilometragem"]); ?></td>

            </tr>
            <?php
            }
            }
            ?>
            </table>
            <?php
            $number_regs = $consulta->rowCount();
            ?>
            <p>Número de Registros : <?php echo $number_regs; ?></p>

            <?php
            //Fecha a conexão
            $conx = null;
        } catch (PDOException $e) {
        echo "Conexão falhou: " . $e->getMessage();
        }
        ?>
        <a href='pdo_exer3.php' style='text-decoration:none;color:#ff0099;'>Voltar</a>
    </body>
</html>