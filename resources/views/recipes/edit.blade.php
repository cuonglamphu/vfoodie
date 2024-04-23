<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Chỉnh Sửa Món :<b class="primary-color"> {{$recipe ->title}}</b></h1>
        <form method="POST" action="{{ route('recipes.store') }}" enctype="multipart/form-data" class="space-y-6">
            <input type="hidden" value="{{$recipe->id}}" name="recipe_id">
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
                <input type="text" name="title" id="title"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{$recipe->title}}"
                       required>
            </div>

            <!-- Row for time inputs and servings, responsive layout -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="prep_time" class="block text-sm font-medium text-gray-700">Thời gian chuẩn bị
                        (phút):</label>
                    <input type="number" name="prep_time" id="prep_time"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{$recipe->prep_time}}"
                           required>
                </div>

                <div>
                    <label for="cook_time" class="block text-sm font-medium text-gray-700">Thời gian nấu (phút):</label>
                    <input type="number" name="cook_time" id="cook_time"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{$recipe->cook_time}}"
                           required>
                </div>

                <div>
                    <label for="servings" class="block text-sm font-medium text-gray-700">Số lượng phục vụ:</label>
                    <input type="number" name="servings" id="servings"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{$recipe->servings}}"
                           required>
                </div>
            </div>

            <!-- Khu vực upload -->
            <div id="upload" class="flex items-center justify-center w-full">
                <label for="dropzone-file"
                       class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <!-- SVG và mô tả upload ở đây -->
                        <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                             fill="none" viewBox="0 0 20 16">
                            <!-- SVG path -->
                        </svg>
                        <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag
                            and drop</p>
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
                    @if($recipeSteps)
                        @foreach($recipeSteps as $step)
                            <!-- Các bước sẽ được thêm vào đây -->
                            <div class="flex items-center space-x-3">
                                <input type="text" name="steps[]" class="flex-1 rounded-md shadow-sm border-gray-300" required="" placeholder="Bước {{$step->step_number}}" value="{{$step->description}}">
                                <button type="button" class="delete-step text-red-500 hover:text-red-700">X</button>
                            </div>
                        @endforeach
                    @endif
                </div>
                <button type="button" id="add-step"
                        class="mt-2 px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-600">Thêm bước
                </button>
            </div>



            <div id="ingredients-container" class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">Thành phần:</label>
                <div id="ingredients" class="space-y-2">
                    <!-- Thành phần sẽ được thêm vào đây -->
                   @if($recipeIngredients)
                       @foreach($recipeIngredients as $ri)
                            <div class="flex items-center space-x-3">
                                <input type="number" name="ingredient_quantities[]" class="w-1/4 rounded-md shadow-sm border-gray-300" placeholder="Số lượng" required="" step="any" value="{{$ri->quantity}}">
                                <input type="text" name="ingredient_units[]" class="w-1/4 rounded-md shadow-sm border-gray-300" required="" value="{{$ri->unit}}">
                                <input type="text" name="ingredient_names[]" class="w-1/2 rounded-md shadow-sm border-gray-300" required="" value="{{$ri->name}}">
                                <button type="button" class="delete-ingredient text-red-500 hover:text-red-700">X</button>
                            </div>
                       @endforeach
                   @endif
                </div>
                <button type="button" id="add-ingredient" class="mt-2 px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-600">Thêm thành phần</button>
            </div>

            <!-- Tạo tag -->
            <label for="tags" class="block text-sm font-medium text-gray-700">Tags:</label>
            <input type="text" name="tags" id="tags" value="{{ $recipeTags ? implode(',', $recipeTags->pluck('name')->toArray()) : '' }}" data-role="tagsinput" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            <div>
                <button type="submit" class="px-4 py-2 primary-btn text-white rounded ">Lưu</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Kích hoạt thêm bước và nguyên liệu khi nhấn nút
            document.getElementById('add-step').addEventListener('click', function () {
                addStep();
            });

            document.getElementById('add-ingredient').addEventListener('click', function () {
                addIngredient();
            });

            // Xử lý upload file
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

            // Đăng ký sự kiện submit cho form
            const form = document.querySelector('form');
            form.addEventListener('submit', function(event) {
                // Kiểm tra và tự động điền tag
                autoFillTags();
            });
        });

        document.getElementById('steps').addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('delete-step')) {
                const stepDivs = document.querySelectorAll('#steps .flex.items-center.space-x-3');
                if (stepDivs.length > 1) {
                    e.target.closest('.flex.items-center.space-x-3').remove();
                } else {
                    // Nếu đây là bước cuối cùng, chỉ reset giá trị của các trường nhập
                    const lastStepDiv = stepDivs[0];
                    const input = lastStepDiv.querySelector('input');
                    input.value = ''; // Reset giá trị về rỗng
                }
            }
        });
