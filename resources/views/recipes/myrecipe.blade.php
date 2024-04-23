<x-app-layout>


    <!-- Main modal -->
    <div id="deleteModal" tabindex="-1" aria-hidden="true" class="flex items-center justify-center hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="deleteModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                <p class="mb-4 text-gray-500 dark:text-gray-300 modal-title">Are you sure you want to delete this item?</p>
                <div class="flex justify-center items-center space-x-4">
                    <button data-modal-toggle="deleteModal" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                        No, cancel
                    </button>
                    <button id="confirmDelete" type="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                        Yes, I'm sure
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="container my-20">
    <div class="row">
        <p class="text-4xl primary-color mb-4 font-weight-bold p-2">
            Sổ Tay Công Thức</p>
        <p class="text-xl mb-4 ">
            "Vũ trụ hương vị trong lòng sổ tay công thức, mở ra thế giới ẩm thực của bạn."</p>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="flex sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4 mt-2">
                <div class="relative inline-block">
                    <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadio" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                        <svg class="w-3 h-3 text-gray-500 dark:text-gray-400 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
                        </svg>
                        Last 30 days
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
{{--                    style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);"--}}
                    <div id="dropdownRadio" class="absolute left-0 mt-2 z-10  hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" >
                        <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRadioButton">
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="filter-radio-example-1" type="radio" value="lastDay" name="filter-radio" class="w-4 h-4 primary-color bg-gray-100 border-gray-300 focus:caret-amber-600 dark:focus:caret-amber-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="filter-radio-example-1" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last day</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input  checked="" id="filter-radio-example-2" type="radio" value="last7Days" name="filter-radio" class="w-4 h-4 primary-color bg-gray-100 border-gray-300 focus:caret-amber-600 dark:focus:caret-amber-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="filter-radio-example-2" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last 7 days</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="filter-radio-example-3" type="radio" value="lastMonth" name="filter-radio" class="w-4 h-4 primary-color bg-gray-100 border-gray-300 focus:caret-amber-600 dark:focus:caret-amber-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="filter-radio-example-3" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last 30 days</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="filter-radio-example-4" type="radio" value="lastYear" name="filter-radio" class="w-4 h-4 primary-color bg-gray-100 border-gray-300 focus:caret-amber-600 dark:focus:caret-amber-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="filter-radio-example-4" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last month</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input filterRecipesByDate="Last year" id="filter-radio-example-5" type="radio" value="" name="filter-radio" class="w-4 h-4 primary-color bg-gray-100 border-gray-300 focus:caret-amber-600 dark:focus:caret-amber-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="filter-radio-example-5" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last year</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 right-5 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input type="text" id="table-search" class="bl  ock p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:caret-amber-600 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:caret-amber-600 dark:focus:border-blue-500" placeholder="Search for items">
                </div>
            </div>

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 primary-color font-bold font-medium font-weight-bold">
                        Recipe Name
                    </th>
                    <th scope="col" class="px-6 py-3 primary-color font-bold font-medium font-weight-bold">
                        Create At
                    </th>
                    <th scope="col" class="px-6 py-3" colspan="2">
                    </th>

                </tr>
                </thead>
                <tbody>
                <form id="deleteForm" action="" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>

                @if($recipe)
                    @foreach($recipe as $row)
                            <tr  data-create-at="{{$row->created_at}}" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td style="font-size: x-large"  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <a class="primary-link" href="/recipedetail/{{$row->id}}">{{$row->title}}</a></td>
                                <td  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $row->created_at->format('d-m-Y')}}</td>
                                <td class="px-6 py-4">
                                    <a href="{{route('myrecipe.edit',$row->id)}}" class="px-4 py-2"><i style="font-size: x-large " class="uil uil-edit-alt"></i></a>
                                </td>
                                <td class="px-6 py-4">
                                    <button type="button" class="deleteButton px-4 py-2" id="deleteButton" data-recipe-id="{{$row->id}}" data-recipe-title="{{ $row->title }}" data-modal-target="deleteModal" data-modal-toggle="deleteModal"><i style="font-size: x-large " class="uil uil-trash-alt"></i></button>
                                </td>
                            </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var searchInput = document.getElementById('table-search');
            var filterRadios = document.querySelectorAll('input[name="filter-radio"]');
            var modal = document.getElementById('deleteModal');
            var closeModalButtons = document.querySelectorAll('[data-modal-toggle="deleteModal"]');
            var deleteButtons = document.querySelectorAll('.deleteButton');
            var confirmDelete = document.querySelector('#confirmDelete');
            var dropdownButton = document.getElementById('dropdownRadioButton');
            var dropdownRadio = document.getElementById('dropdownRadio');
            var filterValue = 'all'; // Khởi tạo giá trị mặc định cho bộ lọc

            // Toggle modal display
            function toggleModal() {
                modal.classList.toggle('hidden');
            }

            // Close modal on click
            closeModalButtons.forEach(function (button) {
                button.addEventListener('click', toggleModal);
            });

            // Apply filter and search
            function updateUI() {
                var searchText = searchInput.value.toUpperCase();
                var rows = document.querySelectorAll('tbody tr');
                var currentDate = new Date();

                rows.forEach(function (row) {
                    var recipeName = row.querySelector('td:first-child').textContent.toUpperCase();
                    var createDateStr = row.getAttribute('data-create-at');
                    var createDate = new Date(createDateStr);
                    var diffTime = Math.abs(currentDate - createDate);
                    var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                    var showRow = true;

                    // Apply filter logic
                    switch (filterValue) {
                        case "lastDay":
                            showRow = diffDays <= 1;
                            break;
                        case "last7Days":
                            showRow = diffDays <= 7;
                            break;
                        case "last30Days":
                            showRow = diffDays <= 30;
                            break;
                        case "lastYear":
                            let oneYearAgo = new Date(currentDate.getFullYear() - 1, currentDate.getMonth(), currentDate.getDate());
                            showRow = createDate >= oneYearAgo;
                            break;
                    }

                    // Apply search logic
                    if (searchText && !recipeName.includes(searchText)) {
                        showRow = false;
                    }

                    // Update row visibility
                    row.style.display = showRow ? "" : "none";
                });
            }

            // Event listeners for filter and search
            filterRadios.forEach(function (radio) {
                radio.addEventListener('change', function () {
                    filterValue = this.value;
                    updateUI();
                });
            });

            searchInput.addEventListener('input', updateUI);

            var dropdownText = document.getElementById('dropdownRadioButton');

            function updateDropdownText() {
                var selectedFilter = document.querySelector('input[name="filter-radio"]:checked').nextElementSibling.textContent;
                dropdownText.innerHTML = `
            <svg class="w-3 h-3 text-gray-500 dark:text-gray-400 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
            </svg>
            ${selectedFilter}
            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg>`;
            }

            filterRadios.forEach(function (radio) {
                radio.addEventListener('change', function () {
                    updateDropdownText();
                    // Bạn cũng có thể gọi hàm updateUI ở đây nếu cần
                });
            });

            // Dropdown toggle
            dropdownButton.addEventListener('click', function (event) {
                event.stopPropagation();
                dropdownRadio.classList.toggle('hidden');
            });

            // Click outside dropdown to close
            document.addEventListener('click', function (e) {
                if (!dropdownRadio.contains(e.target)) {
                    dropdownRadio.classList.add('hidden');
                }
            });

            // Delete button click
            deleteButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    var recipeId = this.getAttribute('data-recipe-id');
                    var recipeTitle = this.getAttribute('data-recipe-title');
                    modal.querySelector('.modal-title').textContent = 'Are you sure you want to delete "' + recipeTitle + '"?';
                    var form = document.getElementById('deleteForm');
                    form.action = '/recipes/destroy/' + recipeId;
                    modal.classList.remove('hidden');
                });
            });

            // Confirm delete action
            confirmDelete.addEventListener('click', function () {
                document.getElementById('deleteForm').submit();
            });
        });

    </script>

</x-app-layout>
