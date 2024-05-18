<?php
$title_page = "Modification d'un caractéristique";
$Caracteristiques = $data ;
ob_start(); // this is for geting a variable as text and with html and php to get long code and put it on variable
?>



<form class="max-w-sm mx-auto mt-10 " action="index.php?page=caracteristiques&action=update" method="post">

  <div class="mb-5" hidden>
    <input type="text" value="<?= $Caracteristiques['CaracteristiqueInfo'][0]->CodeCar; ?>" name="CodeCar" maxlength="11" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light"  required />
  </div>

  <div class="mb-5">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Designation</label>
    <input type="text" value="<?= $Caracteristiques['CaracteristiqueInfo'][0]->Designation; ?>" name="Designation" maxlength="30" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light"  required />
  </div>


<div class="flex justify-between">

    <a class="text-white bg-gray-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center" href="index.php?page=caracteristiques&action=index">
        Annuler
    </a> 
    
    <button style="background-color: #F08100" type="submit" class="text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2">
        Modifier
    </button>

</div>


</form>



<script src="js/DateValidation.js"></script>

<?php 
$contant = ob_get_clean();// this is for geting a variable as text and with html and php to get long code and put it on variable 
require_once(__DIR__ . '/../layout.php');
?>