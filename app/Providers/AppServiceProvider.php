<?php
namespace App\Providers;

use App\Models\Cate;
use App\Models\Genre;
use App\Models\Visitor;
use Carbon\Carbon;
use Flasher\Laravel\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        Carbon::setLocale('vi');
        View::composer('*',function($view){
            
            $now=Carbon::now();
            $year=Carbon::now()->subDays(365)->toDateString();
            $early_last_month=Carbon::now()->subMonth()->startOfMonth()->toDateString();
            $end_last_month=Carbon::now()->subMonth()->endOfMonth()->toDateString();
            $this_month=Carbon::now()->startOfMonth()->toDateString();
            $count_this_month=Visitor::whereBetween('date_visitor',[$this_month,$now])->get()->count();
            $count_last_month=Visitor::whereBetween('date_visitor',[$early_last_month,$end_last_month])->get()->count();
            $count_year=Visitor::whereBetween('date_visitor',[$year,$now])->get()->count();
            
            $cate=Cate::latest()->get();
            $genre=Genre::latest()->get();
            $view->with(compact('cate','genre','count_this_month','count_last_month','count_year'));
        });
    }
}
