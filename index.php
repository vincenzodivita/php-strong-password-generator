<?php

    # Include functions from another php file
    include __DIR__ . '/functions.php';

?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Password Generator</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    </head>
    <body>

        <div class="container d-flex flex-column align-items-center m-4">
             <!-- General titles -->
            <h1>Strong Password Generator</h1>
            <h2>Genera una password sicura</h2>

            <?php if ($length == "") { ?>

                <div class="error-message">
                    <span><?=
                        $error_message
                    ?></span>
                </div>

            <?php } ?>
            

            <!-- Form with GET method -->
            <form
                method="get"
                class="d-flex flex-column align-items-center m-4"
            >
                <div>
                    <label for="length">
                        Lunghezza password:
                    </label>
                    <input
                        type="number"
                        min="6"
                        max="30"
                        name="length"
                        id="length"
                        value="<?= $length ?>"
                    > 
                    <button class="btn btn-dark m-3">
                        Genera
                    </button>
                </div>

                <!-- Advanced option -->
                <div>
                    <div>Opzioni avanzate:</div>
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            name="no-caps"
                            id="no-caps"
                            <?= $nocaps_status ? 'checked' : '' ?>
                        >
                        <label
                            class="form-check-label"
                            for="no-caps"
                        >
                            Minuscole
                        </label>
                    </div>
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            name="caps"
                            id="caps"
                            <?= $caps_status ? 'checked' : '' ?>
                        >
                        <label
                            class="form-check-label"
                            for="caps"
                        >
                            Maiuscole
                        </label>
                    </div>
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            name="numbers"
                            id="numbers"
                            <?= $numbers_status ? 'checked' : '' ?>
                        >
                        <label
                            class="form-check-label"
                            for="numbers"
                        >
                            Numeri
                        </label>
                    </div>
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            name="symbols"
                            id="symbols"
                            <?= $symbols_status ? 'checked' : '' ?>
                        >
                        <label
                            class="form-check-label"
                            for="symbols"
                        >
                            Simboli
                        </label>
                    </div>
                </div>
                
                <!-- Text area for print generated password -->
                <textarea  
                    rows="1"
                    cols="35"
                    class="text-center m-4"
                ><?php 
                    if ($length != "") {
                        echo generateAdvancedPassword($length,$nocaps_status, $caps_status, $numbers_status, $symbols_status);
                    } 
                ?></textarea>
            </form>
        </div>

    </body>
</html>