<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Staff') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Staff</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('staff.update', $staff->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">Nama</label>
                                    <input type="text" name="name" placeholder="Nama Staff" class="form-control" value="{{ $staff->name }}">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="" class="form-label">Tanggal Lahir</label>
                                    <input type="date" name="dob" class="form-control" value="{{ $staff->date_of_birth }}">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="" class="form-label">Alamat</label>
                                    <textarea name="address" class="form-control">{{ $staff->address }}</textarea>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="" class="form-label">Preview Foto</label>
                                    <img src="{{ asset($staff->foto) }}" width="150" height="200">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="" class="form-label">Foto</label>
                                    <input type="file" name="foto" placeholder="Foto" class="form-control">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="" class="form-label">Status Pernikahan</label>&nbsp;
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="marital_status" value="0" {{ $staff->marital_status == 0 ? 'checked' : '' }}>
                                        <label class="form-check-label">Belum Menikah</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="marital_status" value="1" {{ $staff->marital_status == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label">Sudah Menikah</label>
                                      </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
