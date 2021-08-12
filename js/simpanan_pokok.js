$(document).ready(function(){
simpananPokok();
riwayat();
});

function simpananPokok(){
     var table = $("#table_semua_simpanan_pokok");
    grid_all = table.DataTable({
    // scrollX: true,
    // scrollCollapse: true,
    aaSorting: [],
    initComplete: function (settings, json) {},
    retrieve: true,
    processing: true,
    ajax: {
      type: "GET",
      url: base_url + "Simpanan_Pokok/get_All_Simpanan",
      data: function (d) {
        no = 0;
      },
      dataSrc: "",
    },
    columns: [
      {
        render: function (data, type, full, meta) {
          no += 1;

        return no;
      },
          className: "text-center"
    },
    {
      render: function (data, type, full, meta) {
        return full.kode_simpanan_pokok
      },
          className: "text-center"
    },

    {
      render: function (data, type, full, meta) {
          if(full.tanggal==''){
              return `<button type="button" class="btn btn-danger btn-sm"><i class="fa fa-times"> Belum bayar</i></button>`
          }else{
               return full.tanggal
          }
         
      },
          className: "text-center"
    },

    {
      render: function (data, type, full, meta) {
        return full.nama_anggota
      },
          className: "text-center"
    },
    {
      render: function (data, type, full, meta) {
          return full.debet
      },
          className: "text-center"
    },
    {
        render : function (data, type, full, meta){
            return full.credit
        },
      className: "text-center"
    },
    {
        render : function (data, type, full, meta){
            return full.total
        },
      className: "text-center"
    },
    {
        render : function (data, type, full, meta){
            return `<div class="row">
                      <div class="col-md-12">
                          <a href="${base_url}Anggota/detailAnggota/${full.id_anggota}" target="_blank" type="button" class="btn btn-secondary btn-sm"><i class="fa fa-info"></i></a>
                          <button onclick="edit_anggota(${full.id_anggota})" type="button" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                          <button onclick="hapus_anggota(${full.id_anggota})" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                      </div>
                  </div>`
          },
          className: "text-center"
      }
    ],
  });
}


function riwayat(){
     var table = $("#table_riwayat");
    grid_all = table.DataTable({
    // scrollX: true,
    // scrollCollapse: true,
    aaSorting: [],
    initComplete: function (settings, json) {},
    retrieve: true,
    processing: true,
    ajax: {
      type: "GET",
      url: base_url + "Simpanan_Pokok/get_riwayat",
      data: function (d) {
        no = 0;
      },
      dataSrc: "",
    },
    columns: [
      {
        render: function (data, type, full, meta) {
          no += 1;

        return no;
      },
          className: "text-center"
    },
    {
      render: function (data, type, full, meta) {
        return full.kode_simpanan_pokok
      },
          className: "text-center"
    },

    {
      render: function (data, type, full, meta) {
          if(full.tanggal==''){
              return `<button type="button" class="btn btn-danger btn-sm"><i class="fa fa-times"> Belum bayar</i></button>`
          }else{
               return full.tanggal
          }
         
      },
          className: "text-center"
    },

    {
      render: function (data, type, full, meta) {
        return full.nama_anggota
      },
          className: "text-center"
    },
    {
      render: function (data, type, full, meta) {
          return full.debet
      },
          className: "text-center"
    },
    {
        render : function (data, type, full, meta){
            return full.credit
        },
      className: "text-center"
    },
    {
        render : function (data, type, full, meta){
            return full.total
        },
      className: "text-center"
    },
    {
        render : function (data, type, full, meta){
            return full.deleted_at
        },
      className: "text-center"
    }
    ],
  });
}