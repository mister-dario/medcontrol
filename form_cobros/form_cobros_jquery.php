
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
  scEventControl_data["cobfecha" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cobvalefec" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cobvalcheq" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cobvaltarjcred" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cobvaltransf" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cobvalretfte" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cobvaltotal" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cobvalcruz" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["saldo_favor" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cobanula" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cobnumcheq" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cobbancheq" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tcrcodigo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cobnumtarjcred" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cobbantransf" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cobctatransf" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["detalle_cobro" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["fclnumero" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclnumero" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cobfecha" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cobfecha" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cobvalefec" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cobvalefec" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cobvalcheq" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cobvalcheq" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cobvaltarjcred" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cobvaltarjcred" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cobvaltransf" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cobvaltransf" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cobvalretfte" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cobvalretfte" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cobvaltotal" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cobvaltotal" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cobvalcruz" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cobvalcruz" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["saldo_favor" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["saldo_favor" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cobanula" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cobanula" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cobnumcheq" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cobnumcheq" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cobbancheq" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cobbancheq" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tcrcodigo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tcrcodigo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cobnumtarjcred" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cobnumtarjcred" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cobbantransf" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cobbantransf" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cobctatransf" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cobctatransf" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["detalle_cobro" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detalle_cobro" + iSeqRow]["change"]) {
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
  if ("cobanula" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tcrcodigo" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("emiruc" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
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
  $('#id_sc_field_emiruc' + iSeqRow).bind('change', function() { sc_form_cobros_emiruc_onchange(this, iSeqRow) });
  $('#id_sc_field_cobnumero' + iSeqRow).bind('change', function() { sc_form_cobros_cobnumero_onchange(this, iSeqRow) });
  $('#id_sc_field_fclnumero' + iSeqRow).bind('blur', function() { sc_form_cobros_fclnumero_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_cobros_fclnumero_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_cobros_fclnumero_onfocus(this, iSeqRow) });
  $('#id_sc_field_cobfecha' + iSeqRow).bind('blur', function() { sc_form_cobros_cobfecha_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_cobros_cobfecha_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_cobros_cobfecha_onfocus(this, iSeqRow) });
  $('#id_sc_field_cobvalefec' + iSeqRow).bind('blur', function() { sc_form_cobros_cobvalefec_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_cobros_cobvalefec_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_cobros_cobvalefec_onfocus(this, iSeqRow) });
  $('#id_sc_field_cobvalcheq' + iSeqRow).bind('blur', function() { sc_form_cobros_cobvalcheq_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_cobros_cobvalcheq_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_cobros_cobvalcheq_onfocus(this, iSeqRow) });
  $('#id_sc_field_cobvaltarjcred' + iSeqRow).bind('blur', function() { sc_form_cobros_cobvaltarjcred_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_cobros_cobvaltarjcred_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_cobros_cobvaltarjcred_onfocus(this, iSeqRow) });
  $('#id_sc_field_cobvaltransf' + iSeqRow).bind('blur', function() { sc_form_cobros_cobvaltransf_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_cobros_cobvaltransf_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_cobros_cobvaltransf_onfocus(this, iSeqRow) });
  $('#id_sc_field_cobvalretfte' + iSeqRow).bind('blur', function() { sc_form_cobros_cobvalretfte_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_cobros_cobvalretfte_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_cobros_cobvalretfte_onfocus(this, iSeqRow) });
  $('#id_sc_field_cobvaltotal' + iSeqRow).bind('blur', function() { sc_form_cobros_cobvaltotal_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_cobros_cobvaltotal_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_cobros_cobvaltotal_onfocus(this, iSeqRow) });
  $('#id_sc_field_cobnumcheq' + iSeqRow).bind('blur', function() { sc_form_cobros_cobnumcheq_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_cobros_cobnumcheq_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_cobros_cobnumcheq_onfocus(this, iSeqRow) });
  $('#id_sc_field_cobbancheq' + iSeqRow).bind('blur', function() { sc_form_cobros_cobbancheq_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_cobros_cobbancheq_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_cobros_cobbancheq_onfocus(this, iSeqRow) });
  $('#id_sc_field_tcrcodigo' + iSeqRow).bind('blur', function() { sc_form_cobros_tcrcodigo_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_cobros_tcrcodigo_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_cobros_tcrcodigo_onfocus(this, iSeqRow) });
  $('#id_sc_field_cobnumtarjcred' + iSeqRow).bind('blur', function() { sc_form_cobros_cobnumtarjcred_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_cobros_cobnumtarjcred_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_cobros_cobnumtarjcred_onfocus(this, iSeqRow) });
  $('#id_sc_field_cobbantransf' + iSeqRow).bind('blur', function() { sc_form_cobros_cobbantransf_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_cobros_cobbantransf_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_cobros_cobbantransf_onfocus(this, iSeqRow) });
  $('#id_sc_field_cobctatransf' + iSeqRow).bind('blur', function() { sc_form_cobros_cobctatransf_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_cobros_cobctatransf_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_cobros_cobctatransf_onfocus(this, iSeqRow) });
  $('#id_sc_field_cobvalcruz' + iSeqRow).bind('blur', function() { sc_form_cobros_cobvalcruz_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_cobros_cobvalcruz_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_cobros_cobvalcruz_onfocus(this, iSeqRow) });
  $('#id_sc_field_cobanula' + iSeqRow).bind('blur', function() { sc_form_cobros_cobanula_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_cobros_cobanula_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_cobros_cobanula_onfocus(this, iSeqRow) });
  $('#id_sc_field_cobfecanula' + iSeqRow).bind('change', function() { sc_form_cobros_cobfecanula_onchange(this, iSeqRow) });
  $('#id_sc_field_cobfecanula_hora' + iSeqRow).bind('change', function() { sc_form_cobros_cobfecanula_hora_onchange(this, iSeqRow) });
  $('#id_sc_field_cobusucrea' + iSeqRow).bind('change', function() { sc_form_cobros_cobusucrea_onchange(this, iSeqRow) });
  $('#id_sc_field_detalle_cobro' + iSeqRow).bind('blur', function() { sc_form_cobros_detalle_cobro_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_cobros_detalle_cobro_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_cobros_detalle_cobro_onfocus(this, iSeqRow) });
  $('#id_sc_field_saldo_favor' + iSeqRow).bind('blur', function() { sc_form_cobros_saldo_favor_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_cobros_saldo_favor_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_cobros_saldo_favor_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_cobros_emiruc_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cobros_cobnumero_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cobros_fclnumero_onblur(oThis, iSeqRow) {
  do_ajax_form_cobros_validate_fclnumero();
  scCssBlur(oThis);
}

function sc_form_cobros_fclnumero_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cobros_fclnumero_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cobros_cobfecha_onblur(oThis, iSeqRow) {
  do_ajax_form_cobros_validate_cobfecha();
  scCssBlur(oThis);
}

function sc_form_cobros_cobfecha_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cobros_cobfecha_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cobros_cobvalefec_onblur(oThis, iSeqRow) {
  do_ajax_form_cobros_validate_cobvalefec();
  scCssBlur(oThis);
}

function sc_form_cobros_cobvalefec_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cobros_cobvalefec_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cobros_cobvalcheq_onblur(oThis, iSeqRow) {
  do_ajax_form_cobros_validate_cobvalcheq();
  scCssBlur(oThis);
}

function sc_form_cobros_cobvalcheq_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cobros_cobvalcheq_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cobros_cobvaltarjcred_onblur(oThis, iSeqRow) {
  do_ajax_form_cobros_validate_cobvaltarjcred();
  scCssBlur(oThis);
}

function sc_form_cobros_cobvaltarjcred_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cobros_cobvaltarjcred_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cobros_cobvaltransf_onblur(oThis, iSeqRow) {
  do_ajax_form_cobros_validate_cobvaltransf();
  scCssBlur(oThis);
}

function sc_form_cobros_cobvaltransf_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cobros_cobvaltransf_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cobros_cobvalretfte_onblur(oThis, iSeqRow) {
  do_ajax_form_cobros_validate_cobvalretfte();
  scCssBlur(oThis);
}

function sc_form_cobros_cobvalretfte_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cobros_cobvalretfte_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cobros_cobvaltotal_onblur(oThis, iSeqRow) {
  do_ajax_form_cobros_validate_cobvaltotal();
  scCssBlur(oThis);
}

function sc_form_cobros_cobvaltotal_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cobros_cobvaltotal_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cobros_cobnumcheq_onblur(oThis, iSeqRow) {
  do_ajax_form_cobros_validate_cobnumcheq();
  scCssBlur(oThis);
}

function sc_form_cobros_cobnumcheq_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cobros_cobnumcheq_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cobros_cobbancheq_onblur(oThis, iSeqRow) {
  do_ajax_form_cobros_validate_cobbancheq();
  scCssBlur(oThis);
}

function sc_form_cobros_cobbancheq_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cobros_cobbancheq_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cobros_tcrcodigo_onblur(oThis, iSeqRow) {
  do_ajax_form_cobros_validate_tcrcodigo();
  scCssBlur(oThis);
}

function sc_form_cobros_tcrcodigo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cobros_tcrcodigo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cobros_cobnumtarjcred_onblur(oThis, iSeqRow) {
  do_ajax_form_cobros_validate_cobnumtarjcred();
  scCssBlur(oThis);
}

function sc_form_cobros_cobnumtarjcred_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cobros_cobnumtarjcred_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cobros_cobbantransf_onblur(oThis, iSeqRow) {
  do_ajax_form_cobros_validate_cobbantransf();
  scCssBlur(oThis);
}

function sc_form_cobros_cobbantransf_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cobros_cobbantransf_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cobros_cobctatransf_onblur(oThis, iSeqRow) {
  do_ajax_form_cobros_validate_cobctatransf();
  scCssBlur(oThis);
}

function sc_form_cobros_cobctatransf_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cobros_cobctatransf_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cobros_cobvalcruz_onblur(oThis, iSeqRow) {
  do_ajax_form_cobros_validate_cobvalcruz();
  scCssBlur(oThis);
}

function sc_form_cobros_cobvalcruz_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cobros_cobvalcruz_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cobros_cobanula_onblur(oThis, iSeqRow) {
  do_ajax_form_cobros_validate_cobanula();
  scCssBlur(oThis);
}

function sc_form_cobros_cobanula_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cobros_cobanula_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cobros_cobfecanula_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cobros_cobfecanula_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cobros_cobusucrea_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cobros_detalle_cobro_onblur(oThis, iSeqRow) {
  do_ajax_form_cobros_validate_detalle_cobro();
  scCssBlur(oThis);
}

function sc_form_cobros_detalle_cobro_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cobros_detalle_cobro_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cobros_saldo_favor_onblur(oThis, iSeqRow) {
  do_ajax_form_cobros_validate_saldo_favor();
  scCssBlur(oThis);
}

function sc_form_cobros_saldo_favor_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cobros_saldo_favor_onfocus(oThis, iSeqRow) {
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
}

function displayChange_block_0(status) {
	displayChange_field("fclnumero", "", status);
	displayChange_field("cobfecha", "", status);
	displayChange_field("cobvalefec", "", status);
	displayChange_field("cobvalcheq", "", status);
	displayChange_field("cobvaltarjcred", "", status);
	displayChange_field("cobvaltransf", "", status);
	displayChange_field("cobvalretfte", "", status);
	displayChange_field("cobvaltotal", "", status);
	displayChange_field("cobvalcruz", "", status);
	displayChange_field("saldo_favor", "", status);
	displayChange_field("cobanula", "", status);
	displayChange_field("cobnumcheq", "", status);
	displayChange_field("cobbancheq", "", status);
	displayChange_field("tcrcodigo", "", status);
	displayChange_field("cobnumtarjcred", "", status);
	displayChange_field("cobbantransf", "", status);
	displayChange_field("cobctatransf", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("detalle_cobro", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_fclnumero(row, status);
	displayChange_field_cobfecha(row, status);
	displayChange_field_cobvalefec(row, status);
	displayChange_field_cobvalcheq(row, status);
	displayChange_field_cobvaltarjcred(row, status);
	displayChange_field_cobvaltransf(row, status);
	displayChange_field_cobvalretfte(row, status);
	displayChange_field_cobvaltotal(row, status);
	displayChange_field_cobvalcruz(row, status);
	displayChange_field_saldo_favor(row, status);
	displayChange_field_cobanula(row, status);
	displayChange_field_cobnumcheq(row, status);
	displayChange_field_cobbancheq(row, status);
	displayChange_field_tcrcodigo(row, status);
	displayChange_field_cobnumtarjcred(row, status);
	displayChange_field_cobbantransf(row, status);
	displayChange_field_cobctatransf(row, status);
	displayChange_field_detalle_cobro(row, status);
}

function displayChange_field(field, row, status) {
	if ("fclnumero" == field) {
		displayChange_field_fclnumero(row, status);
	}
	if ("cobfecha" == field) {
		displayChange_field_cobfecha(row, status);
	}
	if ("cobvalefec" == field) {
		displayChange_field_cobvalefec(row, status);
	}
	if ("cobvalcheq" == field) {
		displayChange_field_cobvalcheq(row, status);
	}
	if ("cobvaltarjcred" == field) {
		displayChange_field_cobvaltarjcred(row, status);
	}
	if ("cobvaltransf" == field) {
		displayChange_field_cobvaltransf(row, status);
	}
	if ("cobvalretfte" == field) {
		displayChange_field_cobvalretfte(row, status);
	}
	if ("cobvaltotal" == field) {
		displayChange_field_cobvaltotal(row, status);
	}
	if ("cobvalcruz" == field) {
		displayChange_field_cobvalcruz(row, status);
	}
	if ("saldo_favor" == field) {
		displayChange_field_saldo_favor(row, status);
	}
	if ("cobanula" == field) {
		displayChange_field_cobanula(row, status);
	}
	if ("cobnumcheq" == field) {
		displayChange_field_cobnumcheq(row, status);
	}
	if ("cobbancheq" == field) {
		displayChange_field_cobbancheq(row, status);
	}
	if ("tcrcodigo" == field) {
		displayChange_field_tcrcodigo(row, status);
	}
	if ("cobnumtarjcred" == field) {
		displayChange_field_cobnumtarjcred(row, status);
	}
	if ("cobbantransf" == field) {
		displayChange_field_cobbantransf(row, status);
	}
	if ("cobctatransf" == field) {
		displayChange_field_cobctatransf(row, status);
	}
	if ("detalle_cobro" == field) {
		displayChange_field_detalle_cobro(row, status);
	}
}

function displayChange_field_fclnumero(row, status) {
}

function displayChange_field_cobfecha(row, status) {
}

function displayChange_field_cobvalefec(row, status) {
}

function displayChange_field_cobvalcheq(row, status) {
}

function displayChange_field_cobvaltarjcred(row, status) {
}

function displayChange_field_cobvaltransf(row, status) {
}

function displayChange_field_cobvalretfte(row, status) {
}

function displayChange_field_cobvaltotal(row, status) {
}

function displayChange_field_cobvalcruz(row, status) {
}

function displayChange_field_saldo_favor(row, status) {
}

function displayChange_field_cobanula(row, status) {
}

function displayChange_field_cobnumcheq(row, status) {
}

function displayChange_field_cobbancheq(row, status) {
}

function displayChange_field_tcrcodigo(row, status) {
}

function displayChange_field_cobnumtarjcred(row, status) {
}

function displayChange_field_cobbantransf(row, status) {
}

function displayChange_field_cobctatransf(row, status) {
}

function displayChange_field_detalle_cobro(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_grid_detalle_cobro")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_grid_detalle_cobro")[0].contentWindow.scRecreateSelect2();
	}
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_cobros_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(19);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_cobfecha" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_cobfecha" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      setTimeout(function() { do_ajax_form_cobros_validate_cobfecha(iSeqRow); }, 200);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['cobfecha']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_cobfecanula" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_cobfecanula" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['cobfecanula']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['cobfecanula']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_cobros_validate_cobfecanula(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['cobfecanula']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_cobros')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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

