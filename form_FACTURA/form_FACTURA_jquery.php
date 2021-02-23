
function scJQGeneralAdd() {
  scLoadScInput('input:text.sc-js-input');
  scLoadScInput('input:password.sc-js-input');
  scLoadScInput('input:checkbox.sc-js-input');
  scLoadScInput('input:radio.sc-js-input');
  scLoadScInput('select.sc-js-input');
  scLoadScInput('textarea.sc-js-input');

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if ($("#id_ac_" + sField).length > 0) {
    if ($oField.hasClass("select2-hidden-accessible")) {
      if (false == scSetFocusOnField($oField)) {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
    else {
      if (false == scSetFocusOnField($oField)) {
        if (false == scSetFocusOnField($("#id_ac_" + sField))) {
          setTimeout(function() { scSetFocusOnField($("#id_ac_" + sField)); }, 500);
        }
      }
      else {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
  }
  else {
    setTimeout(function() { scSetFocusOnField($oField); }, 500);
  }
} // scFocusField

function scSetFocusOnField($oField) {
  if ($oField.length > 0 && $oField[0].offsetHeight > 0 && $oField[0].offsetWidth > 0 && !$oField[0].disabled) {
    $oField[0].focus();
    return true;
  }
  return false;
} // scSetFocusOnField

function scEventControl_init(iSeqRow) {
  scEventControl_data["num_fact" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fechaemision" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idcomprador" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["razonsocialcomprador" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["num_cita" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["totalsinimpuestos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["totaldescuento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["base_12" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["base_0" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importetotal" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["campoadicional1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valoradicional1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["campoadicional2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valoradicional2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["campoadicional3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valoradicional3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["campoadicional4" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valoradicional4" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["campoadicional5" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valoradicional5" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["campoadicional6" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valoradicional6" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["campoadicional7" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valoradicional7" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["campoadicional8" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valoradicional8" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["campoadicional9" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valoradicional9" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["campoadicional10" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valoradicional10" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["campoadicional11" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valoradicional11" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["campoadicional12" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valoradicional12" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["campoadicional13" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valoradicional13" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["campoadicional14" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valoradicional14" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["campoadicional15" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valoradicional15" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["campoadicional16" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valoradicional16" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["campoadicional17" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valoradicional17" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["campoadicional18" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valoradicional18" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["campoadicional19" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valoradicional19" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["campoadicional20" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valoradicional20" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["detalle_factura" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["num_fact" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["num_fact" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fechaemision" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fechaemision" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idcomprador" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idcomprador" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["razonsocialcomprador" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["razonsocialcomprador" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["num_cita" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["num_cita" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["totalsinimpuestos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["totalsinimpuestos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["totaldescuento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["totaldescuento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["base_12" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["base_12" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["base_0" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["base_0" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importetotal" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importetotal" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["campoadicional1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["campoadicional1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valoradicional1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valoradicional1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["campoadicional2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["campoadicional2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valoradicional2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valoradicional2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["campoadicional3" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["campoadicional3" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valoradicional3" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valoradicional3" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["campoadicional4" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["campoadicional4" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valoradicional4" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valoradicional4" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["campoadicional5" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["campoadicional5" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valoradicional5" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valoradicional5" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["campoadicional6" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["campoadicional6" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valoradicional6" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valoradicional6" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["campoadicional7" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["campoadicional7" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valoradicional7" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valoradicional7" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["campoadicional8" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["campoadicional8" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valoradicional8" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valoradicional8" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["campoadicional9" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["campoadicional9" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valoradicional9" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valoradicional9" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["campoadicional10" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["campoadicional10" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valoradicional10" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valoradicional10" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["campoadicional11" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["campoadicional11" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valoradicional11" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valoradicional11" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["campoadicional12" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["campoadicional12" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valoradicional12" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valoradicional12" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["campoadicional13" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["campoadicional13" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valoradicional13" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valoradicional13" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["campoadicional14" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["campoadicional14" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valoradicional14" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valoradicional14" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["campoadicional15" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["campoadicional15" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valoradicional15" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valoradicional15" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["campoadicional16" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["campoadicional16" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valoradicional16" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valoradicional16" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["campoadicional17" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["campoadicional17" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valoradicional17" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valoradicional17" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["campoadicional18" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["campoadicional18" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valoradicional18" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valoradicional18" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["campoadicional19" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["campoadicional19" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valoradicional19" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valoradicional19" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["campoadicional20" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["campoadicional20" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valoradicional20" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valoradicional20" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["detalle_factura" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detalle_factura" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  scEventControl_data[fieldName]["change"] = false;
} // scEventControl_onFocus

function scEventControl_onBlur(sFieldName) {
  scEventControl_data[sFieldName]["blur"] = false;
  if (scEventControl_data[sFieldName]["change"]) {
        if (scEventControl_data[sFieldName]["original"] == $("#id_sc_field_" + sFieldName).val() || scEventControl_data[sFieldName]["calculated"] == $("#id_sc_field_" + sFieldName).val()) {
          scEventControl_data[sFieldName]["change"] = false;
        }
  }
} // scEventControl_onBlur

function scEventControl_onChange(sFieldName) {
  scEventControl_data[sFieldName]["change"] = false;
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_razonsocial' + iSeqRow).bind('change', function() { sc_form_FACTURA_razonsocial_onchange(this, iSeqRow) });
  $('#id_sc_field_nombrecomercial' + iSeqRow).bind('change', function() { sc_form_FACTURA_nombrecomercial_onchange(this, iSeqRow) });
  $('#id_sc_field_ruc' + iSeqRow).bind('change', function() { sc_form_FACTURA_ruc_onchange(this, iSeqRow) });
  $('#id_sc_field_coddoc' + iSeqRow).bind('change', function() { sc_form_FACTURA_coddoc_onchange(this, iSeqRow) });
  $('#id_sc_field_estab' + iSeqRow).bind('change', function() { sc_form_FACTURA_estab_onchange(this, iSeqRow) });
  $('#id_sc_field_ptoemi' + iSeqRow).bind('change', function() { sc_form_FACTURA_ptoemi_onchange(this, iSeqRow) });
  $('#id_sc_field_secuencial' + iSeqRow).bind('change', function() { sc_form_FACTURA_secuencial_onchange(this, iSeqRow) });
  $('#id_sc_field_lote' + iSeqRow).bind('change', function() { sc_form_FACTURA_lote_onchange(this, iSeqRow) });
  $('#id_sc_field_dirmatriz' + iSeqRow).bind('change', function() { sc_form_FACTURA_dirmatriz_onchange(this, iSeqRow) });
  $('#id_sc_field_fechaemision' + iSeqRow).bind('blur', function() { sc_form_FACTURA_fechaemision_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_FACTURA_fechaemision_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_FACTURA_fechaemision_onfocus(this, iSeqRow) });
  $('#id_sc_field_direstablecimiento' + iSeqRow).bind('change', function() { sc_form_FACTURA_direstablecimiento_onchange(this, iSeqRow) });
  $('#id_sc_field_numcontribuyenteespecial' + iSeqRow).bind('change', function() { sc_form_FACTURA_numcontribuyenteespecial_onchange(this, iSeqRow) });
  $('#id_sc_field_obligadocontabilidad' + iSeqRow).bind('change', function() { sc_form_FACTURA_obligadocontabilidad_onchange(this, iSeqRow) });
  $('#id_sc_field_tipoidentcomprador' + iSeqRow).bind('change', function() { sc_form_FACTURA_tipoidentcomprador_onchange(this, iSeqRow) });
  $('#id_sc_field_guiaremision' + iSeqRow).bind('change', function() { sc_form_FACTURA_guiaremision_onchange(this, iSeqRow) });
  $('#id_sc_field_razonsocialcomprador' + iSeqRow).bind('blur', function() { sc_form_FACTURA_razonsocialcomprador_onblur(this, iSeqRow) })
                                                  .bind('change', function() { sc_form_FACTURA_razonsocialcomprador_onchange(this, iSeqRow) })
                                                  .bind('focus', function() { sc_form_FACTURA_razonsocialcomprador_onfocus(this, iSeqRow) });
  $('#id_sc_field_idcomprador' + iSeqRow).bind('blur', function() { sc_form_FACTURA_idcomprador_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_FACTURA_idcomprador_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_FACTURA_idcomprador_onfocus(this, iSeqRow) });
  $('#id_sc_field_totalsinimpuestos' + iSeqRow).bind('blur', function() { sc_form_FACTURA_totalsinimpuestos_onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_form_FACTURA_totalsinimpuestos_onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_FACTURA_totalsinimpuestos_onfocus(this, iSeqRow) });
  $('#id_sc_field_totaldescuento' + iSeqRow).bind('blur', function() { sc_form_FACTURA_totaldescuento_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_FACTURA_totaldescuento_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_FACTURA_totaldescuento_onfocus(this, iSeqRow) });
  $('#id_sc_field_base_12' + iSeqRow).bind('blur', function() { sc_form_FACTURA_base_12_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_FACTURA_base_12_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_FACTURA_base_12_onfocus(this, iSeqRow) });
  $('#id_sc_field_base_0' + iSeqRow).bind('blur', function() { sc_form_FACTURA_base_0_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_FACTURA_base_0_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_FACTURA_base_0_onfocus(this, iSeqRow) });
  $('#id_sc_field_codimpuesto' + iSeqRow).bind('change', function() { sc_form_FACTURA_codimpuesto_onchange(this, iSeqRow) });
  $('#id_sc_field_codporcentajeimpuesto' + iSeqRow).bind('change', function() { sc_form_FACTURA_codporcentajeimpuesto_onchange(this, iSeqRow) });
  $('#id_sc_field_baseimponible1' + iSeqRow).bind('change', function() { sc_form_FACTURA_baseimponible1_onchange(this, iSeqRow) });
  $('#id_sc_field_tarifa1' + iSeqRow).bind('change', function() { sc_form_FACTURA_tarifa1_onchange(this, iSeqRow) });
  $('#id_sc_field_valor1' + iSeqRow).bind('change', function() { sc_form_FACTURA_valor1_onchange(this, iSeqRow) });
  $('#id_sc_field_propina' + iSeqRow).bind('change', function() { sc_form_FACTURA_propina_onchange(this, iSeqRow) });
  $('#id_sc_field_importetotal' + iSeqRow).bind('blur', function() { sc_form_FACTURA_importetotal_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_FACTURA_importetotal_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_FACTURA_importetotal_onfocus(this, iSeqRow) });
  $('#id_sc_field_moneda' + iSeqRow).bind('change', function() { sc_form_FACTURA_moneda_onchange(this, iSeqRow) });
  $('#id_sc_field_formato' + iSeqRow).bind('change', function() { sc_form_FACTURA_formato_onchange(this, iSeqRow) });
  $('#id_sc_field_campoadicional1' + iSeqRow).bind('blur', function() { sc_form_FACTURA_campoadicional1_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_FACTURA_campoadicional1_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_FACTURA_campoadicional1_onfocus(this, iSeqRow) });
  $('#id_sc_field_valoradicional1' + iSeqRow).bind('blur', function() { sc_form_FACTURA_valoradicional1_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_FACTURA_valoradicional1_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_FACTURA_valoradicional1_onfocus(this, iSeqRow) });
  $('#id_sc_field_campoadicional2' + iSeqRow).bind('blur', function() { sc_form_FACTURA_campoadicional2_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_FACTURA_campoadicional2_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_FACTURA_campoadicional2_onfocus(this, iSeqRow) });
  $('#id_sc_field_valoradicional2' + iSeqRow).bind('blur', function() { sc_form_FACTURA_valoradicional2_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_FACTURA_valoradicional2_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_FACTURA_valoradicional2_onfocus(this, iSeqRow) });
  $('#id_sc_field_campoadicional3' + iSeqRow).bind('blur', function() { sc_form_FACTURA_campoadicional3_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_FACTURA_campoadicional3_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_FACTURA_campoadicional3_onfocus(this, iSeqRow) });
  $('#id_sc_field_valoradicional3' + iSeqRow).bind('blur', function() { sc_form_FACTURA_valoradicional3_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_FACTURA_valoradicional3_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_FACTURA_valoradicional3_onfocus(this, iSeqRow) });
  $('#id_sc_field_campoadicional4' + iSeqRow).bind('blur', function() { sc_form_FACTURA_campoadicional4_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_FACTURA_campoadicional4_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_FACTURA_campoadicional4_onfocus(this, iSeqRow) });
  $('#id_sc_field_valoradicional4' + iSeqRow).bind('blur', function() { sc_form_FACTURA_valoradicional4_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_FACTURA_valoradicional4_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_FACTURA_valoradicional4_onfocus(this, iSeqRow) });
  $('#id_sc_field_campoadicional5' + iSeqRow).bind('blur', function() { sc_form_FACTURA_campoadicional5_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_FACTURA_campoadicional5_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_FACTURA_campoadicional5_onfocus(this, iSeqRow) });
  $('#id_sc_field_valoradicional5' + iSeqRow).bind('blur', function() { sc_form_FACTURA_valoradicional5_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_FACTURA_valoradicional5_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_FACTURA_valoradicional5_onfocus(this, iSeqRow) });
  $('#id_sc_field_campoadicional6' + iSeqRow).bind('blur', function() { sc_form_FACTURA_campoadicional6_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_FACTURA_campoadicional6_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_FACTURA_campoadicional6_onfocus(this, iSeqRow) });
  $('#id_sc_field_valoradicional6' + iSeqRow).bind('blur', function() { sc_form_FACTURA_valoradicional6_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_FACTURA_valoradicional6_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_FACTURA_valoradicional6_onfocus(this, iSeqRow) });
  $('#id_sc_field_campoadicional7' + iSeqRow).bind('blur', function() { sc_form_FACTURA_campoadicional7_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_FACTURA_campoadicional7_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_FACTURA_campoadicional7_onfocus(this, iSeqRow) });
  $('#id_sc_field_valoradicional7' + iSeqRow).bind('blur', function() { sc_form_FACTURA_valoradicional7_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_FACTURA_valoradicional7_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_FACTURA_valoradicional7_onfocus(this, iSeqRow) });
  $('#id_sc_field_campoadicional8' + iSeqRow).bind('blur', function() { sc_form_FACTURA_campoadicional8_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_FACTURA_campoadicional8_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_FACTURA_campoadicional8_onfocus(this, iSeqRow) });
  $('#id_sc_field_valoradicional8' + iSeqRow).bind('blur', function() { sc_form_FACTURA_valoradicional8_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_FACTURA_valoradicional8_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_FACTURA_valoradicional8_onfocus(this, iSeqRow) });
  $('#id_sc_field_campoadicional9' + iSeqRow).bind('blur', function() { sc_form_FACTURA_campoadicional9_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_FACTURA_campoadicional9_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_FACTURA_campoadicional9_onfocus(this, iSeqRow) });
  $('#id_sc_field_valoradicional9' + iSeqRow).bind('blur', function() { sc_form_FACTURA_valoradicional9_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_FACTURA_valoradicional9_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_FACTURA_valoradicional9_onfocus(this, iSeqRow) });
  $('#id_sc_field_campoadicional10' + iSeqRow).bind('blur', function() { sc_form_FACTURA_campoadicional10_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_FACTURA_campoadicional10_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_FACTURA_campoadicional10_onfocus(this, iSeqRow) });
  $('#id_sc_field_valoradicional10' + iSeqRow).bind('blur', function() { sc_form_FACTURA_valoradicional10_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_FACTURA_valoradicional10_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_FACTURA_valoradicional10_onfocus(this, iSeqRow) });
  $('#id_sc_field_campoadicional11' + iSeqRow).bind('blur', function() { sc_form_FACTURA_campoadicional11_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_FACTURA_campoadicional11_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_FACTURA_campoadicional11_onfocus(this, iSeqRow) });
  $('#id_sc_field_valoradicional11' + iSeqRow).bind('blur', function() { sc_form_FACTURA_valoradicional11_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_FACTURA_valoradicional11_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_FACTURA_valoradicional11_onfocus(this, iSeqRow) });
  $('#id_sc_field_campoadicional12' + iSeqRow).bind('blur', function() { sc_form_FACTURA_campoadicional12_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_FACTURA_campoadicional12_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_FACTURA_campoadicional12_onfocus(this, iSeqRow) });
  $('#id_sc_field_valoradicional12' + iSeqRow).bind('blur', function() { sc_form_FACTURA_valoradicional12_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_FACTURA_valoradicional12_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_FACTURA_valoradicional12_onfocus(this, iSeqRow) });
  $('#id_sc_field_campoadicional13' + iSeqRow).bind('blur', function() { sc_form_FACTURA_campoadicional13_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_FACTURA_campoadicional13_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_FACTURA_campoadicional13_onfocus(this, iSeqRow) });
  $('#id_sc_field_valoradicional13' + iSeqRow).bind('blur', function() { sc_form_FACTURA_valoradicional13_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_FACTURA_valoradicional13_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_FACTURA_valoradicional13_onfocus(this, iSeqRow) });
  $('#id_sc_field_campoadicional14' + iSeqRow).bind('blur', function() { sc_form_FACTURA_campoadicional14_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_FACTURA_campoadicional14_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_FACTURA_campoadicional14_onfocus(this, iSeqRow) });
  $('#id_sc_field_valoradicional14' + iSeqRow).bind('blur', function() { sc_form_FACTURA_valoradicional14_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_FACTURA_valoradicional14_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_FACTURA_valoradicional14_onfocus(this, iSeqRow) });
  $('#id_sc_field_campoadicional15' + iSeqRow).bind('blur', function() { sc_form_FACTURA_campoadicional15_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_FACTURA_campoadicional15_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_FACTURA_campoadicional15_onfocus(this, iSeqRow) });
  $('#id_sc_field_valoradicional15' + iSeqRow).bind('blur', function() { sc_form_FACTURA_valoradicional15_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_FACTURA_valoradicional15_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_FACTURA_valoradicional15_onfocus(this, iSeqRow) });
  $('#id_sc_field_campoadicional16' + iSeqRow).bind('blur', function() { sc_form_FACTURA_campoadicional16_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_FACTURA_campoadicional16_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_FACTURA_campoadicional16_onfocus(this, iSeqRow) });
  $('#id_sc_field_valoradicional16' + iSeqRow).bind('blur', function() { sc_form_FACTURA_valoradicional16_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_FACTURA_valoradicional16_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_FACTURA_valoradicional16_onfocus(this, iSeqRow) });
  $('#id_sc_field_campoadicional17' + iSeqRow).bind('blur', function() { sc_form_FACTURA_campoadicional17_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_FACTURA_campoadicional17_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_FACTURA_campoadicional17_onfocus(this, iSeqRow) });
  $('#id_sc_field_valoradicional17' + iSeqRow).bind('blur', function() { sc_form_FACTURA_valoradicional17_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_FACTURA_valoradicional17_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_FACTURA_valoradicional17_onfocus(this, iSeqRow) });
  $('#id_sc_field_campoadicional18' + iSeqRow).bind('blur', function() { sc_form_FACTURA_campoadicional18_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_FACTURA_campoadicional18_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_FACTURA_campoadicional18_onfocus(this, iSeqRow) });
  $('#id_sc_field_valoradicional18' + iSeqRow).bind('blur', function() { sc_form_FACTURA_valoradicional18_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_FACTURA_valoradicional18_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_FACTURA_valoradicional18_onfocus(this, iSeqRow) });
  $('#id_sc_field_campoadicional19' + iSeqRow).bind('blur', function() { sc_form_FACTURA_campoadicional19_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_FACTURA_campoadicional19_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_FACTURA_campoadicional19_onfocus(this, iSeqRow) });
  $('#id_sc_field_valoradicional19' + iSeqRow).bind('blur', function() { sc_form_FACTURA_valoradicional19_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_FACTURA_valoradicional19_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_FACTURA_valoradicional19_onfocus(this, iSeqRow) });
  $('#id_sc_field_campoadicional20' + iSeqRow).bind('blur', function() { sc_form_FACTURA_campoadicional20_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_FACTURA_campoadicional20_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_FACTURA_campoadicional20_onfocus(this, iSeqRow) });
  $('#id_sc_field_valoradicional20' + iSeqRow).bind('blur', function() { sc_form_FACTURA_valoradicional20_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_FACTURA_valoradicional20_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_FACTURA_valoradicional20_onfocus(this, iSeqRow) });
  $('#id_sc_field_numpagos' + iSeqRow).bind('change', function() { sc_form_FACTURA_numpagos_onchange(this, iSeqRow) });
  $('#id_sc_field_formapago1' + iSeqRow).bind('change', function() { sc_form_FACTURA_formapago1_onchange(this, iSeqRow) });
  $('#id_sc_field_valortot1' + iSeqRow).bind('change', function() { sc_form_FACTURA_valortot1_onchange(this, iSeqRow) });
  $('#id_sc_field_plazo1' + iSeqRow).bind('change', function() { sc_form_FACTURA_plazo1_onchange(this, iSeqRow) });
  $('#id_sc_field_unidadtiempo1' + iSeqRow).bind('change', function() { sc_form_FACTURA_unidadtiempo1_onchange(this, iSeqRow) });
  $('#id_sc_field_formapago2' + iSeqRow).bind('change', function() { sc_form_FACTURA_formapago2_onchange(this, iSeqRow) });
  $('#id_sc_field_valortot2' + iSeqRow).bind('change', function() { sc_form_FACTURA_valortot2_onchange(this, iSeqRow) });
  $('#id_sc_field_plazo2' + iSeqRow).bind('change', function() { sc_form_FACTURA_plazo2_onchange(this, iSeqRow) });
  $('#id_sc_field_unidadtiempo2' + iSeqRow).bind('change', function() { sc_form_FACTURA_unidadtiempo2_onchange(this, iSeqRow) });
  $('#id_sc_field_ambiente' + iSeqRow).bind('change', function() { sc_form_FACTURA_ambiente_onchange(this, iSeqRow) });
  $('#id_sc_field_facvalefec' + iSeqRow).bind('change', function() { sc_form_FACTURA_facvalefec_onchange(this, iSeqRow) });
  $('#id_sc_field_facvalcheq' + iSeqRow).bind('change', function() { sc_form_FACTURA_facvalcheq_onchange(this, iSeqRow) });
  $('#id_sc_field_facvaltarjcred' + iSeqRow).bind('change', function() { sc_form_FACTURA_facvaltarjcred_onchange(this, iSeqRow) });
  $('#id_sc_field_facvaltransf' + iSeqRow).bind('change', function() { sc_form_FACTURA_facvaltransf_onchange(this, iSeqRow) });
  $('#id_sc_field_facvalretfte' + iSeqRow).bind('change', function() { sc_form_FACTURA_facvalretfte_onchange(this, iSeqRow) });
  $('#id_sc_field_facnumcheq' + iSeqRow).bind('change', function() { sc_form_FACTURA_facnumcheq_onchange(this, iSeqRow) });
  $('#id_sc_field_facbancheq' + iSeqRow).bind('change', function() { sc_form_FACTURA_facbancheq_onchange(this, iSeqRow) });
  $('#id_sc_field_tcrcodigo' + iSeqRow).bind('change', function() { sc_form_FACTURA_tcrcodigo_onchange(this, iSeqRow) });
  $('#id_sc_field_facnumtarjcred' + iSeqRow).bind('change', function() { sc_form_FACTURA_facnumtarjcred_onchange(this, iSeqRow) });
  $('#id_sc_field_facbantransf' + iSeqRow).bind('change', function() { sc_form_FACTURA_facbantransf_onchange(this, iSeqRow) });
  $('#id_sc_field_facctatransf' + iSeqRow).bind('change', function() { sc_form_FACTURA_facctatransf_onchange(this, iSeqRow) });
  $('#id_sc_field_num_cita' + iSeqRow).bind('blur', function() { sc_form_FACTURA_num_cita_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_FACTURA_num_cita_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_FACTURA_num_cita_onfocus(this, iSeqRow) });
  $('#id_sc_field_detalle_factura' + iSeqRow).bind('blur', function() { sc_form_FACTURA_detalle_factura_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_FACTURA_detalle_factura_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_FACTURA_detalle_factura_onfocus(this, iSeqRow) });
  $('#id_sc_field_num_fact' + iSeqRow).bind('blur', function() { sc_form_FACTURA_num_fact_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_FACTURA_num_fact_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_FACTURA_num_fact_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_FACTURA_razonsocial_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_nombrecomercial_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_ruc_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_coddoc_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_estab_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_ptoemi_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_secuencial_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_lote_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_dirmatriz_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_fechaemision_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_fechaemision();
  scCssBlur(oThis);
}

function sc_form_FACTURA_fechaemision_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_fechaemision_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_direstablecimiento_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_numcontribuyenteespecial_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_obligadocontabilidad_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_tipoidentcomprador_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_guiaremision_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_razonsocialcomprador_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_razonsocialcomprador();
  scCssBlur(oThis);
}

function sc_form_FACTURA_razonsocialcomprador_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_razonsocialcomprador_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_idcomprador_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_idcomprador();
  scCssBlur(oThis);
}

function sc_form_FACTURA_idcomprador_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_idcomprador_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_totalsinimpuestos_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_totalsinimpuestos();
  scCssBlur(oThis);
}

function sc_form_FACTURA_totalsinimpuestos_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_totalsinimpuestos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_totaldescuento_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_totaldescuento();
  scCssBlur(oThis);
}

function sc_form_FACTURA_totaldescuento_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_totaldescuento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_base_12_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_base_12();
  scCssBlur(oThis);
}

function sc_form_FACTURA_base_12_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_base_12_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_base_0_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_base_0();
  scCssBlur(oThis);
}

function sc_form_FACTURA_base_0_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_base_0_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_codimpuesto_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_codporcentajeimpuesto_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_baseimponible1_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_tarifa1_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_valor1_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_propina_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_importetotal_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_importetotal();
  scCssBlur(oThis);
}

function sc_form_FACTURA_importetotal_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_importetotal_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_moneda_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_formato_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_campoadicional1_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_campoadicional1();
  scCssBlur(oThis);
}

function sc_form_FACTURA_campoadicional1_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_campoadicional1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_valoradicional1_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_valoradicional1();
  scCssBlur(oThis);
}

function sc_form_FACTURA_valoradicional1_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_valoradicional1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_campoadicional2_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_campoadicional2();
  scCssBlur(oThis);
}

function sc_form_FACTURA_campoadicional2_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_campoadicional2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_valoradicional2_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_valoradicional2();
  scCssBlur(oThis);
}

function sc_form_FACTURA_valoradicional2_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_valoradicional2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_campoadicional3_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_campoadicional3();
  scCssBlur(oThis);
}

function sc_form_FACTURA_campoadicional3_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_campoadicional3_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_valoradicional3_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_valoradicional3();
  scCssBlur(oThis);
}

function sc_form_FACTURA_valoradicional3_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_valoradicional3_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_campoadicional4_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_campoadicional4();
  scCssBlur(oThis);
}

function sc_form_FACTURA_campoadicional4_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_campoadicional4_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_valoradicional4_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_valoradicional4();
  scCssBlur(oThis);
}

function sc_form_FACTURA_valoradicional4_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_valoradicional4_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_campoadicional5_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_campoadicional5();
  scCssBlur(oThis);
}

function sc_form_FACTURA_campoadicional5_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_campoadicional5_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_valoradicional5_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_valoradicional5();
  scCssBlur(oThis);
}

function sc_form_FACTURA_valoradicional5_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_valoradicional5_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_campoadicional6_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_campoadicional6();
  scCssBlur(oThis);
}

function sc_form_FACTURA_campoadicional6_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_campoadicional6_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_valoradicional6_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_valoradicional6();
  scCssBlur(oThis);
}

function sc_form_FACTURA_valoradicional6_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_valoradicional6_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_campoadicional7_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_campoadicional7();
  scCssBlur(oThis);
}

function sc_form_FACTURA_campoadicional7_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_campoadicional7_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_valoradicional7_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_valoradicional7();
  scCssBlur(oThis);
}

function sc_form_FACTURA_valoradicional7_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_valoradicional7_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_campoadicional8_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_campoadicional8();
  scCssBlur(oThis);
}

function sc_form_FACTURA_campoadicional8_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_campoadicional8_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_valoradicional8_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_valoradicional8();
  scCssBlur(oThis);
}

function sc_form_FACTURA_valoradicional8_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_valoradicional8_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_campoadicional9_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_campoadicional9();
  scCssBlur(oThis);
}

function sc_form_FACTURA_campoadicional9_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_campoadicional9_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_valoradicional9_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_valoradicional9();
  scCssBlur(oThis);
}

function sc_form_FACTURA_valoradicional9_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_valoradicional9_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_campoadicional10_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_campoadicional10();
  scCssBlur(oThis);
}

