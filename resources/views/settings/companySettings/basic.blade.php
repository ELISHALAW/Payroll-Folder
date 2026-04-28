@extends('output.admin')

@section('content')
    <div class="max-w-5xl">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800 tracking-tight">Company Settings</h1>
            <p class="text-sm text-gray-500">Manage your company profile and public information.</p>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-50 flex items-center justify-between bg-white">
                <div class="flex items-center gap-2">
                    <h2 class="text-lg font-semibold text-gray-700">Basic Details</h2>
                    <button type="button" class="text-gray-400 hover:text-cyan-500 transition-colors">
                        <i class="bi bi-question-circle text-sm"></i>
                    </button>
                </div>
            </div>

            <form action="#" method="POST" enctype="multipart/form-data" class="p-8 space-y-8">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-start">
                    <div>
                        <label class="text-sm font-semibold text-gray-700">Company Logo</label>
                        <p class="text-xs text-gray-400 mt-1">This will appear on your payslips and reports.</p>
                    </div>
                    <div class="md:col-span-3">
                        <div class="flex items-center gap-6">
                            <div class="relative group">
                                <div
                                    class="w-24 h-24 rounded-lg border-2 border-dashed border-gray-200 bg-gray-50 flex items-center justify-center overflow-hidden transition-colors group-hover:border-cyan-300">
                                    <img src="{{ asset('path-to-placeholder.png') }}" alt="Logo"
                                        class="object-contain w-full h-full p-2">
                                </div>
                            </div>
                            <div class="flex-1">
                                <input type="file" name="logo" id="logo-upload" class="hidden">
                                <label for="logo-upload"
                                    class="cursor-pointer inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-cyan-600 hover:border-cyan-600 focus:outline-none transition-all">
                                    Choose New Logo
                                </label>
                                <p class="mt-2 text-[11px] text-gray-400">JPG, PNG up to 1MB. Recommended size 400x400px.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="border-gray-50">

                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <label class="text-sm font-semibold text-gray-700 md:pt-2">Identity</label>
                    <div class="md:col-span-3 grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-1">
                            <span class="text-[11px] font-bold text-gray-400 uppercase tracking-wider"></span>
                            <input type="text" name="name" value="{{ $company->name }}"
                                class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-cyan-500/20 focus:border-cyan-500 text-sm transition-all outline-none text-gray-700">
                        </div>
                        <div class="space-y-1">
                            <span class="text-[11px] font-bold text-gray-400 uppercase tracking-wider">Registration
                                Number</span>
                            <input type="text" name="registration_number" value="32452324"
                                class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-cyan-500/20 focus:border-cyan-500 text-sm transition-all outline-none text-gray-700">
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-start">
                    <label class="text-sm font-semibold text-gray-700 pt-2">Operating Locations</label>
                    <div class="md:col-span-3">
                        <div
                            class="flex flex-wrap gap-2 p-2.5 bg-gray-50 border border-gray-200 rounded-lg focus-within:bg-white focus-within:ring-2 focus-within:ring-cyan-500/20 focus-within:border-cyan-500 transition-all">
                            <span
                                class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-cyan-100 text-cyan-700 text-xs font-bold rounded-md">
                                Kuala Lumpur
                                <button type="button" class="hover:text-cyan-900"><i
                                        class="bi bi-x-lg text-[10px]"></i></button>
                            </span>
                            <input type="text"
                                class="bg-transparent border-none outline-none text-sm min-w-[150px] placeholder-gray-400"
                                placeholder="Type location and press enter...">
                        </div>
                        <p class="mt-2 text-[11px] text-gray-400 italic">Example: Singapore, Johor, or Penang.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-start">
                    <label class="text-sm font-semibold text-gray-700 pt-2">Contact Details</label>
                    <div class="md:col-span-3 space-y-4">
                        <div class="space-y-1">
                            <span class="text-[11px] font-bold text-gray-400 uppercase tracking-wider">Primary
                                Address</span>
                            <textarea name="primary_address" rows="3"
                                class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-cyan-500/20 focus:border-cyan-500 text-sm transition-all outline-none text-gray-700">21-1A, Jalan Perdana 4/8, Pandan Perdana, 55300 Kuala Lumpur, Selangor</textarea>
                        </div>
                        <div class="space-y-1">
                            <span class="text-[11px] font-bold text-gray-400 uppercase tracking-wider">Phone Number</span>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-400 text-xs font-semibold">+60</span>
                                </div>
                                <input type="text" name="phone" value="12312312"
                                    class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-cyan-500/20 focus:border-cyan-500 text-sm transition-all outline-none text-gray-700">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-6 border-t border-gray-50 flex justify-end">
                    <button type="button"
                        class="mr-4 px-6 py-2 text-sm font-semibold text-gray-500 hover:text-gray-700 transition-colors">
                        Discard
                    </button>
                    <button type="submit"
                        class="bg-cyan-600 hover:bg-cyan-700 text-white font-bold py-2.5 px-8 rounded-lg transition-all shadow-md shadow-cyan-200 active:scale-95 text-sm">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
