<!-- Navbar -->
<nav class="navbar">
    <a href="/">
        <x-logo />
        <h1>{{ config('app.name') }}</h1>
    </a>

    <!-- Dark Mode Toggle Button -->
    <div x-data="{ mode: localStorage.getItem('theme') || 'system' }" class="flex items-center">
        <button class="theme-toggle" @click="
                if (mode === 'light') {
                    mode = 'dark';
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('theme', 'dark');
                } else if (mode === 'dark') {
                    mode = 'system';
                    document.documentElement.classList.toggle('dark', window.matchMedia('(prefers-color-scheme: dark)').matches);
                    localStorage.setItem('theme', 'system');
                } else {
                    mode = 'light';
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('theme', 'light');
                }
            " 
            :title="mode === 'light' ? 'Light Mode' : (mode === 'dark' ? 'Dark Mode' : 'System Mode')"
        >
            <!-- Conditional Icon based on Mode -->
            <template x-if="mode === 'light'">
                <i class="fas fa-sun"></i>
            </template>
            <template x-if="mode === 'dark'">
                <i class="fas fa-moon"></i>
            </template>
            <template x-if="mode === 'system'">
                <i class="fas fa-adjust"></i>
            </template>
        </button>
    </div>
</nav>

<script>
    // Cek mode di localStorage saat halaman dimuat
    document.addEventListener('DOMContentLoaded', () => {
        const theme = localStorage.getItem('theme') || 'system';
        if (theme === 'dark') {
            document.documentElement.classList.add('dark');
        } else if (theme === 'light') {
            document.documentElement.classList.remove('dark');
        } else {
            // System mode: sesuaikan dengan preferensi sistem pengguna
            document.documentElement.classList.toggle('dark', window.matchMedia('(prefers-color-scheme: dark)').matches);
        }
    });
</script>
