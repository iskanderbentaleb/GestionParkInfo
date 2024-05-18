<?php
$title_page = "liste de matériel";
ob_start(); // this is for geting a variable as text and with html and php to get long code and put it on variable
?>


<div x-data="MatreilsFilter()" x-init="
    fetch('http://localhost/GESTIONPARKINFO/App/Controllers/Api/MatreilApi.php')
    .then(response => response.json())
    .then(response => {
        matreils = response.data;
        caracteristiques = response.caracteristiques; 
        reforms = response.caracteristiques; 
        Reparations = response.Reparations; 
        Decharges = response.Decharges; 
        PeaceReparation = response.PeaceReparation;
    })">





<div class="flex justify-between p-4">

<!-- Search Input -->
<input type="text" x-model="searchQuery" placeholder="chercher..." class="p-2 rounded border-gray-300 focus:outline-none focus:border-gray-800 flex-grow w-full lg:w-96">

<a href="index.php?page=matreil&action=create">
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
                    <th scope="col" class="px-6 py-3">SSH</th>
                    <th scope="col" class="px-6 py-3">La Marque</th>
                    <th scope="col" class="px-6 py-3">Le Type</th>
                    <th scope="col" class="px-6 py-3">Le Prix</th>
                    <th scope="col" class="px-6 py-3">La durée de vie</th>
                    <th scope="col" class="px-6 py-3">Date réception</th>
                    <th scope="col" class="px-6 py-3">Garantie jusqu'à</th>
                    <th scope="col" class="px-6 py-3">Fournisseur Email</th>
                    <th scope="col" class="px-6 py-3">Code Facture</th>
                    <th scope="col" class="px-6 py-3">Code Commande</th>
                    <th scope="col" class="px-6 py-3">Bon de Livraison</th>
                    <th scope="col" class="px-6 py-3">État</th>
                    <th scope="col" class="px-6 py-3">Réparations</th>
                    <th scope="col" class="px-6 py-3 text-left">Action</th>
                </tr>
            </thead>
            <!-- Table body -->
            <tbody>






                            


                <template x-for="matreil in filteredMatreils" :key="matreil.SSH">
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 ">
                        <td class="px-6 py-4" x-text="matreil.SSH"></td>
                        <td class="px-6 py-4" x-text="matreil.Marque"></td>
                        <td class="px-6 py-4" x-text="matreil.Type"></td>
                        <td class="px-6 py-4" x-text="matreil.Prix"></td>
                        <td class="px-6 py-4" x-text="matreil.DurreeVie + ' ans'"></td>
                        <td class="px-6 py-4" x-text="matreil.DateRec"></td>
                        <td class="px-6 py-4" x-text="matreil.DateGarantie"></td>
                        <td class="px-6 py-4">
                            <span x-text="matreil.fourEmail" class="p-2 rounded bg-blue-600 text-white"></span>
                        </td>

                        <td>
                            <span x-text="matreil.CodeFacteur" class="p-2 rounded bg-gray-500 text-white"></span>
                        </td>

                        <td>
                            <span x-text="matreil.CodeCommande" class="p-2 rounded bg-gray-500 text-white"></span>
                        </td>

                        <td>
                            <span x-text="matreil.BonlivraisonStatue"
                                :class="{
                                    'bg-green-500': matreil.BonlivraisonStatue === 'Livré',
                                    'bg-red-500': matreil.BonlivraisonStatue === 'Rejeté',
                                    'bg-yellow-400': matreil.BonlivraisonStatue === 'En Attend',
                                }"
                                class="p-1 rounded text-white">
                            </span>
                            <span x-text="matreil.CodeBL" class="p-1 rounded bg-gray-500 text-white"></span>
                        </td>
                        

                        <td>
                            <span x-text="matreil.CodeRef === null ? getStatus(matreil.SSH) : 'Réformé'"
                                :class="{
                                    'bg-red-500': matreil.CodeRef !== null || getStatusColor(matreil.SSH) === 'red',
                                    'bg-yellow-400': matreil.CodeRef === null && getStatusColor(matreil.SSH) === 'yellow',
                                    'bg-green-500': matreil.CodeRef === null && getStatusColor(matreil.SSH) === 'green'
                                }"
                                class="p-1 rounded text-white">
                            </span>
                        </td>



                        <td>
                                <button 
                                    class=" bg-gray-100 p-2 rounded-xl" 
                                    type="button"
                                    data-modal-target="default-modal" 
                                    x-on:click="reparationModal(matreil.SSH)">
                                    <img src="../images/reparation.svg" width="22">
                                </button>
                        </td>


                        <td class="p-2 flex">

                                <button 
                                    class="font-medium mr-5 bg-gray-100 p-4 rounded-xl text-blue-700 dark:text-blue-500 hover:underline" 
                                    type="button"
                                    data-modal-target="default-modal" 
                                    x-on:click="openModal(matreil.SSH)">
                                    <img src="../images/moree.svg" width="22">
                                </button>



                            <a x-bind:href="'index.php?page=matreil&SSH=' + matreil.SSH + '&action=edit'" class="font-medium mr-5 bg-gray-100 p-4 rounded-xl text-blue-700 dark:text-blue-500 hover:underline">
                                <img src="../images/update.svg" width="20" alt="update">
                            </a>
                            <button x-on:click="DeleteRecordValidation('index.php?page=matreil&SSH=' + matreil.SSH + '&action=destroy')" class="font-medium mr-5 bg-gray-100 p-4 rounded-xl text-blue-700 dark:text-blue-500 hover:underline">
                                <img src="../images/delete.svg" width="20" alt="delete">
                            </button>

                        </td>
                        
                    </tr>
                </template>

            </tbody>
        </table>
    </div>
