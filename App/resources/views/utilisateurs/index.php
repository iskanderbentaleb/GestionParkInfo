<?php
$title_page = "Liste des employés";
ob_start(); // this is for geting a variable as text and with html and php to get long code and put it on variable
?>


<div x-data="marqueFilter()" x-init="
    fetch('http://localhost/GESTIONPARKINFO/App/Controllers/Api/UtilisateurApi.php')
    .then(response => response.json())
    .then(response => {
        utilisateurs = response.data; 
        Decharges = response.Decharges; 
        MatreilADecharges = response.MatreilADecharge; 
        caracteristiques = response.caracteristique; 
    })">



<div class="flex justify-between p-4">

<!-- Search Input -->
<input type="text" x-model="searchQuery" placeholder="chercher..." class="p-2 rounded border-gray-300 focus:outline-none focus:border-gray-800 flex-grow w-full lg:w-96">

<a href="index.php?page=utilisateur&action=create">
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
                    <th scope="col" class="px-6 py-3">Nom / Prenom</th>
                    <th scope="col" class="px-6 py-3">Date de Naissance</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Tel</th>
                    <th scope="col" class="px-6 py-3">Post</th>
                    <th scope="col" class="px-6 py-3">Fonction</th>
                    <th scope="col" class="px-6 py-3">strecture</th>
                    <th scope="col" class="px-6 py-3">Admin</th>
                    <th scope="col" class="px-6 py-3 text-left">Action</th>
                </tr>
            </thead>
            <!-- Table body -->
            <tbody>
                <template x-for="utilisateur in filteredMarques" :key="utilisateur.CodeUt">
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 ">
                        <td class="px-6 py-4" x-text="utilisateur.CodeUt"></td>
                        <td class="px-6 py-4" x-text="utilisateur.Nom + ' ' + utilisateur.Prenom"></td>
                        <td class="px-6 py-4" x-text="utilisateur.DNN"></td>
                        <td class="px-6 py-4" x-text="utilisateur.Email"></td>
                        <td class="px-6 py-4" x-text="utilisateur.Tel"></td>
                        <td class="px-6 py-4" x-text="utilisateur.Post"></td>
                        <td class="px-6 py-4" x-text="utilisateur.RollDesignation"></td>
                        <td class="px-6 py-4" x-text="utilisateur.StrDesignation"></td>
                        <td class="px-6 py-4">
                            <span x-text="utilisateur.Mdp ? 'Oui' : 'non'" :class="utilisateur.Mdp ? 'bg-green-400' : 'bg-red-500'" class="p-2 text-white rounded-xl"></span>
                        </td>

                        <td class="p-2 flex" >
               
                                <button 
                                    class="font-medium mr-5 bg-gray-100 p-4 rounded-xl text-blue-700 dark:text-blue-500 hover:underline" 
                                    type="button"
                                    data-modal-target="default-modal" 
                                    x-on:click="openModal(utilisateur.CodeUt)">
                                    <img src="../images/moree.svg" width="22">
                                </button>

                            <a x-show="!utilisateur.Mdp" x-bind:href="'index.php?page=utilisateur&CodeUt=' + utilisateur.CodeUt + '&action=edit'" class="font-medium mr-5 bg-gray-100 p-4 rounded-xl text-blue-700 dark:text-blue-500 hover:underline">
                                <img src="../images/update.svg" width="20" alt="update">
                            </a>

                            <button x-show="!utilisateur.Mdp" x-on:click="DeleteRecordValidation('index.php?page=utilisateur&CodeUt=' + utilisateur.CodeUt + '&action=destroy')" class="font-medium bg-gray-100 p-4 rounded-xl text-red-700 dark:text-blue-500 hover:underline">
                                <img src="../images/delete.svg" width="20" alt="delete">
                            </button>
 
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>
</div>







<div id="dialog-message"></div>




