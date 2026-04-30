<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN // GAMIFY_SYSTEM</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#070b13] text-pixel-text font-mono min-h-screen flex items-center justify-center p-6 overflow-hidden">
    <!-- CRT & Scanline Effects -->
    <div class="fixed inset-0 z-[9999] pointer-events-none bg-[linear-gradient(rgba(18,16,16,0)_50%,rgba(0,0,0,0.1)_50%)] bg-[length:100%_4px] opacity-20"></div>
    <div class="fixed inset-0 z-[9998] pointer-events-none bg-pixel-matrix/5 h-2 w-full animate-scanline"></div>
    
    <!-- Moving Grid Background -->
    <div class="fixed inset-0 opacity-10 animate-drift" style="background-image: linear-gradient(#39ff14 1px, transparent 1px), linear-gradient(90deg, #39ff14 1px, transparent 1px); background-size: 40px 40px;"></div>

    <!-- System Boot Overlay (CSS Only) -->
    <div id="boot-sequence" class="fixed inset-0 bg-black z-[10000] flex flex-col p-10 font-mono text-pixel-matrix text-[10px] pointer-events-none animate-flicker" style="animation: fade-out 0.5s forwards 1.5s;">
        <p class="mb-1">>> INITIALIZING_GAMIFY_OS_v3.0.42...</p>
        <p class="mb-1">>> LOADING_CORE_MODULES... [OK]</p>
        <p class="mb-1">>> ESTABLISHING_SECURE_CONNECTION... [OK]</p>
        <p class="mb-1">>> MOUNTING_ENCRYPTED_DRIVES... [OK]</p>
        <p class="mb-1">>> BYPASSING_FIREWALLS... [OK]</p>
        <p class="mb-1">>> ACCESS_GRANTED.</p>
        <div class="w-12 h-12 border-4 border-pixel-matrix border-t-transparent animate-spin mt-4"></div>
    </div>

    <style>
        @keyframes fade-out { to { opacity: 0; visibility: hidden; } }
    </style>

    <div class="relative w-full max-w-md animate-pixel-in">
        <div class="pixel-card border-[8px] border-pixel-matrix bg-[#1a1f2e] p-10 shadow-[20px_20px_0_0_#000] relative overflow-hidden">
            <!-- Corner Accents -->
            <div class="absolute top-0 left-0 w-4 h-4 border-t-4 border-l-4 border-pixel-matrix"></div>
            <div class="absolute top-0 right-0 w-4 h-4 border-t-4 border-r-4 border-pixel-matrix"></div>
            <div class="absolute bottom-0 left-0 w-4 h-4 border-b-4 border-l-4 border-pixel-matrix"></div>
            <div class="absolute bottom-0 right-0 w-4 h-4 border-b-4 border-r-4 border-pixel-matrix"></div>

            <div class="text-center mb-10">
                <div class="inline-block bg-pixel-matrix text-black px-4 py-1 mb-4 font-black italic shadow-[4px_4px_0_0_#00ffff] animate-pulse">Gamify</div>
                <h1 class="text-4xl font-heading text-white tracking-widest drop-shadow-[4px_4px_0_#ff00ff] hover:animate-flicker cursor-default">LOGIN</h1>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-8">
                @csrf
                
                <div class="group">
                    <label class="block text-[10px] font-heading text-pixel-matrix mb-2 uppercase tracking-widest group-focus-within:animate-pulse">>> EMAIL</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus 
                        class="terminal-input group-focus-within:border-white transition-colors" 
                        placeholder="EMAIL_ADDR...">
                    @error('email')
                        <p class="mt-2 text-[8px] text-red-500 font-black italic uppercase">!! ERROR: {{ $message }}</p>
                    @enderror
                </div>

                <div class="group">
                    <label class="block text-[10px] font-heading text-pixel-matrix mb-2 uppercase tracking-widest group-focus-within:animate-pulse">>> PASSWORD</label>
                    <input type="password" name="password" required 
                        class="terminal-input group-focus-within:border-white transition-colors" 
                        placeholder="********">
                </div>

                <div class="pt-4">
                    <button type="submit" class="pixel-btn-matrix w-full py-5 text-[12px] font-black group relative overflow-hidden bg-pixel-matrix hover:bg-pixel-blue transition-all active:translate-y-2">
                        <span class="relative z-10 group-hover:tracking-[0.2em] transition-all block">INITIATE_SESSION >></span>
                        <div class="absolute inset-x-0 bottom-0 h-1 bg-white/30 animate-pulse"></div>
                    </button>
                </div>
            </form>

            <div class="mt-10 border-t-[4px] border-pixel-matrix/20 pt-6 text-center">
                <p class="text-[10px] text-slate-500 uppercase mb-4 opacity-50">New operative detected?</p>
                <a href="{{ route('register') }}" class="text-[11px] text-pixel-blue hover:text-white underline font-black transition-all uppercase tracking-widest italic hover:scale-110 inline-block">
                    >> CREATE_NEW_ACCOUNT_HERE
                </a>
            </div>
        </div>

        <div class="mt-8 text-center flex items-center justify-center space-x-4">
            <div class="h-[1px] w-12 bg-pixel-matrix/20"></div>
            <p class="text-[8px] text-pixel-matrix opacity-30 font-black uppercase tracking-[0.5em]">SECURE_SERVER_v3.0.42_ACTIVE</p>
            <div class="h-[1px] w-12 bg-pixel-matrix/20"></div>
        </div>
    </div>
</body>
</html>
