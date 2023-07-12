 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Plan Maternidad </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">PlanMaternidad</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
		  
		  
        <div class="row">
          <div class="col-md-6">
			
			  
			  
			  
		   <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Criterio de busqueda</h3>
              </div>
              <div class="card-body">
				  
			<?= session()->getFlashdata('error') ?>

				  <?= \Config\Services::validation()->listErrors() ?>
			  
			  <form action="/pages/planmaternidad" method="post">
				 <?= csrf_field() ?>  
			
				<div class="form-group">
                  <label>Date masks:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" name="finicio" value="<?= set_value('finicio') ?>" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                  </div>
                  <!-- /.input group -->
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" name="ffin" value="<?= set_value('ffin') ?>" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                  </div>
                  <!-- /.input group -->
                </div>
				   
                <div class="form-group">
                  <label>Ceebtro Médico</label>
                  <select class="form-control select2bs4" name="centro" style="width: 100%;">
                    <option value="001" <?= set_select('centro', '001') ?> selected="selected">Rumichaca</option>
                    <option value="020" <?= set_select('centro', '020') ?>>Sauces</option>
                    <option value="018" <?= set_select('centro', '018') ?>>Mapasingue</option>
                    <option value="017" <?= set_select('centro', '017') ?>>25 de Julio</option>
                    <option value="028" <?= set_select('centro', '028') ?>>Express</option>
                    <option value="002" <?= set_select('centro', '002') ?>>Quito</option>
                    <option value="003" <?= set_select('centro', '003') ?>>Cuenca</option>
                  </select>
                </div>
             <input class="btn btn-primary" type="submit" name="submit" value="Consultar">
        </form>
				  
              </div>
              <!-- /.card-body -->
            </div>
			  
			 
          </div>
      
        </div>
        <!-- /.row -->
		  
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
       
                   
					  <?php    echo $datostr; ?>
				  
              
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->