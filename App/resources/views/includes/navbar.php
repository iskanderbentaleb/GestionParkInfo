<nav class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="index.php?page=matreil&action=index" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="../images/logo.svg" class="h-8" alt="Flowbite Logo" />
      <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">GPI Sonatrach</span>
    </a>
    <button data-collapse-toggle="navbar-multi-level" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-multi-level" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
      </svg>
    </button>


    <div class="hidden w-full md:block md:w-auto" id="navbar-multi-level">
      <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        





      
      <li>
          <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 px-3 text-gray-7r00 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0 md:w-auto dark:text-white dark:focus:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
            Matériel 
            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
            </svg>
          </button>
          <!-- Dropdown menu -->
          <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
            
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownLargeButton">
              <li>
                <a href="index.php?page=matreil&action=index" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Liste de Matériel</a>
              </li>

              <li>
                <a href="index.php?page=matreiltype&action=index" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Les Types</a>
              </li>
              <li>
                <a href="index.php?page=marque&action=index" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Les Marques</a>
              </li>
              <li>
                <a href="index.php?page=caracteristiques&action=index" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Les Caractéristiques</a>
              </li>


            </ul>


          </div>
        </li>






        <li>
          <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar-1" class="flex items-center justify-between w-full py-2 px-3 text-gray-7r00 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0 md:w-auto dark:text-white dark:focus:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
          Commandes
            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
            </svg>
          </button>
          <!-- Dropdown menu -->
          <div id="dropdownNavbar-1" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
            

            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownLargeButton">
              


              <li>
                <a href="index.php?page=fournisseurs&action=index" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                  Fournisseurs
                </a>
              </li>
              
               <li>
                <a href="index.php?page=CommandeType&action=index" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                  Types de Commande
                </a>
              </li>

              <li>
                <a href="index.php?page=commandes&action=index" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                Les commandes
                </a>
              </li>


              <li>
                <a href="index.php?page=BonLivraison&action=index" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                les bons de livraison
                </a>
              </li>
            
            

              <li>
                <a href="index.php?page=factures&action=index" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                Les Factures
                </a>
              </li>
            

            </ul>

          </div>
        </li>




    


        <li>
          <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar-4" class="flex items-center justify-between w-full py-2 px-3 text-gray-7r00 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0 md:w-auto dark:text-white dark:focus:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
          Employés
            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
            </svg>
          </button>
          <!-- Dropdown menu -->
          <div id="dropdownNavbar-4" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
            

            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownLargeButton">
              


              <li>
                <a href="index.php?page=utilisateur&action=index" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                 Liste des Employés
                </a>
              </li>


              <li>
                <a href="index.php?page=decharge&action=index" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                  Décharge de Matreil</a>
              </li>
              

            </ul>

          </div>
        </li>









        <li>
          <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar-5" class="flex items-center justify-between w-full py-2 px-3 text-gray-7r00 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0 md:w-auto dark:text-white dark:focus:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
          Plus
            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
            </svg>
          </button>
          <!-- Dropdown menu -->
          <div id="dropdownNavbar-5" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
            

            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownLargeButton">
              
              
              <li>
                <a href="index.php?page=dashboard&action=index" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                les statistiques
                </a>
              </li>



              <li>
                <a href="index.php?page=reparation&action=index" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                Réparation
                </a>
              </li>
              


              <li>
                <a href="index.php?page=reforme&action=index" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                Réforme
                </a>
              </li>


              <li>
                <a href="index.php?page=inventaire&action=index" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                Inventaire
                </a>
              </li>


             

            </ul>

          </div>
        </li>
















        










        <li>
          <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar-3" class="flex items-center justify-between w-full py-2 px-3 text-gray-7r00 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0 md:w-auto dark:text-white dark:focus:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
          Profile
            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
            </svg>
          </button>
          <!-- Dropdown menu -->
          <div id="dropdownNavbar-3" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
            

            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownLargeButton">
              


              <li>
                <a href="index.php?page=utilisateur&action=edit&CodeUt=<?= $_SESSION['user']['CodeUt'] ?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                 Mes Informations
                </a>
              </li>


              

            </ul>

          </div>
        </li>








        <li>
              <a href="index.php?page=logout&action=index" class="text-red-500 flex items-center justify-between w-full py-2 px-3 text-gray-7r00 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0 md:w-auto dark:text-white dark:focus:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                Se Déconnecter
              </a>    
        </li>



      </ul>
    </div>







    



  </div>
</nav>

<h1 class="p-4 text-gray-900 bg-gray-800 text-white font-bold uppercase text-xl text-center">
  <?= $title_page ?>
</h1>


