@extends('output.layout')

@section('content')
    <div class="bg-slate-50 min-h-screen py-12 font-sans">
        <div class="max-w-[1200px] mx-auto">

            <form id="payrollForm" action="#" method="POST">
                @csrf
                <div class="bg-white rounded-t-2xl border border-slate-200 p-8 shadow-sm">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                        <div class="flex items-center gap-5">
                            <div
                                class="h-16 w-16 rounded-2xl bg-gradient-to-br from-cyan-500 to-blue-600 text-white flex items-center justify-center font-bold text-2xl shadow-lg shadow-cyan-200">
                                {{ substr($user->name, 0, 1) }}
                            </div>
                            <div>
                                <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">{{ $user->name }}</h1>
                                <p class="text-sm font-bold text-cyan-600 uppercase tracking-widest">
                                    {{ $user->employee->position->title ?? 'Employee' }}
                                </p>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-3">
                            <div class="bg-slate-50 p-2 rounded-xl border border-slate-100 flex gap-2">
                                <select name="month"
                                    class="bg-transparent text-sm font-bold text-slate-700 outline-none px-2 cursor-pointer">
                                    @foreach (range(1, 12) as $m)
                                        <option value="{{ $m }}" {{ date('n') == $m ? 'selected' : '' }}>
                                            {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                                        </option>
                                    @endforeach
                                </select>
                                <select name="year"
                                    class="bg-transparent text-sm font-bold text-slate-700 outline-none px-2 cursor-pointer border-l border-slate-200">
                                    <option value="2026" selected>2026</option>
                                    <option value="2027">2027</option>
                                </select>
                            </div>
                            <button type="submit"
                                class="bg-cyan-600 hover:bg-cyan-700 text-white px-6 py-2.5 rounded-xl font-bold shadow-md transition-all active:scale-95">
                                SAVE PAYROLL
                            </button>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">

                    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                        <h2 class="text-sm font-black text-slate-400 uppercase tracking-wider mb-6 flex items-center gap-2">
                            <span class="h-2 w-2 rounded-full bg-green-500"></span> Earnings
                        </h2>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-500 mb-1.5">Basic Salary (RM)</label>
                                <input type="number" name="basic_salary" id="basic_salary" step="0.01"
                                    value="{{ $user->employee->basic_salary ?? 0.0 }}"
                                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-700 font-bold focus:ring-2 focus:ring-cyan-500 outline-none transition-all">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-500 mb-1.5">Total Allowance (RM)</label>
                                <input type="number" name="total_earnings" id="total_allowance" step="0.01"
                                    placeholder="0.00"
                                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-700 font-bold focus:ring-2 focus:ring-cyan-500 outline-none transition-all">
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                        <h2 class="text-sm font-black text-slate-400 uppercase tracking-wider mb-6 flex items-center gap-2">
                            <span class="h-2 w-2 rounded-full bg-red-500"></span> Employee Deductions
                        </h2>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-2">
                                <label class="block text-xs font-bold text-slate-500 mb-1.5">EPF (Employee)</label>
                                <input type="number" name="employee_epf" id="employee_epf" step="0.01" readonly
                                    class="calc-deduction w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2 text-red-600 font-bold outline-none focus:border-red-300">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-500 mb-1.5">SOCSO</label>
                                <input type="number" name="employee_socso" id="employee_socso" step="0.01" readonly
                                    class="calc-deduction w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2 text-red-600 font-bold outline-none focus:border-red-300">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-500 mb-1.5">EIS</label>
                                <input type="number" name="employee_eis" id="employee_eis" step="0.01" readonly
                                    class="calc-deduction w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2 text-red-600 font-bold outline-none focus:border-red-300">
                            </div>
                            <div class="col-span-2">
                                <label class="block text-xs font-bold text-slate-500 mb-1.5">PCB (Income Tax)</label>
                                <input type="number" name="employee_pcb" id="employee_pcb" step="0.01" readonly
                                    class="calc-deduction w-full bg-red-50 border border-red-100 rounded-xl px-4 py-2 text-red-700 font-black outline-none focus:ring-2 focus:ring-red-200"
                                    placeholder="0.00">
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                        <h2 class="text-sm font-black text-slate-400 uppercase tracking-wider mb-6 flex items-center gap-2">
                            <span class="h-2 w-2 rounded-full bg-blue-500"></span> Employer Share
                        </h2>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center p-3 bg-blue-50 rounded-xl">
                                <span class="text-xs font-bold text-blue-700">EPF (Employer)</span>
                                <input type="number" name="employer_epf" step="0.01" readonly
                                    class="w-24 bg-transparent text-right font-black text-blue-800 outline-none"
                                    placeholder="0.00">
                            </div>
                            <div class="flex justify-between items-center p-3 bg-slate-50 rounded-xl">
                                <span class="text-xs font-bold text-slate-600">SOCSO (Employer)</span>
                                <input type="number" name="employer_socso" step="0.01" readonly
                                    class="w-24 bg-transparent text-right font-bold text-slate-700 outline-none"
                                    placeholder="0.00">
                            </div>
                            <div class="flex justify-between items-center p-3 bg-slate-50 rounded-xl">
                                <span class="text-xs font-bold text-slate-600">EIS (Employer)</span>
                                <input type="number" name="employer_eis" step="0.01" readonly
                                    class="w-24 bg-transparent text-right font-bold text-slate-700 outline-none"
                                    placeholder="0.00">
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="mt-6 bg-slate-800 rounded-2xl p-8 text-white shadow-xl flex flex-col md:flex-row justify-between items-center gap-6">
                    <div>
                        <p class="text-slate-400 font-bold text-xs uppercase tracking-widest mb-1">Total Net Salary</p>
                        <div class="flex items-baseline gap-2">
                            <span class="text-2xl font-bold text-slate-400">RM</span>
                            <span class="text-5xl font-black tracking-tight" id="netPayDisplay">0.00</span>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="text-right border-r border-slate-700 pr-6">
                            <p class="text-slate-400 text-[10px] font-bold uppercase mb-1">Gross Salary</p>
                            <p class="font-bold text-xl">RM <span id="grossDisplay">0.00</span></p>
                        </div>
                        <div class="text-right">
                            <p class="text-slate-400 text-[10px] font-bold uppercase mb-1">Total Deductions</p>
                            <p class="font-bold text-xl text-red-400">RM <span id="deductionDisplay">0.00</span></p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
