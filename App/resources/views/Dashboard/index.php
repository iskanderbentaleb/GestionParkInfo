<?php
$title_page = "les statistiques";
ob_start(); // this is for geting a variable as text and with html and php to get long code and put it on variable


?>

<div class="grid grid-cols-1 gap-4 px-4 mt-8 sm:grid-cols-4 sm:px-8">

    <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
        <div class="p-4 bg-gray-400"><svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                
                <svg viewBox="0 0 512 512" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" fill="#ffffff" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><defs><style>.cls-1{fill:none;stroke:#ffffff;stroke-linecap:round;stroke-linejoin:round;stroke-width:13px;}</style></defs><title></title><rect class="cls-1" height="170.67" width="256" x="128" y="138.67"></rect><line class="cls-1" x1="256" x2="256" y1="309.33" y2="373.33"></line><line class="cls-1" x1="341.33" x2="170.67" y1="373.33" y2="373.33"></line><line class="cls-1" x1="221.92" x2="178.25" y1="172.75" y2="216.42"></line><line class="cls-1" x1="300.25" x2="256.58" y1="221.92" y2="265.58"></line><line class="cls-1" x1="272.58" x2="208.92" y1="186.58" y2="250.25"></line></g></svg>


            </svg></div>
        <div class="px-4 text-gray-700">
            <h3 class="text-sm tracking-wider">Total Matreils</h3>
            <p class="text-3xl">
                <?= $data['MatreilCount'][0]['MatreilCount']; ?>
            </p>
        </div>
    </div>



    <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
        <div class="p-4 bg-blue-400"><svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2">
                </path>
            </svg></div>
        <div class="px-4 text-gray-700">
            <h3 class="text-sm tracking-wider">Total Commandes</h3>
            <p class="text-3xl">
            <?= $data['CommandeCount'][0]['CommandeCount']; ?>
            </p>
        </div>
    </div>
    


    <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
        <div class="p-4 bg-gray-300"><svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <svg viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M512 616.2m-10 0a10 10 0 1 0 20 0 10 10 0 1 0-20 0Z" fill="#E73B37"></path><path d="M511.6 656.9m-10 0a10 10 0 1 0 20 0 10 10 0 1 0-20 0Z" fill="#E73B37"></path><path d="M512.4 697.7m-10 0a10 10 0 1 0 20 0 10 10 0 1 0-20 0Z" fill="#E73B37"></path><path d="M512 130.8c42.1 0 81.7 16.4 111.5 46.2s46.2 69.4 46.2 111.5-16.4 81.7-46.2 111.5c-29.8 29.8-69.4 46.2-111.5 46.2s-81.7-16.4-111.5-46.2c-29.8-29.8-46.2-69.4-46.2-111.5s16.4-81.7 46.2-111.5 69.4-46.2 111.5-46.2m0-44c-111.4 0-201.6 90.3-201.6 201.6C310.4 399.8 400.7 490 512 490c111.4 0 201.6-90.3 201.6-201.6S623.3 86.8 512 86.8zM512.3 523.5L84 681.4v255.7h856V681.4L512.3 523.5zM896 893.1H128V712.6l384.3-142.4L896 712.6v180.5z" fill="#39393A"></path><path d="M555.4 585.3l-1.4-0.5v159.9c0 11.7-4.8 22.3-12.4 30-7.7 7.7-18.3 12.4-30 12.4-23.4 0-42.4-19-42.4-42.4V585.3l-1.4 0.5-14.6 5.2v153.8c0 32.2 26.2 58.4 58.4 58.4S570 777 570 744.8V590.5l-14.6-5.2z" fill="#E73B37"></path></g></svg>
            </svg></div>
        <div class="px-4 text-gray-700">
            <h3 class="text-sm tracking-wider">Total Fournisseurs</h3>
            <p class="text-3xl">
            <?= $data['FournisseurCount'][0]['FournisseurCount']; ?>
            </p>
        </div>
    </div>



    <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
        <div class="p-4 bg-orange-300"><svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M18.0909 2.54877C17.5385 2.23946 16.9504 2.20831 16.3288 2.286C15.7383 2.3598 15.02 2.54651 14.1567 2.7709L12.1384 3.2954C11.2755 3.51963 10.557 3.70634 10.0072 3.92891C9.4292 4.16293 8.92943 4.47736 8.60526 5.02195C8.27903 5.56998 8.24664 6.15584 8.32794 6.76777C8.40459 7.34473 8.59805 8.04488 8.82853 8.87901L9.37108 10.8429C9.60161 11.6775 9.79499 12.3775 10.0259 12.9139C10.271 13.4835 10.5985 13.9684 11.1541 14.2795C11.7064 14.5888 12.2945 14.62 12.9162 14.5423C13.5066 14.4685 14.225 14.2818 15.0882 14.0574L17.1066 13.5329C17.9695 13.3086 18.688 13.1219 19.2377 12.8994C19.8157 12.6653 20.3155 12.3509 20.6397 11.8063C20.9659 11.2583 20.9983 10.6724 20.917 10.0605C20.8403 9.48355 20.6469 8.7834 20.4164 7.94926L19.8738 5.98536C19.6433 5.1508 19.4499 4.45076 19.2191 3.91434C18.9739 3.34477 18.6465 2.85989 18.0909 2.54877ZM14.485 4.2354C15.4099 3.99503 16.0331 3.83463 16.5148 3.77442C16.9764 3.71673 17.1974 3.7676 17.358 3.85754C17.5154 3.94567 17.6656 4.09931 17.8413 4.50734C18.0265 4.93768 18.1937 5.53684 18.442 6.43548L18.9564 8.29754C19.2048 9.19641 19.3687 9.79611 19.4301 10.2581C19.4883 10.6968 19.4362 10.8956 19.3508 11.0391C19.2633 11.186 19.1047 11.3349 18.6748 11.509C18.2271 11.6903 17.605 11.8535 16.6798 12.0939L14.76 12.5929C13.835 12.8333 13.2118 12.9937 12.7301 13.0539C12.2685 13.1116 12.0476 13.0607 11.8869 12.9707C11.7296 12.8826 11.5793 12.729 11.4037 12.3209C11.2185 11.8906 11.0512 11.2914 10.8029 10.3928L10.2885 8.53074C10.0402 7.63187 9.87625 7.03217 9.81487 6.57022C9.75658 6.13148 9.80876 5.93269 9.89418 5.78921C9.98164 5.64227 10.1402 5.49334 10.5701 5.31928C11.0179 5.138 11.64 4.97476 12.5651 4.73434L14.485 4.2354Z" fill="#ffffff"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M3.2007 4.72469C2.80157 4.61396 2.38823 4.84775 2.27749 5.24688C2.16675 5.64602 2.40054 6.05936 2.79968 6.17009L4.50338 6.64278C4.92898 6.76086 5.24592 7.08236 5.35419 7.47427L7.3055 14.5374C7.23053 14.5521 7.1556 14.5692 7.0808 14.5887C5.10375 15.1025 3.89563 17.0913 4.43836 19.0558C4.97848 21.0108 7.03215 22.1384 9.00137 21.6266C10.7247 21.1788 11.8638 19.6102 11.7683 17.9139L20.1888 15.7256C20.5897 15.6214 20.8303 15.2119 20.7261 14.811C20.6219 14.4101 20.2124 14.1696 19.8115 14.2738L11.3734 16.4667C10.8651 15.4794 9.93146 14.7927 8.86688 14.5562L6.80003 7.07483C6.5469 6.1586 5.82129 5.45177 4.9044 5.19738L3.2007 4.72469ZM7.45809 16.0404C8.66981 15.7255 9.88575 16.4288 10.198 17.5589C10.5076 18.6796 9.82797 19.862 8.62408 20.1748C7.41235 20.4897 6.19641 19.7864 5.8842 18.6563C5.5746 17.5357 6.25419 16.3533 7.45809 16.0404Z" fill="#ffffff"></path> </g></svg>
            </svg></div>
        <div class="px-4 text-gray-700">
            <h3 class="text-sm tracking-wider">Total bon de livraisons</h3>
            <p class="text-3xl">
                <?= $data['BonLivraisonCount'][0]['BonLivraisonCount']; ?>
            </p>
        </div>
    </div>




    <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
        <div class="p-4 bg-green-100"><svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
           
                <svg viewBox="0 0 91 91" enable-background="new 0 0 91 91" id="Layer_1" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M25.773,50.997c11.08,0,20.092-9.078,20.092-20.232c0-11.156-9.012-20.232-20.092-20.232 c-11.074,0-20.08,9.076-20.08,20.232C5.693,41.919,14.699,50.997,25.773,50.997z" fill="#647F94"></path> <path d="M43.023,48.44c-3.17,3.129-7.176,5.391-11.646,6.443l4.664,23.918c0.176,0.842-0.137,1.707-0.807,2.242 l-2.006,1.605c5.594-0.668,11.654-2.127,18.006-4.789V60.106C51.234,54.845,48.52,51.026,43.023,48.44z" fill="#647F94"></path> <polygon fill="#6EC4A7" points="24.941,55.739 20.613,78.36 25.959,82.636 31.295,78.362 26.9,55.739 "></polygon> <path d="M20.453,54.956c-4.576-1.02-8.676-3.313-11.908-6.5c-5.266,2.58-7.865,6.393-7.865,11.65v17.84 c2.531,1.176,9.049,3.826,18.115,4.795l-2.119-1.695c-0.666-0.533-0.982-1.398-0.809-2.238L20.453,54.956z" fill="#647F94"></path> </g> <path d="M71.557,16.685c-10.502,0-19.045,8.545-19.045,19.051c0,10.504,8.543,19.051,19.045,19.051 c10.506,0,19.055-8.547,19.055-19.051C90.611,25.229,82.063,16.685,71.557,16.685z M79.301,38.407H63.416 c-1.383,0-2.506-1.121-2.506-2.506c0-1.383,1.123-2.504,2.506-2.504h15.885c1.383,0,2.504,1.121,2.504,2.504 C81.805,37.286,80.684,38.407,79.301,38.407z" fill="#6EC4A7"></path> </g> </g></svg>

            </div>
        <div class="px-4 text-gray-700">
            <h3 class="text-sm tracking-wider">Total Employés simples</h3>
            <p class="text-3xl">
                <?= $data['UtilisateurSimpleCount'][0]['UtilisateurSimpleCount']; ?>
            </p>
        </div>
    </div>




    <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
        <div class="p-4 bg-red-50"><svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
           
                <svg viewBox="0 0 91 91" enable-background="new 0 0 91 91" id="Layer_1" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M25.773,50.997c11.08,0,20.092-9.078,20.092-20.232c0-11.156-9.012-20.232-20.092-20.232 c-11.074,0-20.08,9.076-20.08,20.232C5.693,41.919,14.699,50.997,25.773,50.997z" fill="#647F94"></path> <path d="M43.023,48.44c-3.17,3.129-7.176,5.391-11.646,6.443l4.664,23.918c0.176,0.842-0.137,1.707-0.807,2.242 l-2.006,1.605c5.594-0.668,11.654-2.127,18.006-4.789V60.106C51.234,54.845,48.52,51.026,43.023,48.44z" fill="#647F94"></path> <polygon fill="#ff4d4d" points="24.941,55.739 20.613,78.36 25.959,82.636 31.295,78.362 26.9,55.739 "></polygon> <path d="M20.453,54.956c-4.576-1.02-8.676-3.313-11.908-6.5c-5.266,2.58-7.865,6.393-7.865,11.65v17.84 c2.531,1.176,9.049,3.826,18.115,4.795l-2.119-1.695c-0.666-0.533-0.982-1.398-0.809-2.238L20.453,54.956z" fill="#647F94"></path> </g> <path d="M71.557,16.685c-10.502,0-19.045,8.545-19.045,19.051c0,10.504,8.543,19.051,19.045,19.051 c10.506,0,19.055-8.547,19.055-19.051C90.611,25.229,82.063,16.685,71.557,16.685z M79.301,38.407H63.416 c-1.383,0-2.506-1.121-2.506-2.506c0-1.383,1.123-2.504,2.506-2.504h15.885c1.383,0,2.504,1.121,2.504,2.504 C81.805,37.286,80.684,38.407,79.301,38.407z" fill="#ff4d4d"></path> </g> </g></svg>

            </div>
        <div class="px-4 text-gray-700">
            <h3 class="text-sm tracking-wider">Total des Employés administratifs</h3>
            <p class="text-3xl">
                <?= $data['UtilisateurAdminCount'][0]['UtilisateurAdminCount']; ?>
            </p>
        </div>
    </div>








    





    

</div>


<?php 
$contant = ob_get_clean();// this is for geting a variable as text and with html and php to get long code and put it on variable 
require_once(__DIR__ . '/../layout.php');
?>