@extends('output.layout')
@section('content')
    <div class="min-h-screen bg-slate-50 font-sans text-slate-900">

        <main class="max-w-7xl mx-auto p-8">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">
                <div>
                    <h1 class="text-3xl font-extrabold tracking-tight text-slate-900">Payroll Dashboard</h1>
                    <p class="text-slate-500 mt-1">Manage your team's compensation and statutory compliance.</p>
                </div>
                <div class="flex gap-3">
                    <button
                        class="bg-white border border-slate-200 text-slate-700 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-slate-50 transition shadow-sm">
                        Export Data
                    </button>
                    <button
                        class="bg-indigo-600 text-white px-5 py-2 rounded-lg text-sm font-semibold hover:bg-indigo-700 transition shadow-md shadow-indigo-200">
                        + Start Pay Run
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition">
                    <div class="flex justify-between items-start">
                        <div class="p-2 bg-indigo-50 text-indigo-600 rounded-lg text-xl">💳</div>
                        <span class="text-xs font-bold text-green-600 bg-green-50 px-2 py-0.5 rounded-full">+4.5%</span>
                    </div>
                    <p class="text-slate-500 text-sm font-medium mt-4">Gross Payroll (Apr)</p>
                    <p class="text-2xl font-bold mt-1">RM 48,250.00</p>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition">
                    <div class="p-2 bg-emerald-50 text-emerald-600 rounded-lg text-xl w-fit">👥</div>
                    <p class="text-slate-500 text-sm font-medium mt-4">Total Workforce</p>
                    <p class="text-2xl font-bold mt-1">32 <span
                            class="text-sm font-normal text-slate-400 text-sm">Staff</span></p>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition">
                    <div class="p-2 bg-amber-50 text-amber-600 rounded-lg text-xl w-fit">⏳</div>
                    <p class="text-slate-500 text-sm font-medium mt-4">Pending Approval</p>
                    <p class="text-2xl font-bold mt-1">3 <span
                            class="text-sm font-normal text-slate-400 text-sm">Claims</span></p>
                </div>

                <div class="bg-indigo-600 p-6 rounded-2xl shadow-lg shadow-indigo-100 text-white">
                    <div class="p-2 bg-white/20 rounded-lg text-xl w-fit">📅</div>
                    <p class="text-indigo-100 text-sm font-medium mt-4">Next Disbursement</p>
                    <p class="text-2xl font-bold mt-1 text-white">28 April</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

                <div class="lg:col-span-8 bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div
                        class="p-6 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <h2 class="font-bold text-slate-800 text-lg">Payroll History</h2>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-3 flex items-center text-slate-400">🔍</span>
                            <input type="text" placeholder="Search period..."
                                class="pl-9 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 w-full sm:w-64" />
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50/50 text-slate-400 text-[11px] uppercase tracking-wider font-bold">
                                    <th class="px-6 py-4">Billing Cycle</th>
                                    <th class="px-6 py-4">Total Net</th>
                                    <th class="px-6 py-4">Staff Count</th>
                                    <th class="px-6 py-4">Status</th>
                                    <th class="px-6 py-4 text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                <tr class="hover:bg-slate-50/80 transition">
                                    <td class="px-6 py-4">
                                        <p class="text-sm font-semibold text-slate-700">March 2026</p>
                                        <p class="text-xs text-slate-400">Processed on Mar 27</p>
                                    </td>
                                    <td class="px-6 py-4 font-mono text-sm font-medium text-slate-600">RM 42,100.00</td>
                                    <td class="px-6 py-4 text-sm text-slate-600">28</td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800">
                                            Completed
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <button
                                            class="text-indigo-600 hover:text-indigo-800 font-bold text-lg leading-none tracking-widest">···</button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-50/80 transition">
                                    <td class="px-6 py-4 text-sm font-semibold text-slate-700">February 2026</td>
                                    <td class="px-6 py-4 font-mono text-sm font-medium text-slate-600">RM 41,500.00</td>
                                    <td class="px-6 py-4 text-sm text-slate-600">26</td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800">
                                            Completed
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <button
                                            class="text-indigo-600 hover:text-indigo-800 font-bold text-lg leading-none tracking-widest">···</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="p-4 bg-slate-50 border-t border-slate-100 text-center">
                        <button class="text-sm font-semibold text-indigo-600 hover:text-indigo-700">Load Older
                            Records</button>
                    </div>
                </div>

                <div class="lg:col-span-4 space-y-6">
                    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                        <h3 class="font-bold text-slate-800 mb-4">Statutory Readiness</h3>
                        <div class="space-y-4">
                            <div>
                                <div class="flex justify-between text-xs mb-1.5">
                                    <span class="font-medium text-slate-600">EPF Contribution (KWSP)</span>
                                    <span class="text-emerald-600 font-bold">Ready</span>
                                </div>
                                <div class="w-full bg-slate-100 rounded-full h-1.5">
                                    <div class="bg-emerald-500 h-1.5 rounded-full" style="width: 100%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between text-xs mb-1.5">
                                    <span class="font-medium text-slate-600">SOCSO & EIS (PERKESO)</span>
                                    <span class="text-indigo-600 font-bold">In Progress</span>
                                </div>
                                <div class="w-full bg-slate-100 rounded-full h-1.5">
                                    <div class="bg-indigo-500 h-1.5 rounded-full" style="width: 65%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between text-xs mb-1.5">
                                    <span class="font-medium text-slate-600">Tax Withholding (PCB)</span>
                                    <span class="text-slate-400 font-bold">Pending Pay Run</span>
                                </div>
                                <div class="w-full bg-slate-100 rounded-full h-1.5">
                                    <div class="bg-slate-300 h-1.5 rounded-full" style="width: 10%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-slate-800 to-slate-900 p-6 rounded-2xl shadow-lg text-white">
                        <p class="text-sm font-medium opacity-80 mb-1">Need help with filings?</p>
                        <h3 class="font-bold text-lg leading-snug">Download the 2026 Malaysia Tax Guide</h3>
                        <button
                            class="mt-4 w-full py-2 bg-white/10 hover:bg-white/20 transition rounded-lg text-sm font-semibold border border-white/20">
                            Download PDF
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
