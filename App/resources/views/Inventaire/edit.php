
<?php
$title_page = "Modification d'un nouveau INVENTAIRE";
ob_start(); // this is for geting a variable as text and with html and php to get long code and put it on variable
?>





<form class="max-w-sm  mx-auto mt-10 " action="index.php?page=inventaire&action=update" method="post">
    


<input name="CodeInv" value="<?= $data['InventaireInfo'][0]->CodeInv ?>" type="text" required hidden>


  <div class="mb-5">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DATE DÉBUT</label>
    <input type="datetime-local" value="<?= $data['InventaireInfo'][0]->DateDebut ?>" id="DateDeb" name="DateDeb" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light"  required />
  </div>



  <div class="mb-5">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DATE FIN</label>
    <input type="datetime-local" value="<?= $data['InventaireInfo'][0]->DateFin ?>" id="DateFin" name="DateFin" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light"  required />
  </div>



  <audio id="select-sound">
  <source src="../sounds/success.wav" type="audio/mpeg">
  Your browser does not support the audio element.
  </audio>




  <div class="mb-5">
  <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sélectionner les matériels</label>
  <select name="matreils[]" id="matreils" multiple="multiple" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light" required>
    <?php foreach ($data['Matreils'] as $Matreil) : ?>
      <option value="<?= $Matreil['SSH']; ?>" <?= in_array($Matreil['SSH'], array_column($data['SelectedMatreil'], 'SSH')) ? 'selected' : ''; ?>>
        <?= $Matreil["SSH"] . ' ' . $Matreil["Type"] . ' ' . $Matreil["Marque"] . ' ( '; 
          $caracteristiques = [];
          foreach ($data["Caracteristiques"] as $caracteristique) {
            if ($Matreil['SSH'] === $caracteristique['SSH']) {
              $caracteristiques[] = $caracteristique['Designation']; 
            }
          }
          echo implode(', ', $caracteristiques);
        echo ' ) '; ?>
      </option>
    <?php endforeach; ?>
  </select>
</div>




    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/fr.min.js"></script>
    <script>
    $(document).ready(function() {
      $('#matreils').select2({
        language: "fr" // Set language to French
      });

      // Add event listener for the select2:select event
      $('#matreils').on('select2:select', function (e) {
        // Play the sound when an item is selected
        document.getElementById('select-sound').play();
      });
    });
    </script>








<div class="flex justify-between">

    <a class="text-white bg-gray-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center" href="index.php?page=inventaire&action=index">
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