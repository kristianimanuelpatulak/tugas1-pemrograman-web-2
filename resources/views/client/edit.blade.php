<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    <form method="POST" action="{{ route('client.update', $client) }}">
        @csrf
        @method('PUT')

        {{-- Update atau edit nama pelanggan --}}
        <div class="mb-3">
            <label for="name" class="form-label">Nama Pelanggan</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name', $client->name) }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Update atau edit no. pelanggan --}}
        <div class="mb-3">
            <label for="number" class="form-label">No. Pelanggan</label>
            <input type="number" class="form-control @error('number') is-invalid @enderror" id="number"
                name="number" value="{{ old('number', $client->number) }}">
            @error('number')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Update atau edit gender --}}
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender">
                <option value="">Pilih Gender</option>
                <option value="Laki-laki" {{ old('gender', $client->gender) == 'Laki-laki' ? 'selected' : '' }}>
                    Laki-laki
                </option>
                <option value="Perempuan" {{ old('gender', $client->gender) == 'Perempuan' ? 'selected' : '' }}>
                    Perempuan
                </option>
            </select>
            @error('gender')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Update atau edit email --}}
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                name="email" value="{{ old('email', $client->email) }}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Update atau edit alamat --}}
        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3">{{ old('address', $client->address) }}</textarea>
            @error('address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <a class="btn btn-warning" href="{{ route('client.index') }}" role="button">Back to Menu</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</x-app>
