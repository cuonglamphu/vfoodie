<x-app-layout >
    <div class="container mx-auto p-4">
        <p class="text-4xl primary-linear mb-4 font-weight-bold p-2 " style="font-weight: bolder">
            Tạo Công Thức</p>
        <p class="text-xl mb-4 ">
            "Khám phá hương vị, sáng tạo công thức và tạo nên bữa ăn đầy ấn tượng."</p>
        <form method="POST" action="{{ route('recipes.store') }}" enctype="multipart/form-data" class="space-y-6" >
            @csrf
            @auth
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            @endauth
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Tên công thức:</label>
                <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
            </div>

            <!-- Row for time inputs and servings, responsive layout -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="prep_time" class="block text-sm font-medium text-gray-700">Thời gian chuẩn bị (phút):</label>
                    <input type="number" name="prep_time" id="prep_time" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                </div>

                <div>
                    <label for="cook_time" class="block text-sm font-medium text-gray-700">Thời gian nấu (phút):</label>
                    <input type="number" name="cook_time" id="cook_time" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                </div>

                <div>
                    <label for="servings" class="block text-sm font-medium text-gray-700">Số lượng phục vụ:</label>
                    <input type="number" name="servings" id="servings" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                </div>
            </div>

            <!-- Khu vực upload -->
            <div id="upload" class="flex items-center justify-center w-full">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <!-- SVG và mô tả upload ở đây -->
                        <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <!-- SVG path -->
                        </svg>
                        <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                    </div>
                    <!-- Container cho danh sách tên tệp -->
                    <div id="fileListContainer" class="list-items"></div>
                    <input id="dropzone-file" type="file" class="hidden" name="images[]" multiple/>
                </label>
            </div>

            <div id="steps-container" class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">Các bước:</label>
                <div id="steps" class="space-y-2">
                    <!-- Các bước sẽ được thêm vào đây -->
                </div>
                <button type="button" id="add-step" class="mt-2 px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-600">Thêm bước</button>
            </div>

            <div id="ingredients-container" class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">Thành phần:</label>
                <div id="ingredients" class="space-y-2">
                    <!-- Thành phần sẽ được thêm vào đây -->
                </div>
                <button type="button" id="add-ingredient" class="mt-2 px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-600">Thêm thành phần</button>
            </div>
            <!-- Tạo tag -->
            <label for="tags" class="block text-sm font-medium text-gray-700">Tags:</label>
            <input type="text" name="tags" id="tags" value="" data-role="tagsinput" class=" mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            <ul class="list"></ul>
            <div>
                <button type="submit" class="px-4 py-2 primary-btn text-white rounded ">Tạo công thức</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Thêm bước và nguyên liệu mặc định
            addDefaultStep();
            addDefaultIngredient();

            document.getElementById('add-step').addEventListener('click', function () {
                addStep();
            });

            document.getElementById('add-ingredient').addEventListener('click', function () {
                addIngredient();
            });

            var dropzoneInput = document.getElementById('dropzone-file');
            var fileListContainer = document.getElementById('fileListContainer');

            dropzoneInput.addEventListener('change', function(e) {
                fileListContainer.innerHTML = ''; // Xóa danh sách tệp hiện tại
                Array.from(this.files).forEach(function(file) {
                    var fileName = document.createElement('p');
                    fileName.textContent = file.name; // Lấy tên tệp
                    fileName.className = 'file-name';
                    fileListContainer.appendChild(fileName); // Thêm tên tệp vào container
                });
            });
        });

        // Đăng ký sự kiện submit cho form ngay sau khi DOMContentLoaded được thực thi.
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            form.addEventListener('submit', function(event) {
                // Kiểm tra và tự động điền tag
                autoFillTags();
            });
        });

        function autoFillTags() {
            const titleInput = document.getElementById('title');
            const tagsInput = document.getElementById('tags');
            if (tagsInput.value.trim() === '') {
                const firstWord = titleInput.value.trim().split(' ')[0]; // Lấy từ đầu tiên từ title
                if (firstWord !== '') {
                    tagsInput.value = firstWord; // Đặt làm giá trị mặc định cho tags nếu không có gì được nhập
                }
            }
        }

        // Định nghĩa các hàm addStep, addIngredient, updateStepIndices, addDefaultStep, và addDefaultIngredient như trước


        function addStep(isDefault = false) {
            const stepDiv = document.createElement('div');
            stepDiv.className = "flex items-center space-x-3";

            const stepInput = document.createElement('input');
            stepInput.type = "text";
            stepInput.name = "steps[]";
            stepInput.className = "flex-1 rounded-md shadow-sm border-gray-300";
            stepInput.required = true; // Yêu cầu nhập

            const deleteButton = document.createElement('a');
            deleteButton.href = "javascript:void(0)";
            deleteButton.className = "text-red-500 hover:text-red-700";
            deleteButton.innerHTML = '<i class="uil uil-times-circle"></i>';

            if (!isDefault) {
                deleteButton.onclick = function() {
                    stepDiv.remove();
                    updateStepIndices();
                };
            }

            stepDiv.appendChild(stepInput);
            stepDiv.appendChild(deleteButton);

            document.getElementById('steps').appendChild(stepDiv);

            if (!isDefault) {
                updateStepIndices();
            }
        }

        function addIngredient(isDefault = false) {
            const ingredientDiv = document.createElement('div');
            ingredientDiv.className = "flex items-center space-x-3";

            const quantityInput = document.createElement('input');
            quantityInput.type = "number";
            quantityInput.name = "ingredient_quantities[]";
            quantityInput.className = "w-1/4 rounded-md shadow-sm border-gray-300";
            quantityInput.placeholder = "Số lượng";
            quantityInput.required = true; // Yêu cầu nhập
            quantityInput.step = "any"; // Chấp nhận số thực

            const unitInput = document.createElement('input');
            unitInput.type = "text";
            unitInput.name = "ingredient_units[]";
            unitInput.className = "w-1/4 rounded-md shadow-sm border-gray-300";
            unitInput.required = true; // Yêu cầu nhập

            const nameInput = document.createElement('input');
            nameInput.type = "text";
            nameInput.name = "ingredient_names[]";
            nameInput.className = "w-1/2 rounded-md shadow-sm border-gray-300";
            nameInput.required = true; // Yêu cầu nhập

            const deleteButton = document.createElement('a');
            deleteButton.href = "javascript:void(0)";
            deleteButton.className = "text-red-500 hover:text-red-700";
            deleteButton.innerHTML = '<i class="uil uil-times-circle"></i>';

            if (!isDefault) {
                deleteButton.onclick = function() {
                    ingredientDiv.remove();
                };
            }

            ingredientDiv.appendChild(quantityInput);
            ingredientDiv.appendChild(unitInput);
            ingredientDiv.appendChild(nameInput);
            if (!isDefault) {
                ingredientDiv.appendChild(deleteButton);
            }

            document.getElementById('ingredients').appendChild(ingredientDiv);
        }

        function updateStepIndices() {
            const steps = document.querySelectorAll('#steps > div');
            steps.forEach((step, index) => {
                step.querySelector('input').placeholder = `Bước ${index + 1}`;
            });
        }

        function addDefaultStep() {
            addStep(true);
        }

        function addDefaultIngredient() {
            addIngredient(true);
        }

    </script>



</x-app-layout>
