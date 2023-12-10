<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'small' =>'OUR SERVICES',
            'mainh1' =>'Custom IT Solutions for Your Successful Business',
            's1' =>'Cyber Security',
            'p1'=>'Amet justo dolor lorem kasd amet magna sea stet eos vero lorem ipsum dolore sed',
            's2'=>'Data Analytics',
            'p2'=>'Amet justo dolor lorem kasd amet magna sea stet eos vero lorem ipsum dolore sed',
            's3' =>'Web Development',
            'p3'=>'Amet justo dolor lorem kasd amet magna sea stet eos vero lorem ipsum dolore sed',
            's4'=>'Apps Development',
            'p4'=>'Amet justo dolor lorem kasd amet magna sea stet eos vero lorem ipsum dolore sed',
            's5'=>'SEO Optimization',
            'p5'=>'Amet justo dolor lorem kasd amet magna sea stet eos vero lorem ipsum dolore sed',
            'mainphone'=>'Call Us For Quote',
            'p6'=>'Amet justo dolor lorem kasd amet magna sea stet eos vero lorem ipsum dolore sed',
            'small_ar' =>'OUR SERVICES',
            'mainh1_ar' => 'Custom IT Solutions for Your Successful Business',
            's1_ar'=>'Cyber Security',
            'p1_ar'=>'Amet justo dolor lorem kasd amet magna sea stet eos vero lorem ipsum dolore sed',
            's2_ar'=>'Data Analytics',
            'p2_ar'=>'Amet justo dolor lorem kasd amet magna sea stet eos vero lorem ipsum dolore sed',
            's3_ar'=>'Web Development',
            'p3_ar'=>'Amet justo dolor lorem kasd amet magna sea stet eos vero lorem ipsum dolore sed',
            's4_ar'=>'Apps Development',
            'p4_ar'=>'Amet justo dolor lorem kasd amet magna sea stet eos vero lorem ipsum dolore sed',
            's5_ar'=>'SEO Optimization',
            'p5_ar'=>'Amet justo dolor lorem kasd amet magna sea stet eos vero lorem ipsum dolore sed',
            'mainphone_ar'=>'Call Us For a Quote',
            'p6_ar'=>'Amet justo dolor lorem kasd amet magna sea stet eos vero lorem ipsum dolore sed',
        ];
    }
}
