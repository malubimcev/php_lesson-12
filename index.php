<!DOCTYPE html>
<?php
    require_once 'functions.php';

    $recordset = [];

    $recordset = get_data_from_db($_GET);
?>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <title>SQL lesson 1</title>
        <link rel="stylesheet" href="css/styles.css"/>
    </head>
    <body>
        <section class="main-container">
            <h1>Задание к лекции 4.1 «Реляционные базы данных и SQL»</h1>
            <div class="form-container">
                <form method="GET" class="filter-form">
                    <input type="text" name="isbn" placeholder="ISBN" value="">
                    <input type="text" name="name" placeholder="Название книги" value="">
                    <input type="text" name="author" placeholder="Автор книги" value="">
                    <input type="submit" value="Поиск">
                </form>
            </div>
            <table class="table-books">
                <thead class="table-head">
                    <tr class="header-row">
                        <td>Название</td>
                        <td>Автор</td>
                        <td>Год издания</td>
                        <td>Жанр</td>
                        <td>ISBN</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($recordset as $record): ?>
                        <tr class="table-row">
                        <td><?=$record['name']; ?></td>
                        <td><?=$record['author']; ?></td>
                        <td><?=$record['year']; ?></td>
                        <td><?=$record['genre']; ?></td>
                        <td><?=$record['isbn']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </body>
</html>
