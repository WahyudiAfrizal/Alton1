<div id="inihapus" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- body modal -->
            <div class="modal-body">
                <p><b>Apakah anda yakin untuk menghapus</b></p>
            </div>
            <!-- footer modal -->
            <div class="modal-footer">
                <a href="{{ url('/kategori/hapus/'.$isitabel->id) }}" class="btn btn-sm btn-primary">Hapus</a>
            </div>
        </div>
    </div>
</div>