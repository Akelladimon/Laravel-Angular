<?php

namespace App\Services;

use App\Models\Employee;
use App\Models\User;

class EmployeeService
{
    /**
     * @param $request
     *
     * @return Employee
     */
    public function createEmployee($request): Employee
    {
        $user = User::where('email', '=', $request->email)->first();
        if (empty($user)) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => 'password',
            ]);
        }

        return Employee::create([
            'company_id' => $request->company_id,
            'position' => $request->position ?? '',
            'user_id' => $user->id,
        ]);
    }
}
