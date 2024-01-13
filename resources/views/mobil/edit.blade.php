
<div class="modal-content">
<form id="formAction" action="{{ $mobil->id ? route('mobil.update',$mobil->id) : route('mobil.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    @if ($mobil->id)
        @method('put')
    @endif

    
    

    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Data Mobil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>
    </div>
    <div class="modal-body">
        <p class="modal-text"></p>

        <div class="row">

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="roleName">Merek</label>
                    <input type="text" name="merek" class="form-control" id="merek" value="{{ $mobil->merek }}" maxlength="30" placeholder="">
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="roleName">Model</label>
                    <input type="text" name="model" class="form-control" id="model" value="{{ $mobil->model }}" maxlength="30" placeholder="">
                </div>
            </div>


            <div class="col-md-6">
                <div class="mb-3">
                    <label for="roleName">No. Plat</label>
                    <input type="text" name="no_plat" class="form-control" id="no_plat" value="{{ $mobil->no_plat }}" maxlength="15" placeholder="">
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="roleName">Tarif</label>
                    <input type="number" name="tarif" class="form-control" id="tarif" value="{{ $mobil->tarif }}"  maxlength="11" placeholder="">
                </div>
            </div>

            <div class="col-md-12">
                <div class="mb-3">
                    <label for="roleName">Status Aktif</label>
                    <select id="status_aktif" name="status_aktif" class="form-select">
                        <option value="1" @selected($mobil->status_aktif == '1')>Aktif</option>
                        <option value="0" @selected($mobil->status_aktif == '0')>Tidak Aktif</option>
                    </select>
                </div>
            </div>
           
           


        </div>



    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    </form>
</div>
