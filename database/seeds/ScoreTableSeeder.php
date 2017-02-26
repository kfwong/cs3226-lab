<?php

use Illuminate\Database\Seeder;

class ScoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
                $scores = ['0', '0.5', '1', '1.5','2','2.5','3','3.5','4'];
                $scoretypes = ['mc', 'tc', 'hw', 'bs', 'ks', 'ac'];
                for($i = 1; $i < 5; $i++) {
                    for($studentid = 1; $studentid <= 50; $studentid++) {
                        for($scoretype = 0; $scoretype < 3; $scoretype++) {
                            $scoreSeed = rand(0, 8);
                            DB::table('scores')->insert([
                                'student_id' => $studentid,
                                'score_type' => $scoretypes[$scoretype],
                                'week' => $i,
                                'score' => $scores[$scoreSeed]
                                ]);
                        }
                    }
                }
        */

        $faker = Faker\Factory::create();

        $studentCount = 25;
        $scoreTypes = ['mc', 'tc', 'hw', 'bs', 'ks', 'ac'];
        $weekCount = 13;

        for ($studentId = 1; $studentId <= $studentCount; $studentId++) {
            for ($week = 1; $week <= $weekCount; $week++) {
                $mc = $faker->numberBetween(0, 5);
                $tc = $faker->numberBetween(0, 5);
                $hw = $faker->numberBetween(0, 5);
                $bs = $faker->numberBetween(0, 5);
                $ks = $faker->numberBetween(0, 5);
                $ac = $faker->numberBetween(0, 5);

                DB::table('scores')->insert([
                    'student_id' => $studentId,
                    'week' => $week,
                    'mc' => $mc,
                    'tc' => $tc,
                    'hw' => $hw,
                    'bs'  => $bs,
                    'ks' => $ks,
                    'ac'  => $ac,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()
                ]);
            }
        }
    }
}
