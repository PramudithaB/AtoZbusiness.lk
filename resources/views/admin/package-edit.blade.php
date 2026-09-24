@extends('admin.layout')

@section('title', 'Edit Package - ' . $package->package_name)
@section('header_title', 'Edit Course Package')
@section('header_subtitle', 'Adjust monthly fee and package description.')

@section('content')

    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-3xl border border-slate-200/90 shadow-sm p-6 sm:p-10">
            
            <div class="flex items-center gap-3 pb-6 border-b border-slate-100 mb-8">
                <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center">
                    <i data-lucide="edit" class="w-5 h-5"></i>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-navy-950">Update Package</h2>
                    <p class="text-xs text-slate-400">Editing: {{ $package->package_name }}</p>
                </div>
            </div>

            <form action="{{ route('package.update', $package->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                            Linked Course <span class="text-rose-500">*</span>
                        </label>
                        <select name="class_id" required 
                                class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:border-blue-700 focus:bg-white focus:ring-2 focus:ring-blue-700/10 transition cursor-pointer">
                            <option value="">Choose Course...</option>
                            @foreach($classes as $c)
                                <option value="{{ $c->id }}" {{ old('class_id', $package->class_id) == $c->id ? 'selected' : '' }}>
                                    {{ $c->className }} @if($c->month) ({{ $c->month }}) @endif
                                </option>
                            @endforeach
                        </select>
                        <p class="text-[11px] text-slate-400 mt-1.5">Package title will automatically update to match the selected class.</p>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                            Monthly Subscription Fee (LKR) <span class="text-rose-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-xs font-bold text-slate-400">Rs.</span>
                            <input type="number" 
                                   name="monthly_fee" 
                                   value="{{ old('monthly_fee', $package->monthly_fee) }}"
                                   required 
                                   min="0" 
                                   step="1"
                                   class="w-full pl-12 pr-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:border-blue-700 focus:bg-white focus:ring-2 focus:ring-blue-700/10 transition">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                            Package Description <span class="text-slate-400">(Optional)</span>
                        </label>
                        <textarea name="description" 
                                  rows="3"
                                  class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:border-blue-700 focus:bg-white focus:ring-2 focus:ring-blue-700/10 transition resize-none">{{ old('description', $package->description) }}</textarea>
                    </div>

                </div>

                <div class="pt-6 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <a href="{{ route('admindashboard') }}" 
                       class="text-xs font-bold text-slate-500 hover:text-navy-950 transition flex items-center gap-1">
                        <i data-lucide="arrow-left" class="w-3.5 h-3.5"></i> Back to Dashboard
                    </a>

                    <button type="submit" 
                            class="w-full sm:w-auto px-8 py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-xl text-sm transition shadow-md shadow-emerald-600/20 flex items-center justify-center gap-2">
                        <i data-lucide="save" class="w-4 h-4"></i>
                        Update Package
                    </button>
                </div>
            </form>

        </div>
    </div>

@endsection
