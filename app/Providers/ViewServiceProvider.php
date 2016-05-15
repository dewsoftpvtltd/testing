<?php 
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;

class ViewServiceProvider extends ServiceProvider {

    public function boot(Request $request) {
        view()->composer('userviews.posts',"App\Http\ViewComposers\PostsViewComposer");
        view()->composer('home',"App\Http\ViewComposers\HomeViewComposer");
        view()->composer('schoolviews.schoolpayments',"App\Http\ViewComposers\PaymentsViewComposer");
    }
     public function register()
    {
        //
    }
}