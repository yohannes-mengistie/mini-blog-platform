<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Faker\Provider\Lorem;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'blog_title' => fake()->jobTitle(),
            'blog_description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, esse.",
            'blog_content' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio sint possimus veniam autem consequatur asperiores culpa? Qui, quisquam quo temporibus reprehenderit cum, consequuntur eaque nostrum ducimus quidem laudantium saepe accusamus incidunt ea ullam sequi ex! Voluptatem id blanditiis neque repudiandae sint dolorum dignissimos. Dolor inventore laborum magni, perferendis nobis recusandae fugit qui beatae tempore, aut amet, quae omnis itaque saepe nesciunt et reprehenderit dolorem corrupti sint modi consectetur officia. Dolorem eveniet deserunt molestiae voluptatum fuga libero expedita minus, magni repellendus quas nisi vel? Mollitia accusamus vitae placeat dolore aut nobis asperiores hic ullam assumenda porro ratione, non doloribus tenetur obcaecati nemo voluptatibus nam explicabo ad animi. Deserunt cupiditate ducimus explicabo nisi quos neque alias nesciunt. Magni eveniet, assumenda neque dolores consectetur cum quos non, repudiandae ex illo nostrum, reiciendis provident laboriosam vitae eos. Accusantium sint, minus placeat maiores inventore quam! Dignissimos nam laborum ullam? Exercitationem, praesentium cupiditate. Aspernatur suscipit nihil, repellat repellendus consectetur sed ut quos soluta minima blanditiis reiciendis facere. Iure expedita unde sapiente laboriosam assumenda officiis nihil inventore odit, magni ipsa veniam odio voluptates aspernatur debitis ipsam? Repudiandae consequatur velit tenetur possimus exercitationem dicta maiores vitae. Rem placeat atque dolore ducimus excepturi, ullam itaque, earum, laudantium ipsum vel dolorem doloribus ratione sed maiores. Deleniti soluta odio hic asperiores, tempore eveniet sapiente aspernatur laborum natus facere iure impedit? Fuga id quidem a veniam impedit soluta maiores sit, ipsam sint illo accusamus, non error fugit repellat vel hic, magni ex cum. Ea earum commodi quidem quas repellat error provident, deserunt aut blanditiis unde alias, temporibus accusantium ab est. Quaerat, totam. Quos atque hic labore similique quisquam quas? Totam animi voluptatem, quisquam, reprehenderit sequi consequuntur veritatis officia harum illo optio magni, repellendus esse fuga? Cumque quidem rem, quo eaque mollitia minus illo magni id ipsa, aperiam necessitatibus molestias corporis tenetur aliquam deserunt. Nam doloribus, culpa et sapiente obcaecati facilis reprehenderit rem quae eum ab ducimus inventore dolores repellat nobis sequi error omnis mollitia reiciendis magnam quo quaerat officiis? Ipsam rerum nulla sapiente officiis expedita totam eligendi? Ex quod ullam similique, sit doloremque eveniet quo quas explicabo soluta. Esse iste nobis quasi veritatis cum nemo dolorum obcaecati, ea reprehenderit eos cupiditate sunt. Omnis eos quasi expedita voluptates autem eligendi praesentium ad aut adipisci illo. Tenetur esse rem perspiciatis aperiam eius exercitationem, quam, corrupti ad nobis excepturi totam? Est veritatis nemo quae amet sed ad omnis, ullam eaque alias magni maiores nesciunt assumenda consequatur quis necessitatibus facilis, unde harum cupiditate fuga veniam error similique explicabo. Id, nulla optio natus repellat qui sequi blanditiis hic aperiam recusandae reiciendis cum quia ratione obcaecati eos nisi voluptatum consequatur quasi ipsa? In explicabo ducimus earum nulla esse commodi ipsum veniam voluptates culpa! Accusantium iure quis autem a fugiat adipisci ea, maxime eligendi maiores aperiam laudantium quidem sequi, delectus voluptatem id nam numquam! Totam quam ad sint necessitatibus consectetur, praesentium molestias eveniet eius magni! Similique ratione, placeat libero ea reiciendis quod aut aspernatur. Voluptatem numquam, praesentium sint laudantium ad magnam nesciunt illum officia cumque consectetur placeat obcaecati minima."
        ];
    }
}
