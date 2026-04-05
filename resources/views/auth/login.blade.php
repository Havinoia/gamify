<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN // GAMIFY_SYSTEM</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#070b13] text-pixel-text font-mono min-h-screen flex items-center justify-center p-6 overflow-hidden">
    <!-- CRT Overlay -->
    <div class="fixed inset-0 z-[9999] pointer-events-none bg-[linear-gradient(rgba(18,16,16,0)_50%,rgba(0,0,0,0.1)_50%)] bg-[length:100%_4px] opacity-20"></div>
    
    <!-- Moving Grid Background -->
    <div class="fixed inset-0 opacity-10" style="background-image: linear-gradient(#39ff14 1px, transparent 1px), linear-gradient(90deg, #39ff14 1px, transparent 1px); background-size: 40px 40px;"></div>

    <div class="relative w-full max-w-md animate-in zoom-in duration-500">
        <div class="pixel-card border-[8px] border-pixel-matrix bg-[#1a1f2e] p-10 shadow-[20px_20px_0_0_#000]">
            <div class="text-center mb-10">
                <div class="inline-block bg-pixel-matrix text-black px-4 py-1 mb-4 font-black italic shadow-[4px_4px_0_0_#00ffff]">SYSTEM_ACCESS</div>
                <h1 class="text-4xl font-heading text-white tracking-widest drop-shadow-[4px_4px_0_#ff00ff]">LOGIN</h1>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-8">
                @csrf
                
                <div>
                    <label class="block text-[10px] font-heading text-pixel-matrix mb-2 uppercase tracking-widest">>> OPERATIVE_EMAIL</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full bg-black border-[4px] border-pixel-matrix/30 p-4 text-white focus:border-pixel-matrix outline-none transition-all shadow-[inset_4px_4px_0_0_rgba(0,0,0,0.5)] font-mono" placeholder="EMAIL_ADDR...">
                    @error('email')
                        <p class="mt-2 text-[8px] text-red-500 font-black italic uppercase">!! ERROR: {{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-[10px] font-heading text-pixel-matrix mb-2 uppercase tracking-widest">>> ACCESS_KEY</label>
                    <input type="password" name="password" required class="w-full bg-black border-[4px] border-pixel-matrix/30 p-4 text-white focus:border-pixel-matrix outline-none transition-all shadow-[inset_4px_4px_0_0_rgba(0,0,0,0.5)] font-mono" placeholder="********">
                </div>

                <div class="pt-4">
                    <button type="submit" class="pixel-btn-matrix w-full py-5 text-[12px] font-black group relative overflow-hidden">
                        <span class="relative z-10 group-hover:scale-110 transition-transform block">INITIATE_SESSION >></span>
                        <div class="absolute inset-0 bg-white/10 translate-x-full group-hover:translate-x-0 transition-transform duration-300"></div>
                    </button>
                </div>
            </form>

            <div class="mt-10 border-t-[4px] border-pixel-matrix/20 pt-6 text-center">
                <p class="text-[10px] text-slate-500 uppercase mb-4">New operative detected?</p>
                <a href="{{ route('register') }}" class="text-[10px] text-pixel-blue hover:text-white underline font-black transition-colors uppercase tracking-widest italic">
                    >> CREATE_NEW_RECORD_HERE
                </a>
            </div>
        </div>

        <div class="mt-8 text-center">
            <p class="text-[8px] text-pixel-matrix opacity-30 font-black uppercase tracking-[0.5em]">SECURE_SERVER_v3.0.42_ACTIVE</p>
        </div>
    </div>
</body>
</html>
