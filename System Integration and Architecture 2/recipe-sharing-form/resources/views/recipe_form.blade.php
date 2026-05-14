<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Sharing Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #488d76; 
            min-height: 100vh; 
            display: flex; 
            align-items: center; 
            justify-content: center;
        }
        .simple-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        .input-field {
            background: #f8fafc;
            border: 1px solid #cbd5e1;
            color: #000000;
        }
        .input-field:focus { 
            border-color: #137054; 
            background-color: #fff; 
            box-shadow: 0 0 0 2px rgba(19, 112, 84, 0.1); 
        }
        label { 
            color: #137054; 
            font-weight: 700; 
            text-transform: uppercase; 
            letter-spacing: 0.05em; 
            font-size: 11px; 
        }
    </style>
</head>
<body class="p-6">

    <div class="simple-card w-full max-w-2xl p-8 md:p-12 rounded-2xl">
        
        <div class="mb-8 text-center">
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.4em] mb-2">Greetings & Welcome</p>
            <h1 class="text-3xl font-extrabold text-[#137054] tracking-tighter uppercase">Mini Recipe Sharing</h1>
            
            <div class="mt-4 px-4">
                <p class="text-sm text-slate-600 font-semibold leading-relaxed">
                    "Good food is the foundation of genuine happiness."
                </p>
                <p class="text-[12px] text-slate-500 font-medium mt-2 leading-relaxed">
                    We are honored to have you here. Please take a moment to share your culinary 
                    masterpiece with our community. Your contribution is truly appreciated.
                </p>
            </div>
            
            <div class="w-12 h-1 bg-[#137054] mx-auto mt-6 rounded-full opacity-20"></div>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-lg text-sm font-bold flex items-center">
                <span class="mr-3 text-lg">🌿</span> {{ session('success') }}
            </div>
        @endif

        <form action="/form" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block mb-1.5 ml-1">Recipe Title</label>
                <input type="text" name="recipe_name" value="{{ old('recipe_name') }}" placeholder="What are we cooking today?" class="input-field w-full p-3 rounded-lg outline-none transition-all">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1.5 ml-1">Chef's Contact Email</label>
                    <input type="email" name="chef_email" value="{{ old('chef_email') }}" placeholder="your@email.com" class="input-field w-full p-3 rounded-lg outline-none transition-all">
                </div>
                <div>
                    <label class="block mb-1.5 ml-1">Preparation Time (Min)</label>
                    <input type="number" name="prep_time" value="{{ old('prep_time') }}" placeholder="0" class="input-field w-full p-3 rounded-lg outline-none transition-all">
                </div>
            </div>

            <div>
                <label class="block mb-1.5 ml-1">Regional Origin</label>
                <div class="relative">
                    <select name="origin_country" class="input-field w-full p-3 rounded-lg outline-none appearance-none bg-white cursor-pointer transition-all">
                        <option value="">-- Choose Origin --</option>
                        
                        <optgroup label="Philippines">
                            <option value="Luzon" {{ old('origin_country') == 'Luzon' ? 'selected' : '' }}>Luzon</option>
                            <option value="Visayas" {{ old('origin_country') == 'Visayas' ? 'selected' : '' }}>Visayas</option>
                            <option value="Mindanao" {{ old('origin_country') == 'Mindanao' ? 'selected' : '' }}>Mindanao</option>
                        </optgroup>

                        <optgroup label="Asia">
                            <option value="Japan" {{ old('origin_country') == 'Japan' ? 'selected' : '' }}>Japan</option>
                            <option value="China" {{ old('origin_country') == 'China' ? 'selected' : '' }}>China</option>
                            <option value="South Korea" {{ old('origin_country') == 'South Korea' ? 'selected' : '' }}>South Korea</option>
                            <option value="Thailand" {{ old('origin_country') == 'Thailand' ? 'selected' : '' }}>Thailand</option>
                        </optgroup>

                        <optgroup label="Europe & Americas">
                            <option value="Italy" {{ old('origin_country') == 'Italy' ? 'selected' : '' }}>Italy</option>
                            <option value="France" {{ old('origin_country') == 'France' ? 'selected' : '' }}>France</option>
                            <option value="Spain" {{ old('origin_country') == 'Spain' ? 'selected' : '' }}>Spain</option>
                            <option value="Mexico" {{ old('origin_country') == 'Mexico' ? 'selected' : '' }}>Mexico</option>
                            <option value="USA" {{ old('origin_country') == 'USA' ? 'selected' : '' }}>USA</option>
                        </optgroup>
                    </select>
                    <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>
            </div>

            <div>
                <label class="block mb-1.5 ml-1">Ingredients List</label>
                <textarea name="ingredients" rows="3" placeholder="Please list the ingredients needed..." class="input-field w-full p-3 rounded-lg outline-none resize-none transition-all">{{ old('ingredients') }}</textarea>
            </div>

            <div>
                <label class="block mb-1.5 ml-1">Cooking Instructions</label>
                <textarea name="instructions" rows="4" placeholder="Briefly describe the cooking process..." class="input-field w-full p-3 rounded-lg outline-none resize-none transition-all">{{ old('instructions') }}</textarea>
            </div>

            <button type="submit" class="w-full bg-[#137054] hover:bg-[#0d523d] text-white font-bold py-4 rounded-lg tracking-[0.2em] text-xs uppercase mt-2 transition-all active:scale-[0.98] shadow-md">
                PUBLISH RECIPE
            </button>
        </form>

        <p class="text-center text-[9px] text-slate-400 font-bold mt-10 tracking-[0.4em] uppercase">
            EST. 2026 • CULINARY REPOSITORY
        </p>
    </div>

</body>
</html>