<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER // GAMIFY_SYSTEM</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#070b13] text-pixel-text font-mono min-h-screen flex items-center justify-center p-6 overflow-hidden">
    <!-- CRT Overlay -->
    <div class="fixed inset-0 z-[9999] pointer-events-none bg-[linear-gradient(rgba(18,16,16,0)_50%,rgba(0,0,0,0.1)_50%)] bg-[length:100%_4px] opacity-20"></div>
    <div class="fixed inset-0 z-[9998] pointer-events-none bg-pixel-pink/5 h-2 w-full animate-scanline"></div>
    
    <!-- Moving Grid Background (Magenta) -->
    <div class="fixed inset-0 opacity-[0.05] animate-drift" style="background-image: linear-gradient(#ff00ff 1px, transparent 1px), linear-gradient(90deg, #ff00ff 1px, transparent 1px); background-size: 60px 60px;"></div>

    <!-- Registration Boot Overlay -->
    <div id="boot-sequence" class="fixed inset-0 bg-black z-[10000] flex flex-col p-10 font-mono text-pixel-pink text-[10px] pointer-events-none animate-flicker" style="animation: fade-out 0.5s forwards 1.8s;">
        <p class="mb-1">>> NEW_OPERATIVE_DETECTED...</p>
        <p class="mb-1">>> SCANNING_BIOMETRICS... [OK]</p>
        <p class="mb-1">>> GENERATING_REBELLION_ID... [OK]</p>
        <p class="mb-1">>> ALLOCATING_SYSTEM_RESOURCES... [OK]</p>
        <p class="mb-1">>> PLEASE_INPUT_CREDENTIALS.</p>
        <div class="w-12 h-12 border-4 border-pixel-pink border-t-transparent animate-spin mt-4"></div>
    </div>

    <style>
        @keyframes fade-out { to { opacity: 0; visibility: hidden; } }
    </style>

    <div class="relative w-full max-w-lg animate-pixel-in">
        <div class="pixel-card border-[8px] border-pixel-pink bg-[#1a1f2e] p-12 shadow-[24px_24px_0_0_#000] relative overflow-hidden">
            <!-- Corner Accents -->
            <div class="absolute top-0 left-0 w-6 h-6 border-t-4 border-l-4 border-pixel-pink"></div>
            <div class="absolute top-0 right-0 w-6 h-6 border-t-4 border-r-4 border-pixel-pink"></div>
            <div class="absolute bottom-0 left-0 w-6 h-6 border-b-4 border-l-4 border-pixel-pink"></div>
            <div class="absolute bottom-0 right-0 w-6 h-6 border-b-4 border-r-4 border-pixel-pink"></div>

            <div class="text-center mb-10">
                <div class="inline-block bg-pixel-pink text-white px-6 py-2 mb-6 font-black italic shadow-[6px_6px_0_0_#ff00ff]/30 border-2 border-white animate-pulse">OPERATIVE_REGISTRATION</div>
                <h1 class="text-4xl font-heading text-white tracking-widest drop-shadow-[4px_4px_0_#00ffff]">REGISTER</h1>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="group">
                        <label class="block text-[10px] font-heading text-pixel-pink mb-2 uppercase tracking-widest leading-none underline group-focus-within:animate-pulse">>> CODENAME</label>
                        <input type="text" name="name" value="{{ old('name') }}" required autofocus 
                            class="terminal-input border-pixel-pink/20 focus:border-pixel-pink" 
                            placeholder="ENTER_NAME...">
                        @error('name')
                            <p class="mt-2 text-[8px] text-red-500 font-black italic">!! ERROR: {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="group">
                        <label class="block text-[10px] font-heading text-pixel-pink mb-2 uppercase tracking-widest leading-none underline group-focus-within:animate-pulse">>> CONTACT_ID</label>
                        <input type="email" name="email" value="{{ old('email') }}" required 
                            class="terminal-input border-pixel-pink/20 focus:border-pixel-pink" 
                            placeholder="EMAIL_ADDR...">
                        @error('email')
                            <p class="mt-2 text-[8px] text-red-500 font-black italic">!! ERROR: {{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="group">
                        <label class="block text-[10px] font-heading text-pixel-pink mb-2 uppercase tracking-widest leading-none underline group-focus-within:animate-pulse">>> ACCESS_KEY_v1</label>
                        <input type="password" name="password" required 
                            class="terminal-input border-pixel-pink/20 focus:border-pixel-pink" 
                            placeholder="********">
                        @error('password')
                            <p class="mt-2 text-[8px] text-red-500 font-black italic">!! ERROR: {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="group">
                        <label class="block text-[10px] font-heading text-pixel-pink mb-2 uppercase tracking-widest leading-none underline group-focus-within:animate-pulse">>> CONFIRM_KEY</label>
                        <input type="password" name="password_confirmation" required 
                            class="terminal-input border-pixel-pink/20 focus:border-pixel-pink" 
                            placeholder="********">
                    </div>
                </div>

                <div class="pt-8">
                    <button type="submit" class="pixel-btn text-[12px] w-full py-5 font-black bg-pixel-matrix border-pixel-matrix text-black hover:bg-black hover:text-pixel-matrix transition-all shadow-[12px_12px_0_0_#000] active:translate-y-2 group overflow-hidden relative">
                        <span class="relative z-10 group-hover:tracking-widest transition-all">CREATE_ACCOUNT_v1.0 >></span>
                        <div class="absolute inset-0 bg-pixel-pink opacity-0 group-hover:opacity-10 transition-opacity"></div>
                    </button>
                    <p class="mt-4 text-[8px] text-slate-500 font-mono italic animate-pulse">NOTE: BY_REGISTERING_YOU_AGREE_TO_ENCRYPTION_PROTOCOLS</p>
                </div>
            </form>

            <div class="mt-10 border-t-[4px] border-pixel-pink/10 pt-8 text-center">
                <a href="{{ route('login') }}" class="text-[10px] text-pixel-blue hover:text-white underline font-black transition-all uppercase tracking-[0.2em] italic hover:scale-110 inline-block">
                    << ALREADY_LOGGED_IN?_RETURN_TO_BASE
                </a>
            </div>
        </div>
    </div>
</body>
</html>