function sc_form_FACTURA_campoadicional10_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_campoadicional10_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_valoradicional10_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_valoradicional10();
  scCssBlur(oThis);
}

function sc_form_FACTURA_valoradicional10_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_valoradicional10_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_campoadicional11_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_campoadicional11();
  scCssBlur(oThis);
}

function sc_form_FACTURA_campoadicional11_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_campoadicional11_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_valoradicional11_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_valoradicional11();
  scCssBlur(oThis);
}

function sc_form_FACTURA_valoradicional11_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_valoradicional11_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_campoadicional12_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_campoadicional12();
  scCssBlur(oThis);
}

function sc_form_FACTURA_campoadicional12_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_campoadicional12_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_valoradicional12_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_valoradicional12();
  scCssBlur(oThis);
}

function sc_form_FACTURA_valoradicional12_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_valoradicional12_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_campoadicional13_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_campoadicional13();
  scCssBlur(oThis);
}

function sc_form_FACTURA_campoadicional13_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_campoadicional13_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_valoradicional13_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_valoradicional13();
  scCssBlur(oThis);
}

function sc_form_FACTURA_valoradicional13_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_valoradicional13_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_campoadicional14_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_campoadicional14();
  scCssBlur(oThis);
}

function sc_form_FACTURA_campoadicional14_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_campoadicional14_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_valoradicional14_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_valoradicional14();
  scCssBlur(oThis);
}

