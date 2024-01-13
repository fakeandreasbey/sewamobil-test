@extends('layouts.layout')

@section('title')
Data Mobil Tersedia
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

          
          <div class="widget-content widget-content-area br-8">
            <table id="daftarmobil-table" class="table style-2 dt-table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Merek</th>
                  <th>Model</th>
                  <th>No. Plat</th>
                  <th>Tarif</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
            
                <!-- Modal -->
                <div class="modal fade bd-example-modal-xl" id="modalAction" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"  data-bs-backdrop="static" data-bs-keyboard="false">
                  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                      
                  </div>
                </div>




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

    $(function () {
          var table = $('#daftarmobil-table').DataTable({

            fnDrawCallback : function() {
                $('[data-bs-toggle="popover"]').popover(); 
            },

            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
                "oLanguage": {
                    "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                    "sInfo": "Menampilkan halaman _PAGE_ dari _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "Pencarian...",
                   "sLengthMenu": "Filter :  _MENU_",
                },
            "stripeClasses": [],
            "lengthMenu": [
                    [ 15, 30, 50, 100, -1 ],
                    [ '15 data', '30 data', '50 data', '100 data', 'Semua' ]
                ],

              processing: true,
              serverSide: true,
              ajax: "{{ route('mobil.member.index') }}",
              columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: 'false', searchable: 'false', width: '1%'},
                  {data: 'merek', name: 'merek', title: 'Merek', width: '19%'},
                  {data: 'model', name: 'model', title: 'Model', width: '10%'},
                  {data: 'no_plat', name: 'no_plat', title: 'No. Plat', width: '10%'},
                  {data: 'tarif', name: 'tarif', title: 'Tarif', width: '10%'},
                  {data: 'status_aktif', name: 'status_aktif', title: 'Status Aktif', width: '10%'},        
              ]
          });
        });
    </script>


@endpush

