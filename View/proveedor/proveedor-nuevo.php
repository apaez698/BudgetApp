<h1 class="page-header">
    Nuevo Registro
</h1>

<ol class="breadcrumb">
  <li><a href="?c=proveedor">Proveedores</a></li>
  <li class="active">Nuevo Registro</li>
</ol>

<form id="frm-proveedor" action="?c=proveedor&a=Guardar" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label>Ruc</label>
      <input type="text" name="idProveedor" pattern="[0-9]" minlength="10" maxlength="10" value="<?php echo $pvd->idProveedor; ?>" class="form-control" placeholder="Ingrese Ruc Proveedor (Solo números)" data-validacion-tipo="requerido|min:10" />
    </div>

    <div class="form-group">
        <label>Razón Social</label>
        <input type="text" name="razonS"  required value="<?php echo $pvd->razonS; ?>" class="form-control" placeholder="Ingrese Razón Social" data-validacion-tipo="requerido|min:100" />
    </div>

    <div class="form-group">
        <label>Dirección</label>
        <input type="text" name="dir" required value="<?php echo $pvd->dir; ?>" class="form-control" placeholder="Ingrese dirección proveedor" data-validacion-tipo="requerido|min:100" />
    </div>

    <div class="form-group">
        <label>Teléfono</label>
        <input type="text" name="tel"  required pattern="[0-9]" value="<?php echo $pvd->tel; ?>" class="form-control" placeholder="Ingrese teléfono proveedor (Solo números)" data-validacion-tipo="requerido|min:10" />
    </div>

    <hr />

    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-proveedor").submit(function(){
            return $(this).validate();
        });


    })
</script>