function sc_form_FACTURA_valoradicional14_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_valoradicional14_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_campoadicional15_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_campoadicional15();
  scCssBlur(oThis);
}

function sc_form_FACTURA_campoadicional15_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_campoadicional15_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_valoradicional15_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_valoradicional15();
  scCssBlur(oThis);
}

function sc_form_FACTURA_valoradicional15_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_valoradicional15_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_campoadicional16_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_campoadicional16();
  scCssBlur(oThis);
}

function sc_form_FACTURA_campoadicional16_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_campoadicional16_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_valoradicional16_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_valoradicional16();
  scCssBlur(oThis);
}

function sc_form_FACTURA_valoradicional16_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_valoradicional16_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_campoadicional17_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_campoadicional17();
  scCssBlur(oThis);
}

function sc_form_FACTURA_campoadicional17_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_campoadicional17_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_valoradicional17_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_valoradicional17();
  scCssBlur(oThis);
}

function sc_form_FACTURA_valoradicional17_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_valoradicional17_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_campoadicional18_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_campoadicional18();
  scCssBlur(oThis);
}

function sc_form_FACTURA_campoadicional18_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_campoadicional18_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_valoradicional18_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_valoradicional18();
  scCssBlur(oThis);
}

function sc_form_FACTURA_valoradicional18_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_valoradicional18_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_campoadicional19_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_campoadicional19();
  scCssBlur(oThis);
}

