<?php
include_once('registro.php');
$query = new Registro();
?>
<div class="modal fade in" id="modal_lab" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="tipo_var"><!--tipo combinacion-->
        <input type="hidden" id="id_variante"><!--id variante -> editar variante-->
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Porcentaje:</label>
                    <input type="number" class="form-control" id="tporcentajen1" name="nporcenajen1">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Composición:</label>
                    <select style="width: 100%" class="form-control" id="cmbcomposicionn1" name="ncmbcomposicionn1" tabindex="1"><!--onchange="Mostrar_Ocultar();"-->
                        <!-- <option value="0"></option> -->
                        <optgroup>
                            <?php
                            $rs = $query->Consultar("*","FCAT_COMPOSICION","ID_CAT_COMPOSICION","ID_CAT_COMPOSICION");// AND ISTKACT > 0
                            while(!$rs->EOF){
                                echo "<option value='".$rs->fields['DESCRIPCION']."'>".$rs->fields['DESCRIPCION']."</option>";
                                $rs->MoveNext();
                            }
                            ?>
                        </optgroup>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Porcentaje:</label>
                    <input type="number" class="form-control" id="tporcentajen2" name="nporcenajen2">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Composición:</label>
                    <select style="width: 100%" class="form-control" id="cmbcomposicionn2" name="ncmbcomposicionn2" tabindex="1"><!--onchange="Mostrar_Ocultar();"-->
                        <!-- <option value="0"></option> -->
                        <optgroup>
                            <?php
                            $rs = $query->Consultar("*","FCAT_COMPOSICION","ID_CAT_COMPOSICION","ID_CAT_COMPOSICION");// AND ISTKACT > 0
                            while(!$rs->EOF){
                                echo "<option value='".$rs->fields['DESCRIPCION']."'>".$rs->fields['DESCRIPCION']."</option>";
                                $rs->MoveNext();
                            }
                            ?>
                        </optgroup>
                    </select>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            
            <div class="col-md-1"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="Limpiar_Modal();" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="Registrar_Laboratorio();">Guardar</button>
      </div>
    </div>
  </div>
</div>
<script>
    function Limpiar_Modal(){
        $('#tporcentajen1').val('');
        $('#tporcentajen2').val('');
        $('#cmbcomposicionn1').select2('destroy');
        $('#cmbcomposicionn2').select2('destroy');
        for(var i=1; i<=4; i++){
            $('#cmbproveedorn'+i).val('0');
            $('#cmbfacturan'+i).val('0');
        }
    }
    function Cargar_Desc(nm,a){
        var descr = nm.split('_');
        $('#tdesct'+a).val(descr[1]);
    }
</script>