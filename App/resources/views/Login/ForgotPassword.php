<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mot de passe oublié</title>
    <link rel="icon" type="image/x-icon" href="../images/logo.svg">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .form-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin: auto;
        }

        .form-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-size: 16px;
            font-weight: bold;
            color: #555;
            display: block;
            margin-bottom: 5px;
        }

        .form-input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            transition: border-color 0.3s ease;
        }

        .form-input:focus {
            border-color: #007bff;
            outline: none;
        }

        .form-link {
            font-size: 14px;
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .form-link:hover {
            color: #0056b3;
        }

        .form-button {
            background-color: #007bff;
            color: #fff;
            font-size: 18px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .retour-button {
            background-color: #FF5F1F;
            color: #fff;
            font-size: 18px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-button:hover {
            background-color: #0056b3;
        }

        .form-divider {
            margin: 20px 0;
            border-bottom: 1px solid #ccc;
        }

        .form-divider span {
            background-color: #fff;
            padding: 0 10px;
            color: #999;
        }
    </style>
</head>

<body>
    <!-- component -->
    <section class="flex flex-col md:flex-row h-screen items-center">
        <div class="hidden lg:block w-full md:w-1/2 xl:w-2/3 h-screen">
            <img src="../images/industri.jpg" alt="" class="w-full h-full object-cover">
        </div>
        <div class="form-container bg-orange-200 w-full md:max-w-md lg:max-w-full md:mx-auto md:mx-0 md:w-1/2 xl:w-1/3 h-screen px-6 lg:px-16 xl:px-12 flex items-center justify-center">
            <div class="w-full h-100">
                <img src="../images/logo.svg" alt="Logo" class="mx-auto w-48 mb-4">
                <h1 class="form-title">Mot de passe oublié</h1>

                <?php 
                // session_start();
                if(isset($_SESSION['errorr_message'])){
                ?>
                <p class="text-red-500">
                    <?= $_SESSION['errorr_message'] ?>
                </p>
                <?php 
                unset($_SESSION['errorr_message']);
                } ?>
                    

                <form action="index.php?page=Forgotpassword&action=sendEmail" method="POST">
                    <div class="form-group">
                        <label for="email" class="form-label">Adresse e-mail</label>
                        <input type="email" id="email" name="email" placeholder="Entrer l'adresse e-mail"
                            class="form-input" autofocus autocomplete required>
                    </div>
                    <button type="submit" name="submit" class="form-button">Envoyer</button>
                    <a type="button" href="index.php?page=login&action=index" class="retour-button">Retour</a>
                </form>

               
            </div>
        </div>
    </section>
</body>

</html>
