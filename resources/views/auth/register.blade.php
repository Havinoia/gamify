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
    
    <!-- Moving Grid Background (Magenta) -->
    <div class="fixed inset-0 opacity-[0.03]" style="background-image: linear-gradient(#ff00ff 1px, transparent 1px), linear-gradient(90deg, #ff00ff 1px, transparent 1px); background-size: 60px 60px;"></div>

    <div class="relative w-full max-w-lg animate-in fade-in slide-in-from-bottom-8 duration-700">
        <div class="pixel-card border-[8px] border-pixel-pink bg-[#1a1f2e] p-12 shadow-[24px_24px_0_0_#000]">
            <div class="text-center mb-10">
                <div class="inline-block bg-pixel-pink text-white px-6 py-2 mb-6 font-black italic shadow-[6px_6px_0_0_#ff00ff]/30 border-2 border-white">OPERATIVE_REGISTRATION</div>
                <h1 class="text-4xl font-heading text-white tracking-widest drop-shadow-[4px_4px_0_#00ffff]">JOIN_REBELLION</h1>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[10px] font-heading text-pixel-pink mb-2 uppercase tracking-widest leading-none underline">>> CODENAME</label>
                        <input type="text" name="name" value="{{ old('name') }}" required autofocus class="w-full bg-black border-[4px] border-pixel-pink/20 p-4 text-white focus:border-pixel-pink outline-none transition-all shadow-[inset_4px_4px_0_0_rgba(0,0,0,0.5)] font-mono text-xs" placeholder="ENTER_NAME...">
                        @error('name')
                            <p class="mt-2 text-[8px] text-red-500 font-black italic">!! ERROR: {{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-[10px] font-heading text-pixel-pink mb-2 uppercase tracking-widest leading-none underline">>> CONTACT_ID</label>
                        <input type="email" name="email" value="{{ old('email') }}" required class="w-full bg-black border-[4px] border-pixel-pink/20 p-4 text-white focus:border-pixel-pink outline-none transition-all shadow-[inset_4px_4px_0_0_rgba(0,0,0,0.5)] font-mono text-xs" placeholder="EMAIL_ADDR...">
                        @error('email')
                            <p class="mt-2 text-[8px] text-red-500 font-black italic">!! ERROR: {{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[10px] font-heading text-pixel-pink mb-2 uppercase tracking-widest leading-none underline">>> ACCESS_KEY_v1</label>
                        <input type="password" name="password" required class="w-full bg-black border-[4px] border-pixel-pink/20 p-4 text-white focus:border-pixel-pink outline-none transition-all shadow-[inset_4px_4px_0_0_rgba(0,0,0,0.5)] font-mono text-xs" placeholder="********">
                        @error('password')
                            <p class="mt-2 text-[8px] text-red-500 font-black italic">!! ERROR: {{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-[10px] font-heading text-pixel-pink mb-2 uppercase tracking-widest leading-none underline">>> CONFIRM_KEY</label>
                        <input type="password" name="password_confirmation" required class="w-full bg-black border-[4px] border-pixel-pink/20 p-4 text-white focus:border-pixel-pink outline-none transition-all shadow-[inset_4px_4px_0_0_rgba(0,0,0,0.5)] font-mono text-xs" placeholder="********">
                    </div>
                </div>

                <div class="pt-8">
                    <button type="submit" class="pixel-btn text-[12px] w-full py-5 font-black bg-pixel-matrix border-pixel-matrix text-black hover:bg-black hover:text-pixel-matrix hover:-translate-y-1 transition-all shadow-[12px_12px_0_0_#000]">
                        CREATE_ACCOUNT_v1.0 >>
                    </button>
                    <p class="mt-4 text-[8px] text-slate-500 font-mono italic animate-pulse">NOTE: BY_REGISTERING_YOU_AGREE_TO_ENCRYPTION_PROTOCOLS</p>
                </div>
            </form>

            <div class="mt-10 border-t-[4px] border-pixel-pink/10 pt-8 text-center">
                <a href="{{ route('login') }}" class="text-[10px] text-pixel-blue hover:text-white underline font-black transition-colors uppercase tracking-[0.2em] italic">
                    << ALREADY_LOGGED_IN?_RETURN_TO_BASE
                </a>
            </div>
        </div>
    </div>
</body>
</html>