function sc_form_FACTURA_campoadicional19_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_campoadicional19_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_valoradicional19_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_valoradicional19();
  scCssBlur(oThis);
}

function sc_form_FACTURA_valoradicional19_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_valoradicional19_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_campoadicional20_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_campoadicional20();
  scCssBlur(oThis);
}

function sc_form_FACTURA_campoadicional20_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_campoadicional20_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_valoradicional20_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_valoradicional20();
  scCssBlur(oThis);
}

function sc_form_FACTURA_valoradicional20_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_valoradicional20_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_numpagos_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_formapago1_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_valortot1_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_plazo1_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_unidadtiempo1_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_formapago2_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_valortot2_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_plazo2_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_unidadtiempo2_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_ambiente_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_facvalefec_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_facvalcheq_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_facvaltarjcred_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_facvaltransf_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_facvalretfte_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_facnumcheq_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_facbancheq_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_tcrcodigo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_facnumtarjcred_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_facbantransf_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_facctatransf_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_num_cita_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_num_cita();
  scCssBlur(oThis);
}

function sc_form_FACTURA_num_cita_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_num_cita_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_detalle_factura_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_detalle_factura();
  scCssBlur(oThis);
}

function sc_form_FACTURA_detalle_factura_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_detalle_factura_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_FACTURA_num_fact_onblur(oThis, iSeqRow) {
  do_ajax_form_FACTURA_validate_num_fact();
  scCssBlur(oThis);
}

