<?php

use App\Lib\Debug;

?>
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top border-bottom">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="create">
                        <button class="btn btn-sm btn-success" type="button">Добавить</button>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<main>
    <div class="name-table">
        <h2><?= $title ?></h2>
    </div>
    <div class="my-table">
        <div class="container-fluid">
            <div class="table-responsive my-table">
                <table class="table table-striped table-hover border-primary table-borderless">
                    <thead class="table-dark">
                    <tr>
                        <?php
                        foreach ($vars as $var) {
                            foreach ($var as $key => $item) {
                                echo '<th>' . $key . '</th>';
                            }
                            echo '<th></th>';
                            break;
                        }
                        ?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($vars as $var) {
                        echo '<tr><td></td>';

                        foreach ($var as $key => $item) {
                            if ($key != 'id') {
                                echo '<td><div class="input-wrapper">
                    <input type="text" name="input' . ucfirst($key) . '" class="form-control" placeholder="' . ucfirst($key) . '" required="" id=' . $key . '>
                </div></td>';
                            }
                        }
                        echo '<td><button class="btn btn-sm btn-primary" type="button" id="button">Создать</button></td>';
                        break;
                    }

                    foreach ($vars as $var) {
                        echo '<tr>';
                        foreach ($var as $key => $item) {
                            echo '<td>' . $item . '</td>';
                            if ($key == 'id') {
                                $id = $item;
                            }
                        }
                        $path = "select/?id=" . $id;
                        echo "<td><a href=$path>Изменить</a></td>";
                        echo '</tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
