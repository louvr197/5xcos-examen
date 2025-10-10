<nav class="bg-blue-600 text-white px-4 py-3 flex justify-between items-center rounded-b mb-6">
    <div class="flex gap-6">
    <a href="{{ route('front.battles.index') }}" class="hover:underline font-semibold">Battles</a>
    </div>
    <div class="flex gap-6 items-center">
    @auth
    <a href="{{ route('profile.edit') }}" class="hover:underline">Profil</a>
    <form method="POST" action="{{ route('logout') }}" class="inline">
        @csrf
        <button type="submit" class="hover:underline">Déconnexion</button>
    </form>
    @endauth
@guest
        <a href="{{ route('login') }}" class="hover:underline">Connexion</a>
        <a href="{{ route('register') }}" class="hover:underline">Inscription</a>
    @endguest
    </div>
</nav>
