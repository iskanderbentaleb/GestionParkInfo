<?php
$title_page = "Modification d'un matériel";
$MatreilInfo = $data ;
ob_start(); // this is for geting a variable as text and with html and php to get long code and put it on variable
?>



<form class="max-w-sm mx-auto mt-10 " action="index.php?page=matreil&action=update" method="post">

<!-- last ssh = id for when we update ssh -->
  <div class="mb-5" hidden>
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SSH</label>
    <input type="number" value="<?= $MatreilInfo['MatreilInfo'][0]->SSH; ?>" name="id" maxlength="11" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light"  required />
  </div>
<!-- last ssh = id for when we update ssh -->
    
  <div class="mb-5">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SSH</label>
    <input type="number" value="<?= $MatreilInfo['MatreilInfo'][0]->SSH; ?>" name="SSH" maxlength="11" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light"  required />
  </div>

  <div class="mb-5">
  <label for="marque" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">LA MARQUE</label>
  <select id="marque" name="CodeMarque" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light" required>
    <option selected disabled>sélectionner la marque</option>
    <?php
    foreach($data['Marques'] as $dataMarques) : ?>
        <option 
        value="<?= $dataMarques["CodeMrq"]; ?>" 
        <?php if($dataMarques["CodeMrq"] == $MatreilInfo['MatreilInfo'][0]->CodeMarque){echo "selected";} ?>
        > 
        <?= $dataMarques["Designation"]; ?>
        </option>
    <?php endforeach; ?>
  </select>
  </div>


  <div class="mb-5">
  <label for="marque" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">LE TYPE</label>
  <select id="marque" name="CodeType" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light" required>
    <option value="" selected disabled>sélectionner le type</option>
    <?php
    foreach($data['MatreilTypes'] as $dataMatreilType) : ?>
        <option value="<?= $dataMatreilType["CodeType"]; ?>"
        <?php if($dataMatreilType["CodeType"] == $MatreilInfo['MatreilInfo'][0]->CodeType){echo "selected";} ?>
        > 
        <?= $dataMatreilType["Designation"]; ?>
        </option>
    <?php endforeach; ?>
  </select>
  </div>


  
  <div class="mb-5">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Le Prix</label>
    <input type="number" min="1" value="<?= $MatreilInfo['MatreilInfo'][0]->Prix ?>"  name="Prix" max="999999999.99" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light"  required />
  </div>

  <div class="mb-5">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DATE RÉCEPTION</label>
    <input type="date" onclick="DateValidation('DateRec' , '2010-01-01')" id="DateRec" value="<?= $MatreilInfo['MatreilInfo'][0]->DateRec ?>" name="DateRec" max="999999999.99" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light"  required />
  </div>

  <div class="mb-5">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">GARANTIE JUSQU'A</label>
    <input type="date" onclick="DateValidation('DateGarantie',null,'2025-01-01')" id="DateGarantie" value="<?= $MatreilInfo['MatreilInfo'][0]->DateGarantie ?>" name="DateGarantie" max="999999999" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light"  required />
  </div>





  <div class="mb-5">
  <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">sélectionner un bon de livraison</label>
  <select name="CodeBL" id="CodeBL" multiple="multiple"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light">
  <?php
    foreach($data['BonLivraisons'] as $BonLivraison) : ?>
    <option value="<?= $BonLivraison['CodeBL']; ?>"
    <?php if($BonLivraison['CodeBL'] == $MatreilInfo['MatreilInfo'][0]->CodeBL){echo "selected";} ?>
    >
    <?= $BonLivraison["CodeBL"] . " ( " . $BonLivraison["Designation"] . " ) " ; ?>
    </option>
    <?php endforeach; ?>
  </select>
  </div>




  <div class="mb-5">
  <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">les Caractéristiques</label>
  <select name="caracteristiques[]" id="caracteristiques" multiple="multiple"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light">
  <?php
    foreach($data['caracteristiques'] as $caracteristique) { 

      $selected = ""; 
      foreach($data['SelectedCaracteristiques'] as $SelectedCaracteristique) {
        if($SelectedCaracteristique['CodeCar'] == $caracteristique['CodeCar']){
          $selected = "selected"; 
        }
      }
    ?>
    <option value="<?= $caracteristique['CodeCar']; ?>" <?= $selected ?> >
    <?= $caracteristique["Designation"]; ?>
    </option>
    <?php } ?>
  </select>
  </div>



    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/fr.min.js"></script>
  <script>
    $(document).ready(function() {

      $('#caracteristiques').select2({
        language: "fr", // Set language to French 
      });
    
      $('#CodeBL').select2({
        language: "fr", // Set language to French 
        maximumSelectionLength: 1 
      });
    
    });

  </script>



  	


<div class="flex justify-between">

    <a class="text-white bg-gray-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center" href="index.php?page=matreil&action=index">
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