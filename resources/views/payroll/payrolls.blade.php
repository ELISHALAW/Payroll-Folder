@extends('output.layout')

@section('content')
    <div class="bg-slate-50 min-h-screen py-12 font-sans">
        <div class="max-w-[1200px] mx-auto px-4">
            <form method="POST" action="{{ route('payroll.process') }}" class="space-y-6">
                @csrf

                {{-- Header Card --}}
                <div
                    class="bg-white rounded-xl border border-slate-200 p-8 shadow-sm flex flex-col md:flex-row justify-between items-center gap-6">
                    <div class="flex items-center gap-4">
                        <div
                            class="h-14 w-14 rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-700 text-white flex items-center justify-center font-bold text-2xl shadow-lg shadow-blue-200">
                            {{ substr($user->name, 0, 1) }}
                        </div>
                        <div>
                            <h1 class="text-xl font-black text-slate-800">{{ $user->name }}</h1>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-tighter">Payroll Processing</p>
                        </div>
                    </div>
                    <div class="flex gap-3 w-full md:w-auto">
                        <button type="submit" name="action" value="calculate"
                            class="flex-1 md:flex-none bg-slate-800 text-white px-8 py-3 rounded-xl font-bold text-sm transition-all hover:bg-slate-700 active:scale-95 shadow-md">
                            CALCULATE
                        </button>
                    </div>
                </div>

                {{-- Main Content Grid --}}
                <div
                    class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden grid grid-cols-1 md:grid-cols-3 divide-y md:divide-y-0 md:divide-x divide-slate-100">

                    {{-- Column 1: Earnings --}}
                    <div class="p-8 space-y-6">
                        <h3
                            class="text-[11px] font-black text-blue-600 uppercase tracking-[0.2em] border-b border-blue-50 pb-3">
                            Basic Earnings</h3>

                        <div class="space-y-5">
                            <div>
                                <label class="block text-[10px] font-bold text-slate-400 uppercase mb-2">Basic Salary
                                    (RM)</label>
                                <input type="number" name="basic_salary" step="0.01" required
                                    value="{{ old('basic_salary', $user->employee->basic_salary ?? 0) }}"
                                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-bold text-slate-700 outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
                                @error('basic_salary')
                                    <p class="text-red-500 text-[10px] mt-1 font-bold">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-[10px] font-bold text-slate-400 uppercase mb-2">Fixed Allowances
                                    (RM)</label>
                                <input type="number" name="total_earnings" step="0.01"
                                    value="{{ old('total_earnings', 0) }}" placeholder="0.00"
                                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-bold text-slate-700 outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
                            </div>
                        </div>
                    </div>

                    {{-- Column 2: Deductions (EE & ER) --}}
                    <div class="p-8 space-y-6 bg-slate-50/30">
                        <h3 class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] border-b pb-3">Statutory
                            Contributions</h3>

                        <div class="space-y-4">
                            @php $p = session('payroll'); @endphp

                            {{-- EPF Row --}}
                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="text-[9px] font-bold text-slate-400 uppercase">EPF (EE)</label>
                                    <div
                                        class="bg-white border border-slate-200 rounded-lg px-3 py-2 text-sm font-bold text-slate-700">
                                        {{ number_format($p['epf_employee'] ?? 0, 2) }}
                                    </div>
                                </div>
                                <div>
                                    <label class="text-[9px] font-bold text-indigo-400 uppercase">EPF (ER)</label>
                                    <div
                                        class="bg-indigo-50/50 border border-indigo-100 rounded-lg px-3 py-2 text-sm font-bold text-indigo-600 text-right">
                                        {{ number_format($p['epf_employer'] ?? 0, 2) }}
                                    </div>
                                </div>
                            </div>

                            {{-- SOCSO Row --}}
                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="text-[9px] font-bold text-slate-400 uppercase">SOCSO (EE)</label>
                                    <div
                                        class="bg-white border border-slate-200 rounded-lg px-3 py-2 text-sm font-bold text-slate-700">
                                        {{ number_format($p['socso_employee'] ?? 0, 2) }}
                                    </div>
                                </div>
                                <div>
                                    <label class="text-[9px] font-bold text-indigo-400 uppercase">SOCSO (ER)</label>
                                    <div
                                        class="bg-indigo-50/50 border border-indigo-100 rounded-lg px-3 py-2 text-sm font-bold text-indigo-600 text-right">
                                        {{ number_format($p['socso_employer'] ?? 0, 2) }}
                                    </div>
                                </div>
                            </div>

                            {{-- EIS Row --}}
                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="text-[9px] font-bold text-slate-400 uppercase">EIS (EE)</label>
                                    <div
                                        class="bg-white border border-slate-200 rounded-lg px-3 py-2 text-sm font-bold text-slate-700">
                                        {{ number_format($p['eis_employee'] ?? 0, 2) }}
                                    </div>
                                </div>
                                <div>
                                    <label class="text-[9px] font-bold text-indigo-400 uppercase">EIS (ER)</label>
                                    <div
                                        class="bg-indigo-50/50 border border-indigo-100 rounded-lg px-3 py-2 text-sm font-bold text-indigo-600 text-right">
                                        {{ number_format($p['eis_employer'] ?? 0, 2) }}
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="text-[10px] font-bold text-rose-400 uppercase">Income Tax (PCB)</label>
                                <div
                                    class="w-full bg-rose-50 border border-rose-100 rounded-lg px-3 py-2 text-sm font-bold text-rose-600">
                                    {{ number_format($p['pcb'] ?? 0, 2) }}
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Column 3: Summary --}}
                    <div class="p-8 space-y-8 bg-slate-50/50">
                        <h3 class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] border-b pb-3">Final
                            Summary</h3>

                        <div class="space-y-6">
                            <div class="flex justify-between items-center">
                                <span class="text-xs font-bold text-slate-500 uppercase">Gross Salary</span>
                                <span class="font-black text-slate-800 text-lg">RM
                                    {{ number_format($p['gross_salary'] ?? 0, 2) }}</span>
                            </div>

                            <div class="pt-6 border-t border-slate-200">
                                <label class="text-[10px] font-black text-cyan-600 uppercase block mb-1 tracking-widest">Net
                                    Take-Home Pay</label>
                                <p class="text-4xl font-black text-slate-900 leading-none">
                                    <span
                                        class="text-xl align-top mr-1 font-bold text-slate-400">RM</span>{{ number_format($p['net_salary'] ?? 0, 2) }}
                                </p>
                            </div>

                            <div class="p-4 bg-white border border-slate-200 rounded-xl shadow-sm">
                                <p class="text-[9px] font-black text-slate-400 uppercase mb-2 tracking-widest">Employer's
                                    Total Cost</p>
                                <div class="flex justify-between items-end">
                                    <span class="text-[10px] font-bold text-slate-500">Statutory Share:</span>
                                    <span class="font-bold text-indigo-600 text-sm">RM
                                        {{ number_format(($p['epf_employer'] ?? 0) + ($p['socso_employer'] ?? 0) + ($p['eis_employer'] ?? 0), 2) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
