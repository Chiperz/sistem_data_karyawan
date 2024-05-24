<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Staff') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="card">
                        <div class="card-header">
                            <h4>Create New Staff</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('staff.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">Nama</label>
                                    <input type="text" name="name" placeholder="Nama Staff" class="form-control" value="{{ old('name') }}">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="" class="form-label">Tanggal Lahir</label>
                                    <input type="date" name="dob" class="form-control" value="{{ old('dob') }}">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="" class="form-label">Alamat</label>
                                    <textarea name="address" class="form-control">{{ old('address') }}</textarea>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="" class="form-label">Foto</label>
                                    <input type="file" name="foto" placeholder="Foto" class="form-control">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="" class="form-label">Status Pernikahan</label>&nbsp;
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="marital_status" value="0">
                                        <label class="form-check-label">Belum Menikah</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="marital_status" value="1">
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
