
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
  scEventControl_data["codigo_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["descripcion_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cantidad_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["preciounitario_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["descuento_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["estab_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ptoemi_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["secuencial_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["lote_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["codigo_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codigo_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["descripcion_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["descripcion_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cantidad_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cantidad_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["preciounitario_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["preciounitario_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["descuento_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["descuento_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estab_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estab_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ptoemi_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ptoemi_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["secuencial_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["secuencial_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["lote_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["lote_" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_active_all() {
  for (var i = 1; i < iAjaxNewLine; i++) {
    if (scEventControl_active(i)) {
      return true;
    }
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
  $('#id_sc_field_ruc_' + iSeqRow).bind('change', function() { sc_form_DETALLE_FACTURA_ruc__onchange(this, iSeqRow) });
  $('#id_sc_field_coddoc_' + iSeqRow).bind('change', function() { sc_form_DETALLE_FACTURA_coddoc__onchange(this, iSeqRow) });
  $('#id_sc_field_estab_' + iSeqRow).bind('blur', function() { sc_form_DETALLE_FACTURA_estab__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_DETALLE_FACTURA_estab__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_DETALLE_FACTURA_estab__onfocus(this, iSeqRow) });
  $('#id_sc_field_ptoemi_' + iSeqRow).bind('blur', function() { sc_form_DETALLE_FACTURA_ptoemi__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_DETALLE_FACTURA_ptoemi__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_DETALLE_FACTURA_ptoemi__onfocus(this, iSeqRow) });
  $('#id_sc_field_secuencial_' + iSeqRow).bind('blur', function() { sc_form_DETALLE_FACTURA_secuencial__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_DETALLE_FACTURA_secuencial__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_DETALLE_FACTURA_secuencial__onfocus(this, iSeqRow) });
  $('#id_sc_field_lote_' + iSeqRow).bind('blur', function() { sc_form_DETALLE_FACTURA_lote__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_DETALLE_FACTURA_lote__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_DETALLE_FACTURA_lote__onfocus(this, iSeqRow) });
  $('#id_sc_field_codigo_' + iSeqRow).bind('blur', function() { sc_form_DETALLE_FACTURA_codigo__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_DETALLE_FACTURA_codigo__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_DETALLE_FACTURA_codigo__onfocus(this, iSeqRow) });
  $('#id_sc_field_descripcion_' + iSeqRow).bind('blur', function() { sc_form_DETALLE_FACTURA_descripcion__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_DETALLE_FACTURA_descripcion__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_DETALLE_FACTURA_descripcion__onfocus(this, iSeqRow) });
  $('#id_sc_field_cantidad_' + iSeqRow).bind('blur', function() { sc_form_DETALLE_FACTURA_cantidad__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_DETALLE_FACTURA_cantidad__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_DETALLE_FACTURA_cantidad__onfocus(this, iSeqRow) });
  $('#id_sc_field_preciounitario_' + iSeqRow).bind('blur', function() { sc_form_DETALLE_FACTURA_preciounitario__onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_DETALLE_FACTURA_preciounitario__onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_DETALLE_FACTURA_preciounitario__onfocus(this, iSeqRow) });
  $('#id_sc_field_descuento_' + iSeqRow).bind('blur', function() { sc_form_DETALLE_FACTURA_descuento__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_DETALLE_FACTURA_descuento__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_DETALLE_FACTURA_descuento__onfocus(this, iSeqRow) });
  $('#id_sc_field_preciototalsinimpuesto_' + iSeqRow).bind('change', function() { sc_form_DETALLE_FACTURA_preciototalsinimpuesto__onchange(this, iSeqRow) });
  $('#id_sc_field_nombredetalleadicional1_' + iSeqRow).bind('change', function() { sc_form_DETALLE_FACTURA_nombredetalleadicional1__onchange(this, iSeqRow) });
  $('#id_sc_field_valoradicional1_' + iSeqRow).bind('change', function() { sc_form_DETALLE_FACTURA_valoradicional1__onchange(this, iSeqRow) });
  $('#id_sc_field_nombredetalleadicional2_' + iSeqRow).bind('change', function() { sc_form_DETALLE_FACTURA_nombredetalleadicional2__onchange(this, iSeqRow) });
  $('#id_sc_field_valoradicional2_' + iSeqRow).bind('change', function() { sc_form_DETALLE_FACTURA_valoradicional2__onchange(this, iSeqRow) });
  $('#id_sc_field_nombredetalleadicional3_' + iSeqRow).bind('change', function() { sc_form_DETALLE_FACTURA_nombredetalleadicional3__onchange(this, iSeqRow) });
  $('#id_sc_field_valoradicional3_' + iSeqRow).bind('change', function() { sc_form_DETALLE_FACTURA_valoradicional3__onchange(this, iSeqRow) });
  $('#id_sc_field_nombredetalleadicional4_' + iSeqRow).bind('change', function() { sc_form_DETALLE_FACTURA_nombredetalleadicional4__onchange(this, iSeqRow) });
  $('#id_sc_field_valoradicional4_' + iSeqRow).bind('change', function() { sc_form_DETALLE_FACTURA_valoradicional4__onchange(this, iSeqRow) });
  $('#id_sc_field_nombredetalleadicional5_' + iSeqRow).bind('change', function() { sc_form_DETALLE_FACTURA_nombredetalleadicional5__onchange(this, iSeqRow) });
  $('#id_sc_field_valoradicional5_' + iSeqRow).bind('change', function() { sc_form_DETALLE_FACTURA_valoradicional5__onchange(this, iSeqRow) });
  $('#id_sc_field_nombredetalleadicional6_' + iSeqRow).bind('change', function() { sc_form_DETALLE_FACTURA_nombredetalleadicional6__onchange(this, iSeqRow) });
  $('#id_sc_field_valoradicional6_' + iSeqRow).bind('change', function() { sc_form_DETALLE_FACTURA_valoradicional6__onchange(this, iSeqRow) });
  $('#id_sc_field_nombredetalleadicional7_' + iSeqRow).bind('change', function() { sc_form_DETALLE_FACTURA_nombredetalleadicional7__onchange(this, iSeqRow) });
  $('#id_sc_field_valoradicional7_' + iSeqRow).bind('change', function() { sc_form_DETALLE_FACTURA_valoradicional7__onchange(this, iSeqRow) });
  $('#id_sc_field_nombredetalleadicional8_' + iSeqRow).bind('change', function() { sc_form_DETALLE_FACTURA_nombredetalleadicional8__onchange(this, iSeqRow) });
  $('#id_sc_field_valoradicional8_' + iSeqRow).bind('change', function() { sc_form_DETALLE_FACTURA_valoradicional8__onchange(this, iSeqRow) });
  $('#id_sc_field_nombredetalleadicional9_' + iSeqRow).bind('change', function() { sc_form_DETALLE_FACTURA_nombredetalleadicional9__onchange(this, iSeqRow) });
  $('#id_sc_field_valoradicional9_' + iSeqRow).bind('change', function() { sc_form_DETALLE_FACTURA_valoradicional9__onchange(this, iSeqRow) });
  $('#id_sc_field_nombredetalleadicional10_' + iSeqRow).bind('change', function() { sc_form_DETALLE_FACTURA_nombredetalleadicional10__onchange(this, iSeqRow) });
  $('#id_sc_field_valoradicional10_' + iSeqRow).bind('change', function() { sc_form_DETALLE_FACTURA_valoradicional10__onchange(this, iSeqRow) });
  $('#id_sc_field_nombredetalleadicional11_' + iSeqRow).bind('change', function() { sc_form_DETALLE_FACTURA_nombredetalleadicional11__onchange(this, iSeqRow) });
  $('#id_sc_field_valoradicional11_' + iSeqRow).bind('change', function() { sc_form_DETALLE_FACTURA_valoradicional11__onchange(this, iSeqRow) });
  $('#id_sc_field_nombredetalleadicional12_' + iSeqRow).bind('change', function() { sc_form_DETALLE_FACTURA_nombredetalleadicional12__onchange(this, iSeqRow) });
  $('#id_sc_field_valoradicional12_' + iSeqRow).bind('change', function() { sc_form_DETALLE_FACTURA_valoradicional12__onchange(this, iSeqRow) });
  $('#id_sc_field_nombredetalleadicional13_' + iSeqRow).bind('change', function() { sc_form_DETALLE_FACTURA_nombredetalleadicional13__onchange(this, iSeqRow) });
  $('#id_sc_field_valoradicional13_' + iSeqRow).bind('change', function() { sc_form_DETALLE_FACTURA_valoradicional13__onchange(this, iSeqRow) });
  $('#id_sc_field_nombredetalleadicional14_' + iSeqRow).bind('change', function() { sc_form_DETALLE_FACTURA_nombredetalleadicional14__onchange(this, iSeqRow) });
  $('#id_sc_field_valoradicional14_' + iSeqRow).bind('change', function() { sc_form_DETALLE_FACTURA_valoradicional14__onchange(this, iSeqRow) });
  $('#id_sc_field_nombredetalleadicional15_' + iSeqRow).bind('change', function() { sc_form_DETALLE_FACTURA_nombredetalleadicional15__onchange(this, iSeqRow) });
  $('#id_sc_field_valoradicional15_' + iSeqRow).bind('change', function() { sc_form_DETALLE_FACTURA_valoradicional15__onchange(this, iSeqRow) });
  $('#id_sc_field_codigoimpuesto_' + iSeqRow).bind('change', function() { sc_form_DETALLE_FACTURA_codigoimpuesto__onchange(this, iSeqRow) });
  $('#id_sc_field_codigoporcentajeimp_' + iSeqRow).bind('change', function() { sc_form_DETALLE_FACTURA_codigoporcentajeimp__onchange(this, iSeqRow) });
  $('#id_sc_field_tarifa_' + iSeqRow).bind('change', function() { sc_form_DETALLE_FACTURA_tarifa__onchange(this, iSeqRow) });
  $('#id_sc_field_baseimponible_' + iSeqRow).bind('change', function() { sc_form_DETALLE_FACTURA_baseimponible__onchange(this, iSeqRow) });
  $('#id_sc_field_valor_' + iSeqRow).bind('change', function() { sc_form_DETALLE_FACTURA_valor__onchange(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_DETALLE_FACTURA_ruc__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_DETALLE_FACTURA_coddoc__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_DETALLE_FACTURA_estab__onblur(oThis, iSeqRow) {
  do_ajax_form_DETALLE_FACTURA_validate_estab_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_DETALLE_FACTURA_estab__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_DETALLE_FACTURA_estab__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_DETALLE_FACTURA_ptoemi__onblur(oThis, iSeqRow) {
  do_ajax_form_DETALLE_FACTURA_validate_ptoemi_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_DETALLE_FACTURA_ptoemi__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_DETALLE_FACTURA_ptoemi__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_DETALLE_FACTURA_secuencial__onblur(oThis, iSeqRow) {
  do_ajax_form_DETALLE_FACTURA_validate_secuencial_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_DETALLE_FACTURA_secuencial__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_DETALLE_FACTURA_secuencial__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_DETALLE_FACTURA_lote__onblur(oThis, iSeqRow) {
  do_ajax_form_DETALLE_FACTURA_validate_lote_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_DETALLE_FACTURA_lote__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_DETALLE_FACTURA_lote__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_DETALLE_FACTURA_codigo__onblur(oThis, iSeqRow) {
  do_ajax_form_DETALLE_FACTURA_validate_codigo_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_DETALLE_FACTURA_codigo__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_DETALLE_FACTURA_codigo__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_DETALLE_FACTURA_descripcion__onblur(oThis, iSeqRow) {
  do_ajax_form_DETALLE_FACTURA_validate_descripcion_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_DETALLE_FACTURA_descripcion__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_DETALLE_FACTURA_descripcion__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_DETALLE_FACTURA_cantidad__onblur(oThis, iSeqRow) {
  do_ajax_form_DETALLE_FACTURA_validate_cantidad_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_DETALLE_FACTURA_cantidad__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_DETALLE_FACTURA_cantidad__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_DETALLE_FACTURA_preciounitario__onblur(oThis, iSeqRow) {
  do_ajax_form_DETALLE_FACTURA_validate_preciounitario_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_DETALLE_FACTURA_preciounitario__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_DETALLE_FACTURA_preciounitario__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_DETALLE_FACTURA_descuento__onblur(oThis, iSeqRow) {
  do_ajax_form_DETALLE_FACTURA_validate_descuento_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_DETALLE_FACTURA_descuento__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_DETALLE_FACTURA_descuento__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_DETALLE_FACTURA_preciototalsinimpuesto__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_DETALLE_FACTURA_nombredetalleadicional1__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_DETALLE_FACTURA_valoradicional1__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_DETALLE_FACTURA_nombredetalleadicional2__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_DETALLE_FACTURA_valoradicional2__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_DETALLE_FACTURA_nombredetalleadicional3__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_DETALLE_FACTURA_valoradicional3__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_DETALLE_FACTURA_nombredetalleadicional4__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_DETALLE_FACTURA_valoradicional4__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_DETALLE_FACTURA_nombredetalleadicional5__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_DETALLE_FACTURA_valoradicional5__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_DETALLE_FACTURA_nombredetalleadicional6__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_DETALLE_FACTURA_valoradicional6__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_DETALLE_FACTURA_nombredetalleadicional7__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_DETALLE_FACTURA_valoradicional7__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_DETALLE_FACTURA_nombredetalleadicional8__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_DETALLE_FACTURA_valoradicional8__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_DETALLE_FACTURA_nombredetalleadicional9__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_DETALLE_FACTURA_valoradicional9__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_DETALLE_FACTURA_nombredetalleadicional10__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_DETALLE_FACTURA_valoradicional10__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_DETALLE_FACTURA_nombredetalleadicional11__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_DETALLE_FACTURA_valoradicional11__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_DETALLE_FACTURA_nombredetalleadicional12__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_DETALLE_FACTURA_valoradicional12__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_DETALLE_FACTURA_nombredetalleadicional13__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_DETALLE_FACTURA_valoradicional13__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_DETALLE_FACTURA_nombredetalleadicional14__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_DETALLE_FACTURA_valoradicional14__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_DETALLE_FACTURA_nombredetalleadicional15__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_DETALLE_FACTURA_valoradicional15__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_DETALLE_FACTURA_codigoimpuesto__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_DETALLE_FACTURA_codigoporcentajeimp__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_DETALLE_FACTURA_tarifa__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_DETALLE_FACTURA_baseimponible__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_DETALLE_FACTURA_valor__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("codigo_", "", status);
	displayChange_field("descripcion_", "", status);
	displayChange_field("cantidad_", "", status);
	displayChange_field("preciounitario_", "", status);
	displayChange_field("descuento_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_codigo_(row, status);
	displayChange_field_descripcion_(row, status);
	displayChange_field_cantidad_(row, status);
	displayChange_field_preciounitario_(row, status);
	displayChange_field_descuento_(row, status);
	displayChange_field_estab_(row, status);
	displayChange_field_ptoemi_(row, status);
	displayChange_field_secuencial_(row, status);
	displayChange_field_lote_(row, status);
}

function displayChange_field(field, row, status) {
	if ("codigo_" == field) {
		displayChange_field_codigo_(row, status);
	}
	if ("descripcion_" == field) {
		displayChange_field_descripcion_(row, status);
	}
	if ("cantidad_" == field) {
		displayChange_field_cantidad_(row, status);
	}
	if ("preciounitario_" == field) {
		displayChange_field_preciounitario_(row, status);
	}
	if ("descuento_" == field) {
		displayChange_field_descuento_(row, status);
	}
	if ("estab_" == field) {
		displayChange_field_estab_(row, status);
	}
	if ("ptoemi_" == field) {
		displayChange_field_ptoemi_(row, status);
	}
	if ("secuencial_" == field) {
		displayChange_field_secuencial_(row, status);
	}
	if ("lote_" == field) {
		displayChange_field_lote_(row, status);
	}
}

function displayChange_field_codigo_(row, status) {
}

function displayChange_field_descripcion_(row, status) {
}

function displayChange_field_cantidad_(row, status) {
}

function displayChange_field_preciounitario_(row, status) {
}

function displayChange_field_descuento_(row, status) {
}

function displayChange_field_estab_(row, status) {
}

function displayChange_field_ptoemi_(row, status) {
}

function displayChange_field_secuencial_(row, status) {
}

function displayChange_field_lote_(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_DETALLE_FACTURA_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(28);
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_DETALLE_FACTURA')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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

