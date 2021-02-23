
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
  scEventControl_data["citid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cittitulo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["citfecha" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["agesecuen" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cithoraini" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["citduracion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cithorafin" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hora_fin_mostrar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["citfactur" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["info_documento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclnumero" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["paciente_nuevo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cittipo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["label_ficha" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ficha_cliente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["editar_cita" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["citcolor" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["prenumero" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre_presupuesto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["editar_presup" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["info_documento_2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["citobserv" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cancelar_cita" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["citid" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["citid" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cittitulo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cittitulo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["citfecha" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["citfecha" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["agesecuen" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["agesecuen" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cithoraini" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cithoraini" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["citduracion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["citduracion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cithorafin" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cithorafin" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hora_fin_mostrar" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hora_fin_mostrar" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["citfactur" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["citfactur" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["info_documento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["info_documento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclnumero" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclnumero" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["paciente_nuevo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["paciente_nuevo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cittipo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cittipo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["label_ficha" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["label_ficha" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ficha_cliente" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ficha_cliente" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["editar_cita" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["editar_cita" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["citcolor" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["citcolor" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["prenumero" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["prenumero" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre_presupuesto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre_presupuesto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["editar_presup" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["editar_presup" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["info_documento_2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["info_documento_2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["citobserv" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["citobserv" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cancelar_cita" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cancelar_cita" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("agesecuen" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("citfactur" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("cittipo" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("prenumero" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("cancelar_cita" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("citperiod" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("citrecurr" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("agesecuen" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("citduracion" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("cithoraini" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("cittipo" + iSeq == fieldName) {
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
  $('#id_sc_field_citid' + iSeqRow).bind('blur', function() { sc_calendar_cita_citid_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_calendar_cita_citid_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_calendar_cita_citid_onfocus(this, iSeqRow) });
  $('#id_sc_field_cittitulo' + iSeqRow).bind('blur', function() { sc_calendar_cita_cittitulo_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_calendar_cita_cittitulo_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_calendar_cita_cittitulo_onfocus(this, iSeqRow) });
  $('#id_sc_field_citfecha' + iSeqRow).bind('blur', function() { sc_calendar_cita_citfecha_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_calendar_cita_citfecha_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_calendar_cita_citfecha_onfocus(this, iSeqRow) });
  $('#id_sc_field_cithoraini' + iSeqRow).bind('blur', function() { sc_calendar_cita_cithoraini_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_calendar_cita_cithoraini_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_calendar_cita_cithoraini_onfocus(this, iSeqRow) });
  $('#id_sc_field_cithorafin' + iSeqRow).bind('blur', function() { sc_calendar_cita_cithorafin_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_calendar_cita_cithorafin_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_calendar_cita_cithorafin_onfocus(this, iSeqRow) });
  $('#id_sc_field_citduracion' + iSeqRow).bind('blur', function() { sc_calendar_cita_citduracion_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_calendar_cita_citduracion_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_calendar_cita_citduracion_onfocus(this, iSeqRow) });
  $('#id_sc_field_agesecuen' + iSeqRow).bind('blur', function() { sc_calendar_cita_agesecuen_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_calendar_cita_agesecuen_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_calendar_cita_agesecuen_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclnumero' + iSeqRow).bind('blur', function() { sc_calendar_cita_fclnumero_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_calendar_cita_fclnumero_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_calendar_cita_fclnumero_onfocus(this, iSeqRow) });
  $('#id_sc_field_cittipo' + iSeqRow).bind('blur', function() { sc_calendar_cita_cittipo_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_calendar_cita_cittipo_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_calendar_cita_cittipo_onfocus(this, iSeqRow) });
  $('#id_sc_field_citfactur' + iSeqRow).bind('blur', function() { sc_calendar_cita_citfactur_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_calendar_cita_citfactur_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_calendar_cita_citfactur_onfocus(this, iSeqRow) });
  $('#id_sc_field_prenumero' + iSeqRow).bind('blur', function() { sc_calendar_cita_prenumero_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_calendar_cita_prenumero_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_calendar_cita_prenumero_onfocus(this, iSeqRow) });
  $('#id_sc_field_citobserv' + iSeqRow).bind('blur', function() { sc_calendar_cita_citobserv_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_calendar_cita_citobserv_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_calendar_cita_citobserv_onfocus(this, iSeqRow) });
  $('#id_sc_field_citanula' + iSeqRow).bind('change', function() { sc_calendar_cita_citanula_onchange(this, iSeqRow) });
  $('#id_sc_field_citcolor' + iSeqRow).bind('blur', function() { sc_calendar_cita_citcolor_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_calendar_cita_citcolor_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_calendar_cita_citcolor_onfocus(this, iSeqRow) });
  $('#id_sc_field_citperiod' + iSeqRow).bind('change', function() { sc_calendar_cita_citperiod_onchange(this, iSeqRow) });
  $('#id_sc_field_citrecurr' + iSeqRow).bind('change', function() { sc_calendar_cita_citrecurr_onchange(this, iSeqRow) });
  $('#id_sc_field_citrecurrinfo' + iSeqRow).bind('change', function() { sc_calendar_cita_citrecurrinfo_onchange(this, iSeqRow) });
  $('#id_sc_field_citusucrea' + iSeqRow).bind('change', function() { sc_calendar_cita_citusucrea_onchange(this, iSeqRow) });
  $('#id_sc_field_citusumodi' + iSeqRow).bind('change', function() { sc_calendar_cita_citusumodi_onchange(this, iSeqRow) });
  $('#id_sc_field_citfeccrea' + iSeqRow).bind('change', function() { sc_calendar_cita_citfeccrea_onchange(this, iSeqRow) });
  $('#id_sc_field_citfeccrea_hora' + iSeqRow).bind('change', function() { sc_calendar_cita_citfeccrea_hora_onchange(this, iSeqRow) });
  $('#id_sc_field_citfecmodi' + iSeqRow).bind('change', function() { sc_calendar_cita_citfecmodi_onchange(this, iSeqRow) });
  $('#id_sc_field_citfecmodi_hora' + iSeqRow).bind('change', function() { sc_calendar_cita_citfecmodi_hora_onchange(this, iSeqRow) });
  $('#id_sc_field___calend_all_day__' + iSeqRow).bind('change', function() { sc_calendar_cita___calend_all_day___onchange(this, iSeqRow) });
  $('#id_sc_field_editar_cita' + iSeqRow).bind('blur', function() { sc_calendar_cita_editar_cita_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_calendar_cita_editar_cita_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_calendar_cita_editar_cita_onfocus(this, iSeqRow) });
  $('#id_sc_field_editar_presup' + iSeqRow).bind('blur', function() { sc_calendar_cita_editar_presup_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_calendar_cita_editar_presup_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_calendar_cita_editar_presup_onfocus(this, iSeqRow) });
  $('#id_sc_field_ficha_cliente' + iSeqRow).bind('blur', function() { sc_calendar_cita_ficha_cliente_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_calendar_cita_ficha_cliente_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_calendar_cita_ficha_cliente_onfocus(this, iSeqRow) });
  $('#id_sc_field_hora_fin_mostrar' + iSeqRow).bind('blur', function() { sc_calendar_cita_hora_fin_mostrar_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_calendar_cita_hora_fin_mostrar_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_calendar_cita_hora_fin_mostrar_onfocus(this, iSeqRow) });
  $('#id_sc_field_label_ficha' + iSeqRow).bind('blur', function() { sc_calendar_cita_label_ficha_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_calendar_cita_label_ficha_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_calendar_cita_label_ficha_onfocus(this, iSeqRow) });
  $('#id_sc_field_cancelar_cita' + iSeqRow).bind('blur', function() { sc_calendar_cita_cancelar_cita_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_calendar_cita_cancelar_cita_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_calendar_cita_cancelar_cita_onfocus(this, iSeqRow) });
  $('#id_sc_field_info_documento' + iSeqRow).bind('blur', function() { sc_calendar_cita_info_documento_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_calendar_cita_info_documento_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_calendar_cita_info_documento_onfocus(this, iSeqRow) });
  $('#id_sc_field_info_documento_2' + iSeqRow).bind('blur', function() { sc_calendar_cita_info_documento_2_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_calendar_cita_info_documento_2_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_calendar_cita_info_documento_2_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre_presupuesto' + iSeqRow).bind('blur', function() { sc_calendar_cita_nombre_presupuesto_onblur(this, iSeqRow) })
                                                .bind('change', function() { sc_calendar_cita_nombre_presupuesto_onchange(this, iSeqRow) })
                                                .bind('focus', function() { sc_calendar_cita_nombre_presupuesto_onfocus(this, iSeqRow) });
  $('#id_sc_field_paciente_nuevo' + iSeqRow).bind('blur', function() { sc_calendar_cita_paciente_nuevo_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_calendar_cita_paciente_nuevo_onchange(this, iSeqRow) })
                                            .bind('click', function() { sc_calendar_cita_paciente_nuevo_onclick(this, iSeqRow) })
                                            .bind('focus', function() { sc_calendar_cita_paciente_nuevo_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_calendar_cita_citid_onblur(oThis, iSeqRow) {
  do_ajax_calendar_cita_validate_citid();
  scCssBlur(oThis);
}

function sc_calendar_cita_citid_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendar_cita_citid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_calendar_cita_cittitulo_onblur(oThis, iSeqRow) {
  do_ajax_calendar_cita_validate_cittitulo();
  scCssBlur(oThis);
}

function sc_calendar_cita_cittitulo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendar_cita_cittitulo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_calendar_cita_citfecha_onblur(oThis, iSeqRow) {
  do_ajax_calendar_cita_validate_citfecha();
  scCssBlur(oThis);
}

function sc_calendar_cita_citfecha_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendar_cita_citfecha_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_calendar_cita_cithoraini_onblur(oThis, iSeqRow) {
  do_ajax_calendar_cita_validate_cithoraini();
  scCssBlur(oThis);
}

function sc_calendar_cita_cithoraini_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_calendar_cita_event_cithoraini_onchange();
}

function sc_calendar_cita_cithoraini_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_calendar_cita_cithorafin_onblur(oThis, iSeqRow) {
  do_ajax_calendar_cita_validate_cithorafin();
  scCssBlur(oThis);
}

function sc_calendar_cita_cithorafin_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendar_cita_cithorafin_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_calendar_cita_citduracion_onblur(oThis, iSeqRow) {
  do_ajax_calendar_cita_validate_citduracion();
  scCssBlur(oThis);
}

function sc_calendar_cita_citduracion_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_calendar_cita_event_citduracion_onchange();
}

function sc_calendar_cita_citduracion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_calendar_cita_agesecuen_onblur(oThis, iSeqRow) {
  do_ajax_calendar_cita_validate_agesecuen();
  scCssBlur(oThis);
}

function sc_calendar_cita_agesecuen_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_calendar_cita_event_agesecuen_onchange();
}

function sc_calendar_cita_agesecuen_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_calendar_cita_fclnumero_onblur(oThis, iSeqRow) {
  do_ajax_calendar_cita_validate_fclnumero();
  scCssBlur(oThis);
}

function sc_calendar_cita_fclnumero_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_calendar_cita_refresh_fclnumero();
  lookup_fclnumero();
}

function sc_calendar_cita_fclnumero_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_calendar_cita_cittipo_onblur(oThis, iSeqRow) {
  do_ajax_calendar_cita_validate_cittipo();
  scCssBlur(oThis);
}

function sc_calendar_cita_cittipo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_calendar_cita_event_cittipo_onchange();
}

function sc_calendar_cita_cittipo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_calendar_cita_citfactur_onblur(oThis, iSeqRow) {
  do_ajax_calendar_cita_validate_citfactur();
  scCssBlur(oThis);
}

function sc_calendar_cita_citfactur_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendar_cita_citfactur_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_calendar_cita_prenumero_onblur(oThis, iSeqRow) {
  do_ajax_calendar_cita_validate_prenumero();
  scCssBlur(oThis);
}

function sc_calendar_cita_prenumero_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendar_cita_prenumero_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_calendar_cita_citobserv_onblur(oThis, iSeqRow) {
  do_ajax_calendar_cita_validate_citobserv();
  scCssBlur(oThis);
}

function sc_calendar_cita_citobserv_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendar_cita_citobserv_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_calendar_cita_citanula_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendar_cita_citcolor_onblur(oThis, iSeqRow) {
  do_ajax_calendar_cita_validate_citcolor();
  scCssBlur(oThis);
}

function sc_calendar_cita_citcolor_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendar_cita_citcolor_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_calendar_cita_citperiod_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendar_cita_citrecurr_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendar_cita_citrecurrinfo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendar_cita_citusucrea_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendar_cita_citusumodi_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendar_cita_citfeccrea_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendar_cita_citfeccrea_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendar_cita_citfecmodi_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendar_cita_citfecmodi_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendar_cita___calend_all_day___onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendar_cita_editar_cita_onblur(oThis, iSeqRow) {
  do_ajax_calendar_cita_validate_editar_cita();
  scCssBlur(oThis);
}

function sc_calendar_cita_editar_cita_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendar_cita_editar_cita_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_calendar_cita_editar_presup_onblur(oThis, iSeqRow) {
  do_ajax_calendar_cita_validate_editar_presup();
  scCssBlur(oThis);
}

function sc_calendar_cita_editar_presup_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendar_cita_editar_presup_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_calendar_cita_ficha_cliente_onblur(oThis, iSeqRow) {
  do_ajax_calendar_cita_validate_ficha_cliente();
  scCssBlur(oThis);
}

function sc_calendar_cita_ficha_cliente_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendar_cita_ficha_cliente_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_calendar_cita_hora_fin_mostrar_onblur(oThis, iSeqRow) {
  do_ajax_calendar_cita_validate_hora_fin_mostrar();
  scCssBlur(oThis);
}

function sc_calendar_cita_hora_fin_mostrar_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendar_cita_hora_fin_mostrar_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_calendar_cita_label_ficha_onblur(oThis, iSeqRow) {
  do_ajax_calendar_cita_validate_label_ficha();
  scCssBlur(oThis);
}

function sc_calendar_cita_label_ficha_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendar_cita_label_ficha_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_calendar_cita_cancelar_cita_onblur(oThis, iSeqRow) {
  do_ajax_calendar_cita_validate_cancelar_cita();
  scCssBlur(oThis);
}

function sc_calendar_cita_cancelar_cita_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendar_cita_cancelar_cita_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_calendar_cita_info_documento_onblur(oThis, iSeqRow) {
  do_ajax_calendar_cita_validate_info_documento();
  scCssBlur(oThis);
}

function sc_calendar_cita_info_documento_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendar_cita_info_documento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_calendar_cita_info_documento_2_onblur(oThis, iSeqRow) {
  do_ajax_calendar_cita_validate_info_documento_2();
  scCssBlur(oThis);
}

function sc_calendar_cita_info_documento_2_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendar_cita_info_documento_2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_calendar_cita_nombre_presupuesto_onblur(oThis, iSeqRow) {
  do_ajax_calendar_cita_validate_nombre_presupuesto();
  scCssBlur(oThis);
}

function sc_calendar_cita_nombre_presupuesto_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendar_cita_nombre_presupuesto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_calendar_cita_paciente_nuevo_onblur(oThis, iSeqRow) {
  do_ajax_calendar_cita_validate_paciente_nuevo();
  scCssBlur(oThis);
}

function sc_calendar_cita_paciente_nuevo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendar_cita_paciente_nuevo_onclick(oThis, iSeqRow) {
  do_ajax_calendar_cita_event_paciente_nuevo_onclick();
}

function sc_calendar_cita_paciente_nuevo_onfocus(oThis, iSeqRow) {
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
}

function displayChange_block_0(status) {
	displayChange_field("citid", "", status);
	displayChange_field("cittitulo", "", status);
	displayChange_field("citfecha", "", status);
	displayChange_field("agesecuen", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("cithoraini", "", status);
	displayChange_field("citduracion", "", status);
	displayChange_field("cithorafin", "", status);
	displayChange_field("hora_fin_mostrar", "", status);
	displayChange_field("citfactur", "", status);
	displayChange_field("info_documento", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("fclnumero", "", status);
	displayChange_field("paciente_nuevo", "", status);
	displayChange_field("cittipo", "", status);
	displayChange_field("label_ficha", "", status);
	displayChange_field("ficha_cliente", "", status);
	displayChange_field("editar_cita", "", status);
	displayChange_field("citcolor", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("prenumero", "", status);
	displayChange_field("nombre_presupuesto", "", status);
	displayChange_field("editar_presup", "", status);
	displayChange_field("info_documento_2", "", status);
}

function displayChange_block_4(status) {
	displayChange_field("citobserv", "", status);
	displayChange_field("cancelar_cita", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_citid(row, status);
	displayChange_field_cittitulo(row, status);
	displayChange_field_citfecha(row, status);
	displayChange_field_agesecuen(row, status);
	displayChange_field_cithoraini(row, status);
	displayChange_field_citduracion(row, status);
	displayChange_field_cithorafin(row, status);
	displayChange_field_hora_fin_mostrar(row, status);
	displayChange_field_citfactur(row, status);
	displayChange_field_info_documento(row, status);
	displayChange_field_fclnumero(row, status);
	displayChange_field_paciente_nuevo(row, status);
	displayChange_field_cittipo(row, status);
	displayChange_field_label_ficha(row, status);
	displayChange_field_ficha_cliente(row, status);
	displayChange_field_editar_cita(row, status);
	displayChange_field_citcolor(row, status);
	displayChange_field_prenumero(row, status);
	displayChange_field_nombre_presupuesto(row, status);
	displayChange_field_editar_presup(row, status);
	displayChange_field_info_documento_2(row, status);
	displayChange_field_citobserv(row, status);
	displayChange_field_cancelar_cita(row, status);
}

function displayChange_field(field, row, status) {
	if ("citid" == field) {
		displayChange_field_citid(row, status);
	}
	if ("cittitulo" == field) {
		displayChange_field_cittitulo(row, status);
	}
	if ("citfecha" == field) {
		displayChange_field_citfecha(row, status);
	}
	if ("agesecuen" == field) {
		displayChange_field_agesecuen(row, status);
	}
	if ("cithoraini" == field) {
		displayChange_field_cithoraini(row, status);
	}
	if ("citduracion" == field) {
		displayChange_field_citduracion(row, status);
	}
	if ("cithorafin" == field) {
		displayChange_field_cithorafin(row, status);
	}
	if ("hora_fin_mostrar" == field) {
		displayChange_field_hora_fin_mostrar(row, status);
	}
	if ("citfactur" == field) {
		displayChange_field_citfactur(row, status);
	}
	if ("info_documento" == field) {
		displayChange_field_info_documento(row, status);
	}
	if ("fclnumero" == field) {
		displayChange_field_fclnumero(row, status);
	}
	if ("paciente_nuevo" == field) {
		displayChange_field_paciente_nuevo(row, status);
	}
	if ("cittipo" == field) {
		displayChange_field_cittipo(row, status);
	}
	if ("label_ficha" == field) {
		displayChange_field_label_ficha(row, status);
	}
	if ("ficha_cliente" == field) {
		displayChange_field_ficha_cliente(row, status);
	}
	if ("editar_cita" == field) {
		displayChange_field_editar_cita(row, status);
	}
	if ("citcolor" == field) {
		displayChange_field_citcolor(row, status);
	}
	if ("prenumero" == field) {
		displayChange_field_prenumero(row, status);
	}
	if ("nombre_presupuesto" == field) {
		displayChange_field_nombre_presupuesto(row, status);
	}
	if ("editar_presup" == field) {
		displayChange_field_editar_presup(row, status);
	}
	if ("info_documento_2" == field) {
		displayChange_field_info_documento_2(row, status);
	}
	if ("citobserv" == field) {
		displayChange_field_citobserv(row, status);
	}
	if ("cancelar_cita" == field) {
		displayChange_field_cancelar_cita(row, status);
	}
}

function displayChange_field_citid(row, status) {
}

function displayChange_field_cittitulo(row, status) {
}

function displayChange_field_citfecha(row, status) {
}

function displayChange_field_agesecuen(row, status) {
}

function displayChange_field_cithoraini(row, status) {
}

function displayChange_field_citduracion(row, status) {
}

function displayChange_field_cithorafin(row, status) {
}

function displayChange_field_hora_fin_mostrar(row, status) {
}

function displayChange_field_citfactur(row, status) {
}

function displayChange_field_info_documento(row, status) {
}

function displayChange_field_fclnumero(row, status) {
}

function displayChange_field_paciente_nuevo(row, status) {
}

function displayChange_field_cittipo(row, status) {
}

function displayChange_field_label_ficha(row, status) {
}

function displayChange_field_ficha_cliente(row, status) {
}

function displayChange_field_editar_cita(row, status) {
}

function displayChange_field_citcolor(row, status) {
}

function displayChange_field_prenumero(row, status) {
}

function displayChange_field_nombre_presupuesto(row, status) {
}

function displayChange_field_editar_presup(row, status) {
}

function displayChange_field_info_documento_2(row, status) {
}

function displayChange_field_citobserv(row, status) {
}

function displayChange_field_cancelar_cita(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_calendar_cita_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(21);
		}
	}
}
$(function() {
    $("#id_sc_field_citperiod").on("change", function() {
		scCalendarPeriodChange();
    });
        scCalendarPeriodChange();
});

function scCalendarPeriodChange() {
	var selectedPeriod = $("#id_sc_field_citperiod").val();
	if ("D" == selectedPeriod) {
		$("#id_rinf_repeatin_citrecurrinfo").hide();
		$("#id_rinf_repeat_label_citrecurrinfo").html("<?php echo html_entity_decode($this->Ini->Nm_lang['lang_recur_repeat_days']) ?>");
	}
	else if ("W" == selectedPeriod) {
		$("#id_rinf_repeatin_citrecurrinfo").show();
		$("#id_rinf_repeat_label_citrecurrinfo").html("<?php echo html_entity_decode($this->Ini->Nm_lang['lang_recur_repeat_weeks']) ?>");
	}
	else if ("M" == selectedPeriod) {
		$("#id_rinf_repeatin_citrecurrinfo").hide();
		$("#id_rinf_repeat_label_citrecurrinfo").html("<?php echo html_entity_decode($this->Ini->Nm_lang['lang_recur_repeat_months']) ?>");
	}
	else if ("A" == selectedPeriod) {
		$("#id_rinf_repeatin_citrecurrinfo").hide();
		$("#id_rinf_repeat_label_citrecurrinfo").html("<?php echo html_entity_decode($this->Ini->Nm_lang['lang_recur_repeat_years']) ?>");
	}
}
function scEventControl_onCalculator_citrecurrinfo() {
  if (!_scCalculatorControl["id_sc_field_citrecurrinfo"]) {
    _scCalculatorBlurOk["id_sc_field_citrecurrinfo"] = true;
    do_ajax_calendar_cita_event_citrecurrinfo_onblur();
  }
} // scEventControl_onCalculator_citrecurrinfo

var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_citfecha" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_citfecha" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      setTimeout(function() { do_ajax_calendar_cita_validate_citfecha(iSeqRow); }, 200);
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
      do_ajax_calendar_cita_validate_citfeccrea(iSeqRow);
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
      do_ajax_calendar_cita_validate_citfecmodi(iSeqRow);
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
  $("#id_rinf_endin_citrecurrinfo" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_rinf_endin_citrecurrinfo" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
    },
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
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

var sc_jq_timepicker_value = {};

function scJQTimePickerAdd(iSeqRow) {
  $("#id_sc_field_cithoraini" + iSeqRow).timepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_timepicker_value["#id_sc_field_cithoraini" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      if (sc_jq_timepicker_value["#id_sc_field_cithoraini" + iSeqRow] != dateText) {
        $("#id_sc_field_cithoraini" + iSeqRow).trigger('change');
      }
    },
    hourText: "<?php   echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_hour'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    minuteText: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_mint'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    timeSeparator: ":",
  });

} // scJQTimePickerAdd

function scJQSpinAdd(iSeqRow) {
  $("#id_sc_field_citduracion" + iSeqRow).spinner({
    max: 99999999999,
    min: 5,
    step: 5,
    page: 5,
    change: function(event, ui) {
      $(this).trigger("change");
    },
    stop: function(event, ui) {
      $(this).trigger("change");
    }
  });
} // scJQSpinAdd

function scJQPopupAdd(iSeqRow) {
  $('.scFormPopupBubble' + iSeqRow).each(function() {
    var distance = 10;
    var time = 250;
    var hideDelay = 500;
    var hideDelayTimer = null;
    var beingShown = false;
    var shown = false;
    var trigger = $('.scFormPopupTrigger', this);
    var info = $('.scFormPopup', this).css('opacity', 0);
    $([trigger.get(0), info.get(0)]).mouseover(function() {
      if (hideDelayTimer) clearTimeout(hideDelayTimer);
      if (beingShown || shown) {
        // don't trigger the animation again
        return;
      } else {
        // reset position of info box
        beingShown = true;
        info.css({
          top: trigger.position().top - (info.height() - trigger.height()),
          left: trigger.position().left - ((info.width() - trigger.width()) / 2),
          display: 'block'
        }).animate({
          top: '-=' + distance + 'px',
          opacity: 1
        }, time, 'swing', function() {
          beingShown = false;
          shown = true;
        });
      }
      return false;
      }).mouseout(function() {
      if (hideDelayTimer) clearTimeout(hideDelayTimer);
      hideDelayTimer = setTimeout(function() {
        hideDelayTimer = null;
        info.animate({
          top: '-=' + distance + 'px',
          opacity: 0
        }, time, 'swing', function() {
          shown = false;
          info.css('display', 'none');
        });
      }, hideDelay);
      return false;
    });
  });
} // scJQPopupAdd

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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'calendar_cita')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  scJQTimePickerAdd(iLine);
  scJQSpinAdd(iLine);
  scJQPopupAdd(iLine);
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

