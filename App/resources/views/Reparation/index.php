<?php
$title_page = "LISTE DES Réparation";
ob_start(); // this is for geting a variable as text and with html and php to get long code and put it on variable
?>


<div x-data="MatreilsFilter()" x-init="
    fetch('http://localhost/GESTIONPARKINFO/App/Controllers/Api/ReparationApi.php')
    .then(response => response.json())
    .then(response => {
        Reparation = response.data;
        piece = response.PieceReparations;
    })">





<div class="flex justify-between p-4">

<!-- Search Input -->
<input type="text" x-model="searchQuery" placeholder="chercher..." class="p-2 rounded border-gray-300 focus:outline-none focus:border-gray-800 flex-grow w-full lg:w-96">

<a href="index.php?page=reparation&action=create">
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
                    <th scope="col" class="px-6 py-3">Date</th>
                    <th scope="col" class="px-6 py-3">Matériel</th>
                    <th scope="col" class="px-6 py-3">observation</th>
                    <th scope="col" class="px-6 py-3">état</th>
                    <th scope="col" class="px-6 py-3">Réparer par</th>
                    <th scope="col" class="px-6 py-3 text-left">Action</th>
                </tr>
            </thead>
            <!-- Table body -->
            <tbody>



                <template x-for="Reparation in filteredInventaires" :key="Reparation.CodeRep">
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 ">
                        <td class="px-6 py-4" x-text="Reparation.CodeRep"></td>
                        <td class="px-6 py-4" x-text="Reparation.Date"></td>
                        <td class="px-6 py-4" >
                            <span x-text="Reparation.SSH" class="bg-green-600 p-2 rounded text-white"></span>
                            <span x-text="Reparation.MatreilType" class="bg-green-500 p-2 rounded text-white"></span>
                            <span x-text="Reparation.MatreilMarque" class="bg-green-400 p-2 rounded text-white"></span>
                        </td>
                        <td class="px-6 py-4" x-text="Reparation.Obs"></td>
                        <td class="px-6 py-4" ><span x-text="Reparation.etatRepDesignation" class="bg-gray-800 p-2 rounded text-white"></span></td>
                        
                        <td class="px-6 py-4">
                            <template x-if="Reparation.StrDesignation">
                                <span x-text="Reparation.StrDesignation" class="border border-red-800 text-red-800 p-2 rounded"></span>
                            </template>
                            <template x-if="!Reparation.StrDesignation">
                                <span x-text="'Fournisseur : ' + Reparation.CodeUt" class="bg-blue-800 p-2 rounded text-white"></span>
                            </template>
                            <span x-show="Reparation.StrDesignation" x-text="Reparation.RollDesignation" class="bg-red-700 p-2 rounded text-white"></span>
                            <span x-show="Reparation.StrDesignation" x-text="Reparation.Nom + ' ' + Reparation.Prenom" class="bg-red-600 p-2 rounded text-white"></span>
                            <span x-show="Reparation.StrDesignation" x-text="'POST : ' + Reparation.Post" class="bg-red-500 p-2 rounded text-white"></span>
                        </td>

                        

                        <td class="p-2 flex">

                                <button 
                                    x-show="Reparation.MatreilCodeRef === null"
                                    class="font-medium mr-5 bg-gray-100 p-4 rounded-xl text-blue-700 dark:text-blue-500 hover:underline" 
                                    type="button"
                                    data-modal-target="default-modal" 
                                    x-on:click="openModal(Reparation.CodeRep)">
                                    <img src="../images/moree.svg" width="22">
                                </button>



                                <a x-show="Reparation.MatreilCodeRef === null" :href="'index.php?page=reparation&CodeRep=' + Reparation.CodeRep + '&action=edit'" class="font-medium mr-5 bg-gray-100 p-4 rounded-xl text-blue-700 dark:text-blue-500 hover:underline">
                                    <img src="../images/update.svg" width="20" alt="update">
                                </a>
                                <button x-show="Reparation.MatreilCodeRef === null" @click="DeleteRecordValidation('index.php?page=reparation&CodeRep=' + Reparation.CodeRep + '&action=destroy')" class="font-medium mr-5 bg-gray-100 p-4 rounded-xl text-blue-700 dark:text-blue-500 hover:underline">
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
            Reparation: [],
            caracteristiques : [] ,
            Matreil : [] ,
            isLoading: false,
            searchQuery: '',

            get filteredInventaires() {
                if (!this.searchQuery.trim()) {
                    return this.Reparation;
                } else {
                    const query = new RegExp(this.searchQuery.trim(), 'i'); // 'i' for case-insensitive
                    return this.Reparation.filter(Reparation =>
                        query.test(Reparation.CodeRep) ||
                        query.test(Reparation.Date) ||
                        query.test(Reparation.Obs) ||
                        query.test(Reparation.etatRepDesignation) ||
                        query.test(Reparation.SSH) ||
                        query.test(Reparation.MatreilType) ||
                        query.test(Reparation.MatreilMarque) ||
                        query.test(Reparation.Prenom) ||
                        query.test(Reparation.Nom) ||
                        query.test(Reparation.CodeUt)
                    );
                }
            },





            openModal(CodeRep) {
                // Fetch the "PieceReparations" data based on the provided CodeRep
                const pieceReparations = piece.filter(piece => piece.CodeReparation === CodeRep);

                // Initialize HTML string for the pieces of repair
                let pieceReparationsHTML = '<div class="p-5">';

                // Add a header for the list
                pieceReparationsHTML += '';

                // Iterate through the "PieceReparations" data to construct HTML representing the pieces of repair
                pieceReparations.forEach(piece => {
                    pieceReparationsHTML += '<p class="mb-2"> => ' + piece.Qty + ' x ' + piece.Designation + '</p> </br>';
                    
                });

                // Close the div tag
                pieceReparationsHTML += '</div>';


                // Close the table body and table tags
                pieceReparationsHTML += '</tbody></table></div>';

                // Show the dialog with the concatenated pieceReparationsHTML
                $(function() {
                    $("#dialog-message").html(pieceReparationsHTML).dialog({
                        modal: true,
                        title: "Pieces de Réparation",
                        width: 330, // Set the width
                        height: 300, // Set the height
                        buttons: {
                            Modifier: function() {
                                window.location.href = 'index.php?page=PieceaReparation&action=edit&CodeRep=' + CodeRep;
                            },
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