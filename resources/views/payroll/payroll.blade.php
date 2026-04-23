<div class="bg-slate-50 min-h-screen py-10 font-sans">
    <div class="max-w-[1150px] mx-auto bg-white shadow-xl shadow-slate-200/50 border border-slate-100 rounded-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:shadow-slate-200/60">
        <form id="payrollForm">
            <input type="hidden" name="action" id="formAction" value="calculate">

            <div class="flex flex-col md:flex-row justify-between items-start md:items-center p-8 bg-white border-b border-slate-100">
                <div class="mb-5 md:mb-0">
                    <div class="flex items-center gap-4 mb-4 md:mb-2">
                        <div class="h-12 w-12 rounded-full bg-cyan-100 text-cyan-600 flex items-center justify-center font-bold text-xl border border-cyan-200 shadow-sm">
                            J
                        </div>
                        <div>
                            <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">John Doe</h1>
                            <p class="text-xs font-semibold text-slate-400 mt-0.5">Software Engineer</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-6 mt-4 md:mt-2 md:pl-[64px]">
                        <div class="flex flex-col">
                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1.5">Salary Type</span>
                            <select class="text-sm font-semibold border border-slate-200 rounded-lg py-2 px-4 w-32 bg-slate-50 text-slate-700 shadow-sm appearance-none" disabled>
                                <option>Monthly</option>
                            </select>
                        </div>

                        <div class="flex flex-col">
                            <span class="text-[10px] font-bold text-cyan-600 uppercase tracking-widest mb-1.5">Active Month</span>
                            <select name="selected_month" class="text-sm border-cyan-200 rounded-lg py-2 px-4 w-40 bg-cyan-50 text-cyan-700 font-bold shadow-sm focus:ring-2 focus:ring-cyan-500 transition-all cursor-pointer hover:bg-cyan-100 outline-none">
                                <option>January</option><option>February</option><option>March</option>
                                <option>April</option><option>May</option><option>June</option>
                                <option>July</option><option>August</option><option>September</option>
                                <option>October</option><option>November</option><option selected>December</option>
                            </select>
                        </div>

                        <div class="flex flex-col">
                            <span class="text-[10px] font-bold text-cyan-600 uppercase tracking-widest mb-1.5">Active Year</span>
                            <select name="selected_year" class="text-sm border-cyan-200 rounded-lg py-2 px-4 w-32 bg-cyan-50 text-cyan-700 font-bold shadow-sm focus:ring-2 focus:ring-cyan-500 transition-all cursor-pointer hover:bg-cyan-100 outline-none">
                                <option>2022</option><option>2023</option><option>2024</option><option>2025</option><option selected>2026</option><option>2027</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col items-end gap-4 w-full md:w-auto">
                    <button type="button" class="text-slate-400 text-xs font-medium hover:text-red-500 hover:underline transition-colors flex items-center gap-1.5 group">
                        Reset payroll
                    </button>

                    <a href="#" class="flex-1 md:flex-none justify-center bg-white border border-slate-200 text-slate-700 text-xs px-5 py-2.5 rounded-lg font-bold tracking-wider hover:bg-slate-50 hover:border-slate-300 shadow-sm hover:shadow transition-all flex items-center gap-2">
                        FIRST TIME ONBOARDING
                    </a>

                    <div class="flex gap-3 w-full md:w-auto mt-2 md:mt-0">
                        <a href="#" class="flex-1 md:flex-none justify-center bg-white border border-slate-200 text-slate-700 text-xs px-5 py-2.5 rounded-lg font-bold tracking-wider hover:bg-slate-50 hover:border-slate-300 shadow-sm hover:shadow transition-all flex items-center gap-2">
                            PAYSLIP
                        </a>

                        <button type="button" class="flex-1 md:flex-none justify-center bg-slate-100 border border-slate-300 text-slate-600 text-xs px-5 py-2.5 rounded-lg font-bold tracking-wider hover:bg-slate-200 hover:border-slate-400 shadow-sm hover:shadow transition-all flex items-center gap-2">
                            CALCULATE
                        </button>

                        <button type="button" class="flex-1 md:flex-none justify-center bg-cyan-600 text-white text-xs px-6 py-2.5 rounded-lg font-bold tracking-wider shadow-md hover:shadow-lg hover:bg-cyan-700 transform hover:-translate-y-0.5 transition-all flex items-center gap-2">
                            SAVE MONTH
                        </button>
                    </div>
                </div>
            </div>

            <!-- Keep your existing 4-column layout here -->
            <!-- Replace any {{ ... }} values with static text/numbers e.g. 5000.00, 550.00 -->

            <div class="p-8">
                <p class="text-sm text-slate-500">Frontend-only mode: dynamic backend bindings removed.</p>
                <p class="text-2xl font-black text-slate-800 mt-3">NET PAY: RM 4,250</p>
            </div>
        </form>
    </div>
</div>