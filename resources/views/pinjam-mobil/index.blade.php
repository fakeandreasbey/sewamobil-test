@extends('layouts.layout')

@section('title')
Pinjam Mobil
@endsection

@section('content')


@push('css')
    <link rel="stylesheet" href="{{ asset('') }}assets/src/plugins/src/sweetalerts2/sweetalerts2.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/src/plugins/src/table/datatable/datatables.css">    

    <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/src/plugins/css/dark/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" href="{{ asset('') }}lib/fontawesome/css/fontawesome.min.css" />  
    <link rel="stylesheet" href="{{ asset('') }}lib/fontawesome/css/all.min.css" />  

    <link href="{{ asset('') }}assets/src/assets/css/light/components/list-group.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('') }}assets/src/assets/css/light/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/src/assets/css/light/dashboard/dash_2.css" rel="stylesheet" type="text/css" />

    <link href="{{ asset('') }}assets/src/assets/css/dark/components/list-group.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('') }}assets/src/assets/css/dark/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/src/assets/css/dark/dashboard/dash_2.css" rel="stylesheet" type="text/css" />

    <link href="{{ asset('') }}assets/src/assets/css/light/elements/popover.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/src/assets/css/dark/elements/popover.css" rel="stylesheet" type="text/css" />

    <link href="{{ asset('') }}assets/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/src/assets/css/light/components/accordions.css" rel="stylesheet" type="text/css" />

    <link href="{{ asset('') }}assets/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/src/assets/css/dark/components/accordions.css" rel="stylesheet" type="text/css" />

    <link href="{{ asset('') }}assets/src/assets/css/light/components/tabs.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/src/assets/css/dark/components/tabs.css" rel="stylesheet" type="text/css" />

    <link href="{{ asset('') }}assets/src/assets/css/light/elements/tooltip.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/src/assets/css/dark/elements/tooltip.css" rel="stylesheet" type="text/css" />

    <link href="{{ asset('') }}assets/css/select2.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/src/plugins/src/tomSelect/tom-select.default.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/src/plugins/css/light/tomSelect/custom-tomSelect.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/src/plugins/css/dark/tomSelect/custom-tomSelect.css">
@endpush



<div class="layout-px-spacing">
  <div class="middle-content container-xxl p-0">


    <div class="row layout-top-spacing">






      <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">


        
        <div class="statbox widget box box-shadow">


        <form id="formAction" action="{{ route('pinjam.mobil.store') }}" method="post" enctype="multipart/form-data"> 
        @csrf


            <div class="row mb-3">   

                <div class="col-md-12 mb-3">
                    <label for="durasi" class="form-label">Mobil</label>
                    <div class="input-group">
                        <select id='carimobil' name="carimobil" style="width: 100%,height: 70px"></select>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="durasi" class="form-label">Tanggal Pinjam</label>
                    <div class="input-group">
                        <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" value="" min="{{ $dateNow }}" required>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="durasi" class="form-label">Tanggal Kembali</label>
                    <div class="input-group">
                        <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" value="" min="{{ $dateNow }}" required>
                    </div>
                </div>


                <div id="getlamatotal">

                        <div class="col-md-12 mb-3">
                            <label for="durasi" class="form-label">Keterangan Sewa</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="keterangan" name="keterangan" value="" readonly >
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <!-- <label for="durasi" class="form-label">Lama Sewa</label> -->
                            <div class="input-group">
                                <input type="text" class="form-control" id="lama_sewa" name="lama_sewa" value="" hidden >
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <!-- <label for="durasi" class="form-label">Total Tagihan (Rp.)</label> -->
                            <div class="input-group">
                                <input type="text" class="form-control" id="total_tagihan" name="total_tagihan" value="" hidden>
                            </div>
                        </div>
                </div>


                <div class="col-md-6">
                    <button class="btn btn-primary login-button" id="btnProses" onclick="store();">Proses </button>
                </div>

                
            </div>

            </form>


          




          </div>
        </div>
      </div>
    </div>




  </div>
</div>



@endsection

@push('js')

    <script src="{{ asset('') }}assets/src/plugins/src/global/vendors.min.js"></script>
    <script src="{{ asset('') }}assets/src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('') }}assets/src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('') }}assets/src/plugins/src/mousetrap/mousetrap.min.js"></script>
    <script src="{{ asset('') }}assets/src/plugins/src/waves/waves.min.js"></script>
    <script src="{{ asset('') }}assets/cork/app.js"></script>
    <script src="{{ asset('') }}assets/src/assets/js/custom.js"></script>
    <script src="{{ asset('') }}assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js"></script>
    <script src="{{ asset('') }}assets/src/plugins/src/table/datatable/datatables.js"></script>
    <script src="{{ asset('') }}assets/js/select2.min.js"></script>
    


    <script type="text/javascript">


        function reload(){
            setTimeout(function() {
                window.location.reload();
            }, 2000); // 2000 milidetik sama dengan 2 detik
        }

        function store(){
                $('#formAction').on('submit', function(e){
                    e.preventDefault()
                    const _form = this
                    const formData = new FormData(_form)

                    const url = this.getAttribute('action')

                    $.ajax({
                        method: 'POST',
                        url,
                        headers:{
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(res){
                            
                            reload();

                             //Toast Mulai
                            const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                            })
                                
                            Toast.fire({
                                icon: 'success',
                                title: res.message
                            })
                            //Toast Selesai


                        },
                        error: function(res){
                            let errors = res.responseJSON?.errors
                            $(_form).find('.text-danger.text-small').remove()
                            if(errors){
                            for(const [key, value] of Object.entries(errors)){
                                $(`[name='${key}']`).parent().append(`<span class="text-danger text-small">${value}</span>`)
                            }
                        }
                    }

                })
            })
        }

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function(){

            $( "#carimobil" ).select2({
                placeholder: 'Ketikan merek atau model',
                allowClear: true,
                minimumInputLength: 2,
                // dropdownParent: '#modalAction',
                ajax: { 
                url: "{{route('mobil.comboBox')}}",
                type: "POST",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        "_token": "{{ csrf_token() }}",
                    search: params.term // search term
                    };
                },
                processResults: function (response) {
                    return {
                    results: response
                    };
                },
                
                cache: true
                }

            });
        

        });


    $(document).ready(function() {
        $('body').on('change', '#tanggal_kembali', function() {
            let id = $(this).val();
            let tanggalPinjam = $('#tanggal_pinjam').val();
            let idMobil = $('#carimobil').val();
            let route = "{{ route('get.lama.total') }}";
            $.ajax({
                type: 'get',
                url: route,
                data: {
                    id: id,
                    tanggal_pinjam: tanggalPinjam,
                    id_mobil: idMobil
                },
                success: function(data) {
                    $('#getlamatotal').html(data);
                }
            })
        })
    })

    </script>
@endpush

