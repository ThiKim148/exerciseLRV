<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\ProductType;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;

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
        View::composer('*', function ($view) {				
            $loai_sp = ProductType::all();				
            $view->with('loai_sp', $loai_sp);				
        }); 

        view()->composer('header', function ($view) {
            $oldCart = Session::get('cart'); // Lấy giỏ hàng từ session
            $cart = new Cart($oldCart ?? new \stdClass()); // Tránh lỗi nếu $oldCart = null
        
            $view->with([
                'cart' => $oldCart,
                'product_cart' => $cart->items ?? [],
                'totalPrice' => $cart->totalPrice ?? 0,
                'totalQty' => $cart->totalQty ?? 0
            ]);
        });					
            
    }
}
