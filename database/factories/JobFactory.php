<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence(8);
        $slug = Str::slug($name);
            return [
                'user_id' =>  User::all()->random()->id,
                'company_id' =>  Company::all()->random()->id,
                'category_id' =>  Category::all()->random()->id,
                'title'=>$name,
                'slug'=>$slug,
                'description'=>$this->faker->sentence(50),
                'position'=>$this->faker->jobTitle(),
                'address'=>$this->faker->address(),
                'type'=>'Full Time',
                'roles'=>$this->faker->title(),
                'status'=>rand(0,1),
                'last_date'=>$this->faker->date(),
            ];
    }
}