``
        // Lắng nghe sự kiện click trên container của ingredients
        document.getElementById('ingredients').addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('delete-ingredient')) {
                const ingredientDivs = document.querySelectorAll('#ingredients .flex.items-center.space-x-3');
                if (ingredientDivs.length > 1) {
                    // Nếu có nhiều hơn một công thức, xóa div như bình thường
                    e.target.closest('.flex.items-center.space-x-3').remove();
                } else {
                    // Nếu đây là công thức cuối cùng, chỉ reset giá trị của các trường nhập
                    const lastIngredientDiv = ingredientDivs[0];
                    const inputs = lastIngredientDiv.querySelectorAll('input');
                    inputs.forEach(input => {
                        input.value = ''; // Reset giá trị về rỗng
                    });
                }
            }
        });


        function addStep() {
            const stepsContainer = document.getElementById('steps');
            const stepDiv = document.createElement('div');
            stepDiv.className = "flex items-center space-x-3";

            const stepInput = document.createElement('input');
            stepInput.type = "text";
            stepInput.name = "steps[]";
            stepInput.className = "flex-1 rounded-md shadow-sm border-gray-300";
            stepInput.placeholder = "Bước " + (stepsContainer.children.length + 1);
            stepInput.required = true;

            const deleteButton = document.createElement('button');
            deleteButton.type = "button";
            deleteButton.className = "text-red-500 hover:text-red-700";
            deleteButton.textContent = 'X';
            deleteButton.onclick = function() {
                stepDiv.remove();
            };

            stepDiv.appendChild(stepInput);
            stepDiv.appendChild(deleteButton);

            stepsContainer.appendChild(stepDiv);
        }

        function addIngredient() {
            const ingredientsContainer = document.getElementById('ingredients');
            const ingredientDiv = document.createElement('div');
            ingredientDiv.className = "flex items-center space-x-3";

            const quantityInput = document.createElement('input');
            quantityInput.type = "number";
            quantityInput.name = "ingredient_quantities[]";
            quantityInput.className = "w-1/4 rounded-md shadow-sm border-gray-300";
            quantityInput.placeholder = "Số lượng";
            quantityInput.required = true;
            quantityInput.step = "any";

            const unitInput = document.createElement('input');
            unitInput.type = "text";
            unitInput.name = "ingredient_units[]";
            unitInput.className = "w-1/4 rounded-md shadow-sm border-gray-300";
            unitInput.placeholder = "Đơn vị";
            unitInput.required = true;

            const nameInput = document.createElement('input');
            nameInput.type = "text";
            nameInput.name = "ingredient_names[]";
            nameInput.className = "w-1/2 rounded-md shadow-sm border-gray-300";
            nameInput.placeholder = "Nguyên liệu";
            nameInput.required = true;

            const deleteButton = document.createElement('button');
            deleteButton.type = "button";
            deleteButton.className = "text-red-500 hover:text-red-700";
            deleteButton.textContent = 'X';
            deleteButton.onclick = function() {
                ingredientDiv.remove();
            };

            ingredientDiv.appendChild(quantityInput);
            ingredientDiv.appendChild(unitInput);
            ingredientDiv.appendChild(nameInput);
            ingredientDiv.appendChild(deleteButton);

            ingredientsContainer.appendChild(ingredientDiv);
        }

        function autoFillTags() {
            const titleInput = document.getElementById('title');
            const tagsInput = document.getElementById('tags');
            if (tagsInput.value.trim() === '') {
                const firstWord = titleInput.value.trim().split(' ')[0];
                if (firstWord !== '') {
                    tagsInput.value = firstWord;
                }
            }
        }
    </script>

</x-app-layout>
