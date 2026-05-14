<script src="https://cdn.tailwindcss.com"></script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap');
    
    body { font-family: 'Inter', sans-serif; }

    .proposal-paper {
        background: white;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.08);
    }

    .header-gradient {
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
    }

    .btn-dark {
        background: #0f172a;
        transition: all 0.2s ease;
    }

    .btn-dark:hover {
        background: #000;
        transform: translateY(-1px);
    }
</style>

<body class="bg-slate-100 min-h-screen flex flex-col items-center justify-center p-6">
    
    <div class="max-w-3xl w-full mb-6">
        <a href="{{ route('suggestions.index') }}" class="inline-flex items-center text-slate-400 font-black text-xs uppercase tracking-widest hover:text-emerald-600 transition group">
            <svg class="w-4 h-4 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Back to Dashboard
        </a>
    </div>

    <div class="max-w-3xl w-full proposal-paper rounded-[3rem] overflow-hidden border border-white relative">
        
        <div class="bg-emerald-500 h-3 w-full"></div>

        <div class="p-12 md:p-16">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
                <div>
                    <span class="px-4 py-1.5 bg-emerald-100 text-emerald-700 text-[10px] font-black uppercase tracking-[0.2em] rounded-full inline-block border border-emerald-200 mb-4">
                        {{ $item->category }}
                    </span>
                    <h1 class="text-4xl md:text-5xl font-black text-slate-900 leading-tight tracking-tighter uppercase">
                        {{ $item->title }}
                    </h1>
                </div>
            </div>

            <div class="flex items-center gap-5 p-6 bg-slate-50 rounded-[2rem] border border-slate-100 mb-10">
                <div class="h-16 w-16 rounded-2xl bg-slate-900 text-emerald-400 flex items-center justify-center text-2xl font-black shadow-xl uppercase">
                    {{ substr($item->author, 0, 1) }}
                </div>
                <div>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Submitted By</p>
                    <p class="text-xl font-black text-slate-900 tracking-tight uppercase">{{ $item->author }}</p>
                    <p class="text-xs font-bold text-emerald-600">PD1 SK Youth Member • {{ $item->created_at->format('F d, Y') }}</p>
                </div>
            </div>

            <div class="relative">
                <svg class="absolute -top-4 -left-4 w-12 h-12 text-slate-100 z-0" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21L14.017 18C14.017 16.899 14.899 16 16.017 16H19.017C19.569 16 20.017 15.552 20.017 15V9C20.017 8.448 19.569 8 19.017 8H16.017C14.899 8 14.017 7.101 14.017 6V3H21.017V21H14.017ZM3.017 21V18C3.017 16.899 3.899 16 5.017 16H8.017C8.569 16 9.017 15.552 9.017 15V9C9.017 8.448 8.569 8 8.017 8H5.017C3.899 8 3.017 7.101 3.017 6V3H10.017V21H3.017Z" /></svg>
                <div class="relative z-10 text-xl md:text-2xl text-slate-600 font-medium leading-relaxed italic border-l-4 border-emerald-500 pl-8 py-2">
                    "{{ $item->content }}"
                </div>
            </div>

            <div class="mt-16 pt-10 border-t border-slate-100 flex flex-wrap gap-4">
                <a href="{{ route('suggestions.edit', $item->id) }}" class="px-8 py-4 bg-amber-500 text-white font-black text-xs tracking-widest uppercase rounded-xl shadow-lg hover:bg-amber-600 transition active:scale-95">
                    Modify Proposal
                </a>
                <form action="{{ route('suggestions.destroy', $item->id) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="px-8 py-4 bg-white border-2 border-slate-100 text-red-500 font-black text-xs tracking-widest uppercase rounded-xl hover:bg-red-50 hover:border-red-100 transition active:scale-95" onclick="return confirm('Archive this proposal?')">
                        Archive Entry
                    </button>
                </form>
            </div>
        </div>
    </div>

    <p class="mt-10 text-slate-400 font-black text-[9px] uppercase tracking-[0.5em]">Poblacion District 1 • Sangguniang Kabataan</p>
</body>