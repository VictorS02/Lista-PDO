<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>
            Exercício 3
        </title>
    </head>
    <body>
        <h3>
            Insira os dados abaixo
        </h3>
        <form method="POST" action="pdo_exer3-0.php">
            <p>
                <input type="text" name="fabricante" placeholder="Fabricante" required>
            </p>
            <p>
                <input type="number" name="ano_fabricacao" placeholder="Ano de Fabricação" required>
            </p>
            <p>    
                <input type="number" name="quilometragem" placeholder="Kilometragem" required>
            </p>
            <p>
                <input type="reset" name='reset' value='Resetar'>
                <input type="submit" name='submit' value='Enviar'>
            </p>
        </form>
    </body>
</html>