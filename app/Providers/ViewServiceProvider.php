<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\QuestionAnswer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->composer('post.*', function ($view) {
            $view->with('categories', Category::all());
        });
        view()->composer('answer.*', function ($view) {
            $pendapat = [
                'kategori' => 'Pendapat Alumni',
                'jawaban' => ['Setuju', 'Tidak Setuju', 'Sangat Setuju', 'Sangat Tidak Setuju'],
            ];
            $penilaian = [
                'kategori' => 'Penilaian Alumni',
                'jawaban' => ['Baik', 'Sangat Baik', 'Cukup', 'Kurang'],
            ];
            $answers = [
                'pendapat' => $pendapat,
                'penilaian' => $penilaian,
            ];
            $view->with('answers', $answers);
        });
    }
}
