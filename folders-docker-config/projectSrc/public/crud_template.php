<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <div class="input_part">
            <a href="/crud.php">HOME</a>
            <!-- <?php echo $name ?> -->
            <h2>INPUT Part</h2><br />
            <form action="/crud.php" method="POST">
                <?php if (isset($gundamId) && $operation = 'edit'): ?>
                    <input type="hidden" name="editId" value="<?php echo $gundamId ?>" />
                <?php endif; ?>
                <input type="text" name="name" placeholder="name" value="<?php echo isset($name) ? $name : "na" ?>" />
                <?php if (isset($name) && empty($name)):?>
                    <p> Input has no value </p>
                <?php endif; ?>
                <input type="text" name="series" placeholder="series" value="<?php echo isset($series) ? $series : "se" ?>" />
                <?php if (isset($series) && empty($series)): ?>
                    <p> Input has no value </p>
                <?php endif; ?>
                <input type="number" name="year" placeholder="year" min="2010" max="2025" value="<?php echo isset($year) ? $year : "se" ?>"/>
                <?php if (isset($year) && empty($year)):?>
                    <p> Input has no value </p>
                <?php endif; ?>
                <button type="submit">Submit</button><br />
            </form>
            <!-- <?php var_dump($name); ?> -->
        </div>
        <div>
            <h2>DATA</h2>
            <table cellspacing="30">
                <thead>
                    <col>Name</col>
                    <col>Series</col>
                    <col>Year</col>
                </thead>
                <?php
                    foreach ($arr as $item) {
                    echo '<tr>';
                    echo '<td><a href="http://localhost:8080/crud.php?operation=edit&id=' . $item['gundamid'] . '">UPDATE</a></td>';

                    echo '<td>' . $item['name'] . '</td>';
                    echo '<td>' . $item['series'] . '</td>';
                    echo '<td>' . $item['year'] . '</td>';

                    echo '<td><a href="http://localhost:8080/crud.php?operation=delete&id=' . $item['gundamid'] . '">DELETE</a></td>';
                    echo '</tr>';

                    // print_r($item);
                    // echo '<br /><br />';
                    }
                ?>
            </table>
            <form method="get" action="greet_user.php">
                First Name:
                <input type="text" name="first">
                <br>
                Last Name:
                <input type="text" name="last">
                <br>
                <input type="submit" value="Submit">
            </form>

        </div>
    </body>
</html>