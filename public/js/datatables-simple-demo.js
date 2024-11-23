window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementById('datatablesSimple');
       if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple, {
            searchable: false, // Menonaktifkan fitur pencarian
            perPage: 10, 
            columns: [
                { select: 0, sortable: true },  // Kolom ID dapat diurutkan
                { select: 1, sortable: true },  // Kolom Nama dapat diurutkan
                { select: 4, type: "number", sortable: true }  // Kolom Kelas dapat diurutkan dengan tipe angka
            ]
        });
    }
});
