<?php
$title_page = "Création d'un nouveau Employé";
ob_start(); // this is for geting a variable as text and with html and php to get long code and put it on variable
?>




<form class="max-w-sm  mx-auto mt-10 " action="index.php?page=utilisateur&action=store" method="post">
    


  <div class="mb-5">
    <label for="Nom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
    <input type="text" name="Nom" maxlength="30" id="Nom" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light"  required />
  </div>



  <div class="mb-5">
    <label for="Prenom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prenom</label>
    <input type="text" name="Prenom" maxlength="30" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light"  required />
  </div>



  <div class="mb-5">
    <label for="DNN" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date de Naissance</label>
    <input type="date" name="DNN" maxlength="30" id="DNN" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light"  required />
  </div>



  <div class="mb-5">
    <label for="Email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
    <input type="Email" name="Email" maxlength="30" id="Email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light"  required />
  </div>



  <div class="mb-5">
    <label for="Tel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tel</label>
    <input type="phone" name="Tel" maxlength="30" id="Tel" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light"  required />
  </div>


  <div class="mb-5">
    <label for="Post" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post</label>
    <input type="number" name="Post" maxlength="2" max="99" id="Post" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light"  required />
  </div>



<div class="mb-5">
    <label for="structure" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Structure</label>
    <select name="structure" id="structure" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light" required>
        <option value="" selected disabled>sélectionner la structure</option>
        <?php
        foreach($data['Structures'] as $dataMarques) : ?>
            <option value="<?= $dataMarques["CodeStr"]; ?>"> 
            <?= $dataMarques["Designation"]; ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>



<div class="mb-5">
    <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fonction</label>
    <select name="role" id="role" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light" required>
        <option value="" selected disabled>Sélectionner la fonction</option>
        <?php
        foreach($data['Roles'] as $dataMarques) : ?>
            <option value="<?= $dataMarques["CodeRole"]; ?>"> 
            <?= $dataMarques["Designation"]; ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>






<ul class="items-center w-full mb-4 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
        <div class="flex items-center ps-3">
            <input id="horizontal-list-radio-license" type="radio" value="" name="list-radio" class="w-4 h-4 text-green-400 bg-gray-100 border-gray-300 focus:ring-green-400 dark:focus:ring-green-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" onclick="togglePasswordField(true)" required>
            <label for="horizontal-list-radio-license" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Employés Admin</label>
        </div>
    </li>
    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
        <div class="flex items-center ps-3">
            <input id="horizontal-list-radio-id" type="radio" value="" name="list-radio" class="w-4 h-4 text-red-500 bg-gray-100 border-gray-300 focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" onclick="togglePasswordField(false)" required>
            <label for="horizontal-list-radio-id" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Employés simple</label>
        </div>
    </li>
</ul>




<div class="mb-5" id="passwordField" style="display: none;">
    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mot de Passe</label>
    <input type="password" name="password" maxlength="30" id="password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light" required />
</div>










<div class="flex justify-between">

    <a class="text-white bg-gray-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center" href="index.php?page=utilisateur&action=index">
        Annuler
    </a> 
    
    <button style="background-color: #F08100" type="submit" class="text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2">
        Ajouter
    </button>

</div>




  </form>



<script src="js/DateValidation.js"></script>
<script>
    document.getElementById('horizontal-list-radio-license').addEventListener('click', function() {
        togglePasswordField(true);
    });

    document.getElementById('horizontal-list-radio-id').addEventListener('click', function() {
        togglePasswordField(false);
    });

    function togglePasswordField(isAdmin) {
    var passwordField = document.getElementById('passwordField');
    var passwordInput = document.getElementById('password');
    if (isAdmin) {
        passwordField.style.display = 'block';
        passwordInput.setAttribute('name', 'password');
        passwordInput.required = true;
    } else {
        passwordField.style.display = 'none';
        passwordInput.removeAttribute('name');
        passwordInput.required = false;
    }
}
</script>

<?php 
$contant = ob_get_clean();// this is for geting a variable as text and with html and php to get long code and put it on variable 
require_once(__DIR__ . '/../layout.php');
?>