function sc_form_FACTURA_num_fact_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_FACTURA_num_fact_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
	if ("1" == block) {
		displayChange_block_1(status);
	}
	if ("2" == block) {
		displayChange_block_2(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("num_fact", "", status);
	displayChange_field("fechaemision", "", status);
	displayChange_field("idcomprador", "", status);
	displayChange_field("razonsocialcomprador", "", status);
	displayChange_field("num_cita", "", status);
	displayChange_field("totalsinimpuestos", "", status);
	displayChange_field("totaldescuento", "", status);
	displayChange_field("base_12", "", status);
	displayChange_field("base_0", "", status);
	displayChange_field("importetotal", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("campoadicional1", "", status);
	displayChange_field("valoradicional1", "", status);
	displayChange_field("campoadicional2", "", status);
	displayChange_field("valoradicional2", "", status);
	displayChange_field("campoadicional3", "", status);
	displayChange_field("valoradicional3", "", status);
	displayChange_field("campoadicional4", "", status);
	displayChange_field("valoradicional4", "", status);
	displayChange_field("campoadicional5", "", status);
	displayChange_field("valoradicional5", "", status);
	displayChange_field("campoadicional6", "", status);
	displayChange_field("valoradicional6", "", status);
	displayChange_field("campoadicional7", "", status);
	displayChange_field("valoradicional7", "", status);
	displayChange_field("campoadicional8", "", status);
	displayChange_field("valoradicional8", "", status);
	displayChange_field("campoadicional9", "", status);
	displayChange_field("valoradicional9", "", status);
	displayChange_field("campoadicional10", "", status);
	displayChange_field("valoradicional10", "", status);
	displayChange_field("campoadicional11", "", status);
	displayChange_field("valoradicional11", "", status);
	displayChange_field("campoadicional12", "", status);
	displayChange_field("valoradicional12", "", status);
	displayChange_field("campoadicional13", "", status);
	displayChange_field("valoradicional13", "", status);
	displayChange_field("campoadicional14", "", status);
	displayChange_field("valoradicional14", "", status);
	displayChange_field("campoadicional15", "", status);
	displayChange_field("valoradicional15", "", status);
	displayChange_field("campoadicional16", "", status);
	displayChange_field("valoradicional16", "", status);
	displayChange_field("campoadicional17", "", status);
	displayChange_field("valoradicional17", "", status);
	displayChange_field("campoadicional18", "", status);
	displayChange_field("valoradicional18", "", status);
	displayChange_field("campoadicional19", "", status);
	displayChange_field("valoradicional19", "", status);
	displayChange_field("campoadicional20", "", status);
	displayChange_field("valoradicional20", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("detalle_factura", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_num_fact(row, status);
	displayChange_field_fechaemision(row, status);
	displayChange_field_idcomprador(row, status);
	displayChange_field_razonsocialcomprador(row, status);
	displayChange_field_num_cita(row, status);
	displayChange_field_totalsinimpuestos(row, status);
	displayChange_field_totaldescuento(row, status);
	displayChange_field_base_12(row, status);
	displayChange_field_base_0(row, status);
	displayChange_field_importetotal(row, status);
	displayChange_field_campoadicional1(row, status);
	displayChange_field_valoradicional1(row, status);
	displayChange_field_campoadicional2(row, status);
	displayChange_field_valoradicional2(row, status);
	displayChange_field_campoadicional3(row, status);
	displayChange_field_valoradicional3(row, status);
	displayChange_field_campoadicional4(row, status);
	displayChange_field_valoradicional4(row, status);
	displayChange_field_campoadicional5(row, status);
	displayChange_field_valoradicional5(row, status);
	displayChange_field_campoadicional6(row, status);
	displayChange_field_valoradicional6(row, status);
	displayChange_field_campoadicional7(row, status);
	displayChange_field_valoradicional7(row, status);
	displayChange_field_campoadicional8(row, status);
	displayChange_field_valoradicional8(row, status);
	displayChange_field_campoadicional9(row, status);
	displayChange_field_valoradicional9(row, status);
	displayChange_field_campoadicional10(row, status);
	displayChange_field_valoradicional10(row, status);
	displayChange_field_campoadicional11(row, status);
	displayChange_field_valoradicional11(row, status);
	displayChange_field_campoadicional12(row, status);
	displayChange_field_valoradicional12(row, status);
	displayChange_field_campoadicional13(row, status);
	displayChange_field_valoradicional13(row, status);
	displayChange_field_campoadicional14(row, status);
	displayChange_field_valoradicional14(row, status);
	displayChange_field_campoadicional15(row, status);
	displayChange_field_valoradicional15(row, status);
	displayChange_field_campoadicional16(row, status);
	displayChange_field_valoradicional16(row, status);
	displayChange_field_campoadicional17(row, status);
	displayChange_field_valoradicional17(row, status);
	displayChange_field_campoadicional18(row, status);
	displayChange_field_valoradicional18(row, status);
	displayChange_field_campoadicional19(row, status);
	displayChange_field_valoradicional19(row, status);
	displayChange_field_campoadicional20(row, status);
	displayChange_field_valoradicional20(row, status);
	displayChange_field_detalle_factura(row, status);
}

function displayChange_field(field, row, status) {
	if ("num_fact" == field) {
		displayChange_field_num_fact(row, status);
	}
	if ("fechaemision" == field) {
		displayChange_field_fechaemision(row, status);
	}
	if ("idcomprador" == field) {
		displayChange_field_idcomprador(row, status);
	}
	if ("razonsocialcomprador" == field) {
		displayChange_field_razonsocialcomprador(row, status);
	}
	if ("num_cita" == field) {
		displayChange_field_num_cita(row, status);
	}
	if ("totalsinimpuestos" == field) {
		displayChange_field_totalsinimpuestos(row, status);
	}
	if ("totaldescuento" == field) {
		displayChange_field_totaldescuento(row, status);
	}
	if ("base_12" == field) {
		displayChange_field_base_12(row, status);
	}
	if ("base_0" == field) {
		displayChange_field_base_0(row, status);
	}
	if ("importetotal" == field) {
		displayChange_field_importetotal(row, status);
	}
	if ("campoadicional1" == field) {
		displayChange_field_campoadicional1(row, status);
	}
	if ("valoradicional1" == field) {
		displayChange_field_valoradicional1(row, status);
	}
	if ("campoadicional2" == field) {
		displayChange_field_campoadicional2(row, status);
	}
	if ("valoradicional2" == field) {
		displayChange_field_valoradicional2(row, status);
	}
	if ("campoadicional3" == field) {
		displayChange_field_campoadicional3(row, status);
	}
	if ("valoradicional3" == field) {
		displayChange_field_valoradicional3(row, status);
	}
	if ("campoadicional4" == field) {
		displayChange_field_campoadicional4(row, status);
	}
	if ("valoradicional4" == field) {
		displayChange_field_valoradicional4(row, status);
	}
	if ("campoadicional5" == field) {
		displayChange_field_campoadicional5(row, status);
	}
	if ("valoradicional5" == field) {
		displayChange_field_valoradicional5(row, status);
	}
	if ("campoadicional6" == field) {
		displayChange_field_campoadicional6(row, status);
	}
	if ("valoradicional6" == field) {
		displayChange_field_valoradicional6(row, status);
	}
	if ("campoadicional7" == field) {
		displayChange_field_campoadicional7(row, status);
	}
	if ("valoradicional7" == field) {
		displayChange_field_valoradicional7(row, status);
	}
	if ("campoadicional8" == field) {
		displayChange_field_campoadicional8(row, status);
	}
	if ("valoradicional8" == field) {
		displayChange_field_valoradicional8(row, status);
	}
	if ("campoadicional9" == field) {
		displayChange_field_campoadicional9(row, status);
	}
	if ("valoradicional9" == field) {
		displayChange_field_valoradicional9(row, status);
	}
	if ("campoadicional10" == field) {
		displayChange_field_campoadicional10(row, status);
	}
	if ("valoradicional10" == field) {
		displayChange_field_valoradicional10(row, status);
	}
	if ("campoadicional11" == field) {
		displayChange_field_campoadicional11(row, status);
	}
	if ("valoradicional11" == field) {
		displayChange_field_valoradicional11(row, status);
	}
	if ("campoadicional12" == field) {
		displayChange_field_campoadicional12(row, status);
	}
	if ("valoradicional12" == field) {
		displayChange_field_valoradicional12(row, status);
	}
	if ("campoadicional13" == field) {
		displayChange_field_campoadicional13(row, status);
	}
	if ("valoradicional13" == field) {
		displayChange_field_valoradicional13(row, status);
	}
	if ("campoadicional14" == field) {
		displayChange_field_campoadicional14(row, status);
	}
	if ("valoradicional14" == field) {
		displayChange_field_valoradicional14(row, status);
	}
	if ("campoadicional15" == field) {
		displayChange_field_campoadicional15(row, status);
	}
	if ("valoradicional15" == field) {
		displayChange_field_valoradicional15(row, status);
	}
	if ("campoadicional16" == field) {
		displayChange_field_campoadicional16(row, status);
	}
	if ("valoradicional16" == field) {
		displayChange_field_valoradicional16(row, status);
	}
	if ("campoadicional17" == field) {
		displayChange_field_campoadicional17(row, status);
	}
	if ("valoradicional17" == field) {
		displayChange_field_valoradicional17(row, status);
	}
	if ("campoadicional18" == field) {
		displayChange_field_campoadicional18(row, status);
	}
	if ("valoradicional18" == field) {
		displayChange_field_valoradicional18(row, status);
	}
	if ("campoadicional19" == field) {
		displayChange_field_campoadicional19(row, status);
	}
	if ("valoradicional19" == field) {
		displayChange_field_valoradicional19(row, status);
	}
	if ("campoadicional20" == field) {
		displayChange_field_campoadicional20(row, status);
	}
	if ("valoradicional20" == field) {
		displayChange_field_valoradicional20(row, status);
	}
	if ("detalle_factura" == field) {
		displayChange_field_detalle_factura(row, status);
	}
}

function displayChange_field_num_fact(row, status) {
}

function displayChange_field_fechaemision(row, status) {
}

function displayChange_field_idcomprador(row, status) {
}

function displayChange_field_razonsocialcomprador(row, status) {
}

function displayChange_field_num_cita(row, status) {
}

function displayChange_field_totalsinimpuestos(row, status) {
}

function displayChange_field_totaldescuento(row, status) {
}

function displayChange_field_base_12(row, status) {
}

function displayChange_field_base_0(row, status) {
}

function displayChange_field_importetotal(row, status) {
}

function displayChange_field_campoadicional1(row, status) {
}

function displayChange_field_valoradicional1(row, status) {
}

function displayChange_field_campoadicional2(row, status) {
}

function displayChange_field_valoradicional2(row, status) {
}

function displayChange_field_campoadicional3(row, status) {
}

function displayChange_field_valoradicional3(row, status) {
}

function displayChange_field_campoadicional4(row, status) {
}

function displayChange_field_valoradicional4(row, status) {
}

function displayChange_field_campoadicional5(row, status) {
}

function displayChange_field_valoradicional5(row, status) {
}

function displayChange_field_campoadicional6(row, status) {
}

function displayChange_field_valoradicional6(row, status) {
}

function displayChange_field_campoadicional7(row, status) {
}

function displayChange_field_valoradicional7(row, status) {
}

function displayChange_field_campoadicional8(row, status) {
}

function displayChange_field_valoradicional8(row, status) {
}

function displayChange_field_campoadicional9(row, status) {
}

function displayChange_field_valoradicional9(row, status) {
}

function displayChange_field_campoadicional10(row, status) {
}

function displayChange_field_valoradicional10(row, status) {
}

function displayChange_field_campoadicional11(row, status) {
}

function displayChange_field_valoradicional11(row, status) {
}

function displayChange_field_campoadicional12(row, status) {
}

function displayChange_field_valoradicional12(row, status) {
}

function displayChange_field_campoadicional13(row, status) {
}

function displayChange_field_valoradicional13(row, status) {
}

function displayChange_field_campoadicional14(row, status) {
}

function displayChange_field_valoradicional14(row, status) {
}

function displayChange_field_campoadicional15(row, status) {
}

function displayChange_field_valoradicional15(row, status) {
}

function displayChange_field_campoadicional16(row, status) {
}

function displayChange_field_valoradicional16(row, status) {
}

function displayChange_field_campoadicional17(row, status) {
}

function displayChange_field_valoradicional17(row, status) {
}

function displayChange_field_campoadicional18(row, status) {
}

function displayChange_field_valoradicional18(row, status) {
}

function displayChange_field_campoadicional19(row, status) {
}

function displayChange_field_valoradicional19(row, status) {
}

function displayChange_field_campoadicional20(row, status) {
}

function displayChange_field_valoradicional20(row, status) {
}

function displayChange_field_detalle_factura(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_DETALLE_FACTURA")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_DETALLE_FACTURA")[0].contentWindow.scRecreateSelect2();
	}
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_FACTURA_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(20);
		}
	}
}
function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd

