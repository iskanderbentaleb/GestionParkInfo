<?php
$title_page = "Liste des Types";
ob_start(); // this is for geting a variable as text and with html and php to get long code and put it on variable
?>


<div x-data="matreilTypesFilter()" x-init="
    fetch('http://localhost/GESTIONPARKINFO/App/Controllers/Api/MatreilTypeApi.php')
    .then(response => response.json())
    .then(response => {
        matreilTypes = response.data; 
    })">



<div class="flex justify-between p-4">

<!-- Search Input -->
<input type="text" x-model="searchQuery" placeholder="chercher..." class="p-2 rounded border-gray-300 focus:outline-none focus:border-gray-800 flex-grow w-full lg:w-96">

<a href="index.php?page=matreiltype&action=create">
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
                    <th scope="col" class="px-6 py-3">Code Type</th>
                    <th scope="col" class="px-6 py-3">Désignation</th>
                    <th scope="col" class="px-6 py-3 text-left">Action</th>
                </tr>
            </thead>
            <!-- Table body -->
            <tbody>
                <template x-for="matreilType in filteredMatreilType" :key="matreilType.CodeType">
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 ">
                        <td class="px-6 py-4" x-text="matreilType.CodeType"></td>
                        <td class="px-6 py-4" x-text="matreilType.Designation"></td>
                        <td class="p-2 flex">
                            <a x-bind:href="'index.php?page=matreiltype&CodeType=' + matreilType.CodeType + '&action=edit'" class="font-medium mr-5 bg-gray-100 p-4 rounded-xl text-blue-700 dark:text-blue-500 hover:underline">
                                <img src="../images/update.svg" width="20" alt="update">
                            </a>
                            <button x-on:click="DeleteRecordValidation('index.php?page=matreiltype&CodeType=' + matreilType.CodeType + '&action=destroy')" class="font-medium bg-gray-100 p-4 rounded-xl text-red-700 dark:text-blue-500 hover:underline">
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
    function matreilTypesFilter() {
        return {
            matreilTypes: [],
            isLoading: false,
            searchQuery: '',

            get filteredMatreilType() {
                if (!this.searchQuery.trim()) {
                    return this.matreilTypes;
                } else {
                    const query = new RegExp(this.searchQuery.trim(), 'i'); // 'i' for case-insensitive
                    return this.matreilTypes.filter(matreilType =>
                        query.test(matreilType.CodeType) ||
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