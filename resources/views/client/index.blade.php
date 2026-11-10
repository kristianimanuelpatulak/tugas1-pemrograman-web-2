<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    {{-- HEADER GRADIENT + STATISTIK --}}
    <div class="p-4 p-md-4 rounded-4 text-white mb-4 shadow-sm"
        style="background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 50%, #ec4899 100%);">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div>
                <h3 class="fw-bold mb-1">Data Client ✨</h3>
                <p class="mb-0 opacity-75" style="font-size: 14px;">Kelola semua pelanggan kamu di satu tempat</p>
            </div>
            <a class="btn btn-light fw-bold rounded-pill px-4 shadow-sm" href="{{ route('client.create') }}"
                role="button">+ Add Client</a>
        </div>

        <div class="row mt-4 g-2">
            <div class="col-4">
                <div class="bg-white bg-opacity-25 rounded-3 p-2 text-center">
                    <h5 class="fw-bold mb-0">{{ $clients->count() }}</h5>
                    <small style="font-size: 12px;">Total Client</small>
                </div>
            </div>
            <div class="col-4">
                <div class="bg-white bg-opacity-25 rounded-3 p-2 text-center">
                    <h5 class="fw-bold mb-0">{{ $clients->whereIn('gender', ['male', 'Laki-laki'])->count() }}</h5>
                    <small style="font-size: 12px;">Laki-laki</small>
                </div>
            </div>
            <div class="col-4">
                <div class="bg-white bg-opacity-25 rounded-3 p-2 text-center">
                    <h5 class="fw-bold mb-0">{{ $clients->whereIn('gender', ['female', 'Perempuan'])->count() }}</h5>
                    <small style="font-size: 12px;">Perempuan</small>
                </div>
            </div>
        </div>
    </div>

    {{-- PESAN YANG MUNCUL SAAT SUKSES --}}
    @session('success')
        <div class="alert alert-success rounded-3 shadow-sm border-0 d-flex align-items-center gap-2">
            ✅ {{ session('success') }}
        </div>
    @endsession

    {{-- SEARCH --}}
    <div class="mb-3">
        <input type="text" id="searchInput" class="form-control rounded-pill px-4 shadow-sm border-0"
            placeholder="🔍 Cari nama, email, alamat..." style="background: white;">
    </div>

    {{-- TABLE DALAM CARD --}}
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" style="font-size: 13px;">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" style="width: 50px;">No.</th>
                        <th scope="col">NAMA</th>
                        <th scope="col">GENDER</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">NO. PELANGGAN</th>
                        <th scope="col">ALAMAT</th>
                        <th scope="col" class="text-center" style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody id="clientTable">
                    @foreach ($clients as $client)
                        <tr>
                            <th scope="row" class="fw-bold">{{ $loop->iteration }}</th>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center flex-shrink-0"
                                        style="width: 36px; height: 36px; background: linear-gradient(135deg, #6366f1, #a855f7); font-size: 14px;">
                                        {{ strtoupper(substr($client->name, 0, 1)) }}
                                    </div>
                                    <span class="fw-semibold">{{ $client->name }}</span>
                                </div>
                            </td>
                            <td>
                                @if ($client->gender == 'male' || $client->gender == 'Laki-laki')
                                    <span class="badge rounded-pill px-3 py-2"
                                        style="background: #e0e7ff; color: #4338ca;">👨 Laki-laki</span>
                                @else
                                    <span class="badge rounded-pill px-3 py-2"
                                        style="background: #fce7f3; color: #be185d;">👩 Perempuan</span>
                                @endif
                            </td>
                            <td class="text-muted">{{ $client->email }}</td>
                            <td><span
                                    class="badge bg-light text-dark border rounded-pill px-2">{{ $client->number }}</span>
                            </td>
                            <td style="max-width: 220px;" class="text-truncate" title="{{ $client->address }}">
                                {{ $client->address }}</td>
                            <td class="text-center">
                                {{-- TOMBOL EDIT DAN HAPUS --}}
                                <a class="btn btn-warning btn-sm rounded-pill px-3 fw-bold"
                                    href="{{ route('client.edit', $client) }}" role="button">Edit</a>
                                <form action="{{ route('client.destroy', $client) }}" method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    {{-- TOMBOL HAPUS DAN PESAN KONFIRMASI JIKA INGIN MENGHAPUS DATA CLIENT --}}
                                    <button type="submit" class="btn btn-danger btn-sm rounded-pill px-3 fw-bold"
                                        onclick="return confirm('Anda yakin ingin menghapus client ini?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if ($clients->isEmpty())
            <div class="text-center py-5">
                <div style="font-size: 40px;">📭</div>
                <p class="text-muted mt-2 mb-0">Belum ada data client. Yuk tambah dulu!</p>
            </div>
        @endif
    </div>

    {{-- STYLE TAMBAHAN + SEARCH JS --}}
    <style>
        body {
            background: #f6f7fb;
        }

        .table-hover tbody tr:hover {
            background: #f0f0ff !important;
        }
    </style>

    <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            let filter = this.value.toLowerCase();
            document.querySelectorAll('#clientTable tr').forEach(row => {
                row.style.display = row.textContent.toLowerCase().includes(filter) ? '' : 'none';
            });
        });
    </script>

</x-app>