var api_cache_requests = [];
function ajax_check_file(img_name, field  ,t, p, p_cache, iSeqRow, hasRun, img_before){
    setTimeout(function(){
        if(img_name == '') return;
        iSeqRow= iSeqRow !== undefined && iSeqRow !== null ? iSeqRow : '';
        var hasVar = p.indexOf('_@NM@_') > -1 || p_cache.indexOf('_@NM@_') > -1 ? true : false;

        p = p.split('_@NM@_');
        $.each(p, function(i,v){
            try{
                p[i] = $('[name='+v+iSeqRow+']').val();
            }
            catch(err){
                p[i] = v;
            }
        });
        p = p.join('');

        p_cache = p_cache.split('_@NM@_');
        $.each(p_cache, function(i,v){
            try{
                p_cache[i] = $('[name='+v+iSeqRow+']').val();
            }
            catch(err){
                p_cache[i] = v;
            }
        });
        p_cache = p_cache.join('');

        img_before = img_before !== undefined ? img_before : $(t).attr('src');
        var str_key_cache = '<?php echo $this->Ini->sc_page; ?>' + img_name+field+p+p_cache;
        if(api_cache_requests[ str_key_cache ] !== undefined && api_cache_requests[ str_key_cache ] !== null){
            if(api_cache_requests[ str_key_cache ] != false){
                do_ajax_check_file(api_cache_requests[ str_key_cache ], field  ,t, iSeqRow);
            }
            return;
        }
        //scAjaxProcOn();
        $(t).attr('src', '<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif');
        api_cache_requests[ str_key_cache ] = false;
        var rs =$.ajax({
                    type: "POST",
                    url: 'index.php?script_case_init=<?php echo $this->Ini->sc_page; ?>',
                    async: true,
                    data:'nmgp_opcao=ajax_check_file&AjaxCheckImg=' + img_name +'&rsargs='+ field + '&p=' + p + '&p_cache=' + p_cache,
                    success: function (rs) {
                        if(rs.indexOf('</span>') != -1){
                            rs = rs.substr(rs.indexOf('</span>') + 7);
                        }
                        if(rs.indexOf('/') != -1 && rs.indexOf('/') != 0){
                            rs = rs.substr(rs.indexOf('/'));
                        }
                        rs = sc_trim(rs);

                        // if(rs == 0 && hasVar && hasRun === undefined){
                        //     delete window.api_cache_requests[ str_key_cache ];
                        //     ajax_check_file(img_name, field  ,t, p, p_cache, iSeqRow, 1, img_before);
                        //     return;
                        // }
                        window.api_cache_requests[ str_key_cache ] = rs;
                        do_ajax_check_file(rs, field  ,t, iSeqRow)
                        if(rs == 0){
                            delete window.api_cache_requests[ str_key_cache ];

                           // $(t).attr('src',img_before);
                            do_ajax_check_file(img_before+'_@@NM@@_' + img_before, field  ,t, iSeqRow)

                        }


                    }
        });
    },100);
}

