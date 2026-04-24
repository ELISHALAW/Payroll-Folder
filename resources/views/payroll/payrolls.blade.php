@extends('output.layout')

@section('content')
    <div class="bg-slate-50 min-h-screen py-12 font-sans">
        <div class="max-w-[1200px] mx-auto px-4">

            <form action="{{ route('payroll.process') }}" method="POST" class="space-y-6">
                @csrf

                <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm transition-all hover:shadow-md">
                    <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                        <div class="flex items-center gap-6">
                            <div
                                class="h-20 w-20 rounded-3xl bg-gradient-to-br from-indigo-500 via-blue-600 to-cyan-500 text-white flex items-center justify-center font-bold text-3xl shadow-xl shadow-blue-100 ring-4 ring-white">
                                {{ substr($user->name, 0, 1) }}
                            </div>
                            <div>
                                <h1 class="text-3xl font-black text-slate-800 tracking-tight">{{ $user->name }}</h1>
                                <div class="flex items-center gap-2 mt-1">
                                    <span
                                        class="px-2 py-0.5 bg-cyan-100 text-cyan-700 text-[10px] font-black uppercase tracking-widest rounded-md">
                                        {{ $user->employee->position->title ?? 'Staff' }}
                                    </span>
                                    <span class="text-slate-400 text-xs font-medium">ID:
                                        #{{ str_pad($user->id, 5, '0', STR_PAD_LEFT) }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
                            <div class="flex bg-slate-100 p-1.5 rounded-2xl border border-slate-200">
                                <select name="month"
                                    class="bg-transparent text-sm font-bold text-slate-700 px-4 outline-none">
                                    @foreach (range(1, 12) as $m)
                                        <option value="{{ $m }}"
                                            {{ old('month', date('n')) == $m ? 'selected' : '' }}>
                                            {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="w-px h-6 bg-slate-300 my-auto mx-1"></div>
                                <select name="year"
                                    class="bg-transparent text-sm font-bold text-slate-700 px-4 outline-none">
                                    <option value="2026" selected>2026</option>
                                    <option value="2027">2027</option>
                                </select>
                            </div>
                            <button type="submit" name="action" value="save"
                                class="bg-cyan-600 hover:bg-cyan-700 text-white px-8 py-3 rounded-2xl font-bold shadow-lg shadow-cyan-100 transition-all hover:-translate-y-0.5 active:scale-95">
                                SAVE RECORD
                            </button>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

                    <div class="lg:col-span-4 space-y-6">
                        <div class="bg-white p-8 rounded-3xl border border-slate-200 shadow-sm relative overflow-hidden">
                            <div class="absolute top-0 left-0 w-1 h-full bg-green-500"></div>
                            <h2
                                class="text-xs font-black text-slate-400 uppercase tracking-[0.2em] mb-8 flex items-center gap-2">
                                Earnings Detail
                            </h2>

                            <div class="space-y-6">
                                <div class="group">
                                    <label class="block text-[11px] font-black text-slate-500 uppercase mb-2 ml-1">Basic
                                        Salary</label>
                                    <div class="relative">
                                        <span
                                            class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 font-bold text-sm">RM</span>
                                        <input type="number" name="basic_salary" step="0.01"
                                            value="{{ old('basic_salary', $user->employee->basic_salary ?? 0) }}"
                                            class="w-full bg-slate-50 border-2 border-slate-100 group-hover:border-slate-200 focus:border-blue-500 rounded-2xl pl-12 pr-4 py-4 text-slate-700 font-black text-lg outline-none transition-all">
                                    </div>
                                </div>

                                <div class="group">
                                    <label class="block text-[11px] font-black text-slate-500 uppercase mb-2 ml-1">Fixed
                                        Allowance</label>
                                    <div class="relative">
                                        <span
                                            class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 font-bold text-sm">RM</span>
                                        <input type="number" name="total_earnings" step="0.01"
                                            value="{{ old('total_earnings', $payroll['inputs']['total_earnings'] ?? '') }}"
                                            placeholder="0.00"
                                            class="w-full bg-slate-50 border-2 border-slate-100 group-hover:border-slate-200 focus:border-blue-500 rounded-2xl pl-12 pr-4 py-4 text-slate-700 font-black text-lg outline-none transition-all">
                                    </div>
                                </div>

                                <button type="submit" name="action" value="calculate"
                                    class="w-full py-4 bg-slate-800 hover:bg-blue-600 text-white font-black rounded-2xl transition-all shadow-xl shadow-slate-200 flex items-center justify-center gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                    </svg>
                                    CALCULATE FIGURES
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-8 grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div class="bg-white p-8 rounded-3xl border border-slate-200 shadow-sm relative overflow-hidden">
                            <div class="absolute top-0 left-0 w-1 h-full bg-red-500"></div>
                            <h2 class="text-xs font-black text-slate-400 uppercase tracking-[0.2em] mb-8">Deductions (EE)
                            </h2>

                            <div class="space-y-4">
                                @foreach (['epf_employee' => 'EPF', 'socso_employee' => 'SOCSO', 'eis_employee' => 'EIS', 'pcb' => 'PCB'] as $key => $label)
                                    <div
                                        class="flex justify-between items-center p-4 bg-slate-50 rounded-2xl border border-slate-100">
                                        <span class="text-xs font-bold text-slate-500">{{ $label }}</span>
                                        <span class="font-black text-slate-700">RM {{ $payroll[$key] ?? '0.00' }}</span>
                                        <input type="hidden" name="{{ $key }}"
                                            value="{{ $payroll[$key] ?? 0 }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="bg-white p-8 rounded-3xl border border-slate-200 shadow-sm relative overflow-hidden">
                            <div class="absolute top-0 left-0 w-1 h-full bg-blue-500"></div>
                            <h2 class="text-xs font-black text-slate-400 uppercase tracking-[0.2em] mb-8">Employer Share
                                (ER)</h2>

                            <div class="space-y-4">
                                @foreach (['epf_employer' => 'EPF (ER)', 'socso_employer' => 'SOCSO (ER)', 'eis_employer' => 'EIS (ER)'] as $key => $label)
                                    <div
                                        class="flex justify-between items-center p-4 bg-blue-50/50 rounded-2xl border border-blue-100/50">
                                        <span class="text-xs font-bold text-blue-600">{{ $label }}</span>
                                        <span class="font-black text-blue-800">RM {{ $payroll[$key] ?? '0.00' }}</span>
                                        <input type="hidden" name="{{ $key }}"
                                            value="{{ $payroll[$key] ?? 0 }}">
                                    </div>
                                @endforeach
                                <div class="p-4 bg-slate-800 rounded-2xl text-center">
                                    <span class="block text-[10px] font-bold text-slate-400 uppercase mb-1">Total ER
                                        Cost</span>
                                    <span class="text-white font-black text-lg">RM
                                        {{ $payroll['total_employer_cost'] ?? '0.00' }}</span>
                                </div>
                            </div>
                        </div>

                        <div
                            class="md:col-span-2 bg-gradient-to-r from-slate-800 to-slate-900 rounded-3xl p-8 text-white shadow-2xl flex flex-col md:flex-row justify-between items-center gap-8 border border-white/10">
                            <div>
                                <p class="text-blue-400 font-black text-[10px] uppercase tracking-[0.3em] mb-2">Net
                                    Take-Home Pay</p>
                                <div class="flex items-baseline gap-3">
                                    <span class="text-2xl font-bold text-slate-500">RM</span>
                                    <span
                                        class="text-6xl font-black tracking-tighter text-white">{{ $payroll['net_salary'] ?? '0.00' }}</span>
                                </div>
                            </div>

                            <div class="flex gap-8 px-8 py-4 bg-white/5 rounded-2xl backdrop-blur-sm border border-white/5">
                                <div class="text-right">
                                    <p class="text-slate-500 text-[10px] font-black uppercase mb-1">Gross</p>
                                    <p class="font-bold text-xl text-white">RM {{ $payroll['gross_salary'] ?? '0.00' }}</p>
                                </div>
                                <div class="w-px h-10 bg-white/10"></div>
                                <div class="text-right">
                                    <p class="text-slate-500 text-[10px] font-black uppercase mb-1">Deductions</p>
                                    <p class="font-bold text-xl text-red-400">RM
                                        {{ $payroll['total_deductions'] ?? '0.00' }}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
