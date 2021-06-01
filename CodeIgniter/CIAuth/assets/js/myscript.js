const flashData = $('.flash-data').data('flashdata');
// console.log(flashData);

if(flashData){
    Swal.fire({
        title: 'Data Anggota ',
        text: 'Berhasil ' + flashData,
        icon: 'success'
    });
}

$('.tombol-hapus').on('click', function(event){
    event.preventDefault();

    const href = $(this).attr('href');

    Swal.fire({
        title: 'Hapus Data?',
        text: "Data yang dihapus tidak bisa direstore",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus!'
      }).then((result) => {
        if (result.isConfirmed) {
          document.location.href = href;
        }
      })
});