<?php
$title_page = "Liste des Commandes";
ob_start();
?>

<div x-data="commandeFilter()" x-init="
    fetch('http://localhost/GESTIONPARKINFO/App/controllers/Api/CommandesApi.php')
    .then(response => response.json())
    .then(response => {
        commandes = response.data;
        cmd_contenue = response.cmd_contenue; 
        bon_livraison = response.livraison; 
    })">

    <div class="flex justify-between p-4">
        <!-- Search Input -->
        <input type="text" x-model="searchQuery" placeholder="chercher..." class="p-2 rounded border-gray-300 focus:outline-none focus:border-gray-800 flex-grow w-full lg:w-96">
        <a href="index.php?page=commandes&action=create">
            <button style="background-color: #F08100;" class="text-black text-white p-2 rounded">
                Ajouter
            </button>
        </a>
    </div>

    <div class="relative overflow-x-auto p-4" x-show="!isLoading">
        <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400 rounded-xl">
            <!-- Table header -->
            <thead class="text-xs text-gray-700 uppercase bg-gray-900 text-white">
                <tr>
                    <th scope="col" class="px-6 py-3">Code</th>
                    <th scope="col" class="px-6 py-3">Date</th>
                    <th scope="col" class="px-6 py-3">type</th>
                    <th scope="col" class="px-6 py-3">Fournisseur</th>
                    <th scope="col" class="px-6 py-3">les bons de livraison</th>
                    <th scope="col" class="px-6 py-3 text-left">Action</th>
                </tr>
            </thead>
            <!-- Table body -->
            <tbody>
                <template x-for="commande in filteredcommandes" :key="commande.CodeCom">
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800">
                        <td class="px-6 py-4" x-text="commande.CodeCom"></td>
                        <td class="px-6 py-4" x-text="commande.date"></td>
                        <td class="px-6 py-4" x-text="commande.TypeCom"></td>
                        <td class="px-6 py-4" x-text="commande.fourNom + ' ' + commande.fourPrenom "></td>
                        <td class="px-6 py-4">
                            <button class="font-medium mr-5 bg-gray-100 p-4 rounded-xl text-blue-700 dark:text-blue-500 hover:underline" type="button" x-on:click="openModal2(commande.CodeCom)">
                                <img src="../images/bonLivraison.svg" width="20">
                            </button>
                        </td>
                        <td class="p-2 flex">
                            <button class="font-medium mr-5 bg-gray-100 p-4 rounded-xl text-blue-700 dark:text-blue-500 hover:underline" type="button" data-modal-target="dialog-message" x-on:click="openModal(commande.CodeCom)">
                                <img src="../images/moree.svg" width="22">
                            </button>
                            <a x-bind:href="'index.php?page=commandes&CodeCom=' + commande.CodeCom + '&action=edit'" class="font-medium mr-5 bg-gray-100 p-4 rounded-xl text-blue-700 dark:text-blue-500 hover:underline">
                                <img src="../images/update.svg" width="20" alt="update">
                            </a>
                            <button x-on:click="DeleteRecordValidation('index.php?page=commandes&CodeCom=' + commande.CodeCom + '&action=destroy')" class="font-medium bg-gray-100 p-4 rounded-xl text-red-700 dark:text-blue-500 hover:underline">
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
    function commandeFilter() {
        return {
            commandes: [],
            isLoading: false,
            searchQuery: '',
            cmd_contenue: [],
            bon_livraison: [],

            get filteredcommandes() {
                if (!this.searchQuery.trim()) {
                    return this.commandes;
                } else {
                    const query = new RegExp(this.searchQuery.trim(), 'i');
                    return this.commandes.filter(commande =>
                        query.test(commande.CodeCom) ||
                        query.test(commande.date) ||
                        query.test(commande.TypeCom) ||
                        query.test(commande.fourNom) ||
                        query.test(commande.fourPrenom)
                    );
                }
            },

            openModal(codeCommande) {
                // Find the corresponding characteristics for the given codeCommande
                const filteredCharacteristics = this.cmd_contenue.filter(item =>
                    item.CodeCommande === codeCommande
                );

                // Construct an HTML table to display the cmd_contenue data
                let tableHTML = '<div class="table-responsive border-gray-300 m-5 p-3"><table class="table table-bordered"><thead><tr><th class="p-3 border">Matreil Type</th><th class="p-3 border">Matreil Marque</th><th class="p-3 border">QTY</th></tr></thead><tbody>';
                filteredCharacteristics.forEach(item => {
                    tableHTML += '<tr>';
                    tableHTML += '<td class="p-3 border">' + item.MatreilType + '</td>';
                    tableHTML += '<td class="p-3 border">' + item.MatreilMarque + '</td>';
                    tableHTML += '<td class="p-3 border">' + item.QTY + '</td>';
                    tableHTML += '</tr>';
                });
                tableHTML += '</tbody></table></div>';

                // Show the dialog with increased width and height, and print button
                $("#dialog-message").html(tableHTML).dialog({
                    modal: true,
                    title: "Contenu de la commande",
                    width: 380, // Set the width
                    height: 600, // Set the height
                    buttons: {
                        Imprimer: function() {
                            window.open("index.php?page=commandes&action=print&cmd=" + codeCommande, "_blank");
                        },
                        Fermer: function() {
                            $(this).dialog("close");
                        }
                    }
                });
            },






            openModal2(codeCommande) {
                const filteredCharacteristics = this.bon_livraison.filter(item =>
                    item.CodeCommande === codeCommande
                );

                let bnHTML = 
                '<div class="table-responsive border-gray-300 m-5 p-3"><table class="table table-bordered"><thead><tr><th class="p-3 border">Code</th><th class="p-3 border">Date</th><th class="p-3 border">Code Facture</th><th class="p-3 border">État</th></tr></thead><tbody>';
                filteredCharacteristics.forEach(item => {
                    bnHTML += '<tr>';
                    bnHTML += '<td class="p-3 border">' + item.CodeBL + '</td>';
                    bnHTML += '<td class="p-3 border">' + item.Date + '</td>';
                    bnHTML += '<td class="p-3 border">' + item.CodeFacteur + '</td>';
                    bnHTML += '<td class="p-3 border bg-gray-700 text-white">' + item.Designation + '</td>';
                    bnHTML += '</tr>';
                });
                bnHTML += '</tbody></table></div>';

                $("#dialog-message").html(bnHTML).dialog({
                    modal: true,
                    title: "LES BONS DE LIVRAISON",
                    width: 480,
                    height: 600,
                    buttons: {
                        Ajouter: function() {
                            window.location.href = "index.php?page=BonLivraison&action=create&cmd=" + codeCommande;
                        },
                        Fermer: function() {
                            $(this).dialog("close");
                        }
                    }
                });

            }
        };
    }
</script>

<script src="js/DeleteRecordValidation.js"></script>

<?php 
$contant = ob_get_clean();
require_once(__DIR__ . '/../layout.php');
?>
