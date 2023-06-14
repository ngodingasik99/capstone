@extends('admin.layout.index')

@section('content')
<div class="content-body">
    <div class="container">
        <center class="mb-2">
            <h2>Pengeluaran</h2>
        </center>
        <div class="card-header flex-row">
            <h4 class="card-title">
                <div class="input-group">
                    <div class="form-outline">
                    </div>
                </div>    
            </h4>                    
            
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>tanggal</th>
                        <th>Nama</th>
                        <th>Biaya</th>
                        <th>Nota</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($semua as $number => $item)
                    <tr>
                        <td>{{$number + $semua->firstItem()}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>{{$item->nama}}</td>
                        <td>Rp. {{number_format($item->biaya)}}</td>
                        <td>
                            @if (Storage::exists($item->foto_nota))
                                <img src="{{asset('storage/' . $item->foto_nota)}}" alt="nota" width="50px" height="50px" class="me-2 rounded-circle">    
                            @else
                                <img src="{{asset('images/default-nota.png')}}" alt="nota" width="50px" height="50px" class="me-2 rounded-circle">
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="my-3 d-flex justify-content-center">
                {{$semua->onEachSide(0)->links()}}
            </div>
        </div>
    </div>
</div>
</div>

@endsection  