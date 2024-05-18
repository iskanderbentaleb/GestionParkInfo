<?php
$title_page = "Création d'un nouveau COMMANDE";
ob_start(); // this is for geting a variable as text and with html and php to get long code and put it on variable
?>




<form class="mx-auto mt-10 p-8" action="index.php?page=commandes&action=store" method="post">
    
  <!-- Commande Information -->
  <div class="flex ">


  <input type="text" name="codeCommande" value="<?php echo $data['CodeCommandeGeneration']; ?>" required hidden>

  <div class="mr-5" style="width: 33%;">
      <label for="typeCommande" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Code Commande</label>
      <input type="text" value="<?php echo $data['CodeCommandeGeneration']; ?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light" required disabled>
  </div>


  <div class="mr-5" style="width: 33%;">
      <label for="typeCommande" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type de Commande</label>
      <select name="typeCommande" id="typeCommande" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light" required>
          <option value="" selected disabled>sélectionner le type de commande</option>
            <?php
            foreach($data['CommandeTypes'] as $dataCommandeTypes) : ?>
                <option value="<?= $dataCommandeTypes["CodeType"] ; ?>"> 
                <?= $dataCommandeTypes["Designation"] ; ?>
                </option>
            <?php endforeach; ?>  
          </select>
  </div>

  <div class="mr-5" style="width: 33%;">
  <label for="fournisseur" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fournisseur</label>
    <select name="fournisseur" id="fournisseur" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light" required>
    
    <option value="" selected disabled>sélectionner le fournisseur</option>
    <?php
    foreach($data['fournisseurs'] as $datafournisseur) : ?>
        <option value="<?= $datafournisseur["CodeFour"] ; ?>"> 
        <?= $datafournisseur["Nom"] . " " . $datafournisseur["Prenom"]; ?>
        </option>
    <?php endforeach; ?>  
    </select>
  </div>

  
  <div style="width: 33%;">
    <label for="dateCommande" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date de Commande</label>
    <input type="date" value="<?php echo date('Y-m-d'); ?>" name="dateCommande" id="dateCommande" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 dark:shadow-sm-light" disabled/>
  </div>

  
</div>











<div class="mt-5 mb-5 flex justify-between items-center  rounded">
  <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">Contenu de la Commande</label>
</div>

<div id="content-container">
  <!-- Default content item -->
  <div class="content-item flex items-center mb-4">



    <!-- Materiel Type dropdown -->
    <select name="materielType[]" class="materielType form-select mr-2 flex-1 py-2 px-4 rounded-lg focus:outline-none" required >
        <option value="" selected disabled>Choisissez un type de matériel</option>
        <?php
        foreach($data['MatreilTypes'] as $dataMatreilTypes) : ?>
            <option value="<?= $dataMatreilTypes["CodeType"] ; ?>"> 
            <?= $dataMatreilTypes["Designation"] ; ?>
            </option>
        <?php endforeach; ?>  
    </select>

    <!-- Marque dropdown -->
    <select name="marque[]" class="marque form-select mr-2 flex-1 py-2 px-4 rounded-lg focus:outline-none" required>
      <option value="" selected disabled>Choisissez un marque</option>
        <?php
        foreach($data['Marques'] as $dataMarques) : ?>
            <option value="<?= $dataMarques["CodeMrq"] ; ?>"> 
            <?= $dataMarques["Designation"] ; ?>
            </option>
        <?php endforeach; ?>  
    </select>

    <!-- Qty input -->
    <input type="number" min="1" value="" name="qty[]" class="qty form-input flex-1 py-2 px-4 rounded-lg focus:outline-none" placeholder="Qty" required>

    <!-- Delete button -->

    <!-- Ajouter button -->
    <button type="button" id="add-content-item" class="add-content-item bg-blue-500 text-white font-medium rounded-lg text-sm px-3 py-2 ml-2" hidden>Ajouter</button>
    <button type="button" id="delete-button" class="delete-button bg-red-500 text-white font-medium rounded-lg text-sm px-3 py-2 ml-2" style="display: none;"">x</button>
  
  </div>
</div>



    <!-- You can add more content items dynamically using JavaScript -->
    
  </div>

  <div class="flex justify-end mt-10">
  <a class="text-white bg-gray-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2" href="index.php?page=commandes&action=index">Annuler</a> 
  <button style="background-color: #F08100" type="submit" class="text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center">Ajouter</button>
  </div>



</form>

<!-- You'll need to add JavaScript to handle dynamic addition/removal of content items -->



