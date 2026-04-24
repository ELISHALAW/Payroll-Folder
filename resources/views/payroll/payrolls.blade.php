@extends('output.layout')

@section('content')
    <div class="bg-slate-50 min-h-screen py-12 font-sans">
        <div class="max-w-[1200px] mx-auto px-4">
            {{-- Ensure your action route is correctly set --}}
            <form method="POST" action="{{ route('payroll.process') }}" class="space-y-6">
                @csrf

                <div class="bg-white rounded-xl border border-slate-200 p-8 shadow-sm flex justify-between items-center">
                    <div class="flex items-center gap-4">
                        <div
                            class="h-12 w-12 rounded-xl bg-blue-600 text-white flex items-center justify-center font-bold text-xl">
                            {{ substr($user->name, 0, 1) }}
                        </div>
                        <h1 class="text-xl font-black text-slate-800">{{ $user->name }}</h1>
                    </div>
                    <div class="flex gap-3">
                        <button type="submit" name="action" value="calculate"
                            class="bg-slate-800 text-white px-6 py-2 rounded-lg font-bold text-sm transition-all hover:bg-slate-700">CALCULATE</button>
                        <button type="submit" name="action" value="save"
                            class="bg-cyan-600 text-white px-6 py-2 rounded-lg font-bold text-sm transition-all hover:bg-cyan-700">SAVE
                            PAYROLL</button>
                    </div>
                </div>

                <div
                    class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden grid grid-cols-1 md:grid-cols-3 divide-x divide-slate-100">

                    <div class="p-6 space-y-6">
                        <h3 class="text-xs font-black text-slate-400 uppercase tracking-widest border-b pb-2">Basic earnings
                        </h3>

                        <div class="space-y-4">
                            <div>
                                <label class="block text-[10px] font-bold text-slate-400 uppercase mb-1">Basic Salary
                                    (RM)</label>
                                <input type="number" name="basic_salary" step="0.01"
                                    value="{{ old('basic_salary', $user->employee->basic_salary ?? 0) }}"
                                    class="w-full bg-slate-50 border border-slate-200 rounded-lg px-3 py-2 font-bold text-slate-700 outline-none focus:border-blue-500 transition-all">
                            </div>

                            {{-- ADDED: Allowance Input Field --}}
                            <div>
                                <label class="block text-[10px] font-bold text-slate-400 uppercase mb-1">Total Allowance
                                    (RM)</label>
                                <input type="number" name="total_earnings" step="0.01"
                                    value="{{ old('total_earnings', 0) }}" placeholder="0.00"
                                    class="w-full bg-slate-50 border border-slate-200 rounded-lg px-3 py-2 font-bold text-slate-700 outline-none focus:border-blue-500 transition-all">
                            </div>
                        </div>
                    </div>

                    <div class="p-6 space-y-4 bg-slate-50/30">
                        <h3 class="text-xs font-black text-slate-400 uppercase tracking-widest border-b pb-2">Deductions
                        </h3>

                        <div class="space-y-3">
                            @php $p = session('payroll'); @endphp

                            <div>
                                <label class="text-[10px] font-bold text-slate-500 uppercase">EPF (Employee)</label>
                                <input type="text" name="epf_employee" readonly
                                    value="{{ $p['epf_employee'] ?? '0.00' }}"
                                    class="w-full bg-white border border-slate-200 rounded-lg px-3 py-2 text-sm font-bold text-slate-700">
                            </div>

                            <div>
                                <label class="text-[10px] font-bold text-slate-500 uppercase">SOCSO</label>
                                <input type="text" name="socso_employee" readonly
                                    value="{{ $p['socso_employee'] ?? '0.00' }}"
                                    class="w-full bg-white border border-slate-200 rounded-lg px-3 py-2 text-sm font-bold text-slate-700">
                            </div>

                            <div>
                                <label class="text-[10px] font-bold text-slate-500 uppercase">EIS</label>
                                <input type="text" name="eis_employee" readonly
                                    value="{{ $p['eis_employee'] ?? '0.00' }}"
                                    class="w-full bg-white border border-slate-200 rounded-lg px-3 py-2 text-sm font-bold text-slate-700">
                            </div>

                            <div>
                                <label class="text-[10px] font-bold text-slate-500 uppercase">Income Tax (PCB)</label>
                                <input type="text" name="pcb" readonly value="{{ $p['pcb'] ?? '0.00' }}"
                                    class="w-full bg-red-50/50 border border-red-100 rounded-lg px-3 py-2 text-sm font-bold text-red-600">
                            </div>
                        </div>
                    </div>

                    <div class="p-6 space-y-6 bg-slate-50/50">
                        <h3 class="text-xs font-black text-slate-400 uppercase tracking-widest border-b pb-2">Pay amount
                        </h3>

                        <div class="space-y-2">
                            <div class="flex justify-between text-sm">
                                <span class="text-slate-500">Gross Pay</span>
                                <input type="hidden" name="gross_salary" value="{{ $p['gross_salary'] ?? 0 }}">
                                <span class="font-bold text-slate-800">RM
                                    {{ number_format($p['gross_salary'] ?? 0, 2) }}</span>
                            </div>

                            <div class="pt-4 border-t border-slate-200">
                                <label class="text-[10px] font-black text-slate-400 uppercase block mb-1">Net Pay</label>
                                <input type="hidden" name="net_salary" value="{{ $p['net_salary'] ?? 0 }}">
                                <p class="text-3xl font-black text-cyan-600">RM
                                    {{ number_format($p['net_salary'] ?? 0, 2) }}</p>
                            </div>

                            <div class="mt-4 pt-4 border-t border-slate-100 text-[10px]">
                                <p class="font-bold text-slate-400 uppercase mb-1">Employer Share</p>
                                <input type="hidden" name="epf_employer" value="{{ $p['epf_employer'] ?? 0 }}">
                                <input type="hidden" name="socso_employer" value="{{ $p['socso_employer'] ?? 0 }}">
                                <input type="hidden" name="eis_employer" value="{{ $p['eis_employer'] ?? 0 }}">
                                <p class="font-bold text-slate-600">Total ER: RM
                                    {{ number_format($p['total_employer_cost'] ?? 0, 2) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
