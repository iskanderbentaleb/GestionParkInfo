<?php
$title_page = "LISTE DES RÉFORMÉS";
ob_start(); // this is for geting a variable as text and with html and php to get long code and put it on variable
?>


<div x-data="MatreilsFilter()" x-init="
    fetch('http://localhost/GESTIONPARKINFO/App/Controllers/Api/ReformeApi.php')
    .then(response => response.json())
    .then(response => {
        Reformes = response.data;
        Matreil = response.Matreil;
        caracteristiques = response.caracteristique;
    })">





<div class="flex justify-between p-4">

<!-- Search Input -->
<input type="text" x-model="searchQuery" placeholder="chercher..." class="p-2 rounded border-gray-300 focus:outline-none focus:border-gray-800 flex-grow w-full lg:w-96">

<a href="index.php?page=reforme&action=create">
    <button style="background-color: #F08100;" class="text-black text-white p-2 rounded">
        Ajouter
    </button>
</a>

</div>




    <div class="relative overflow-x-auto p-4" x-show="!isLoading">

        <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400 rounded-xl ">
            <!-- Table header -->
            <thead class="text-xs text-gray-700 uppercase bg-gray-900 text-white ">
                <tr>
                    <th scope="col" class="px-6 py-3">Code</th>
                    <th scope="col" class="px-6 py-3">Date réforme</th>
                    <th scope="col" class="px-6 py-3 text-left">Action</th>
                </tr>
            </thead>
            <!-- Table body -->
            <tbody>



                <template x-for="Reforme in filteredInventaires" :key="Reforme.CodeRef">
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 ">
                        <td class="px-6 py-4" x-text="Reforme.CodeRef"></td>
                        <td class="px-6 py-4" x-text="Reforme.Date"></td>

                        <td class="p-2 flex">

                                <button 
                                    class="font-medium mr-5 bg-gray-100 p-4 rounded-xl text-blue-700 dark:text-blue-500 hover:underline" 
                                    type="button"
                                    data-modal-target="default-modal" 
                                    x-on:click="openModal(Reforme.CodeRef)">
                                    <img src="../images/moree.svg" width="22">
                                </button>



                            <a x-bind:href="'index.php?page=reforme&CodeRef=' + Reforme.CodeRef + '&action=edit'" class="font-medium mr-5 bg-gray-100 p-4 rounded-xl text-blue-700 dark:text-blue-500 hover:underline">
                                <img src="../images/update.svg" width="20" alt="update">
                            </a>
                            <button x-on:click="DeleteRecordValidation('index.php?page=reforme&CodeRef=' + Reforme.CodeRef + '&action=destroy')" class="font-medium mr-5 bg-gray-100 p-4 rounded-xl text-blue-700 dark:text-blue-500 hover:underline">
                                <img src="../images/delete.svg" width="20" alt="delete">
                            </button>

                        </td>
                    </tr>
                </template>

            </tbody>
        </table>
    </div>
</div>


<div id="dialog-message">

</div>




<script>



    function MatreilsFilter() {
        return {
            Reformes: [],
            caracteristiques : [] ,
            Matreil : [] ,
            isLoading: false,
            searchQuery: '',

            get filteredInventaires() {
                if (!this.searchQuery.trim()) {
                    return this.Reformes;
                } else {
                    const query = new RegExp(this.searchQuery.trim(), 'i'); // 'i' for case-insensitive
                    return this.Reformes.filter(Reforme =>
                        query.test(Reforme.CodeRef) ||
                        query.test(Reforme.Date)
                    );
                }
            },





            openModal(CodeDech) {



                const filteredMatreilADecharges = this.Matreil.filter(MatreilADecharge =>
                    MatreilADecharge.CodeRef === CodeDech
                );


                // Initialize caracteristiques string
                let MatreilADechargesss = '';

                // Construct HTML table string
                let tableHTML = '<div class="table-responsive border-gray-300 m-5 p-3"><table class="table table-bordered"><thead><tr><th class="p-3 border">SSH</th><th class="p-3 border">TypeMat</th><th class="p-3 border">Marque</th><th class="p-3 border">Caracteristiques</th></tr></thead><tbody>';

                // Iterate through filteredMatreilADecharges
                filteredMatreilADecharges.forEach(MatreilADecharge => {
                    // Add a new row to the HTML table
                    tableHTML += '<tr>';
                    tableHTML += '<td class="p-3 border">' + MatreilADecharge.SSH + '</td>';
                    tableHTML += '<td class="p-3 border">' + MatreilADecharge.Type + '</td>';
                    tableHTML += '<td class="p-3 border">' + MatreilADecharge.Marque + '</td>';
                    // tableHTML += '<td class="p-3 border">' + MatreilADecharge.DateGarantie + '</td>';
                    // tableHTML += '<td class="p-3 border">' + MatreilADecharge.DateRec + '</td>';
                    // tableHTML += '<td class="p-3 border">' + MatreilADecharge.DurreeVie + ' ans' + '</td>';

                    // Filter characteristics based on SSH
                    const filteredCharacteristics = this.caracteristiques.filter(characteristic =>
                        characteristic.SSH === MatreilADecharge.SSH
                    );

                    // Initialize string for characteristic designations
                    let characteristicString = '';

                    // Concatenate characteristic designations to characteristicString
                    filteredCharacteristics.forEach((characteristic, index) => {
                        characteristicString += characteristic.Designation;
                        // Add a comma after each characteristic except the last one
                        if (index < filteredCharacteristics.length - 1) {
                            characteristicString += ', ';
                        }
                    });

                    // Add characteristicString to the table row
                    tableHTML += '<td class="p-3 border">' + characteristicString + '</td>';

                    // Close the table row
                    tableHTML += '</tr>';
                });

                // Close the table body and table tags
                tableHTML += '</tbody></table></div>';



                // --------------- show the dialog --------------------- 
                // Show dialog with concatenated characteristic designations including HTML line breaks
                $(function() {
                    $("#dialog-message").html(tableHTML).dialog({
                        modal: true,
                        title: "Matériel Réformé",
                        width: 780, // Set the width
                        height: 600, // Set the height
                        buttons: {
                            Fermer: function() {
                                $(this).dialog("close");
                            }
                        }
                    });
                });


                }







            


        };
    }




    window.onclick = function(event) {
        const modal = document.getElementById('default-modal');
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };


    
</script>



<!-- delte validation -->
<script src="js/DeleteRecordValidation.js" ></script>
<!-- delte validation -->







<?php 
$contant = ob_get_clean();// this is for geting a variable as text and with html and php to get long code and put it on variable 
require_once(__DIR__ . '/../layout.php');
?>