<script src="js/DateValidation.js"></script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
  var deleteButton = document.getElementById("delete-button");
  var ajouterButton = document.getElementById("add-content-item");

  // deleteButton.addEventListener("click", function() {
  //     });

  // Add event listener for adding content
  document.getElementById("add-content-item").addEventListener("click", function() {
    addContentItem();
  });


  // Add event listener for deleteing content
  document.getElementById("delete-button").addEventListener("click", function() {
    deleteContentItem();
  });


  // Function to add content item
  function addContentItem() {


    // var matreiltypes = document.getElementsByClassName("materielType");
    // var lastmatreiltype = matreiltypes[matreiltypes.length - 1];
    // lastmatreiltype.readOnly =true;
    
    // var marqueInputs = document.getElementsByClassName("marque");
    // var lastMarqueInput = marqueInputs[marqueInputs.length - 1];
    // lastMarqueInput.readOnly =true;

    // var qtyInputs = document.getElementsByClassName("qty");
    // var lastqtyInput = qtyInputs[qtyInputs.length - 1];
    // lastqtyInput.readOnly =true;




    deleteButton.style.display = "block";




    var contentContainer = document.getElementById("content-container");

    // Create a new content item div
    var newContentItem = document.createElement("div");
    newContentItem.className = "content-item flex items-center mb-4";

    // Add materielType dropdown
    var materielTypeInput = document.createElement("select");
    materielTypeInput.name = "materielType[]";
    materielTypeInput.className = "materielType form-select mr-2 flex-1 py-2 px-4 rounded-lg focus:outline-none";
    materielTypeInput.required = true;
    // Add placeholder option for materielType dropdown
    var materielTypePlaceholderOption = document.createElement("option");
    materielTypePlaceholderOption.value = ""; // Set the value attribute
    materielTypePlaceholderOption.textContent = "Choisissez un type de matériel";
    materielTypePlaceholderOption.selected = true; // Set the selected attribute
    materielTypePlaceholderOption.disabled = true; // Set the disabled attribute
    materielTypeInput.appendChild(materielTypePlaceholderOption);
    // Add options for materielType dropdown



    // materielTypeInput.addEventListener("change", function() {
    //   // updateMarqueOptions(this.value);
    //   alert('hello wod');
    // });



  <?php
    $materielTypeOptions = [];
    foreach ($data['MatreilTypes'] as $dataMatreilTypes) {
        $materielTypeOptions[] = [
            'id' => $dataMatreilTypes['CodeType'],
            'name' => $dataMatreilTypes['Designation']
        ];
    }
  ?>

    var materielTypeOptions = <?php echo json_encode($materielTypeOptions); ?>;


    for (var i = 0; i < materielTypeOptions.length; i++) {
      var option = document.createElement("option");
      option.value = materielTypeOptions[i].id;
      option.textContent = materielTypeOptions[i].name;
      materielTypeInput.appendChild(option);
    }

    // Add marque dropdown
    var marqueInput = document.createElement("select");
    marqueInput.name = "marque[]";
    marqueInput.className = "marque form-select mr-2 flex-1 py-2 px-4 rounded-lg focus:outline-none";
    marqueInput.required = true;
    // Add placeholder option for marque dropdown
    var marquePlaceholderOption = document.createElement("option");
    marquePlaceholderOption.value = ""; // Set the value attribute
    marquePlaceholderOption.textContent = "Choisissez une marque";
    marquePlaceholderOption.selected = true; // Set the selected attribute
    marquePlaceholderOption.disabled = true; // Set the disabled attribute
    marqueInput.appendChild(marquePlaceholderOption);








    <?php
      $marqueOptions = [];
      foreach ($data['Marques'] as $dataMarques) {
          $marqueOptions[] = [
              'id' => $dataMarques['CodeMrq'],
              'name' => $dataMarques['Designation']
          ];
      }
    ?>

    var marqueOptions = <?php echo json_encode($marqueOptions); ?>;

    for (var i = 0; i < marqueOptions.length; i++) {
      var option = document.createElement("option");
      option.value = marqueOptions[i].id;
      option.textContent = marqueOptions[i].name;
      marqueInput.appendChild(option);
    }




    // Add qty input
    var qtyInput = document.createElement("input");
    qtyInput.type = "number";
    qtyInput.name = "qty[]";
    qtyInput.className = "qty form-input flex-1 py-2 px-4 rounded-lg focus:outline-none";
    qtyInput.placeholder = "Qty";
    qtyInput.value = '';
    qtyInput.min = 1;
    qtyInput.required = true;

    // Append inputs and buttons to the content item
    newContentItem.appendChild(materielTypeInput);
    newContentItem.appendChild(marqueInput);
    newContentItem.appendChild(qtyInput);

    // Append the new content item to the content container
    contentContainer.appendChild(newContentItem);

    // Move Ajouter button to the next content item
    moveAjouterButton();



    changeSelectMarque();
    



  }

  changeSelectMarque();












  function changeSelectMarque(){
    var marqueInputs = document.getElementsByClassName("marque");
    var lastMarqueInput = marqueInputs[marqueInputs.length - 1]; // Select the last element
    var ajouterButton = document.getElementById("add-content-item");

    // Attach event listener to the last marqueInput
    lastMarqueInput.addEventListener("change", function() {
      // alert(this.value); // Retrieve the value when the user selects an option
      ajouterButton.hidden = false;
    });
  }














  function moveAjouterButton() {
    var contentItems = document.querySelectorAll(".content-item");
    var ajouterButton = document.getElementById("add-content-item");
    var deleteButton = document.querySelector(".delete-button");

    // Remove Ajouter button from its current position
    ajouterButton.parentNode.removeChild(ajouterButton);

    // Get the new last content item
    var lastContentItem = contentItems[contentItems.length - 1];

    // Append Ajouter button to the new last content item
    lastContentItem.appendChild(ajouterButton);

    // Check if delete button exists in the previous content item
    var previousContentItem = contentItems[contentItems.length - 1];
    if (!previousContentItem.querySelector(".delete-button")) {
      // Move delete button to the previous content item
      previousContentItem.appendChild(deleteButton);
    }


    ajouterButton.hidden =true;
  }







  function deleteContentItem(){
    var contentContainer = document.getElementById("content-container");
    var contentItems = document.querySelectorAll(".content-item");
    var lastChild = contentContainer.lastChild;
    contentContainer.removeChild(lastChild);
    var lastContentItem = contentItems[contentItems.length - 2];
    lastContentItem.appendChild(ajouterButton);
    lastContentItem.appendChild(deleteButton);
    if ( contentItems.length < 3) {
      deleteButton.style.display = "none";
    }
  }




});

</script>






<?php 
$contant = ob_get_clean();// this is for geting a variable as text and with html and php to get long code and put it on variable 
require_once(__DIR__ . '/../layout.php');
?>