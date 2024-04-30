@extends('admin.master')

@section('title')
    Ruang Seminar
@endsection

@section('subtitle')
    <a class="btn btn-primary" href="{{ route('admin.ruangseminar.create') }}" role="button">Tambah <i
            class="fa-solid fa-plus"></i></a>
@endsection

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="example1">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Aksi</th> <!-- Tambah kolom untuk aksi -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ruangseminar as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if ($item->gambar)
                                                    <img src="{{ asset('aset/img/' . $item->gambar) }}" alt="Gambar" style="max-width: 200px; max-height: 200px;">
                                                @else
                                                    <span>Tidak ada gambar</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.ruangseminar.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                                <form action="{{ route('admin.ruangseminar.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus item ini?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
