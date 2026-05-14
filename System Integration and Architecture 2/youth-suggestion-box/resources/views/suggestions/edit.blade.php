<script src="https://cdn.tailwindcss.com"></script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&display=swap');
    
    body { font-family: 'Inter', sans-serif; }

    .edit-focus:focus {
        border-color: #f59e0b; /* Amber/Gold */
        box-shadow: 0 0 0 4px rgba(245, 158, 11, 0.1);
        outline: none;
    }

    .header-edit {
        background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
    }

    .btn-update {
        background: #f59e0b;
        transition: all 0.2s ease;
    }

    .btn-update:hover {
        background: #d97706;
        transform: translateY(-1px);
        box-shadow: 0 10px 15px -3px rgba(245, 158, 11, 0.3);
    }
</style>

<body class="bg-slate-100 min-h-screen flex items-center justify-center p-6">
    <div class="max-w-2xl w-full bg-white rounded-[2.5rem] shadow-2xl overflow-hidden border border-white">
        
        <div class="header-edit p-10 text-center border-b-4 border-amber-500">
            <div class="inline-flex items-center gap-2 mb-4">
                <span class="h-1 w-6 bg-amber-500 rounded-full"></span>
                <span class="text-amber-400 font-black text-[10px] uppercase tracking-[0.3em]">Modification Mode</span>
                <span class="h-1 w-6 bg-amber-500 rounded-full"></span>
            </div>
            <h2 class="text-3xl font-black text-white uppercase tracking-tighter">Edit Proposal</h2>
            <p class="text-slate-400 text-sm mt-1 font-medium italic">Refining entry for Poblacion District 1</p>
        </div>

        <form action="{{ route('suggestions.update', $item->id) }}" method="POST" class="p-10 space-y-8">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-xs font-black uppercase text-slate-500 tracking-widest mb-3 ml-1">
                    Proposal Title
                </label>
                <input type="text" name="title" value="{{ $item->title }}"
                    class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl edit-focus transition-all text-slate-800 font-semibold" 
                    required>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-black uppercase text-slate-500 tracking-widest mb-3 ml-1">
                        Author / Contributor
                    </label>
                    <input type="text" name="author" value="{{ $item->author }}"
                        class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl edit-focus transition-all text-slate-800 font-semibold" 
                        required>
                </div>

                <div>
                    <label class="block text-xs font-black uppercase text-slate-500 tracking-widest mb-3 ml-1">
                        Category
                    </label>
                    <div class="relative">
                        <select name="category" 
                            class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl edit-focus transition-all text-slate-800 font-semibold appearance-none cursor-pointer">
                            <option {{ $item->category == 'Education & Skills' ? 'selected' : '' }}>Education & Skills</option>
                            <option {{ $item->category == 'Sports & Wellness' ? 'selected' : '' }}>Sports & Wellness</option>
                            <option {{ $item->category == 'Environment' ? 'selected' : '' }}>Environment</option>
                            <option {{ $item->category == 'Health & Safety' ? 'selected' : '' }}>Health & Safety</option>
                            <option {{ $item->category == 'Youth Innovation' ? 'selected' : '' }}>Youth Innovation</option>
                        </select>
                        <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-slate-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <label class="block text-xs font-black uppercase text-slate-500 tracking-widest mb-3 ml-1">
                    Updated Details
                </label>
                <textarea name="content" rows="5" 
                    class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl edit-focus transition-all text-slate-800 font-semibold resize-none" 
                    required>{{ $item->content }}</textarea>
            </div>

            <div class="flex flex-col gap-4 pt-4">
                <button type="submit" class="btn-update w-full py-5 rounded-2xl text-white font-black text-sm tracking-widest uppercase shadow-xl">
                    Save Changes to PD1 Hub
                </button>
                <a href="{{ route('suggestions.index') }}" class="w-full text-center py-2 text-slate-400 font-black text-[10px] uppercase tracking-widest hover:text-slate-600 transition">
                    Cancel and Exit
                </a>
            </div>
        </form>
    </div>
</body>