<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function export()
    {
        $users = User::query()
                     ->with(['country','aspiration','images' => function($query){
                         $query->oldest();
                     }]);
        return (new UsersExport($users))->download('users.xlsx');
    }
}
