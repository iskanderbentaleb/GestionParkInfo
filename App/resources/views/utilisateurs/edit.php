<?php
$title_page = "Modification d'un Employé";
ob_start(); // this is for geting a variable as text and with html and php to get long code and put it on variable
?>




<form class="max-w-sm  mx-auto mt-10 " action="index.php?page=utilisateur&action=update" method="post">
    

  <div class="mb-5" hidden>
    <input type="text" name="CodeUt" value="<?= $data['UtilisateurInfo'][0]->CodeUt; ?>" maxlength="30" id="Nom" required />
  </div>

  <div class="mb-5">
    <label for="Nom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
    <input type="text" name="Nom" value="<?= $data['UtilisateurInfo'][0]->Nom; ?>" maxlength="30" id="Nom" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light"  required />
  </div>



  <div class="mb-5">
    <label for="Prenom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prenom</label>
    <input type="text" name="Prenom" value="<?= $data['UtilisateurInfo'][0]->Prenom; ?>" maxlength="30" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light"  required />
  </div>



  <div class="mb-5">
    <label for="DNN" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date de Naissance</label>
    <input type="date" name="DNN" value="<?= $data['UtilisateurInfo'][0]->DNN; ?>" maxlength="30" id="DNN" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light"  required />
  </div>



  <div class="mb-5">
    <label for="Email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
    <input type="Email" name="Email" value="<?= $data['UtilisateurInfo'][0]->Email; ?>" maxlength="30" id="Email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light"  required />
  </div>



  <div class="mb-5">
    <label for="Tel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tel</label>
    <input type="phone" name="Tel" value="<?= $data['UtilisateurInfo'][0]->Tel; ?>" maxlength="30" id="Tel" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light"  required />
  </div>


  <div class="mb-5">
    <label for="Post" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post</label>
    <input type="number" name="Post" value="<?= $data['UtilisateurInfo'][0]->Post; ?>" maxlength="2" max="99" id="Post" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light"  required />
  </div>



<div class="mb-5">
    <label for="structure" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Structure</label>
    <select name="structure" id="structure" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light" required>
        <option value="" selected disabled>sélectionner la structure</option>
        <?php
        foreach($data['Structures'] as $dataStructures) : ?>
            <option value="<?= $dataStructures["CodeStr"]; ?>"
            <?php if($dataStructures["CodeStr"] == $data['UtilisateurInfo'][0]->StrCode){echo "selected";} ?>
            > 
            <?= $dataStructures["Designation"]; ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>



<div class="mb-5">
    <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fonction</label>
    <select name="role" id="role" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light" required>
        <option value="" selected disabled>Sélectionner la fonction</option>
        <?php
        foreach($data['Roles'] as $dataRoles) : ?>
            <option value="<?= $dataRoles["CodeRole"]; ?>"
            <?php if($dataRoles["CodeRole"] == $data['UtilisateurInfo'][0]->RoleCode){echo "selected";} ?>
            > 
            <?= $dataRoles["Designation"]; ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>







<div class="flex justify-between">

    <a class="text-white bg-gray-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center" href="index.php?page=utilisateur&action=index">
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