<script>
    function marqueFilter() {
        return {
            utilisateurs: [],
            Decharges: [],
            MatreilADecharges: [],
            caracteristiques: [],

            isLoading: false,
            searchQuery: '',

            get filteredMarques() {
                if (!this.searchQuery.trim()) {
                    return this.utilisateurs;
                } else {
                    const query = new RegExp(this.searchQuery.trim(), 'i'); // 'i' for case-insensitive
                    return this.utilisateurs.filter(utilisateur =>
                        query.test(utilisateur.CodeUt) ||
                        query.test(utilisateur.Nom) ||
                        query.test(utilisateur.Prenom) ||
                        query.test(utilisateur.DNN) ||
                        query.test(utilisateur.Email) ||
                        query.test(utilisateur.Tel) ||
                        query.test(utilisateur.Post) ||
                        query.test(utilisateur.RollDesignation) ||
                        query.test(utilisateur.StrDesignation)
                    );
                }
            },










            openModal(CodeUt) {
    // Filter Decharges for "Decharge" type
    const filteredDecharges_stDecharge = this.Decharges.filter(Decharge =>
        Decharge.CodeUtilisateur === CodeUt && Decharge.Dechtype === "Decharge"
    );

    // Filter Decharges for "Retour" type for comparison
    const filteredDecharges_stRetour = this.Decharges.filter(Decharge =>
        Decharge.CodeUtilisateur === CodeUt && Decharge.Dechtype === "Retour"
    );

    // Gather SSH from Matreil associated with "Retour" type to exclude them
    const retourSSHs = filteredDecharges_stRetour.map(retour => {
        const retourMatreil = this.MatreilADecharges.find(mat => mat.CodeDech === retour.CodeDech);
        return retourMatreil ? retourMatreil.SSH : null;
    }).filter(ssh => ssh !== null);

    // Construct HTML table string
    let tableHTML = '<div class="table-responsive border-gray-300 m-5 p-3"><table class="table table-bordered"><thead><tr><th class="p-3 border">SSH</th><th class="p-3 border">TypeMat</th><th class="p-3 border">Marque</th><th class="p-3 border">Caracteristiques</th></tr></thead><tbody>';

    // Process each "Decharge" and find corresponding matériel that is not returned
    filteredDecharges_stDecharge.forEach(Decharge => {
        // Find associated MatreilADecharge
        const MatreilADecharge = this.MatreilADecharges.find(mat => 
            mat.CodeDech === Decharge.CodeDech
        );

        // Check if the Matreil's SSH is not in the retour SSHs list
        if (MatreilADecharge && !retourSSHs.includes(MatreilADecharge.SSH)) {
            tableHTML += '<tr>';
            tableHTML += '<td class="p-3 border">' + MatreilADecharge.SSH + '</td>';
            tableHTML += '<td class="p-3 border">' + MatreilADecharge.TypeMat + '</td>';
            tableHTML += '<td class="p-3 border">' + MatreilADecharge.Marque + '</td>';

            // Filter characteristics based on SSH
            const filteredCharacteristics = this.caracteristiques.filter(characteristic =>
                characteristic.SSH === MatreilADecharge.SSH
            );

            let characteristicString = filteredCharacteristics.map(characteristic => characteristic.Designation).join(', ');

            tableHTML += '<td class="p-3 border">' + characteristicString + '</td>';
            tableHTML += '</tr>';
        }
    });

    tableHTML += '</tbody></table></div>';

    // Show the dialog
    $("#dialog-message").html(tableHTML).dialog({
        modal: true,
        title: "Matériel Employé",
        width: 780,
        height: 600,
        buttons: {
            Fermer: function() {
                $(this).dialog("close");
            }
        }
    });
}





































        };}
</script>



<!-- delte validation -->
<script src="js/DeleteRecordValidation.js" ></script>
<!-- delte validation -->







<?php 
$contant = ob_get_clean();// this is for geting a variable as text and with html and php to get long code and put it on variable 
require_once(__DIR__ . '/../layout.php');
?>