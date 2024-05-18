<?php
$title_page = "Modification d'un Piece de Reparation N = " . $_GET['CodeRep'] ;
ob_start(); // this is for geting a variable as text and with html and php to get long code and put it on variable
?>





<form class="max-w-sm  mx-auto mt-10 " action="index.php?page=PieceaReparation&action=update" method="post">
    


<input type="text" name="CodeRep" value="<?php echo $_GET['CodeRep']; ?>" required hidden>


<div class="mb-5">
  <label for="Piece" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sélectionner les pièces</label>
  <select name="Piece" id="Piece" multiple="multiple" class="select2 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light" style="height: 500px;" required onchange="tet()">
      <?php foreach ($data['Piece'] as $Piece): ?>
        <option value="<?= $Piece['CodePc']; ?>" data-designation="<?= $Piece["Designation"]; ?>" 
            <?php foreach ($data['PieceReparationSelected'] as $reparationPiece): ?>
                <?php if ($Piece['CodePc'] == $reparationPiece['CodePiece']): ?>
                    selected
                <?php endif; ?>
            <?php endforeach; ?>>
            <?= $Piece["Designation"]; ?>
        </option>
      <?php endforeach; ?>
  </select>
</div>

<!-- Script to initialize Select2 and add input fields for quantity -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/fr.min.js"></script>
<script>
function tet() {
  // Clear previously generated input fields
  $('#quantityInputs').empty();
  
  // Get selected options
  var selectedOptions = $('#Piece').val();
  
  // Generate input fields for each selected option
  selectedOptions.forEach(function(option) {
    // Get the designation for this option
    var designation = $('#Piece option[value="' + option + '"]').data('designation');
    
    // Find the corresponding piece in PieceReparationSelected
    var quantity = getQuantity(option);
    
    // Append input field with filled quantity
    $('#quantityInputs').append('<div class="mb-3"><label for="' + option + '" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Quantité pour ' + designation + '</label><input required type="number" name="quantity[' + option + ']" id="' + option + '" value="' + quantity + '" class="input-number shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light"></div>');
  });
}

// Function to get the quantity for a given option
function getQuantity(option) {
  // Loop through the PieceReparationSelected array to find the corresponding piece
  for (var i = 0; i < <?= json_encode($data['PieceReparationSelected']) ?>.length; i++) {
    if (<?= json_encode($data['PieceReparationSelected']) ?>[i].CodePiece == option) {
      return <?= json_encode($data['PieceReparationSelected']) ?>[i].Qty;
    }
  }
  // Return 0 if the quantity is not found
  return 0;
}


$(document).ready(function() {
    tet();
  });


</script>

<!-- Container to hold dynamically generated input fields for quantity -->
<div id="quantityInputs"></div>








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