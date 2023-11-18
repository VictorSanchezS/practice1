<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $course = new Course();
        $course->name = 'Tecnologias Web';
        $course->description = 'Curso de desarrollo web';
        $course->save();

        $course2 = new Course();
        $course2->name = 'Analitica de Datos';
        $course2->description = 'Curso de analisis de datos';
        $course2->save();

    }
}
