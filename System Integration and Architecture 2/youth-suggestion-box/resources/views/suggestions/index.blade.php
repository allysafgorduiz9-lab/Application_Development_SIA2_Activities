<script src="https://cdn.tailwindcss.com"></script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap');
    
    body { font-family: 'Inter', sans-serif; }

    .pd1-card {
        background: white;
        transition: all 0.3s cubic-bezier(0, 0, 0.5, 1);
        border: 1px solid #e2e8f0;
    }

    .pd1-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05);
        border-color: #10b981; /* Emerald Green Accent */
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
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
    }
</style>

<body class="bg-slate-50 min-h-screen pb-20">
    <nav class="header-gradient text-white py-14 mb-12 shadow-lg border-b-4 border-emerald-500">
        <div class="max-w-6xl mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6 text-center md:text-left">
                <div>
                    <div class="flex items-center justify-center md:justify-start gap-3 mb-3">
                        <span class="h-1 w-8 bg-emerald-500 rounded-full"></span>
                        <span class="text-emerald-400 font-black text-xs uppercase tracking-[0.3em]">Official Portal</span>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-black tracking-tight uppercase">
                        PD1 SK <span class="text-emerald-500">Suggestion Box</span>
                    </h1>
                    <p class="text-slate-400 mt-2 font-medium">Poblacion District 1 • Sangguniang Kabataan</p>
                </div>
                <a href="{{ route('suggestions.create') }}" class="btn-emerald px-10 py-4 rounded-xl font-black text-white text-sm tracking-widest shadow-lg">
                    SUBMIT PROPOSAL
                </a>
            </div>
        </div>
    </nav>

    <div class="max-w-6xl mx-auto px-6">
        @if(session('status'))
            <div class="mb-10 p-5 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl flex items-center gap-3 font-bold shadow-sm">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                {{ session('status') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($items as $item)
                <div class="pd1-card rounded-[2rem] p-8 flex flex-col h-full overflow-hidden">
                    <div class="flex justify-between items-start mb-6">
                        <span class="px-3 py-1 bg-slate-100 text-slate-500 text-[10px] font-black uppercase tracking-widest rounded-lg border border-slate-200">
                            {{ $item->category }}
                        </span>
                        <span class="text-[10px] text-slate-300 font-bold uppercase">{{ $item->created_at->diffForHumans() }}</span>
                    </div>

                    <h2 class="text-xl font-black text-slate-800 mb-4 leading-tight group-hover:text-emerald-600 transition-colors uppercase tracking-tight">
                        {{ $item->title }}
                    </h2>
                    
                    <div class="bg-slate-50 p-5 rounded-2xl mb-8 border-l-4 border-emerald-500">
                        <p class="text-slate-600 text-sm leading-relaxed italic line-clamp-3">
                            "{{ $item->content }}"
                        </p>
                    </div>

                    <div class="mt-auto pt-6 border-t border-slate-50 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-slate-900 text-emerald-400 flex items-center justify-center font-black shadow-md uppercase">
                                {{ substr($item->author, 0, 1) }}
                            </div>
                            <div>
                                <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Submitted By</p>
                                <p class="text-xs font-black text-slate-800 uppercase tracking-tighter">{{ $item->author }}</p>
                            </div>
                        </div>
                        
                        <div class="flex gap-1">
                            <a href="{{ route('suggestions.show', $item->id) }}" class="p-2 text-slate-400 hover:text-emerald-600 transition" title="View Detail">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </a>
                            <a href="{{ route('suggestions.edit', $item->id) }}" class="p-2 text-slate-400 hover:text-amber-500 transition" title="Edit">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            </a>
                            <form action="{{ route('suggestions.destroy', $item->id) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button class="p-2 text-slate-400 hover:text-red-500 transition" onclick="return confirm('Archive this suggestion permanently?')">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-24 text-center bg-white rounded-[3rem] border border-dashed border-slate-200">
                    <p class="text-slate-400 font-black uppercase tracking-[0.2em]">No Active Proposals</p>
                    <p class="text-slate-300 text-sm mt-2">Poblacion District 1 is waiting for your voice.</p>
                </div>
            @endforelse
        </div>
    </div>
</body>