<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Card;
use App\Models\ClassSchedule;
use App\Models\Course;
use App\Models\CourseClass;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(10)->has(Card::factory())->create();
        $courses = Course::factory(10)->has(CourseClass::factory()->has(ClassSchedule::factory()))->create();

        foreach ($users as $user)
            $user->enrollments()->create(['class_schedule_id' => $courses->random()->courseClasses[0]->classSchedules[0]->id]);
    }
}
