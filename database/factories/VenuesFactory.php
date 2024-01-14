<?php
 
namespace Database\Factories;
 
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Venues;
use Illuminate\Support\Str;
 
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Venues>
 */
class VenuesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Venues::class;
       
    /**
     * Define the model's default state.
     *
     * @return array
 
     */
    public function definition()
    {
        return [
            'venue' => $this->faker->text(),
            'venue type' => $this->faker->text(),
            'floor' => $this->faker->text(),
            'body' => $this->faker->paragraph(),   
            'slug' => Str::slug($this->faker->text())              
        ];
    }
}