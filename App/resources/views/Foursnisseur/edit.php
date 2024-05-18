<?php
$title_page = "Modification d'un Fournisseur";
$FournisseurInfo = $data ;
ob_start(); // this is for geting a variable as text and with html and php to get long code and put it on variable
?>


<form class="max-w-sm mx-auto mt-10 " action="index.php?page=fournisseurs&action=update" method="post">

  
  <div class="mb-5" hidden>
    <input type="text" value="<?= $FournisseurInfo['FournisseurInfo'][0]->CodeFour; ?>" name="CodeFour" maxlength="11" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light"  required />
  </div>

  <div class="mb-5">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
    <input type="text" value="<?= $FournisseurInfo['FournisseurInfo'][0]->Nom; ?>" name="Nom" maxlength="20" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light"  required />
  </div>

  <div class="mb-5">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prenom</label>
    <input type="text" value="<?= $FournisseurInfo['FournisseurInfo'][0]->Prenom; ?>" name="Prenom" maxlength="20" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light"  required />
  </div>

  <div class="mb-5">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
    <input type="email" value="<?= $FournisseurInfo['FournisseurInfo'][0]->Email; ?>" name="Email" maxlength="100" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light"  required />
  </div>

  <div class="mb-5">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tel</label>
    <input type="tel" value="<?= $FournisseurInfo['FournisseurInfo'][0]->Tel; ?>" name="Tel" maxlength="21" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light"  required />
  </div>

  <div class="mb-5">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Adress</label>
    <input type="text" value="<?= $FournisseurInfo['FournisseurInfo'][0]->Address; ?>" name="Address" maxlength="40" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light"  required />
  </div>



<div class="flex justify-between">

    <a class="text-white bg-gray-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center" href="index.php?page=fournisseurs&action=index">
        Annuler
    </a> 
    
    <button style="background-color: #F08100" type="submit" class="text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2">
        Modifier
    </button>

</div>


</form>



<?php 
$contant = ob_get_clean();// this is for geting a variable as text and with html and php to get long code and put it on variable 
require_once(__DIR__ . '/../layout.php');
?>