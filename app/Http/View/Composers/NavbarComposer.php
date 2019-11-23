<?php

namespace App\Http\View\Composers;

use Auth;
use App\RoleList;
use Illuminate\View\View;

class NavbarComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $roles = null;
        $current_role = null;
        if(Auth::user()) {
            $roles = RoleList::with('role')->where('user_id', '=', Auth::user()->id)->get();
            $current_role = Auth::user()->role;
        }
        $view->with(compact('roles', 'current_role'));
    }
}