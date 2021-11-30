<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $cname = $this->faker->sentence(8);
        $slug = Str::slug($cname);
        return [
            'user_id' => User::all()->random()->id,
            'cname'=>$cname,
            'slug'=>$slug,
            'description'=>$this->faker->sentence(8),
            'address'=>$this->faker->address(),
            'phone'=>rand(1,10),
            'website'=>$this->faker->domainName(),
            'slogan'=>$this->faker->title(),
            'logo'=>'images/ashik.jpg',
            'cover_photo'=> 'images/ashik.jpg',

        ];
    }
}
