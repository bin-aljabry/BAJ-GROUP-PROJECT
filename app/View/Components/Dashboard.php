<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Collection;
use App\Models\Product;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\company;


class Dashboard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $user = User::count();
        view()->share('user',$user);

        $category = Category::count();
        view()->share('category',$category);

        $product = Product::count();
        view()->share('product',$product);

        $collection = Collection::count();
        view()->share('collection',$collection);
        $company = Company::count();
        view()->share('company',$company);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard');
    }
}
