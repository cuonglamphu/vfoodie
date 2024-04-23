<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RecipesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id = 1; // Giả định user ID là 1
        $recipes = [
            [
                'title' => 'Bún Bò Huế',
                'prep_time' => 45,
                'cook_time' => 120,
                'servings' => 4,
                'steps' => [
                    'Sơ chế nguyên liệu: Thịt bò, chả, mắm ruốc, sả, ớt.',
                    'Nấu nước dùng: Xương heo hầm với sả và ớt.',
                    'Chế biến thịt bò và chả: Luộc thịt bò và chả.',
                    'Hoàn thiện: Thêm mắm ruốc vào nước dùng, mì bún và các loại rau.',
                ],
                'ingredients' => [
                    ['name' => 'Thịt bò', 'quantity' => '500', 'unit' => 'g'],
                    ['name' => 'Xương heo', 'quantity' => '1', 'unit' => 'kg'],
                    ['name' => 'Mắm ruốc', 'quantity' => '50', 'unit' => 'g'],
                    ['name' => 'Bún', 'quantity' => '400', 'unit' => 'g'],
                ],
                'tags' => ['Truyền thống', 'Huế', 'Mì', 'Cay'],
            ],
            [
                'title' => 'Bún Chả Hà Nội',
                'prep_time' => 30,
                'cook_time' => 60,
                'servings' => 4,
                'steps' => [
                    'Sơ chế nguyên liệu: Thịt ba chỉ, mỡ heo, nước mắm, đường, tỏi, hành.',
                    'Ướp thịt với nước mắm, đường, tỏi, hành.',
                    'Nướng thịt trên than hoa cho đến khi vàng.',
                    'Pha nước mắm chấm kèm rau sống và mì bún.',
                ],
                'ingredients' => [
                    ['name' => 'Thịt ba chỉ', 'quantity' => '600', 'unit' => 'g'],
                    ['name' => 'Nước mắm', 'quantity' => '100', 'unit' => 'ml'],
                    ['name' => 'Đường', 'quantity' => '50', 'unit' => 'g'],
                    ['name' => 'Bún', 'quantity' => '400', 'unit' => 'g'],
                ],
                'tags' => ['Hà Nội', 'Nướng', 'Mì', 'Đặc sản'],
            ],
            [
                'title' => 'Bún Đậu Mắm Tôm',
                'prep_time' => 20,
                'cook_time' => 30,
                'servings' => 4,
                'steps' => [
                    'Sơ chế đậu hủ và chiên vàng.',
                    'Pha mắm tôm với chanh, đường, ớt.',
                    'Chuẩn bị rau sống: kèm rau mùi, húng quế.',
                    'Thưởng thức bằng cách chấm đậu hủ và thịt heo vào mắm tôm.',
                ],
                'ingredients' => [
                    ['name' => 'Đậu hủ', 'quantity' => '400', 'unit' => 'g'],
                    ['name' => 'Mắm tôm', 'quantity' => '100', 'unit' => 'ml'],
                    ['name' => 'Thịt heo', 'quantity' => '300', 'unit' => 'g'],
                    ['name' => 'Bún', 'quantity' => '400', 'unit' => 'g'],
                ],
                'tags' => ['Đậu', 'Mắm tôm', 'Bún', 'Đơn giản'],
            ],
            [
                'title' => 'Bánh Xèo Miền Tây',
                'prep_time' => 20, // Thời gian chuẩn bị (giả sử)
                'cook_time' => 30, // Thời gian nấu (giả sử)
                'servings' => 4,   // Số người ăn
                'steps' => [
                    'Sơ chế nguyên liệu: Bột gạo, tôm, thịt ba chỉ, giá đỗ, hành lá.',
                    'Pha bột: Pha bột gạo với nước dừa, nghệ cho màu vàng.',
                    'Chiên bánh: Đổ bột vào chảo nóng, thêm tôm, thịt ba chỉ, giá, đậy nắp.',
                    'Cuốn bánh với bánh tráng, rau sống và chấm nước mắm pha.',
                ],
                'ingredients' => [
                    ['name' => 'Bột gạo', 'quantity' => '500', 'unit' => 'g'],
                    ['name' => 'Tôm', 'quantity' => '200', 'unit' => 'g'],
                    ['name' => 'Thịt ba chỉ', 'quantity' => '300', 'unit' => 'g'],
                    ['name' => 'Giá đỗ', 'quantity' => '100', 'unit' => 'g'],
                ],
                'tags' => ['Miền Tây', 'Bánh', 'Chiên'],
            ],
            [
                'title' => 'Bánh Canh Chả Cá Nha Trang',
                'prep_time' => 30, // Thời gian chuẩn bị
                'cook_time' => 60, // Thời gian nấu
                'servings' => 4,   // Số người ăn
                'steps' => [
                    'Sơ chế nguyên liệu: Chả cá, bột bánh canh, hành lá, rau mùi.',
                    'Nấu nước dùng: Hầm xương heo với hành tím.',
                    'Thực hiện bánh canh: Nấu bột bánh canh trong nước dùng đến khi mềm.',
                    'Phục vụ bánh canh cùng với chả cá, hành lá, và rau mùi tươi.',
                ],
                'ingredients' => [
                    ['name' => 'Chả cá', 'quantity' => '200', 'unit' => 'g'],
                    ['name' => 'Bột bánh canh', 'quantity' => '400', 'unit' => 'g'],
                    ['name' => 'Xương heo', 'quantity' => '1', 'unit' => 'kg'],
                    ['name' => 'Hành lá', 'quantity' => '50', 'unit' => 'g'],
                ],
                'tags' => ['Nha Trang', 'Bánh Canh', 'Chả Cá'],
            ],
            [
                'title' => 'Gỏi Cuốn',
                'prep_time' => 15, // Thời gian chuẩn bị
                'cook_time' => 0,  // Không cần thời gian nấu
                'servings' => 4,   // Số người ăn
                'steps' => [
                    'Sơ chế nguyên liệu: Tôm luộc, thịt heo luộc, bún, rau sống, bánh tráng.',
                    'Cuốn gỏi: Ướt bánh tráng, đặt tôm, thịt heo, bún, rau sống và cuốn chặt.',
                    'Pha nước chấm: Hòa hỗn hợp nước mắm, đường, chanh, tỏi, ớt.',
                    'Thưởng thức gỏi cuốn với nước chấm đã pha.',
                ],
                'ingredients' => [
                    ['name' => 'Tôm', 'quantity' => '200', 'unit' => 'g'],
                    ['name' => 'Thịt heo', 'quantity' => '300', 'unit' => 'g'],
                    ['name' => 'Bún', 'quantity' => '200', 'unit' => 'g'],
                    ['name' => 'Bánh tráng', 'quantity' => '20', 'unit' => 'cái'],
                ],
                'tags' => ['Gỏi Cuốn', 'Tươi', 'Không Nấu'],
            ]
        ];

        foreach ($recipes as $recipe) {
            $recipe_id = DB::table('recipes')->insertGetId([
                'user_id' => $user_id,
                'title' => $recipe['title'],
                'prep_time' => $recipe['prep_time'],
                'cook_time' => $recipe['cook_time'],
                'servings' => $recipe['servings'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            foreach ($recipe['steps'] as $index => $step) {
                DB::table('recipe_steps')->insert([
                    'recipe_id' => $recipe_id,
                    'step_number' => $index + 1,
                    'description' => $step,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }

            foreach ($recipe['ingredients'] as $ingredient) {
                DB::table('recipe_ingredients')->insert([
                    'recipe_id' => $recipe_id,
                    'name' => $ingredient['name'],
                    'quantity' => $ingredient['quantity'],
                    'unit' => $ingredient['unit'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }

            // Liên kết với tags
            foreach ($recipe['tags'] as $tagName) {
                // Kiểm tra xem tag đã tồn tại chưa
                $tag = DB::table('tags')->where('name', $tagName)->first();
                $tagId = $tag ? $tag->id : DB::table('tags')->insertGetId([
                    'name' => $tagName,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);

                // Liên kết tag với công thức
                DB::table('recipe_tags')->insert([
                    'recipe_id' => $recipe_id,
                    'tag_id' => $tagId,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }
}
