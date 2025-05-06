<footer class="w-full bg-white text-black">
    <div class="border-b-1 border-gray-400">
        <div class=" px-10 gap-10 flex">
            <div class="space-y-2 w-xl py-8">
                <h2 class="text-xl font-semibold">Tentang Kami</h2>
                <p class="text-sm text-gray-600">
                    Aplikasi ini dirancang untuk membantu Anda mencatat dan menghitung peminjaman serta pemasukan secara
                    efisien dan akurat.
                    Cocok digunakan untuk usaha kecil, koperasi, maupun keperluan pribadi agar pengelolaan keuangan
                    menjadi lebih mudah dan transparan.
                </p>
            </div>
            <div class="border-r-1 border-gray-400"></div>
            <div class="py-8 flex flex-col w-xs space-y-1">
                <h2 class="text-xl font-semibold mb-2">Halaman</h2>
                <a href="/dashboard" class="text-gray-600">Dashboard</a>
                <a href="/pengelolaan" class="text-gray-600">Pengelolaan</a>
                <a href="/profile" class="text-gray-600">Profile</a>
            </div>
            <div class="border-r-1 border-gray-400"></div>
            <div class="py-8">
                <h2 class="text-xl font-semibold mb-2">Ikuti Kami</h2>
                <div class="flex flex-col space-y-1">
                    <a href="#" class="text-gray-600 flex  items-center"><x-devicon-facebook
                            class="w-5 h-5 text-blue-600 mr-2" />Facebook</a>
                    <a href="#" class="text-gray-600 flex  items-center"><x-ri-instagram-fill
                            class="w-5 h-5 text-pink-600 mr-2" />Instagram</a>
                    <a href="#" class="text-gray-600 flex  items-center"><x-iconoir-whatsapp-solid
                            class="w-5 h-5 text-green-600 mr-2" />WhatsApp</a>
                </div>
            </div>
        </div>
    </div>
    <div class="py-5 px-10 text-center text-sm">
        <p>
            &copy; {{ date('Y') }} Bendot App Semua hak dilindungi.
        </p>
    </div>
</footer>
