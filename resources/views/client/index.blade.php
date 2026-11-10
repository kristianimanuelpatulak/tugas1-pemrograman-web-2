<x-app>

    <x-slot:title>{{ $title }}</x-slot>
    {{-- Pesan Yang Ditampilkan Setelah Data Berhasil Disimpan --}}
    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession
    <a class="btn btn-primary mb-3" href="{{ route('client.create') }}" role="button">Add Client</a>

    <table class="table table-sm table-bordered border-dark table-hover" style="font-size: 13px;">
        <thead>
            <tr>
                <th scope="col" style="width: 50px;">No.</th>
                <th scope="col">NAMA</th>
                <th scope="col">GENDER</th>
                <th scope="col">EMAIL</th>
                <th scope="col">NO. PELANGGAN</th>
                <th scope="col">ALAMAT</th>
                <th scope="col" style="width: 140px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->gender }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->number }}</td>
                    <td>{{ $client->address }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-app>
