@extends('output.layout')

@section('content')
    <div class="font-sans bg-[#020617] selection:bg-cyan-500/30 selection:text-cyan-200 antialiased overflow-x-hidden">

        {{-- Ultra-Modern Glass Navbar --}}


        {{-- Hero Section --}}
        <section class="relative pt-56 pb-32 px-6">
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full pointer-events-none overflow-hidden">
                <div
                    class="absolute top-[-10%] left-[-20%] w-[800px] h-[800px] bg-blue-600/20 rounded-full blur-[160px] opacity-50">
                </div>
                <div
                    class="absolute bottom-[20%] right-[-10%] w-[600px] h-[600px] bg-cyan-500/10 rounded-full blur-[140px] opacity-30">
                </div>
            </div>

            <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-24 items-center relative z-10">
                {{-- Left Content --}}
                <div class="text-center lg:text-left">
                    <div
                        class="inline-flex items-center space-x-3 bg-gradient-to-r from-blue-500/10 to-cyan-500/10 border border-blue-500/20 px-5 py-2.5 rounded-2xl mb-10 backdrop-blur-md">
                        <div class="flex -space-x-2">
                            <div class="w-6 h-6 rounded-full border-2 border-[#020617] bg-slate-800"></div>
                            <div class="w-6 h-6 rounded-full border-2 border-[#020617] bg-slate-700"></div>
                            <div class="w-6 h-6 rounded-full border-2 border-[#020617] bg-slate-600"></div>
                        </div>
                        <span class="text-cyan-400 text-[10px] font-black uppercase tracking-[0.2em]">Trusted by 1.2k+ MY
                            Admins</span>
                    </div>

                    <h1 class="text-7xl md:text-9xl font-black text-white leading-[0.85] mb-10 tracking-tighter">
                        Pay Day, <br>
                        <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-cyan-300 to-indigo-400">
                            Perfected.
                        </span>
                    </h1>

                    <p class="text-slate-400 text-lg md:text-xl mb-12 max-w-lg leading-relaxed font-medium">
                        The intelligence layer for Malaysian payroll. Automated KWSP, SOCSO, and PCB filing with <span
                            class="text-white font-bold">zero-error</span> guarantee.
                    </p>

                    <div class="flex flex-col sm:flex-row justify-center lg:justify-start gap-6">
                        <a href="#"
                            class="px-10 py-5 bg-blue-600 text-white rounded-[2rem] font-black transition-all hover:shadow-[0_0_40px_rgba(37,99,235,0.4)] hover:-translate-y-1 active:scale-95 flex items-center justify-center">
                            Launch Dashboard
                            <svg class="w-5 h-5 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                        <a href="#"
                            class="px-10 py-5 bg-white/5 border border-white/10 text-white rounded-[2rem] font-black hover:bg-white/10 transition-all text-center backdrop-blur-md">
                            View Demo
                        </a>
                    </div>
                </div>

                {{-- Right Visual: The "Engine" Stack --}}
                <div class="relative">
                    <div class="relative z-20 transform hover:scale-[1.02] transition-transform duration-700">
                        <div
                            class="bg-gradient-to-br from-slate-800 to-slate-950 p-1 rounded-[3rem] shadow-2xl border border-white/10 overflow-hidden">
                            <div class="bg-slate-900/50 backdrop-blur-xl rounded-[2.8rem] p-8">
                                <div class="flex justify-between items-center mb-10">
                                    <div class="flex space-x-2">
                                        <div class="w-3 h-3 rounded-full bg-red-500/40"></div>
                                        <div class="w-3 h-3 rounded-full bg-emerald-500/40"></div>
                                    </div>
                                    <div
                                        class="px-4 py-1.5 rounded-full bg-white/5 border border-white/10 text-[9px] font-black text-slate-500 uppercase tracking-widest">
                                        System Status: Active</div>
                                </div>

                                <div class="space-y-6">
                                    <div
                                        class="h-20 w-full bg-white/5 border border-white/5 rounded-3xl p-5 flex items-center justify-between">
                                        <div class="flex items-center space-x-4">
                                            <div
                                                class="w-10 h-10 bg-blue-500/20 rounded-2xl flex items-center justify-center text-blue-400 italic font-black">
                                                KW</div>
                                            <div>
                                                <div class="h-2 w-24 bg-white/20 rounded-full mb-2"></div>
                                                <div class="h-1.5 w-16 bg-white/5 rounded-full"></div>
                                            </div>
                                        </div>
                                        <div class="text-emerald-400 text-xs font-black tracking-widest">READY</div>
                                    </div>
                                    <div
                                        class="h-20 w-full bg-cyan-400/10 border border-cyan-400/20 rounded-3xl p-5 flex items-center justify-between">
                                        <div class="flex items-center space-x-4">
                                            <div
                                                class="w-10 h-10 bg-cyan-400 rounded-2xl flex items-center justify-center text-slate-900 font-black italic">
                                                LH</div>
                                            <div>
                                                <div class="h-2 w-32 bg-cyan-400/40 rounded-full mb-2"></div>
                                                <div class="h-1.5 w-20 bg-cyan-400/20 rounded-full"></div>
                                            </div>
                                        </div>
                                        <div class="w-5 h-5 rounded-full bg-cyan-400 flex items-center justify-center">
                                            <svg class="w-3 h-3 text-slate-900" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="absolute -top-12 -left-12 z-30 bg-white p-8 rounded-[2.5rem] shadow-[0_30px_60px_rgba(0,0,0,0.3)] animate-bounce"
                        style="animation-duration: 5s">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Cycle Complete</p>
                        <p class="text-3xl font-black text-slate-900 tracking-tighter">RM 84,200</p>
                    </div>

                    <div
                        class="absolute -bottom-8 -right-8 z-30 bg-blue-600 p-8 rounded-[2.5rem] shadow-2xl border-4 border-[#020617] transform rotate-6">
                        <div class="flex items-center space-x-3 text-white">
                            <div class="p-2 bg-white/20 rounded-xl">🔒</div>
                            <span class="font-black text-xs uppercase tracking-widest leading-none">AES-256 <br>
                                Encrypted</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Dark Stats Bar --}}
        <div class="border-y border-white/5 bg-slate-950/50 backdrop-blur-md py-16 px-6">
            <div class="max-w-7xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-12">
                <div class="text-center">
                    <p class="text-4xl font-black text-white tracking-tighter mb-1">0.00%</p>
                    <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Compliance Error</p>
                </div>
                <div class="text-center">
                    <p class="text-4xl font-black text-white tracking-tighter mb-1">24/7</p>
                    <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Direct Support</p>
                </div>
                <div class="text-center border-x border-white/5">
                    <p class="text-4xl font-black text-white tracking-tighter mb-1">128ms</p>
                    <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Calc Latency</p>
                </div>
                <div class="text-center">
                    <p class="text-4xl font-black text-white tracking-tighter mb-1">Tier 1</p>
                    <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Bank Security</p>
                </div>
            </div>
        </div>

        {{-- Feature Cards (The Layout you liked) --}}
        <section class="py-32 px-6">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col md:flex-row justify-between items-end mb-24 gap-8">
                    <div class="max-w-xl">
                        <h2 class="text-5xl font-black text-white tracking-tighter leading-none mb-8 italic">Everything you
                            need <br> to scale fast.</h2>
                        <p class="text-slate-400 font-medium">We've automated the boring stuff so you can focus on building
                            your team.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                    <div
                        class="group relative p-10 rounded-[3rem] bg-white/[0.02] border border-white/5 hover:border-blue-500/50 transition-all duration-500 overflow-hidden">
                        <div class="absolute top-0 right-0 p-8 opacity-5 group-hover:opacity-20 transition-opacity">
                            <svg class="w-32 h-32 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div
                            class="w-16 h-16 bg-blue-600/10 text-blue-500 rounded-2xl flex items-center justify-center mb-10 border border-blue-500/20">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-black text-white mb-4 tracking-tighter italic">Auto-Calculations</h3>
                        <p class="text-slate-500 font-medium leading-relaxed">No more spreadsheets. One click calculates
                            every statutory contribution according to 2026 rates.</p>
                    </div>

                    <div
                        class="group relative p-10 rounded-[3rem] bg-white/[0.02] border border-white/5 hover:border-cyan-400/50 transition-all duration-500">
                        <div
                            class="w-16 h-16 bg-cyan-400/10 text-cyan-400 rounded-2xl flex items-center justify-center mb-10 border border-cyan-400/20">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-black text-white mb-4 tracking-tighter italic">Instant GIRO</h3>
                        <p class="text-slate-500 font-medium leading-relaxed">Download bank-ready batch files instantly.
                            Supported by all major Malaysian banks.</p>
                    </div>

                    <div
                        class="group relative p-10 rounded-[3rem] bg-white/[0.02] border border-white/5 hover:border-indigo-500/50 transition-all duration-500">
                        <div
                            class="w-16 h-16 bg-indigo-500/10 text-indigo-500 rounded-2xl flex items-center justify-center mb-10 border border-indigo-500/20">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-black text-white mb-4 tracking-tighter italic">LHDN Certified</h3>
                        <p class="text-slate-500 font-medium leading-relaxed">Your data is stored and filed securely. We
                            handle the paperwork, you handle the growth.</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Footer --}}
        <footer class="bg-slate-950 py-24 px-6 border-t border-white/5">
            <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-12">
                <div>
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-8 h-8 bg-blue-600 rounded-xl flex items-center justify-center text-white font-bold">P
                        </div>
                        <span class="font-black text-white tracking-widest text-sm uppercase">Payroll<span
                                class="text-blue-500">OS</span></span>
                    </div>
                    <p class="text-slate-500 text-xs font-black uppercase tracking-widest leading-loose">© 2026 Core
                        Intelligence Systems. <br> Built for Malaysia.</p>
                </div>

                <div class="flex space-x-8 text-xs font-black uppercase tracking-widest text-slate-500">
                    <a href="#" class="hover:text-blue-500 transition">Privacy</a>
                    <a href="#" class="hover:text-blue-500 transition">Contact</a>
                    <a href="#" class="hover:text-blue-500 transition">API Docs</a>
                </div>
            </div>
        </footer>
    </div>
@endsection
