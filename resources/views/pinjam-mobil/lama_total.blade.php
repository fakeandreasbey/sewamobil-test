
<div class="col-md-12 mb-3">
    <label for="durasi" class="form-label">Keterangan Sewa</label>
    <div class="input-group">
        <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $keterangan }}" readonly  style="color:#000;">
    </div>
</div>

<div class="col-md-6 mb-3">
    <!-- <label for="durasi" class="form-label">Lama Sewa</label> -->
    <div class="input-group">
        <input type="text" class="form-control" id="lama_sewa" name="lama_sewa" value="{{ $lama }}" hidden >
    </div>
</div>

<div class="col-md-6 mb-3">
    <!-- <label for="durasi" class="form-label">Total Tagihan (Rp.)</label> -->
    <div class="input-group">
        <input type="text" class="form-control" id="total_tagihan" name="total_tagihan" value="{{ $total }}" hidden>
    </div>
</div>