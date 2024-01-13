
<div class="modal-content">
<form id="formAction" action="{{ route('data.pinjam.mobil.kembali.store',$mobil->id_pinjam) }}" method="post" enctype="multipart/form-data">
    @csrf
    @if ($mobil->id_pinjam)
        @method('put')
    @endif

    
    

    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Data Pengembalian Mobil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>
    </div>
    <div class="modal-body">
        <p class="modal-text"></p>

        <div class="row">

            <div class="col-md-12">
                <div class="mb-3">
                    <label for="roleName">Nama Member</label>
                    <input type="text" name="nama_member" class="form-control" id="nama_member" value="{{ $mobil->name }}" maxlength="30"  readonly style="color:#000;">
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="roleName">Mobil</label>
                    <input type="text" name="mobil" class="form-control" id="mobil" value="{{ $mobil->merek.' '.$mobil->model }}" maxlength="30" readonly style="color:#000;">
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="roleName">Plat Nomor</label>
                    <input type="text" name="mobil" class="form-control" id="mobil" value="{{ $mobil->no_plat }}" maxlength="30"  readonly style="color:#000;">
                </div>
            </div>


            <div class="col-md-6">
                <div class="mb-3">
                    <label for="roleName">Tanggal Pinjam</label>
                    <input type="text" name="tanggal_pinjam" class="form-control" id="tanggal_pinjam" value="{{ \Carbon\Carbon::parse($mobil->tanggal_pinjam)->format('d M Y') }}" readonly style="color:#000;">
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="roleName">Tanggal Kembali</label>
                    <input type="text" name="tanggal_kembali" class="form-control" id="tanggal_kembali" value="{{ \Carbon\Carbon::parse($mobil->tanggal_kembali)->format('d M Y')}}"  readonly style="color:#000;">
                </div>
            </div>

            <div class="col-md-2">
                <div class="mb-3">
                    <label for="roleName">Lama (hari)</label>
                    <input type="text" name="lama_sewa" class="form-control" id="lama_sewa" value="{{ $mobil->lama_sewa }}"  readonly style="color:#000;">
                </div>
            </div>

            <div class="col-md-2">
                <div class="mb-3">
                    <label for="roleName">Tarif/hari</label>
                    <input type="text" name="tarif" class="form-control" id="tarif" value="{{ number_format($mobil->tarif_sewa) }}" readonly style="color:#000;">
                </div>
            </div>

            <div class="col-md-8">
                <div class="mb-3">
                    <label for="roleName">Total Tagihan (Rp.)</label>
                    <input type="text" name="total_tagihan" class="form-control" id="total_tagihan" value="{{ number_format($mobil->total_tagihan) }}"  readonly style="color:#000;">
                </div>
            </div>


           


        </div>



    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Proses</button>
    </div>
    </form>
</div>
