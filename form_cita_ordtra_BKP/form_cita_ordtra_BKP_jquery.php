
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
  scEventControl_data["fclnumero" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["procesar_factura" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["emisor" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["totalsinimp" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["totaldesc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["base12" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["base0" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valor_iva" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importe_total" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipo_pago" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valor_efec" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valor_cheque" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valor_tarjcred" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valor_transfer" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["num_cheque" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["forma_factura" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["banco_cheque" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipo_tarjcred" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["num_tarjcred" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["banco_transfer" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["numcta_transfer" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fech_vence" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["detalle_presupuesto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["servicios" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["val_primcli" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["fclnumero" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclnumero" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["procesar_factura" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["procesar_factura" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["emisor" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["emisor" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["totalsinimp" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["totalsinimp" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["totaldesc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["totaldesc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["base12" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["base12" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["base0" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["base0" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valor_iva" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valor_iva" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importe_total" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importe_total" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_pago" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_pago" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valor_efec" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valor_efec" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valor_cheque" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valor_cheque" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valor_tarjcred" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valor_tarjcred" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valor_transfer" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valor_transfer" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["num_cheque" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["num_cheque" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["forma_factura" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["forma_factura" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["banco_cheque" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["banco_cheque" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_tarjcred" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_tarjcred" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["num_tarjcred" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["num_tarjcred" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["banco_transfer" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["banco_transfer" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["numcta_transfer" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numcta_transfer" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fech_vence" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fech_vence" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["detalle_presupuesto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detalle_presupuesto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["servicios" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["servicios" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["val_primcli" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["val_primcli" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("fclnumero" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("procesar_factura" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("emisor" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tipo_tarjcred" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("agesecuen" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("cittipo" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("prenumero" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("procesar_factura" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
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
  $('#id_sc_field_citid' + iSeqRow).bind('change', function() { sc_form_cita_ordtra_BKP_citid_onchange(this, iSeqRow) });
  $('#id_sc_field_cittitulo' + iSeqRow).bind('change', function() { sc_form_cita_ordtra_BKP_cittitulo_onchange(this, iSeqRow) });
  $('#id_sc_field_citfecha' + iSeqRow).bind('change', function() { sc_form_cita_ordtra_BKP_citfecha_onchange(this, iSeqRow) });
  $('#id_sc_field_cithoraini' + iSeqRow).bind('change', function() { sc_form_cita_ordtra_BKP_cithoraini_onchange(this, iSeqRow) });
  $('#id_sc_field_cithorafin' + iSeqRow).bind('change', function() { sc_form_cita_ordtra_BKP_cithorafin_onchange(this, iSeqRow) });
  $('#id_sc_field_citduracion' + iSeqRow).bind('change', function() { sc_form_cita_ordtra_BKP_citduracion_onchange(this, iSeqRow) });
  $('#id_sc_field_agesecuen' + iSeqRow).bind('change', function() { sc_form_cita_ordtra_BKP_agesecuen_onchange(this, iSeqRow) });
  $('#id_sc_field_fclnumero' + iSeqRow).bind('blur', function() { sc_form_cita_ordtra_BKP_fclnumero_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_cita_ordtra_BKP_fclnumero_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_cita_ordtra_BKP_fclnumero_onfocus(this, iSeqRow) });
  $('#id_sc_field_cittipo' + iSeqRow).bind('change', function() { sc_form_cita_ordtra_BKP_cittipo_onchange(this, iSeqRow) });
  $('#id_sc_field_citfactur' + iSeqRow).bind('change', function() { sc_form_cita_ordtra_BKP_citfactur_onchange(this, iSeqRow) });
  $('#id_sc_field_prenumero' + iSeqRow).bind('change', function() { sc_form_cita_ordtra_BKP_prenumero_onchange(this, iSeqRow) });
  $('#id_sc_field_citobserv' + iSeqRow).bind('change', function() { sc_form_cita_ordtra_BKP_citobserv_onchange(this, iSeqRow) });
  $('#id_sc_field_citanula' + iSeqRow).bind('change', function() { sc_form_cita_ordtra_BKP_citanula_onchange(this, iSeqRow) });
  $('#id_sc_field_citcolor' + iSeqRow).bind('change', function() { sc_form_cita_ordtra_BKP_citcolor_onchange(this, iSeqRow) });
  $('#id_sc_field_citperiod' + iSeqRow).bind('change', function() { sc_form_cita_ordtra_BKP_citperiod_onchange(this, iSeqRow) });
  $('#id_sc_field_citrecurr' + iSeqRow).bind('change', function() { sc_form_cita_ordtra_BKP_citrecurr_onchange(this, iSeqRow) });
  $('#id_sc_field_citrecurrinfo' + iSeqRow).bind('change', function() { sc_form_cita_ordtra_BKP_citrecurrinfo_onchange(this, iSeqRow) });
  $('#id_sc_field_citusucrea' + iSeqRow).bind('change', function() { sc_form_cita_ordtra_BKP_citusucrea_onchange(this, iSeqRow) });
  $('#id_sc_field_citusumodi' + iSeqRow).bind('change', function() { sc_form_cita_ordtra_BKP_citusumodi_onchange(this, iSeqRow) });
  $('#id_sc_field_citfeccrea' + iSeqRow).bind('change', function() { sc_form_cita_ordtra_BKP_citfeccrea_onchange(this, iSeqRow) });
  $('#id_sc_field_citfeccrea_hora' + iSeqRow).bind('change', function() { sc_form_cita_ordtra_BKP_citfeccrea_hora_onchange(this, iSeqRow) });
  $('#id_sc_field_citfecmodi' + iSeqRow).bind('change', function() { sc_form_cita_ordtra_BKP_citfecmodi_onchange(this, iSeqRow) });
  $('#id_sc_field_citfecmodi_hora' + iSeqRow).bind('change', function() { sc_form_cita_ordtra_BKP_citfecmodi_hora_onchange(this, iSeqRow) });
  $('#id_sc_field_procesar_factura' + iSeqRow).bind('blur', function() { sc_form_cita_ordtra_BKP_procesar_factura_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_cita_ordtra_BKP_procesar_factura_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_cita_ordtra_BKP_procesar_factura_onfocus(this, iSeqRow) });
  $('#id_sc_field_servicios' + iSeqRow).bind('blur', function() { sc_form_cita_ordtra_BKP_servicios_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_cita_ordtra_BKP_servicios_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_cita_ordtra_BKP_servicios_onfocus(this, iSeqRow) });
  $('#id_sc_field_emisor' + iSeqRow).bind('blur', function() { sc_form_cita_ordtra_BKP_emisor_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_cita_ordtra_BKP_emisor_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_cita_ordtra_BKP_emisor_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_pago' + iSeqRow).bind('blur', function() { sc_form_cita_ordtra_BKP_tipo_pago_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_cita_ordtra_BKP_tipo_pago_onchange(this, iSeqRow) })
                                       .bind('click', function() { sc_form_cita_ordtra_BKP_tipo_pago_onclick(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_cita_ordtra_BKP_tipo_pago_onfocus(this, iSeqRow) });
  $('#id_sc_field_valor_efec' + iSeqRow).bind('blur', function() { sc_form_cita_ordtra_BKP_valor_efec_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_cita_ordtra_BKP_valor_efec_onchange(this, iSeqRow) })
                                        .bind('click', function() { sc_form_cita_ordtra_BKP_valor_efec_onclick(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_cita_ordtra_BKP_valor_efec_onfocus(this, iSeqRow) });
  $('#id_sc_field_valor_cheque' + iSeqRow).bind('blur', function() { sc_form_cita_ordtra_BKP_valor_cheque_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_cita_ordtra_BKP_valor_cheque_onchange(this, iSeqRow) })
                                          .bind('click', function() { sc_form_cita_ordtra_BKP_valor_cheque_onclick(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_cita_ordtra_BKP_valor_cheque_onfocus(this, iSeqRow) });
  $('#id_sc_field_valor_tarjcred' + iSeqRow).bind('blur', function() { sc_form_cita_ordtra_BKP_valor_tarjcred_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_cita_ordtra_BKP_valor_tarjcred_onchange(this, iSeqRow) })
                                            .bind('click', function() { sc_form_cita_ordtra_BKP_valor_tarjcred_onclick(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_cita_ordtra_BKP_valor_tarjcred_onfocus(this, iSeqRow) });
  $('#id_sc_field_valor_transfer' + iSeqRow).bind('blur', function() { sc_form_cita_ordtra_BKP_valor_transfer_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_cita_ordtra_BKP_valor_transfer_onchange(this, iSeqRow) })
                                            .bind('click', function() { sc_form_cita_ordtra_BKP_valor_transfer_onclick(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_cita_ordtra_BKP_valor_transfer_onfocus(this, iSeqRow) });
  $('#id_sc_field_num_cheque' + iSeqRow).bind('blur', function() { sc_form_cita_ordtra_BKP_num_cheque_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_cita_ordtra_BKP_num_cheque_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_cita_ordtra_BKP_num_cheque_onfocus(this, iSeqRow) });
  $('#id_sc_field_banco_cheque' + iSeqRow).bind('blur', function() { sc_form_cita_ordtra_BKP_banco_cheque_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_cita_ordtra_BKP_banco_cheque_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_cita_ordtra_BKP_banco_cheque_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_tarjcred' + iSeqRow).bind('blur', function() { sc_form_cita_ordtra_BKP_tipo_tarjcred_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_cita_ordtra_BKP_tipo_tarjcred_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_cita_ordtra_BKP_tipo_tarjcred_onfocus(this, iSeqRow) });
  $('#id_sc_field_num_tarjcred' + iSeqRow).bind('blur', function() { sc_form_cita_ordtra_BKP_num_tarjcred_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_cita_ordtra_BKP_num_tarjcred_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_cita_ordtra_BKP_num_tarjcred_onfocus(this, iSeqRow) });
  $('#id_sc_field_banco_transfer' + iSeqRow).bind('blur', function() { sc_form_cita_ordtra_BKP_banco_transfer_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_cita_ordtra_BKP_banco_transfer_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_cita_ordtra_BKP_banco_transfer_onfocus(this, iSeqRow) });
  $('#id_sc_field_numcta_transfer' + iSeqRow).bind('blur', function() { sc_form_cita_ordtra_BKP_numcta_transfer_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_cita_ordtra_BKP_numcta_transfer_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_cita_ordtra_BKP_numcta_transfer_onfocus(this, iSeqRow) });
  $('#id_sc_field_totalsinimp' + iSeqRow).bind('blur', function() { sc_form_cita_ordtra_BKP_totalsinimp_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_cita_ordtra_BKP_totalsinimp_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_cita_ordtra_BKP_totalsinimp_onfocus(this, iSeqRow) });
  $('#id_sc_field_totaldesc' + iSeqRow).bind('blur', function() { sc_form_cita_ordtra_BKP_totaldesc_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_cita_ordtra_BKP_totaldesc_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_cita_ordtra_BKP_totaldesc_onfocus(this, iSeqRow) });
  $('#id_sc_field_base12' + iSeqRow).bind('blur', function() { sc_form_cita_ordtra_BKP_base12_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_cita_ordtra_BKP_base12_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_cita_ordtra_BKP_base12_onfocus(this, iSeqRow) });
  $('#id_sc_field_base0' + iSeqRow).bind('blur', function() { sc_form_cita_ordtra_BKP_base0_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_cita_ordtra_BKP_base0_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_cita_ordtra_BKP_base0_onfocus(this, iSeqRow) });
  $('#id_sc_field_valor_iva' + iSeqRow).bind('blur', function() { sc_form_cita_ordtra_BKP_valor_iva_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_cita_ordtra_BKP_valor_iva_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_cita_ordtra_BKP_valor_iva_onfocus(this, iSeqRow) });
  $('#id_sc_field_importe_total' + iSeqRow).bind('blur', function() { sc_form_cita_ordtra_BKP_importe_total_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_cita_ordtra_BKP_importe_total_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_cita_ordtra_BKP_importe_total_onfocus(this, iSeqRow) });
  $('#id_sc_field_fech_vence' + iSeqRow).bind('blur', function() { sc_form_cita_ordtra_BKP_fech_vence_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_cita_ordtra_BKP_fech_vence_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_cita_ordtra_BKP_fech_vence_onfocus(this, iSeqRow) });
  $('#id_sc_field_val_primcli' + iSeqRow).bind('blur', function() { sc_form_cita_ordtra_BKP_val_primcli_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_cita_ordtra_BKP_val_primcli_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_cita_ordtra_BKP_val_primcli_onfocus(this, iSeqRow) });
  $('#id_sc_field_detalle_presupuesto' + iSeqRow).bind('blur', function() { sc_form_cita_ordtra_BKP_detalle_presupuesto_onblur(this, iSeqRow) })
                                                 .bind('change', function() { sc_form_cita_ordtra_BKP_detalle_presupuesto_onchange(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_cita_ordtra_BKP_detalle_presupuesto_onfocus(this, iSeqRow) });
  $('#id_sc_field_forma_factura' + iSeqRow).bind('blur', function() { sc_form_cita_ordtra_BKP_forma_factura_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_cita_ordtra_BKP_forma_factura_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_cita_ordtra_BKP_forma_factura_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_cita_ordtra_BKP_citid_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_cittitulo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_citfecha_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_cithoraini_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_cithorafin_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_citduracion_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_agesecuen_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_fclnumero_onblur(oThis, iSeqRow) {
  do_ajax_form_cita_ordtra_BKP_validate_fclnumero();
  scCssBlur(oThis);
}

function sc_form_cita_ordtra_BKP_fclnumero_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_fclnumero_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cita_ordtra_BKP_cittipo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_citfactur_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_prenumero_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_citobserv_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_citanula_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_citcolor_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_citperiod_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_citrecurr_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_citrecurrinfo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_citusucrea_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_citusumodi_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_citfeccrea_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_citfeccrea_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_citfecmodi_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_citfecmodi_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_procesar_factura_onblur(oThis, iSeqRow) {
  do_ajax_form_cita_ordtra_BKP_validate_procesar_factura();
  scCssBlur(oThis);
}

function sc_form_cita_ordtra_BKP_procesar_factura_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_cita_ordtra_BKP_event_procesar_factura_onchange();
}

function sc_form_cita_ordtra_BKP_procesar_factura_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cita_ordtra_BKP_servicios_onblur(oThis, iSeqRow) {
  do_ajax_form_cita_ordtra_BKP_validate_servicios();
  scCssBlur(oThis);
}

function sc_form_cita_ordtra_BKP_servicios_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_servicios_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cita_ordtra_BKP_emisor_onblur(oThis, iSeqRow) {
  do_ajax_form_cita_ordtra_BKP_validate_emisor();
  scCssBlur(oThis);
}

function sc_form_cita_ordtra_BKP_emisor_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_emisor_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cita_ordtra_BKP_tipo_pago_onblur(oThis, iSeqRow) {
  do_ajax_form_cita_ordtra_BKP_validate_tipo_pago();
  scCssBlur(oThis);
}

function sc_form_cita_ordtra_BKP_tipo_pago_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_tipo_pago_onclick(oThis, iSeqRow) {
  do_ajax_form_cita_ordtra_BKP_event_tipo_pago_onclick();
}

function sc_form_cita_ordtra_BKP_tipo_pago_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cita_ordtra_BKP_valor_efec_onblur(oThis, iSeqRow) {
  do_ajax_form_cita_ordtra_BKP_validate_valor_efec();
  scCssBlur(oThis);
}

function sc_form_cita_ordtra_BKP_valor_efec_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_valor_efec_onclick(oThis, iSeqRow) {
  do_ajax_form_cita_ordtra_BKP_event_valor_efec_onclick();
}

function sc_form_cita_ordtra_BKP_valor_efec_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cita_ordtra_BKP_valor_cheque_onblur(oThis, iSeqRow) {
  do_ajax_form_cita_ordtra_BKP_validate_valor_cheque();
  scCssBlur(oThis);
}

function sc_form_cita_ordtra_BKP_valor_cheque_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_valor_cheque_onclick(oThis, iSeqRow) {
  do_ajax_form_cita_ordtra_BKP_event_valor_cheque_onclick();
}

function sc_form_cita_ordtra_BKP_valor_cheque_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cita_ordtra_BKP_valor_tarjcred_onblur(oThis, iSeqRow) {
  do_ajax_form_cita_ordtra_BKP_validate_valor_tarjcred();
  scCssBlur(oThis);
}

function sc_form_cita_ordtra_BKP_valor_tarjcred_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_valor_tarjcred_onclick(oThis, iSeqRow) {
  do_ajax_form_cita_ordtra_BKP_event_valor_tarjcred_onclick();
}

function sc_form_cita_ordtra_BKP_valor_tarjcred_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cita_ordtra_BKP_valor_transfer_onblur(oThis, iSeqRow) {
  do_ajax_form_cita_ordtra_BKP_validate_valor_transfer();
  scCssBlur(oThis);
}

function sc_form_cita_ordtra_BKP_valor_transfer_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_valor_transfer_onclick(oThis, iSeqRow) {
  do_ajax_form_cita_ordtra_BKP_event_valor_transfer_onclick();
}

function sc_form_cita_ordtra_BKP_valor_transfer_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cita_ordtra_BKP_num_cheque_onblur(oThis, iSeqRow) {
  do_ajax_form_cita_ordtra_BKP_validate_num_cheque();
  scCssBlur(oThis);
}

function sc_form_cita_ordtra_BKP_num_cheque_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_num_cheque_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cita_ordtra_BKP_banco_cheque_onblur(oThis, iSeqRow) {
  do_ajax_form_cita_ordtra_BKP_validate_banco_cheque();
  scCssBlur(oThis);
}

function sc_form_cita_ordtra_BKP_banco_cheque_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_banco_cheque_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cita_ordtra_BKP_tipo_tarjcred_onblur(oThis, iSeqRow) {
  do_ajax_form_cita_ordtra_BKP_validate_tipo_tarjcred();
  scCssBlur(oThis);
}

function sc_form_cita_ordtra_BKP_tipo_tarjcred_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_tipo_tarjcred_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cita_ordtra_BKP_num_tarjcred_onblur(oThis, iSeqRow) {
  do_ajax_form_cita_ordtra_BKP_validate_num_tarjcred();
  scCssBlur(oThis);
}

function sc_form_cita_ordtra_BKP_num_tarjcred_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_num_tarjcred_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cita_ordtra_BKP_banco_transfer_onblur(oThis, iSeqRow) {
  do_ajax_form_cita_ordtra_BKP_validate_banco_transfer();
  scCssBlur(oThis);
}

function sc_form_cita_ordtra_BKP_banco_transfer_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_banco_transfer_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cita_ordtra_BKP_numcta_transfer_onblur(oThis, iSeqRow) {
  do_ajax_form_cita_ordtra_BKP_validate_numcta_transfer();
  scCssBlur(oThis);
}

function sc_form_cita_ordtra_BKP_numcta_transfer_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_numcta_transfer_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cita_ordtra_BKP_totalsinimp_onblur(oThis, iSeqRow) {
  do_ajax_form_cita_ordtra_BKP_validate_totalsinimp();
  scCssBlur(oThis);
}

function sc_form_cita_ordtra_BKP_totalsinimp_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_totalsinimp_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cita_ordtra_BKP_totaldesc_onblur(oThis, iSeqRow) {
  do_ajax_form_cita_ordtra_BKP_validate_totaldesc();
  scCssBlur(oThis);
}

function sc_form_cita_ordtra_BKP_totaldesc_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_totaldesc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cita_ordtra_BKP_base12_onblur(oThis, iSeqRow) {
  do_ajax_form_cita_ordtra_BKP_validate_base12();
  scCssBlur(oThis);
}

function sc_form_cita_ordtra_BKP_base12_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_base12_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cita_ordtra_BKP_base0_onblur(oThis, iSeqRow) {
  do_ajax_form_cita_ordtra_BKP_validate_base0();
  scCssBlur(oThis);
}

function sc_form_cita_ordtra_BKP_base0_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_base0_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cita_ordtra_BKP_valor_iva_onblur(oThis, iSeqRow) {
  do_ajax_form_cita_ordtra_BKP_validate_valor_iva();
  scCssBlur(oThis);
}

function sc_form_cita_ordtra_BKP_valor_iva_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_valor_iva_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cita_ordtra_BKP_importe_total_onblur(oThis, iSeqRow) {
  do_ajax_form_cita_ordtra_BKP_validate_importe_total();
  scCssBlur(oThis);
}

function sc_form_cita_ordtra_BKP_importe_total_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_importe_total_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cita_ordtra_BKP_fech_vence_onblur(oThis, iSeqRow) {
  do_ajax_form_cita_ordtra_BKP_validate_fech_vence();
  scCssBlur(oThis);
}

function sc_form_cita_ordtra_BKP_fech_vence_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_fech_vence_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cita_ordtra_BKP_val_primcli_onblur(oThis, iSeqRow) {
  do_ajax_form_cita_ordtra_BKP_validate_val_primcli();
  scCssBlur(oThis);
}

function sc_form_cita_ordtra_BKP_val_primcli_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_val_primcli_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cita_ordtra_BKP_detalle_presupuesto_onblur(oThis, iSeqRow) {
  do_ajax_form_cita_ordtra_BKP_validate_detalle_presupuesto();
  scCssBlur(oThis);
}

function sc_form_cita_ordtra_BKP_detalle_presupuesto_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_detalle_presupuesto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cita_ordtra_BKP_forma_factura_onblur(oThis, iSeqRow) {
  do_ajax_form_cita_ordtra_BKP_validate_forma_factura();
  scCssBlur(oThis);
}

function sc_form_cita_ordtra_BKP_forma_factura_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cita_ordtra_BKP_forma_factura_onfocus(oThis, iSeqRow) {
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
	if ("3" == block) {
		displayChange_block_3(status);
	}
	if ("4" == block) {
		displayChange_block_4(status);
	}
	if ("5" == block) {
		displayChange_block_5(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("fclnumero", "", status);
	displayChange_field("procesar_factura", "", status);
	displayChange_field("emisor", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("totalsinimp", "", status);
	displayChange_field("totaldesc", "", status);
	displayChange_field("base12", "", status);
	displayChange_field("base0", "", status);
	displayChange_field("valor_iva", "", status);
	displayChange_field("importe_total", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("tipo_pago", "", status);
	displayChange_field("valor_efec", "", status);
	displayChange_field("valor_cheque", "", status);
	displayChange_field("valor_tarjcred", "", status);
	displayChange_field("valor_transfer", "", status);
	displayChange_field("num_cheque", "", status);
	displayChange_field("forma_factura", "", status);
	displayChange_field("banco_cheque", "", status);
	displayChange_field("tipo_tarjcred", "", status);
	displayChange_field("num_tarjcred", "", status);
	displayChange_field("banco_transfer", "", status);
	displayChange_field("numcta_transfer", "", status);
	displayChange_field("fech_vence", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("detalle_presupuesto", "", status);
}

function displayChange_block_4(status) {
	displayChange_field("servicios", "", status);
}

function displayChange_block_5(status) {
	displayChange_field("val_primcli", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_fclnumero(row, status);
	displayChange_field_procesar_factura(row, status);
	displayChange_field_emisor(row, status);
	displayChange_field_totalsinimp(row, status);
	displayChange_field_totaldesc(row, status);
	displayChange_field_base12(row, status);
	displayChange_field_base0(row, status);
	displayChange_field_valor_iva(row, status);
	displayChange_field_importe_total(row, status);
	displayChange_field_tipo_pago(row, status);
	displayChange_field_valor_efec(row, status);
	displayChange_field_valor_cheque(row, status);
	displayChange_field_valor_tarjcred(row, status);
	displayChange_field_valor_transfer(row, status);
	displayChange_field_num_cheque(row, status);
	displayChange_field_forma_factura(row, status);
	displayChange_field_banco_cheque(row, status);
	displayChange_field_tipo_tarjcred(row, status);
	displayChange_field_num_tarjcred(row, status);
	displayChange_field_banco_transfer(row, status);
	displayChange_field_numcta_transfer(row, status);
	displayChange_field_fech_vence(row, status);
	displayChange_field_detalle_presupuesto(row, status);
	displayChange_field_servicios(row, status);
	displayChange_field_val_primcli(row, status);
}

function displayChange_field(field, row, status) {
	if ("fclnumero" == field) {
		displayChange_field_fclnumero(row, status);
	}
	if ("procesar_factura" == field) {
		displayChange_field_procesar_factura(row, status);
	}
	if ("emisor" == field) {
		displayChange_field_emisor(row, status);
	}
	if ("totalsinimp" == field) {
		displayChange_field_totalsinimp(row, status);
	}
	if ("totaldesc" == field) {
		displayChange_field_totaldesc(row, status);
	}
	if ("base12" == field) {
		displayChange_field_base12(row, status);
	}
	if ("base0" == field) {
		displayChange_field_base0(row, status);
	}
	if ("valor_iva" == field) {
		displayChange_field_valor_iva(row, status);
	}
	if ("importe_total" == field) {
		displayChange_field_importe_total(row, status);
	}
	if ("tipo_pago" == field) {
		displayChange_field_tipo_pago(row, status);
	}
	if ("valor_efec" == field) {
		displayChange_field_valor_efec(row, status);
	}
	if ("valor_cheque" == field) {
		displayChange_field_valor_cheque(row, status);
	}
	if ("valor_tarjcred" == field) {
		displayChange_field_valor_tarjcred(row, status);
	}
	if ("valor_transfer" == field) {
		displayChange_field_valor_transfer(row, status);
	}
	if ("num_cheque" == field) {
		displayChange_field_num_cheque(row, status);
	}
	if ("forma_factura" == field) {
		displayChange_field_forma_factura(row, status);
	}
	if ("banco_cheque" == field) {
		displayChange_field_banco_cheque(row, status);
	}
	if ("tipo_tarjcred" == field) {
		displayChange_field_tipo_tarjcred(row, status);
	}
	if ("num_tarjcred" == field) {
		displayChange_field_num_tarjcred(row, status);
	}
	if ("banco_transfer" == field) {
		displayChange_field_banco_transfer(row, status);
	}
	if ("numcta_transfer" == field) {
		displayChange_field_numcta_transfer(row, status);
	}
	if ("fech_vence" == field) {
		displayChange_field_fech_vence(row, status);
	}
	if ("detalle_presupuesto" == field) {
		displayChange_field_detalle_presupuesto(row, status);
	}
	if ("servicios" == field) {
		displayChange_field_servicios(row, status);
	}
	if ("val_primcli" == field) {
		displayChange_field_val_primcli(row, status);
	}
}

function displayChange_field_fclnumero(row, status) {
}

function displayChange_field_procesar_factura(row, status) {
}

function displayChange_field_emisor(row, status) {
}

function displayChange_field_totalsinimp(row, status) {
}

function displayChange_field_totaldesc(row, status) {
}

function displayChange_field_base12(row, status) {
}

function displayChange_field_base0(row, status) {
}

function displayChange_field_valor_iva(row, status) {
}

function displayChange_field_importe_total(row, status) {
}

function displayChange_field_tipo_pago(row, status) {
}

function displayChange_field_valor_efec(row, status) {
}

function displayChange_field_valor_cheque(row, status) {
}

function displayChange_field_valor_tarjcred(row, status) {
}

function displayChange_field_valor_transfer(row, status) {
}

function displayChange_field_num_cheque(row, status) {
}

function displayChange_field_forma_factura(row, status) {
}

function displayChange_field_banco_cheque(row, status) {
}

function displayChange_field_tipo_tarjcred(row, status) {
}

function displayChange_field_num_tarjcred(row, status) {
}

function displayChange_field_banco_transfer(row, status) {
}

function displayChange_field_numcta_transfer(row, status) {
}

function displayChange_field_fech_vence(row, status) {
}

function displayChange_field_detalle_presupuesto(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_detalle_presupuesto")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_detalle_presupuesto")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_servicios(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_detalle_citadiagnos")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_detalle_citadiagnos")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_val_primcli(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_cita_ordtra_BKP_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(28);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_fech_vence" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fech_vence" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      var elemName;
      if ("" != dateText) {
        elemName = $(this).attr("name");
        $("input[name=sc_clone_" + elemName + "]").hide();
        $("input[name=" + elemName + "]").show();
      }
      do_ajax_form_cita_ordtra_BKP_validate_fech_vence(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fech_vence']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
  $("#id_sc_field_citfecha" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_citfecha" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      setTimeout(function() { do_ajax_form_cita_ordtra_BKP_validate_citfecha(iSeqRow); }, 200);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['citfecha']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
  $("#id_sc_field_citfeccrea" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_citfeccrea" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['citfeccrea']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['citfeccrea']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_cita_ordtra_BKP_validate_citfeccrea(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['citfeccrea']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
  $("#id_sc_field_citfecmodi" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_citfecmodi" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['citfecmodi']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['citfecmodi']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_cita_ordtra_BKP_validate_citfecmodi(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['citfecmodi']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
} // scJQCalendarAdd

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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_cita_ordtra_BKP')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  scJQCalendarAdd(iLine);
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

