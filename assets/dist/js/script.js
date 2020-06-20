$(document).ready(function(){
    $(document).on('click', '#ubahData', function(){
        var id = $(this).data('id');
        var kdjrs = $(this).data('kdjrs');
        var nama = $(this).data('nama');
        $('#id').val(id);
        $('#kode').val(kdjrs);
        $('#nama').val(nama);
    });

    $(document).on('click', '#kelas', function(){
        var id = $(this).data('id');
        var kdkelas = $(this).data('kdkelas');
        var namakelas = $(this).data('namakelas');
        var prodi = $(this).data('prodi');
        $('#id').val(id);
        $('#kodekelas').val(kdkelas);
        $('#namakelas').val(namakelas);
        $('#prodi').val(prodi);
    });

    $(document).on('click', '#ubahPelajaran', function(){
        var id = $(this).data('id');
        var kd = $(this).data('kd');
        var nama = $(this).data('nama');
        var guru = $(this).data('guru');
        $('#idplj').val(id);
        $('#kodeplj').val(kd);
        $('#namaplj').val(nama);
        $('#guru').val(guru);
    });

    $(document).on('click', '#ubahTahun', function(){
        var id = $(this).data('id');
        var thn = $(this).data('thn');
        $('#id').val(id);
        $('#thn').val(thn);
    });

    $(document).on('click', '#ubahSiswa', function(){
        var id = $(this).data('id');
        var nis = $(this).data('nis');
        var nama = $(this).data('nama');
        var kelas = $(this).data('kls');
        var gender = $(this).data('gender');
        var alamat = $(this).data('alamat');
        var telp = $(this).data('telp');
        var angkatan = $(this).data('angkatan');
        $('#id').val(id);
        $('#nis').val(nis);
        $('#nama').val(nama);
        $('#kelas').val(kelas);
        $('#gender').val(gender);
        $('#alamat').val(alamat);
        $('#telp').val(telp);
        $('#angkatan').val(angkatan);
    });

    $(document).on('click', '#ubahGuru', function(){
        var id = $(this).data('id');
        var nip = $(this).data('nip');
        var nama = $(this).data('nama');
        var gender = $(this).data('gender');
        var status = $(this).data('status');
        var telp = $(this).data('telp');
        $('#id').val(id);
        $('#nip').val(nip);
        $('#nama_guru').val(nama);
        $('#gender').val(gender);
        $('#status').val(status);
        $('#telp').val(telp);
    });

    $(document).on('click', '#pilihMapel', function(){
        var id = $(this).data('id');
        var mapel = $(this).data('nama');
        var guru = $(this).data('guru');
        $('#pelajaran').val(mapel);
        $('#pengajar').val(guru);
        $('#modal-item').modal('hide');
    });
    
});




