 <section id="main-content">
     <section class="wrapper site-min-height">
         <h3><i class="fa fa-angle-right"></i><?= $title ?> - Anggota</h3>
         <div class="row mt">
             <div class="col-lg-12">
                 <div class="row">
                     <div class="col-md-4">

                         <div class="alert alert-success alert-dismissible fade show" role="alert">
                             <strong><?= $this->session->flashdata('flashdata') ?></strong>
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col">
                         <table class="table table-hover tableBarang">
                             <thead class="thead-light">
                                 <tr>
                                     <th scope="col">No</th>
                                     <th scope="col">Kode Barang</th>
                                     <th scope="col">Nama Barang</th>
                                     <th scope="col">Stok Barang</th>
                                     <th scope="col">Harga Barang</th>
                                     <th scope="col">Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <!-- /wrapper -->
 </section>
 <!-- /MAIN CONTENT -->