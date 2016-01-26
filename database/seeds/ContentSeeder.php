<?php

use Illuminate\Database\Seeder;
use App\Model\Admin\GroupUser;
use App\Model\Admin\User;
use App\Model\Admin\Location;
use App\Model\Admin\PageContent;
use App\Model\Admin\Showtime;
use App\Model\Admin\ImageDescription;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        // seed Location
        foreach (range(0, 3) as $index) {
        	$name = ['Banner', 'Privilege', 'ClickChannel', 'ShopOfTheWeek'];
            $width = [580, 640, 700];
            $height = [420, 480, 540];
            // $parentID = (Location::count() > 0)? Location::orderByRaw('RAND()')->first()->id : 0;
            Location::create([
                'user_id' => User::orderByRaw('RAND()')->first()->id,
                'location_name' => $name[$index],
                'limit' => rand(1, 20),
                'width' => $width[rand(0,count($width)-1)],
                'height' => $height[rand(0,count($height)-1)],
                'parent_id' => 0,
                'sort_order' => 1,
                'types' => rand(1, 2),
                'status' => rand(0, 1)
            ]);
        }

        // seed PageContent
        foreach (range(0, 60) as $index) {
            $location = Location::orderByRaw('RAND()')->first();
            $sortOrder = ($location->pageContents->count() > 0)? $location->pageContents->count() + 1 : 1;
            $date = new DateTime();
            $date_start = $date->format('Y-m-d');
            $date->modify('+' . rand(1, 10) . ' day');
            $date_end = $date->format('Y-m-d');
            PageContent::create([
                'location_id' => $location->id,
                'user_id' => User::orderByRaw('RAND()')->first()->id,
                'name' => $faker->userName,
                'link_url' => $faker->url,
                'image_url' => $faker->imageUrl($width = $location->width, $height = $location->height),
                'sort_order' => $sortOrder,
                'start' => $date_start,
                'end' => $date_end,
                'status' => rand(0, 1)
            ]);
        }
    }
}
