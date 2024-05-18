<?php
$title_page = "Liste des Caractéristiques";
ob_start(); // this is for geting a variable as text and with html and php to get long code and put it on variable
?>


<div x-data="Filter()" x-init="
    fetch('http://localhost/GESTIONPARKINFO/App/controllers/Api/CaracteristiquesApi.php')
    .then(response => response.json())
    .then(response => {
        caracteristiques = response.data; 
    })">



<div class="flex justify-between p-4">

<!-- Search Input -->
<input type="text" x-model="searchQuery" placeholder="chercher..." class="p-2 rounded border-gray-300 focus:outline-none focus:border-gray-800 flex-grow w-full lg:w-96">

<a href="index.php?page=caracteristiques&action=create">
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
                    <th scope="col" class="px-6 py-3">Code Marque</th>
                    <th scope="col" class="px-6 py-3">Désignation</th>
                    <th scope="col" class="px-6 py-3 text-left">Action</th>
                </tr>
            </thead>
            <!-- Table body -->
            <tbody>
                <template x-for="caracteristique in filteredCaracteristiques" :key="caracteristique.CodeCar">
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 ">
                        <td class="px-6 py-4" x-text="caracteristique.CodeCar"></td>
                        <td class="px-6 py-4" x-text="caracteristique.Designation"></td>
                        <td class="p-2 flex">
                            <a x-bind:href="'index.php?page=caracteristiques&CodeCar=' + caracteristique.CodeCar + '&action=edit'" class="font-medium mr-5 bg-gray-100 p-4 rounded-xl text-blue-700 dark:text-blue-500 hover:underline">
                                <img src="../images/update.svg" width="20" alt="update">
                            </a>
                            <button x-on:click="DeleteRecordValidation('index.php?page=caracteristiques&CodeCar=' + caracteristique.CodeCar + '&action=destroy')" class="font-medium bg-gray-100 p-4 rounded-xl text-red-700 dark:text-blue-500 hover:underline">
                                <img src="../images/delete.svg" width="20" alt="delete">
                            </button>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>
</div>

<script>
    function Filter() {
        return {
            caracteristiques : [],
            isLoading: false,
            searchQuery: '',

            get filteredCaracteristiques() {
                if (!this.searchQuery.trim()) {
                    return this.caracteristiques;
                } else {
                    const query = new RegExp(this.searchQuery.trim(), 'i'); // 'i' for case-insensitive
                    return this.caracteristiques.filter(matreilType =>
                        query.test(matreilType.CodeCar) ||
                        query.test(matreilType.Designation)
                    );
                }
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