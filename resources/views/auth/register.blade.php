@extends('output.layout')
@section('content')
<div class="min-h-screen flex flex-col md:flex-row bg-white">

    <div class="w-full md:w-[40%] flex items-center justify-center p-8 lg:p-16">
        <div class="w-full max-w-md">
            <div class="mb-10">
                <h2 class="text-3xl font-black text-slate-900 tracking-tighter">
                    360 <span class="text-blue-600">Interactive</span>
                </h2>
                <p class="text-slate-500 mt-2">Initialize your account to get started.</p>
            </div>
            @if ($errors->any())
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50">
                {{ $errors->first() }}
            </div>
            @endif

            <div class="flex bg-slate-100 p-1 rounded-xl mb-8">
                <button type="button" id="btn-company" onclick="switchForm('company')"
                    class="cursor-pointer flex-1 py-2 text-xs font-bold uppercase tracking-wider rounded-lg transition-all bg-white text-blue-600 shadow-sm">
                    Company
                </button>
                <button type="button" id="btn-user" onclick="switchForm('user')"
                    class="cursor-pointer flex-1 py-2 text-xs font-bold uppercase tracking-wider rounded-lg transition-all text-slate-400 hover:text-slate-600">
                    User
                </button>
            </div>

            <form action="{{ route('register.store') }}" method="POST">
                @csrf

                <div id="company-section" class="space-y-5">
                    <div class="space-y-1">
                        <label class="text-xs font-bold text-slate-700">Company Legal Name</label>
                        <input name="name" type="text" placeholder="e.g. 360 Interactive Sdn Bhd"
                            class="w-full bg-blue-50/50 border border-slate-200 rounded-xl px-4 py-3 outline-none focus:border-blue-500 focus:bg-white transition-all">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-1">
                            <label class="text-xs font-bold text-slate-700">Registration No (SSM)</label>
                            <input name="registration_no" type="text" placeholder="2024010..."
                                class="w-full bg-blue-50/50 border border-slate-200 rounded-xl px-4 py-3 focus:bg-white focus:border-blue-500 transition-all">
                        </div>
                        <div class="space-y-1">
                            <label class="text-xs font-bold text-slate-700">SST No</label>
                            <input name="sst_no" type="text" placeholder="W10-..."
                                class="w-full bg-blue-50/50 border border-slate-200 rounded-xl px-4 py-3 focus:bg-white focus:border-blue-500 transition-all">
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label class="text-xs font-bold text-slate-700">Full Address</label>
                        <input name="address" type="text" placeholder="Street address"
                            class="w-full bg-blue-50/50 border border-slate-200 rounded-xl px-4 py-3 focus:bg-white focus:border-blue-500 transition-all">
                    </div>

                    <div class="grid grid-cols-3 gap-3">
                        <div class="space-y-1">
                            <label class="text-xs font-bold text-slate-700">City</label>
                            <input name="city" type="text" placeholder="City"
                                class="w-full bg-blue-50/50 border border-slate-200 rounded-xl px-4 py-3 focus:bg-white focus:border-blue-500 transition-all text-sm">
                        </div>
                        <div class="space-y-1">
                            <label class="text-xs font-bold text-slate-700">Postcode</label>
                            <input name="postcode" type="text" placeholder="50000"
                                class="w-full bg-blue-50/50 border border-slate-200 rounded-xl px-4 py-3 focus:bg-white focus:border-blue-500 transition-all text-sm">
                        </div>
                        <div class="space-y-1">
                            <label class="text-xs font-bold text-slate-700">State</label>
                            <input name="state" type="text" placeholder="Selangor"
                                class="w-full bg-blue-50/50 border border-slate-200 rounded-xl px-4 py-3 focus:bg-white focus:border-blue-500 transition-all text-sm">
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-3">
                        <div class="space-y-1">
                            <label class="text-xs font-bold text-slate-700">EPF No</label>
                            <input name="epf_employer_no" type="text" placeholder="EPF"
                                class="w-full bg-blue-50/50 border border-slate-200 rounded-xl px-4 py-3 focus:bg-white focus:border-blue-500 transition-all text-sm">
                        </div>
                        <div class="space-y-1">
                            <label class="text-xs font-bold text-slate-700">SOCSO No</label>
                            <input name="socso_employer_no" type="text" placeholder="SOCSO"
                                class="w-full bg-blue-50/50 border border-slate-200 rounded-xl px-4 py-3 focus:bg-white focus:border-blue-500 transition-all text-sm">
                        </div>
                        <div class="space-y-1">
                            <label class="text-xs font-bold text-slate-700">Tax No</label>
                            <input name="tax_employer_no" type="text" placeholder="Tax"
                                class="w-full bg-blue-50/50 border border-slate-200 rounded-xl px-4 py-3 focus:bg-white focus:border-blue-500 transition-all text-sm">
                        </div>
                    </div>

                    <button type="button" onclick="switchForm('user')"
                        class="w-full bg-blue-600 text-white font-bold py-4 rounded-xl shadow-lg shadow-blue-200 hover:bg-blue-700 transition-all mt-4">
                        Next: Admin Setup
                    </button>
                </div>
                <div id="user-section" class="hidden space-y-5">
                    <div class="space-y-1">
                        <label class="text-xs font-bold text-slate-700">Admin Full Name</label>
                        <input name="user_name" type="text" placeholder="John Doe"
                            class="w-full bg-blue-50/50 border border-slate-200 rounded-xl px-4 py-3 focus:bg-white focus:border-blue-500 transition-all">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-1">
                            <label class="text-xs font-bold text-slate-700">Email Address</label>
                            <input name="email" type="email" placeholder="name@company.com"
                                class="w-full bg-blue-50/50 border border-slate-200 rounded-xl px-4 py-3 focus:bg-white focus:border-blue-500 transition-all">
                        </div>
                        <div class="space-y-1">
                            <label class="text-xs font-bold text-slate-700">Mobile Number</label>
                            <input name="mobile" type="text" placeholder="012-3456789"
                                class="w-full bg-blue-50/50 border border-slate-200 rounded-xl px-4 py-3 focus:bg-white focus:border-blue-500 transition-all">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-1">
                            <label class="text-xs font-bold text-slate-700">Password</label>
                            <input name="password" type="password" placeholder="••••••••"
                                class="w-full bg-blue-50/50 border border-slate-200 rounded-xl px-4 py-3 focus:bg-white focus:border-blue-500 transition-all">
                        </div>
                        <div class="space-y-1">
                            <label class="text-xs font-bold text-slate-700">Confirm Password</label>
                            <input name="password_confirmation" type="password" placeholder="••••••••"
                                class="w-full bg-blue-50/50 border border-slate-200 rounded-xl px-4 py-3 focus:bg-white focus:border-blue-500 transition-all">
                        </div>
                    </div>

                    <input type="hidden" name="role" value="1"> <input type="hidden" name="status" value="active">

                    <div class="flex gap-3 pt-4">
                        <button type="button" onclick="switchForm('company')"
                            class="flex-1 bg-slate-100 text-slate-500 font-bold py-4 rounded-xl hover:bg-slate-200 transition-all text-sm">Back</button>
                        <button type="submit"
                            class="flex-[2] bg-blue-600 text-white font-bold py-4 rounded-xl shadow-lg shadow-blue-200 hover:bg-blue-700 transition-all text-sm">
                            Initialize System
                        </button>
                    </div>
                </div>
            </form>

            <div class="mt-8 text-center">
                <p class="text-sm text-slate-500">Already have an account? <a href="/login"
                        class="text-blue-600 font-bold hover:underline">Log in here</a></p>
            </div>
        </div>
    </div>

    <div class="hidden md:flex md:w-[60%] bg-blue-600 items-center justify-center p-12 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-white/10 rounded-full -mr-20 -mt-20 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-blue-400/20 rounded-full -ml-10 -mb-10 blur-2xl"></div>

        <div class="relative z-10 text-center text-white max-w-2xl">
            <h1 class="text-5xl font-extrabold leading-tight mb-6">
                The #1 HR Platform in Malaysia
            </h1>
            <p class="text-blue-100 text-lg mb-10 opacity-90">
                Trusted by 20,000+ companies to handle Payroll, Leave, Claims, and Benefits automatically.
            </p>

            <div class="flex flex-wrap justify-center gap-4">
                <span
                    class="px-4 py-2 border border-white/30 rounded-lg text-xs font-bold tracking-widest uppercase bg-white/10">LHDN
                    Compliant</span>
                <span
                    class="px-4 py-2 border border-white/30 rounded-lg text-xs font-bold tracking-widest uppercase bg-white/10">KWSP/SOCSO</span>
                <span
                    class="px-4 py-2 border border-white/30 rounded-lg text-xs font-bold tracking-widest uppercase bg-white/10">PDPA
                    Secure</span>
            </div>
        </div>
    </div>
</div>
@endsection