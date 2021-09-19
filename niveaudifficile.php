<!DOCTYPE html>
<html lang="en">
<?php
// require("file.php");
// session_start();
// $_SESSION["name"] = "ALae";


?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 0px;
            background-color: green;
        }

        #monForm {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 300px;
            /* A toi de donner la bonne largeur */
            height: 200px;
            /* A toi de donner la bonne hauteur */
            margin-left: -150px;
            /* -largeur/2 */
            margin-top: -100px;
            /* -hauteur/2 */

        }

        #btn {

            width: 26rem;
            margin-left: -140px;

        }

        span {
            margin-left: -46px;
            width: 50rem;
        }

        #input {
            width: 25rem;
            margin-left: -54px;
        }

        .alert-success,
        .alert-danger {
            width: 29rem;
            margin: 7px;
            margin-left: -4px;

        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>

<body>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
    session_start();
    $numberthree = null;
    $error = null;
    $success = null;
    $adevinerthree = null;


    if (empty($_SESSION["numberthree"])) {
        $_SESSION["numberthree"] = $adevinerthree = rand(100, 1000);
    } else {
        $adevinerthree = $_SESSION["numberthree"];
    }

    echo "$adevinerthree";


    if (isset($_GET["numberthree"])) {
        if ($_GET["numberthree"] < $adevinerthree) {
            $error = "le nombre est inférieur au nombre deviné";
    ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Wrong Choice!'

                })
            </script>
        <?php
        } elseif ($_GET["numberthree"] > $adevinerthree) {
            $error  = "le nombre est encore supérieur au nombre deviné";
        ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Wrong Choice!'

                })
            </script>
        <?php
        } else {
            $success = "T'as deviné le nombre";
            echo "\nT'as gagné 5 points";
        ?>
            <script>
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Tu as gagné 5 points',
                    showConfirmButton: false,
                    timer: 1000
                })
            </script>
    <?php
        }
    }
    ?>
    <form id="monForm" action="" method="GET" class="row g-3">
        <div class="container">
            <div class="row">
                <div class="mb-3">
                    <label for="numberthree" class="form-label">

                    </label>
                    <input id="input" name="numberthree" placeholder="entrer un nombre entre 100 et 1000" type="number" class="form-control">
                </div>

                <div class="d-grid gap-2 col-6 mx-auto">
                    <button style="text-align: center;" class="btn btn-primary" id="btn" type="submit">Deviner</button>
                </div>
                <span class="form-text">
                    <?php if (isset($error)) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $error ?>
                        </div>
                    <?php elseif (isset($success)) : ?>
                        <div>
                            <div class="alert alert-success" style="width:27rem; margin:7px;margin-left:-4px;" role="alert">
                                <?= $success; ?>
                            </div>
                        <?php endif ?>
                        <!-- : au lieu des accolades ca le remplace -->

                </span>
    </form>







    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>

</html>