</div>


<div id="dialog-message" title="Les Caracteristiques">

</div>









<script>
function getStatus(SSH) {

    const relevantDecharges = Decharges.filter(decharge => decharge.SSH === SSH);

    if (relevantDecharges.length === 0) {
        return 'En stock';
    }

    const maxDecharge = relevantDecharges.reduce((max, current) => {
        return (!max || current.CodeDech > max.CodeDech) ? current : max;
    }, null);

    const isReserved = maxDecharge && maxDecharge.Dechtype === "Decharge";

    return isReserved ? 'Réservé' : 'En stock';
}



function getStatusColor(SSH) {

    const relevantDecharges = Decharges.filter(decharge => decharge.SSH === SSH);

    if (relevantDecharges.length === 0) {
        return 'green';
    }

    const maxDecharge = relevantDecharges.reduce((max, current) => {
        return (!max || current.CodeDech > max.CodeDech) ? current : max;
    }, null);

    const isReserved = maxDecharge && maxDecharge.Dechtype === "Decharge";

    return isReserved ? 'yellow' : 'green';
}


</script>






<script>



    function MatreilsFilter() {
        return {
            matreils: [],
            caracteristiques : [] ,
            Reparations : [] ,
            PeaceReparation : [] ,

            isLoading: false,
            searchQuery: '',

            get filteredMatreils() {
                if (!this.searchQuery.trim()) {
                    return this.matreils;
                } else {
                    const query = new RegExp(this.searchQuery.trim(), 'i'); // 'i' for case-insensitive
                    return this.matreils.filter(matreil =>
                        query.test(matreil.SSH) ||
                        query.test(matreil.Marque) ||
                        query.test(matreil.Type) ||
                        query.test(matreil.Prix.toString()) ||
                        query.test(matreil.DurreeVie.toString()) ||
                        query.test(matreil.DateRec) ||
                        query.test(matreil.DateGarantie) ||
                        query.test(matreil.fourEmail) ||
                        query.test(matreil.CodeFacteur) ||
                        query.test(matreil.CodeCommande) ||
                        query.test(matreil.CodeBL) ||
                        query.test(matreil.BonlivraisonStatue) 
                    );
                }
            },

            get filteredcaracteristiques() {
                return this.caracteristiques;
            },

            openModal(SSH) {
                // Filter characteristics based on SSH
                const filteredCharacteristics = this.caracteristiques.filter(characteristic =>
                    characteristic.SSH === SSH
                );

                // Initialize caracteristiques string
                let caracteristiques = '';

                // Iterate through filtered characteristics
                filteredCharacteristics.forEach(characteristic => {
                    // Concatenate characteristic designation to caracteristiques string with HTML line breaks
                    caracteristiques += ' - ' + characteristic.Designation + '<br>';
                });



                // --------------- show the dialog --------------------- 
                // Show dialog with concatenated characteristic designations including HTML line breaks
                $(function() {
                    $("#dialog-message").html(caracteristiques).dialog({
                        modal: true,
                        title: "Les Caractéristiques",
                        width: "300", 
                        height: "300",
                        buttons: {
                            Fermer: function() {
                                $(this).dialog("close");
                            }
                        }
                    });
                });
            },

            









            reparationModal(SSH) {
                const filteredReparations = this.Reparations.filter(reparation => 
                    reparation.SSH === SSH
                );

                // Construct an HTML table to display the Reparations data
                let tableHTML = '<div class="table-responsive border-gray-300 m-5 p-3"><table class="table table-bordered"><thead><tr><th class="p-3 border">Date</th><th class="p-3 border">Observations</th><th class="p-3 border">Réparé Par</th><th class="p-3 border">État</th><th class="p-3 border">Pièce de Réparation</th></tr></thead><tbody>';

                // Iterate through filtered Reparations
                filteredReparations.forEach(reparation => {
                    tableHTML += '<tr>';
                    tableHTML += '<td class="p-3 border">' + reparation.Date + '</td>';
                    tableHTML += '<td class="p-3 border">' + reparation.Obs + '</td>';

                    // Check if the item was repaired by a technician or a supplier
                    if (reparation.Nom) {
                        tableHTML += 
                        '<td class="p-3 border">' +
                        '<span class="border border-red-800 text-red-800 p-1 rounded">' + reparation.StrDesignation + '</span> ' + 
                        '<span class="bg-red-700 p-1 rounded text-white">' + reparation.RollDesignation + '</span> ' + 
                        '<span class="bg-red-600 p-1 rounded text-white">' + reparation.Nom + ' ' + reparation.Prenom + '</span> ' + 
                        '<span class="bg-red-500 p-1 rounded text-white">' + 'POST : ' + reparation.Post + '</span> ' + 
                        '</td>';
                    } else {
                        tableHTML += 
                        '<td class="p-3 border">' +
                        '<span class="bg-blue-800 p-1 rounded text-white">' + 'Fournisseur : ' + reparation.CodeUt + '</span> ' + 
                        '</td>';
                    }


                        let colorClass;
                        let textColor;
                        switch(reparation.etatRepDesignation) {
                            case 'En réparation':
                                colorClass = 'bg-yellow-400';
                                break;
                            case 'Reparé':
                                colorClass = 'bg-green-500';
                                break;
                            case 'Réparation échec':
                                colorClass = 'bg-red-600';
                                break;
                            default:
                                colorClass = 'bg-transparent';
                        }
                        tableHTML += '<td class="p-3 border"><span class="p-1 rounded text-white ' + colorClass + '">' + reparation.etatRepDesignation + '</span></td>';

                    // Find the pieces used for this repair
                    const pieces = this.PeaceReparation.filter(piece => 
                        piece.CodeReparation === reparation.CodeRep
                    ).map(piece => `${piece.Designation} (Qty: ${piece.Qty})`).join(', ');

                    // Add column for pieces used in the repair
                    tableHTML += '<td class="p-3 border">' + (pieces || ' ') + '</td>';

                    tableHTML += '</tr>';
                });

                tableHTML += '</tbody></table></div>';

                // Show the dialog with the constructed table
                $(function() {
                    $("#dialog-message").html(tableHTML).dialog({
                        modal: true,
                        title: "Détails des Réparations",
                        width: "auto", // Adjust width based on the content
                        height: "auto", // Adjust height based on the content
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




</script>



<!-- delte validation -->
<script src="js/DeleteRecordValidation.js" ></script>
<!-- delte validation -->







<?php 
$contant = ob_get_clean();// this is for geting a variable as text and with html and php to get long code and put it on variable 
require_once(__DIR__ . '/../layout.php');
?>