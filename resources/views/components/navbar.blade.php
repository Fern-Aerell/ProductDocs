@props(['products'])

<!-- Navbar -->
<nav class="navbar">
    <a href="/">
        <x-logo />
        <h1>{{ config('app.name') }}</h1>
    </a>

    <div class="navbar-search-and-darkmodetoggle">
        {{-- Fitur Search --}}
        <button onclick="toggleSearch()" class="fake-search-container">
            <div class="fake-search-container-body">
                <svg class="fake-search-container-icon" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
                <span>Search</span>
            </div>
            <hr>
        </button>

        <!-- Dark Mode Toggle Button -->
        <div x-data="{ mode: localStorage.getItem('theme') || 'system' }" class="flex items-center">
            <button class="theme-toggle"
                @click="
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
                :title="mode === 'light' ? 'Light Mode' : (mode === 'dark' ? 'Dark Mode' : 'System Mode')">
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
            document.documentElement.classList.toggle('dark', window.matchMedia('(prefers-color-scheme: dark)')
                .matches);
        }
    });
</script>

{{-- Search --}}
<div class="search-background hidden" id="search-background">
    <div class="search-container">
        <div class="search-form">
            <svg class="search-form-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
            <input type="text" name="search" id="search" placeholder="Search Docs">
        </div>
        {{-- List Search --}}
        <div class="search-list">
            {{-- @foreach ($products as $product)
            <div class="search-list-child">
                <h1 class="search-list-child-product">{{ $product->name }}</h1>
                @foreach ($product->features as $feature)
                    <a href="{{ route('home') }}/{{ $product->route }}/{{ $feature->route }}" class="search-list-child-feature">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>                  
                        <p>{{ $feature->name }}</p>
                    </a>
                @endforeach
            </div>
            @endforeach --}}
        </div>
    </div>
</div>

<script>
    // Fungsi untuk toggle tampilan search
    function toggleSearch() {
        const searchBackground = document.getElementById('search-background');
        const body = document.body;

        searchBackground.classList.toggle('hidden'); // Menampilkan / Menyembunyikan elemen
        body.classList.toggle('no-scroll'); // Menonaktifkan / Mengaktifkan scroll
    }

    // Event listener untuk menutup search jika klik di luar search container
    document.getElementById('search-background').addEventListener('click', function(event) {
        const searchContainer = document.querySelector('.search-container');

        // Pastikan klik berada di luar search container
        if (!searchContainer.contains(event.target)) {
            this.classList.add('hidden'); // Menyembunyikan search background
            document.body.classList.remove('no-scroll'); // Mengaktifkan kembali scroll
        }
    });

    // Mendapatkan elemen-elemen yang dibutuhkan
    const searchInput = document.getElementById('search');
    const searchList = document.querySelector('.search-list');

    // Fungsi untuk menampilkan hasil pencarian
    function displaySearchResults(products) {
        searchList.innerHTML = '';

        if (products.length === 0) {
            // Jika tidak ada hasil pencarian, tampilkan pesan di tengah
            const noResultsMessage = document.createElement('div');
            noResultsMessage.textContent = searchInput.value ? 'Pencarian tidak ditemukan' : 'Silahkan cari sesuatu...';
            noResultsMessage.classList.add('search-list-child', 'text-center'); // Tambahkan kelas text-center
            noResultsMessage.style.marginTop = '10px'; // Tambahkan margin atas
            searchList.appendChild(noResultsMessage);
        } else {
            // Tampilkan hasil pencarian
            products.forEach(product => {
                const productElement = document.createElement('div');
                productElement.classList.add('search-list-child');

                const productName = document.createElement('h1');
                productName.classList.add('search-list-child-product');
                productName.textContent = product.name;
                productElement.appendChild(productName);

                product.features.forEach(feature => {
                    const featureElement = document.createElement('a');
                    featureElement.classList.add('search-list-child-feature');
                    featureElement.href = `{{ route('home') }}/${product.route}/${feature.route}`;

                    featureElement.innerHTML += `
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>
                `;

                    const featureText = document.createElement('p');
                    featureText.textContent = feature.name;
                    featureElement.appendChild(featureText);

                    productElement.appendChild(featureElement);
                });

                searchList.appendChild(productElement);
            });
        }
    }

    function inputEventListener() {
        const searchTerm = searchInput.value.toLowerCase();
        const filteredProducts = searchTerm ?
            @json($products).filter(product =>
                product.route.toLowerCase().includes(searchTerm) ||
                product.name.toLowerCase().includes(searchTerm) ||
                product.features.some(feature => feature.route.toLowerCase().includes(searchTerm)) ||
                product.features.some(feature => feature.name.toLowerCase().includes(searchTerm)) ||
                product.features.some(feature => feature.content.toLowerCase().includes(searchTerm))
            ) :
            []; // Set filteredProducts ke array kosong jika search input kosong

        displaySearchResults(filteredProducts);
    }

    // Menambahkan event listener pada input pencarian
    searchInput.addEventListener('input', inputEventListener);

    inputEventListener();
</script>
