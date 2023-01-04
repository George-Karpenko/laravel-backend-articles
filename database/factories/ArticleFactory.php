<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $paragraphsToHtml = function ($nb = 3) {
            $paragraphs = fake()->paragraphs($nb);
            $html = '';
            foreach ($paragraphs as $paragraph) {
                $html .= "<p>$paragraph</p>\n\r";
            }
            return $html;
        };

        return [
            'author_id' => 1,
            'category_id' => rand(1, 5),
            'title' => fake()->text(30),
            'content' => $paragraphsToHtml(10),
            'posted_at' => fake()->datetime(),
        ];
    }
}