function do_ajax_check_file(rs, field  ,t, iSeqRow){
    if (rs != 0) {
        rs_split = rs.split('_@@NM@@_');
        rs_orig = rs_split[0];
        rs2 = rs_split[1];
        try{
            if(!$(t).is('img')){

                if($('#id_read_on_'+field+iSeqRow).length > 0 ){
                                    var usa_read_only = false;

                switch(field){

                }
                     if(usa_read_only && $('a',$('#id_read_on_'+field+iSeqRow)).length == 0){
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_FACTURA')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
                     }
                }
                if($('#id_ajax_doc_'+field+iSeqRow+' a').length > 0){
                    var target = $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href').split(',');
                    target[1] = "'"+rs2+"'";
                    $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href', target.join(','));
                }else{
                    var target = $(t).attr('href').split(',');
                     target[1] = "'"+rs2+"'";
                     $(t).attr('href', target.join(','));
                }
            }else{
                $(t).attr('src', rs2);
                $(t).css('display', '');
                if($('#id_ajax_doc_'+field+iSeqRow+' a').length > 0){
                    var target = $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href').split(',');
                    target[1] = "'"+rs2+"'";
                    $(t).attr('href', target.join(','));
                }else{
                     var t_link = $(t).parent('a');
                     var target = $(t_link).attr('href').split(',');
                     target[0] = "javascript:nm_mostra_img('"+rs_orig+"'";
                     $(t_link).attr('href', target.join(','));
                }

            }
            eval("window.var_ajax_img_"+field+iSeqRow+" = '"+rs_orig+"';");

        } catch(err){
                        eval("window.var_ajax_img_"+field+iSeqRow+" = '"+rs_orig+"';");

        }
    }
   /* hasFalseCacheRequest = false;
    $.each(api_cache_requests, function(i,v){
        if(v == false){
            hasFalseCacheRequest = true;
        }
    });
    if(hasFalseCacheRequest == false){
        scAjaxProcOff();
    }*/
}

$(document).ready(function(){
});
function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

function scGetFileExtension(fileName)
{
    fileNameParts = fileName.split(".");

    if (1 === fileNameParts.length || (2 === fileNameParts.length && "" == fileNameParts[0])) {
        return "";
    }

    return fileNameParts.pop().toLowerCase();
}

function scFormatExtensionSizeErrorMsg(errorMsg)
{
    var msgInfo = errorMsg.split("||"), returnMsg = "";

    if ("err_size" == msgInfo[0]) {
        returnMsg = "<?php echo $this->Ini->Nm_lang['lang_errm_file_size'] ?>. <?php echo $this->Ini->Nm_lang['lang_errm_file_size_extension'] ?>".replace("{SC_EXTENSION}", msgInfo[1]).replace("{SC_LIMIT}", msgInfo[2]);
    } else if ("err_extension" == msgInfo[0]) {
        returnMsg = "<?php echo $this->Ini->Nm_lang['lang_errm_file_invl'] ?>";
    }

    return returnMsg;
}

