<?php
$title_page = "Modification d'un Bon de livraison";
ob_start(); // this is for geting a variable as text and with html and php to get long code and put it on variable
?>




<form class="max-w-sm  mx-auto mt-10 " action="index.php?page=BonLivraison&action=update" method="post">
    


<input type="number" name="oldCodeBL" value="<?= $data['BonLivraisonInfo'][0]->CodeBL; ?>" required hidden />


  <div class="mb-5">
    <label for="CodeBL" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Code Bon de livraison</label>
    <input type="number" name="CodeBL" value="<?= $data['BonLivraisonInfo'][0]->CodeBL; ?>" maxlength="30" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light"  required />
  </div>


  <div class="mb-5">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
    <input type="date" name="Date" value="<?= $data['BonLivraisonInfo'][0]->Date; ?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light"  required />
  </div>


  <div class="mb-5">
  <label for="CodeCommande" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Code Commande</label>
  <select id="CodeCommande" name="CodeCommande" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light" required>
    <option value="" selected disabled>sélectionner Code Commande</option>
    <?php
    foreach($data['commandes']['data'] as $datacommandes) : ?>
        <option value="<?= $datacommandes["CodeCom"]; ?>"
        <?php if($datacommandes["CodeCom"] == $data['BonLivraisonInfo'][0]->CodeCommande){echo "selected";} ?>
        > 
        <?= $datacommandes["CodeCom"]; ?>
        </option>
    <?php endforeach; ?>
  </select>
  </div>



  <div class="mb-5">
  <label for="CodeFacteur" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Code Facteur</label>
  <select id="CodeFacteur" name="CodeFacteur" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light" required>
    <option value="" selected disabled>sélectionner Code Facteur</option>
    <?php
    foreach($data['Facture'] as $dataFactures) : ?>
        <option value="<?= $dataFactures["CodeFact"]; ?>"
        <?php if($dataFactures["CodeFact"] == $data['BonLivraisonInfo'][0]->CodeFacteur){echo "selected";} ?>
        > 
        <?= $dataFactures["CodeFact"]; ?>
        </option>
    <?php endforeach; ?>
  </select>
  </div>





  <div class="mb-5">
  <label for="CodeEtat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">État</label>
  <select id="CodeEtat" name="CodeEtat" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light" required>
    <option value="" selected disabled>sélectionner etat</option>
    <?php
    foreach($data['Etat'] as $dataEtats) : ?>
        <option value="<?= $dataEtats["CodeEtat"]; ?>"
        <?php if($dataEtats["CodeEtat"] == $data['BonLivraisonInfo'][0]->codeetat){echo "selected";} ?>
        > 
        <?= $dataEtats["Designation"]; ?>
        </option>
    <?php endforeach; ?>
  </select>
  </div>



<div class="flex justify-between">

    <a class="text-white bg-gray-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center" href="index.php?page=BonLivraison&action=index">
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