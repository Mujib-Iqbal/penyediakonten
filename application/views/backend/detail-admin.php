<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Admin
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box box-solid box-info">
            <div class="box-header">
              <h3 class="box-title">Detail Admin</h3>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <td><strong>Nama</strong></td>
                  <td><strong>:</strong></td>
                  <td><?=$admin->admin_nama ?></td>
                </tr>
                <tr>
                  <td><strong>User Name</strong></td>
                  <td><strong>:</strong></td>
                  <td><?=$admin->admin_username ?></td>
                </tr>
                <tr>
                  <td><strong>Email</strong></td>
                  <td><strong>:</strong></td>
                  <td><?=$admin->admin_email ?></td>
                </tr>
              </table>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->

  