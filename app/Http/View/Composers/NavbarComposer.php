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
        $user = null;
        if(Auth::user()) {
            $roles = RoleList::with('role')->where('user_id', '=', Auth::user()->id)->get();
            $current_role = Auth::user()->role;
            $user = Auth::user();
        } else {
            $current_role = (object) [
                "id" => 0,
                "name" => "Guest"
            ];
            $user = (object) [
                "id" => 0,
                "name" => "Guest",
                "role_id" => 0
            ];
            $user = json_encode($user);
        }
        $view->with(compact('roles', 'current_role', 'user'));
    }
}