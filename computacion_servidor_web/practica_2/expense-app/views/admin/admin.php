<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Claritaps - Practica 2</title>
    <link rel="shortcut icon" href="https://claritaps.com/img/logo.ico">
</head>
<body>
    <?php require 'header.php'; ?>

    <div id="main-container">
            <div id="expense-container">
                <div id="new-expense-container">
                    <form action="">
                    <input type="text">
                    <input type="number">
                    <select name="" id="">
                        <option value="">sds</option>
                    </select>
                    <input type="submit" value="New Expense">
                    </form>
                </div>

                <div id="latest-expenses-container">
                </div>
            </div>
    </div>

    <?php require 'views/footer.php'; ?>
</body>
</html>