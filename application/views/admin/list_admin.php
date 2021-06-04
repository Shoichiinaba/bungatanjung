<div class="content-wrapper">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List Data Admin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('Dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Data Admin</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
          <div class="card-header bg-lime">
            <h3 class="card-title">List Data Admin</h3>
          </div>
            <div class="card-body">
              <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped" >
                    <thead class="bg-lime disabled">
                      <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jabatan</th>
                        <th width ='6%'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $no= 0; foreach ($list as $g ): $no++;?>
                          <tr>
                            <td><?php echo $g->id; ?></td>
                            <td><?php echo $g->username; ?></td>
                            <td><?php echo $g->password; ?></td>
                            <td><?php echo $g->nama ; ?></td>
                            <td><?php echo $g->email; ?></td>
                            <td><?php echo $g->role; ?></td>
                            <td align="center">
                            <a href="<?php echo site_url('admin/delete/'.$g->id); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini');" class="btn btn-danger btn-xs tooltips" data-popup="tooltip" data-original-title="Hapus Data" data-placement="top"><i class="fa fa-trash"></i></a>
                          </tr>
                        <?php endforeach;?>
                    </tbody>
              </table>
            </div>
        </div>
      </div>
    </div>
   </div>
</section>
</div>