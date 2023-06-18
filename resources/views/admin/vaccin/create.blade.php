@extends("admin.layouts.master")

@section('content')

    
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Vaccin</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}">Tableau de bord</a></li>
                        <li class="breadcrumb-item active">Ajouter vaccin</li>
                    </ul>
                </div>
            </div>
        </div>
    
        <div class="row">
            <div>
                @if($errors->any)
                    <div class="alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('vaccin.store')}}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Nom vaccin <span class="text text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input type="text" id="nom_vaccin" @error('nom_vaccin') is-invalid @enderror class="form-control" name="nom_vaccin" placeholder="Nom du vaccin">
                                    @error('nom_vaccin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Description <span class="text text-danger">*</span></label>
                                <div class="col-md-10">
                                    <textarea id="description" rows="5" cols="5" @error('description') is-invalid @enderror name="description" class="form-control" placeholder="Entrer la description"></textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Dose <span class="text text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input type="number" id="dose" @error('dose') is-invalid @enderror name="dose" placeholder="Nombre de dose" class="form-control">
                                    @error('dose')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Interval</label>
                                <div class="col-md-10">
                                    <input type="number" id="interval" @error('interval') is-invalid @enderror name="interval" class="form-control" placeholder="Interval en jour">
                                    @error('interval')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mt-5 float-rigth">
                                <button class="btn btn-primary" type="submit">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
</div>

@endsection