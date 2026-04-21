<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

    public function index()
    {
        return view('auth.register'); // Make sure this path matches your blade file
    }


    public function store(Request $request)
    {
        // 1. Validation
        // Note: 'user_name' and 'mobile' are included based on your new fields
        $request->validate([
            // Company Fields
            'name' => 'required|string|max:255',
            'registration_no' => 'required|string|unique:companies,registration_no',
            'address' => 'required|string',
            'city' => 'required|string',
            'postcode' => 'required|string',
            'state' => 'required|string',

            // User Fields
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'mobile' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        try {
            // 2. Database Transaction
            // This ensures both operations succeed together
            $user = DB::transaction(function () use ($request) {

                // 3. Create the Company
                $company = Company::create([
                    'name' => $request->name,
                    'registration_no' => $request->registration_no,
                    'sst_no' => $request->sst_no,
                    'address' => $request->address,
                    'city' => $request->city,
                    'postcode' => $request->postcode,
                    'state' => $request->state,
                    'country' => 'Malaysia', // Default as per your DB screenshot
                    'epf_employer_no' => $request->epf_employer_no,
                    'socso_employer_no' => $request->socso_employer_no,
                    'tax_employer_no' => $request->tax_employer_no,
                ]);

                // 4. Create the Admin User
                return User::create([
                    'company_id' => $company->id, // Linking user to the new company
                    'name' => $request->user_name,
                    'email' => $request->email,
                    'mobile' => $request->mobile,
                    'password' => Hash::make($request->password),
                    'role' => $request->role ?? 1, // Default to 1 (Admin)
                    'status' => 1, // 1 represents 'active' as a number
                ]);
            });

            // 5. Log the user in and redirect
            Auth::login($user);

            return redirect()->route('login')->with('success', 'Registration successful! Please log in to continue.');
        } catch (\Exception $e) {
            // If anything fails, return with error
            return back()->withInput()->withErrors(['error' => 'Registration failed. Please try again. ' . $e->getMessage()]);
        }
    }
}
