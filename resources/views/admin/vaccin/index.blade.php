@extends("admin.layouts.master")

@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div>
                @include('admin.layouts.notification')
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12">                        
                    <h3 class="page-title">Vaccin</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}">tableau de bord</a></li>
                        <li class="breadcrumb-item active">Afficher vaccin</li>
                    </ul>
                </div>            
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom vaccin</th>
                                        <th>Dose</th>
                                        <th>Intervalle</th>
                                        <th>Statut</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vaccins as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->nom_vaccin}}</td>
                                            <td>{{$item->dose}} dose(s)</td>
                                            @if($item->interval == null)
                                                <td>Pas d'intervalle</td>
                                            @else
                                                <td>{{$item->interval}} jours</td>
                                            @endif
                                            <td>
                                                <input type="checkbox" name="toogle" value="{{$item->id}}" data-toggle="switchbutton" {{$item->statut == 'active' ? 'checked' : ''}} data-onlabel="active" data-offlabel="inactive" data-size="sm" data-onstyle="success" data-offstyle="danger">
                                            </td>
                                
                                            <td>
                                                <a href="javascript:void(0);" data-toggle="modal" data-target="#vaccin{{$item->id}}" data-toggle="tooltip" title="Detail" class="float-left btn btn-sm btn-outline-info ml-2" data-placement="bottom"><i class="fa fa-eye"></i></a>
                                                <a href="{{route('vaccin.edit', $item->id)}}" data-toggle="tooltip" title="Modifier" class="float-left btn btn-sm btn-outline-warning ml-2" data-placement="bottom"><i class="fa fa-edit"></i></a>
                                                <form class="float-left ml-2" action="{{route('vaccin.destroy', $item->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="" data-toggle="tooltip" title="Supprimer" data-id="{{$item->id}}" class="dltBtn btn btn-sm btn-outline-danger" data-placement="bottom"><i class="fa fa-trash"></i></a>
                                                </form>
                                            </td>
                                        </tr>
                                
                                        <!-- Modal -->
                                        <div class="modal fade" id="vaccin{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="vaccin{{$item->id}}Title" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                @php
                                                    $vaccin = \App\Models\Vaccin::where('id', $item->id)->first();
                                                @endphp
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="#produitID{{$item->id}}">{{\Illuminate\Support\Str::upper($vaccin->nom_vaccin)}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <strong>Description :</strong>
                                                            <p>{{$vaccin->description}}</p>
                
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <strong>Dose :</strong>
                                                                    <p>{{$vaccin->dose}} dose(s)</p>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    @if($vaccin->interval == null)
                                                                        <p>Pas d'intervalle</p>
                                                                    @else
                                                                        <p>{{$vaccin->interval}} jours</p>
                                                                    @endif
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <strong>Statut :</strong>
                                                                    @if ($vaccin->statut == 'active')
                                                                        <p class="badge badge-success">{{$vaccin->statut}}</p>
                                                                    @else
                                                                        <p class="badge badge-danger">{{$vaccin->statut}}</p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.dltBtn').click(function(e){
            var form = $(this).closest('form');
            var dataID = $(this).data('id');
            e.preventDefault();
            swal({
                title: "Êtes-vous sûr ?",
                text: "Une fois effacé, vous ne pourrez pas récupérer ce fichier imaginaire !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                    swal("Pouf ! Votre fichier imaginaire a été supprimé !", {
                    icon: "success",
                    });
                } else {
                    swal("Votre fichier imaginaire est en sécurité !");
                }
            });
        });
    </script>

    <script>
        $('input[name=toogle]').change(function (){
            var mode = $(this).prop('checked');
            var id = $(this).val();
            // alert(id);
            $.ajax({
                url:"{{route('vaccin.statut')}}",
                type:"POST",
                data:{
                    _token:'{{csrf_token()}}',
                    mode:mode,
                    id:id,
                },
                success:function(response){
                    if(response.statut){
                        alert(response.msg);
                        location.reload();
                    }
                    else{
                        alert('Veuillez réessayer !');
                    }
                }
            })
        })
    </script>
@endsection

