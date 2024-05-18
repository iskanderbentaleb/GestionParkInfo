
<?php
$title_page = "Modification d'un Réparation";
ob_start(); // this is for geting a variable as text and with html and php to get long code and put it on variable
?>





<form class="max-w-sm  mx-auto mt-10 " action="index.php?page=reparation&action=update" method="post">
    

  <input type="text" name="CodeRep" value="<?= $data['ReparationInfo'][0]->CodeRep ?>" hidden required>



  <div class="mb-5">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">LA DATE</label>
    <input type="datetime-local" value="<?= $data['ReparationInfo'][0]->Date ?>" id="Date" name="Date" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light"  required />
  </div>





  <div class="mb-5">
  <label for="email" class="block mb-2 text-sm w font-medium text-gray-900 dark:text-white">Sélectionner un matériel</label>
  <select name="matreil" id="matreils" multiple="multiple" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light" style="height: 300px; padding: 12px;" required>
    <?php foreach ($data['Matreils'] as $Matreil) : ?>
      <option class="<?= $Matreil['DateGarantie']; ?>" value="<?= $Matreil['SSH']; ?>"
      <?php if($Matreil['SSH'] == $data['ReparationInfo'][0]->SSH){echo "selected";} ?>
      >
        <?php 
          echo $Matreil["SSH"] . ' ' . $Matreil["Type"] . ' ' . $Matreil["Marque"] . ' ( '; 
          $caracteristiques = [];
          foreach ($data["Caracteristiques"] as $caracteristique) {
            if ($Matreil['SSH'] === $caracteristique['SSH']) {
              $caracteristiques[] = $caracteristique['Designation']; 
            }
          }
          echo implode(', ', $caracteristiques);
          echo ' ) ';
        ?>
      </option>
    <?php endforeach; ?>
  </select>
</div>






<div id="tecnicienContainer" class="mb-5 <?php echo $data['ReparationInfo'][0]->RoleCode === NULL ? 'hidden' : ''; ?>">
  <label for="email" class="block mb-2 text-sm w font-medium text-gray-900 dark:text-white">Sélectionner un technicien </label>
  <select name="tecnicien" id="tecnicien" multiple="multiple" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light" style="width:385px;">
    <?php foreach ($data['utilisateurs'] as $utilisateur) : ?>
      <option value="<?= $utilisateur['CodeUt']; ?>"
      <?php if($utilisateur['CodeUt'] == $data['ReparationInfo'][0]->CodeUt){echo "selected";} ?>
      >
        <?php 
          echo $utilisateur["Email"] ; 
        ?>
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
      $('#tecnicien').select2({
        language: "fr", // Set language to French 
        maximumSelectionLength: 1 
      });
      $('#matreils').select2({
        language: "fr", // Set language to French 
        maximumSelectionLength: 1 
      }).on('change', function() {
      CompareDateToDayWithGarantie();
      });
    });
    </script>


<script>
  function CompareDateToDayWithGarantie() {
    const tecnicienContainer = document.getElementById("tecnicienContainer"); 
    const tecnicienInput = document.getElementById("tecnicien");
    const selectedOption = document.getElementById("matreils").options[document.getElementById("matreils").selectedIndex];
    const dateGarantie = new Date(selectedOption.className);
    const currentDate = new Date();

    if (dateGarantie >= currentDate) {
      tecnicienContainer.classList.add("hidden");
      tecnicienInput.disabled = true;
      tecnicienInput.required = false ;
      alert(`Cet matériel est sous garantie, donc la réparation est faite par le fournisseur. Date de fin garantie = ${dateGarantie.getFullYear()}/${(dateGarantie.getMonth() + 1).toString().padStart(2, '0')}/${dateGarantie.getDate().toString().padStart(2, '0')}`);
    } else {
      tecnicienInput.required = true;
      tecnicienInput.disabled = false;
      tecnicienContainer.classList.remove("hidden");
      alert(`Cet matériel est hors garantie, donc la réparation est faite par le technicien.`);
    }
  }
</script>




<div class="mb-5">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">observation</label>
    <input type="text" id="Date"  value="<?= $data['ReparationInfo'][0]->Obs ?>" name="observation" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light"  required />
  </div>





  <div class="mb-5">
  <label for="EtatReparation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">sélectionner l'état de réparation</label>
  <select id="EtatReparation" name="EtatReparation" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light" required>
    <option value="" selected disabled>sélectionner s'il vous plaît</option>
    <?php
    foreach($data['EtatReparation'] as $EtatReparation) : ?>
        <option value="<?= $EtatReparation["CodeEtat"]; ?>"
        <?php if($EtatReparation["Designation"] === $data['ReparationInfo'][0]->etatRepDesignation){echo "selected";} ?>
        > 
        <?= $EtatReparation["Designation"]; ?>
        </option>
    <?php endforeach; ?>
  </select>
  </div>






<div class="flex justify-between">

    <a class="text-white bg-gray-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center" href="index.php?page=reparation&action=index">
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