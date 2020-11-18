<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Order;
use App\Models\Region;
use App\Models\Translations\CategoryTranslation;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\ProgressBar;

class OrdersSeender extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('countries')->truncate();
        DB::table('country_translations')->truncate();
        DB::table('regions')->truncate();
        DB::table('region_translations')->truncate();
        DB::table('cities')->truncate();
        DB::table('city_translations')->truncate();
        DB::table('categories')->truncate();
        DB::table('category_translations')->truncate();
        DB::table('orders')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->createLocations();

        $categories = $this->createCategory();

        $this->createOrders($categories);
    }

    private function createLocations()
    {
        $data = file_get_contents(dirname(__FILE__) . '/cities.json');
        $countries = json_decode($data);

        foreach ($countries as $country) {
            $_country = new Country(['title' => $country->name]);
            $_country->save();

            foreach ($country->regions as $region) {
                $_region = new Region(['country_id' => $_country->id, 'title' => $region->name]);
                $_region->save();

                foreach ($region->cities as $city) {
                    $_city = new City([
                        'country_id' => $_country->id,
                        'region_id' => $_region->id,
                        'title' => $city->name
                    ]);

                    $_city->save();
                }
            }
        }
    }

    /**
     * @return Category[]
     */
    protected function createCategory()
    {
        $categories = [];

        for ($i = 0; $i <= 10; $i++) {
            $category = new Category(['title' => Factory::create('En_US')->text(20)]);
            $category->save();

            $categories[] = $category->id;
        }

        return $categories;
    }

    /**
     * @param Category[] $categories
     */
    protected function createOrders(array $categories): void
    {
        $faker = Factory::create('En_us');

        $this->command->getOutput()->progressStart(1000);

        for ($i = 0; $i <= 1000; $i++) {
            $user = User::inRandomOrder()->first();
            $currency = Currency::inRandomOrder()->first();

            /** @var Country $country */
            $country = Country::inRandomOrder()->first();
            /** @var Region $region */
            $region = Region::where(['country_id' => $country->id])->inRandomOrder()->first();
            /** @var City $region */
            $city = City::where(['country_id' => $country->id, 'region_id' => $region->id])->inRandomOrder()->first();

            $order = new Order();

            $order->type = Arr::random(Order::getTypes());
            $order->service_provision = Arr::random(Order::getServiceProvisions());

            $order->title = $faker->text(50);
            $order->description = $faker->realText(1000);
            $order->price = $faker->numberBetween(100, 5000);

            $order->desired_date = $faker->date();
            $order->desired_time_from = $faker->time();
            $order->desired_time_to = $faker->time();

            if (Arr::random([true, false])) {
                $order->execution_address = $faker->address;
            }

            $order->address = $faker->address;

            $order->status = Order::STATUS_OPEN;

            $order->user()->associate($user);
            $order->currency()->associate($currency);

            $order->country()->associate($country);
            $order->region()->associate($region);
            $order->city()->associate($city);

            $order->save();

            $order->categories()->attach(Arr::random($categories, random_int(1, count($categories))));

            $this->command->getOutput()->progressAdvance();
        }

        $this->command->getOutput()->progressFinish();
    }
}
