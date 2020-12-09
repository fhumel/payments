<?php

namespace App\Http\Requests\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserRequest extends Controller
{
    public function __construct(Request $request)
    {
        $this->validate(
            $request, [
                'name' => 'required|string|max:200',
                'cpf' => 'required|string|unique:users,document|max:14',
                'email' => 'required|string|unique:users,email|max:120',
                'type' => 'required|integer'
            ]
        );

        parent::__construct($request);
    }
}
