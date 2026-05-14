<script src="https://cdn.tailwindcss.com"></script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&display=swap');
    
    body { font-family: 'Inter', sans-serif; }

    .input-focus:focus {
        border-color: #10b981;
        box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
        outline: none;
    }

    .header-gradient {
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
    }

    .btn-emerald {
        background: #10b981;
        transition: all 0.2s ease;
    }

    .btn-emerald:hover {
        background: #059669;
        transform: translateY(-1px);
        box-shadow: 0 10px 15px -3px rgba(16, 185, 129, 0.3);
    }
</style>

<body class="bg-slate-100 min-h-screen flex items-center justify-center p-6">
    <div class="max-w-2xl w-full bg-white rounded-[2.5rem] shadow-2xl overflow-hidden border border-white">
        
        <div class="header-gradient p-10 text-center border-b-4 border-emerald-500">
            <div class="inline-flex items-center gap-2 mb-4">
                <span class="h-1 w-6 bg-emerald-500 rounded-full"></span>
                <span class="text-emerald-400 font-black text-[10px] uppercase tracking-[0.3em]">Official Submission</span>
                <span class="h-1 w-6 bg-emerald-500 rounded-full"></span>
            </div>
            <h2 class="text-3xl font-black text-white uppercase tracking-tighter">Submit a Proposal</h2>
            <p class="text-slate-400 text-sm mt-1 font-medium italic">Your voice matters in Poblacion District 1</p>
        </div>

        <form action="{{ route('suggestions.store') }}" method="POST" class="p-10 space-y-8">
            @csrf

            <div>
                <label class="block text-xs font-black uppercase text-slate-500 tracking-widest mb-3 ml-1">
                    Suggestion Title <span class="text-emerald-500">*</span>
                </label>
                <input type="text" name="title" 
                    class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl input-focus transition-all text-slate-800 font-semibold placeholder:text-slate-300" 
                    placeholder="e.g. Community Cleanup Drive" required>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-black uppercase text-slate-500 tracking-widest mb-3 ml-1">
                        Full Name <span class="text-emerald-500">*</span>
                    </label>
                    <input type="text" name="author" 
                        class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl input-focus transition-all text-slate-800 font-semibold" 
                        placeholder="John Doe" required>
                </div>

                <div>
                    <label class="block text-xs font-black uppercase text-slate-500 tracking-widest mb-3 ml-1">
                        Category <span class="text-emerald-500">*</span>
                    </label>
                    <div class="relative">
                        <select name="category" 
                            class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl input-focus transition-all text-slate-800 font-semibold appearance-none cursor-pointer">
                            <option>Education & Skills</option>
                            <option>Sports & Wellness</option>
                            <option>Environment</option>
                            <option>Health & Safety</option>
                            <option>Youth Innovation</option>
                        </select>
                        <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-slate-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <label class="block text-xs font-black uppercase text-slate-500 tracking-widest mb-3 ml-1">
                    Proposal Details <span class="text-emerald-500">*</span>
                </label>
                <textarea name="content" rows="5" 
                    class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl input-focus transition-all text-slate-800 font-semibold placeholder:text-slate-300 resize-none" 
                    placeholder="Describe your idea in detail..." required></textarea>
            </div>

            <div class="flex flex-col gap-4 pt-4">
                <button type="submit" class="btn-emerald w-full py-5 rounded-2xl text-white font-black text-sm tracking-widest uppercase shadow-xl">
                    Submit to PD1 SK Hub
                </button>
                <a href="{{ route('suggestions.index') }}" class="w-full text-center py-2 text-slate-400 font-black text-[10px] uppercase tracking-widest hover:text-slate-600 transition">
                    Discard and Return Home
                </a>
            </div>
        </form>
    </div>
</body>