@extends('output.layout')
@section('content')
    <div class="min-h-screen bg-[#f0f4f8] flex items-center justify-center p-4 antialiased">
        <div
            class="w-full max-w-5xl bg-white rounded-[2.5rem] shadow-[0_20px_50px_rgba(8,112,184,0.07)] overflow-hidden flex flex-col lg:flex-row min-h-[650px]">

            <div class="lg:w-5/12 bg-[#0052cc] p-12 text-white flex flex-col justify-between relative">
                <div
                    class="absolute top-0 right-0 w-64 h-64 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 -mr-20 -mt-20">
                </div>
                <div
                    class="absolute bottom-0 left-0 w-48 h-48 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 -ml-10 -mb-10">
                </div>

                <div class="relative z-10">
                    <div class="flex items-center gap-3 mb-16">
                        <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center">
                            <div class="w-5 h-5 bg-blue-600 rounded-sm transform rotate-45"></div>
                        </div>
                        <h2 class="text-2xl font-black tracking-tighter uppercase">360<span
                                class="font-normal opacity-70">Interactive</span></h2>
                    </div>

                    <div class="space-y-10">
                        <div>
                            <h3 class="text-4xl font-bold leading-tight tracking-tight">Setup your<br />Master Account.</h3>
                            <p class="mt-4 text-blue-100/70 leading-relaxed max-w-xs">Initialize the core administrative
                                layer for the Malaysia Payroll System v2.0.</p>
                        </div>

                        <div class="grid grid-cols-1 gap-6 pt-6">
                            <div
                                class="flex items-center gap-4 bg-white/5 border border-white/10 p-4 rounded-2xl backdrop-blur-md">
                                <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span>
                                <span class="text-sm font-semibold opacity-90 tracking-wide">System Status: Ready</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative z-10">
                    <div
                        class="flex items-center justify-between text-[10px] font-bold uppercase tracking-[0.2em] text-blue-200/40">
                        <span>Admin Protocol</span>
                        <span>© 2026</span>
                    </div>
                </div>
            </div>

            <div class="lg:w-7/12 bg-white p-10 lg:p-20 flex flex-col justify-center">
                <div class="max-w-md mx-auto w-full">
                    <div class="mb-12">
                        <h4 class="text-3xl font-extrabold text-slate-900 tracking-tight">Registration</h4>
                        <div class="h-1.5 w-12 bg-blue-600 rounded-full mt-3"></div>
                    </div>

                    <form action="#" method="POST" class="space-y-7">
                        @csrf

                        <div class="relative group">
                            <label
                                class="absolute -top-3 left-4 bg-white px-2 text-[11px] font-black text-slate-400 uppercase tracking-widest group-focus-within:text-blue-600 transition-all">Full
                                Name</label>
                            <input name="name" type="text" required placeholder="Law Seong Chun"
                                class="w-full border-2 border-slate-100 rounded-2xl px-6 py-4 text-slate-700 font-medium focus:border-blue-500 outline-none transition-all placeholder:text-slate-200">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="relative group">
                                <label
                                    class="absolute -top-3 left-4 bg-white px-2 text-[11px] font-black text-slate-400 uppercase tracking-widest group-focus-within:text-blue-600 transition-all">Email</label>
                                <input name="email" type="email" required placeholder="admin@360i.com"
                                    class="w-full border-2 border-slate-100 rounded-2xl px-6 py-4 text-slate-700 font-medium focus:border-blue-500 outline-none transition-all placeholder:text-slate-200">
                            </div>
                            <div class="relative group">
                                <label
                                    class="absolute -top-3 left-4 bg-white px-2 text-[11px] font-black text-slate-400 uppercase tracking-widest group-focus-within:text-blue-600 transition-all">Mobile</label>
                                <input name="mobile" type="text" placeholder="+60 1x-xxx xxxx"
                                    class="w-full border-2 border-slate-100 rounded-2xl px-6 py-4 text-slate-700 font-medium focus:border-blue-500 outline-none transition-all placeholder:text-slate-200">
                            </div>
                        </div>

                        <div class="relative group">
                            <label
                                class="absolute -top-3 left-4 bg-white px-2 text-[11px] font-black text-slate-400 uppercase tracking-widest group-focus-within:text-blue-600 transition-all">Security
                                Password</label>
                            <input name="password" type="password" required placeholder="••••••••••••"
                                class="w-full border-2 border-slate-100 rounded-2xl px-6 py-4 text-slate-700 font-medium focus:border-blue-500 outline-none transition-all placeholder:text-slate-200">
                        </div>

                        <div class="pt-4">
                            <button type="submit"
                                class="w-full bg-slate-900 hover:bg-blue-600 text-white font-black py-5 rounded-2xl shadow-xl shadow-slate-200 hover:shadow-blue-200 transform transition-all duration-300 flex items-center justify-center gap-4 group">
                                <span class="tracking-wider uppercase text-sm">Initialize System Admin</span>
                                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M14 5l7 7m0 0l-7 7m7-7H3" stroke-width="2.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                    </form>

                    <p class="mt-12 text-center text-xs font-bold text-slate-300 uppercase tracking-[0.3em]">Secure
                        Initialization Portal</p>
                </div>
            </div>
        </div>
    </div>
@endsection
