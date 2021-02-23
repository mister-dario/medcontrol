
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
  scEventControl_data["cliente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["edad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hisfecha" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["medcodigo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["espcodigo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclnumero" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hispeso" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hisaltura" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["histemperatura" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hispulso" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hisfrecresp" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hispresart" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hisfumador" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hisembaraz" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hisedad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hisenfmed" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hisanteced" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hishistoria" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hisevolucion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hisusucrea" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hisfeccrea" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["cliente" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cliente" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["edad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["edad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hisfecha" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hisfecha" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["medcodigo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["medcodigo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["espcodigo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["espcodigo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclnumero" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclnumero" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hispeso" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hispeso" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hisaltura" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hisaltura" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["histemperatura" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["histemperatura" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hispulso" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hispulso" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hisfrecresp" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hisfrecresp" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hispresart" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hispresart" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hisfumador" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hisfumador" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hisembaraz" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hisembaraz" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hisedad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hisedad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hisenfmed" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hisenfmed" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hisanteced" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hisanteced" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hishistoria" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hishistoria" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hisevolucion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hisevolucion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hisusucrea" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hisusucrea" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hisfeccrea" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hisfeccrea" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["medcodigo" + iSeqRow]["autocomp"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("espcodigo" + iSeq == fieldName) {
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
  $('#id_sc_field_hissecuen' + iSeqRow).bind('change', function() { sc_form_historia_hissecuen_onchange(this, iSeqRow) });
  $('#id_sc_field_fclnumero' + iSeqRow).bind('blur', function() { sc_form_historia_fclnumero_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_historia_fclnumero_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_historia_fclnumero_onfocus(this, iSeqRow) });
  $('#id_sc_field_hisfecha' + iSeqRow).bind('blur', function() { sc_form_historia_hisfecha_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_historia_hisfecha_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_historia_hisfecha_onfocus(this, iSeqRow) });
  $('#id_sc_field_medcodigo' + iSeqRow).bind('blur', function() { sc_form_historia_medcodigo_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_historia_medcodigo_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_historia_medcodigo_onfocus(this, iSeqRow) });
  $('#id_sc_field_espcodigo' + iSeqRow).bind('blur', function() { sc_form_historia_espcodigo_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_historia_espcodigo_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_historia_espcodigo_onfocus(this, iSeqRow) });
  $('#id_sc_field_hispeso' + iSeqRow).bind('blur', function() { sc_form_historia_hispeso_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_historia_hispeso_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_historia_hispeso_onfocus(this, iSeqRow) });
  $('#id_sc_field_hisaltura' + iSeqRow).bind('blur', function() { sc_form_historia_hisaltura_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_historia_hisaltura_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_historia_hisaltura_onfocus(this, iSeqRow) });
  $('#id_sc_field_histemperatura' + iSeqRow).bind('blur', function() { sc_form_historia_histemperatura_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_historia_histemperatura_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_historia_histemperatura_onfocus(this, iSeqRow) });
  $('#id_sc_field_hispulso' + iSeqRow).bind('blur', function() { sc_form_historia_hispulso_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_historia_hispulso_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_historia_hispulso_onfocus(this, iSeqRow) });
  $('#id_sc_field_hisfrecresp' + iSeqRow).bind('blur', function() { sc_form_historia_hisfrecresp_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_historia_hisfrecresp_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_historia_hisfrecresp_onfocus(this, iSeqRow) });
  $('#id_sc_field_hispresart' + iSeqRow).bind('blur', function() { sc_form_historia_hispresart_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_historia_hispresart_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_historia_hispresart_onfocus(this, iSeqRow) });
  $('#id_sc_field_hisembaraz' + iSeqRow).bind('blur', function() { sc_form_historia_hisembaraz_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_historia_hisembaraz_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_historia_hisembaraz_onfocus(this, iSeqRow) });
  $('#id_sc_field_hisfumador' + iSeqRow).bind('blur', function() { sc_form_historia_hisfumador_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_historia_hisfumador_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_historia_hisfumador_onfocus(this, iSeqRow) });
  $('#id_sc_field_hisedad' + iSeqRow).bind('blur', function() { sc_form_historia_hisedad_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_historia_hisedad_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_historia_hisedad_onfocus(this, iSeqRow) });
  $('#id_sc_field_hisenfmed' + iSeqRow).bind('blur', function() { sc_form_historia_hisenfmed_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_historia_hisenfmed_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_historia_hisenfmed_onfocus(this, iSeqRow) });
  $('#id_sc_field_hisanteced' + iSeqRow).bind('blur', function() { sc_form_historia_hisanteced_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_historia_hisanteced_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_historia_hisanteced_onfocus(this, iSeqRow) });
  $('#id_sc_field_hishistoria' + iSeqRow).bind('blur', function() { sc_form_historia_hishistoria_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_historia_hishistoria_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_historia_hishistoria_onfocus(this, iSeqRow) });
  $('#id_sc_field_hisevolucion' + iSeqRow).bind('blur', function() { sc_form_historia_hisevolucion_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_historia_hisevolucion_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_historia_hisevolucion_onfocus(this, iSeqRow) });
  $('#id_sc_field_hisusucrea' + iSeqRow).bind('blur', function() { sc_form_historia_hisusucrea_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_historia_hisusucrea_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_historia_hisusucrea_onfocus(this, iSeqRow) });
  $('#id_sc_field_hisusumodi' + iSeqRow).bind('change', function() { sc_form_historia_hisusumodi_onchange(this, iSeqRow) });
  $('#id_sc_field_hisfeccrea' + iSeqRow).bind('blur', function() { sc_form_historia_hisfeccrea_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_historia_hisfeccrea_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_historia_hisfeccrea_onfocus(this, iSeqRow) });
  $('#id_sc_field_hisfeccrea_hora' + iSeqRow).bind('blur', function() { sc_form_historia_hisfeccrea_hora_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_historia_hisfeccrea_hora_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_historia_hisfeccrea_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_hisfecmodi' + iSeqRow).bind('change', function() { sc_form_historia_hisfecmodi_onchange(this, iSeqRow) });
  $('#id_sc_field_hisfecmodi_hora' + iSeqRow).bind('change', function() { sc_form_historia_hisfecmodi_hora_onchange(this, iSeqRow) });
  $('#id_sc_field_cliente' + iSeqRow).bind('blur', function() { sc_form_historia_cliente_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_historia_cliente_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_historia_cliente_onfocus(this, iSeqRow) });
  $('#id_sc_field_edad' + iSeqRow).bind('blur', function() { sc_form_historia_edad_onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_historia_edad_onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_historia_edad_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_historia_hissecuen_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_historia_fclnumero_onblur(oThis, iSeqRow) {
  do_ajax_form_historia_validate_fclnumero();
  scCssBlur(oThis);
}

function sc_form_historia_fclnumero_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_historia_fclnumero_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_historia_hisfecha_onblur(oThis, iSeqRow) {
  do_ajax_form_historia_validate_hisfecha();
  scCssBlur(oThis);
}

function sc_form_historia_hisfecha_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_historia_hisfecha_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_historia_medcodigo_onblur(oThis, iSeqRow) {
  do_ajax_form_historia_validate_medcodigo();
  scCssBlur(oThis);
}

function sc_form_historia_medcodigo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_historia_refresh_medcodigo();
}

function sc_form_historia_medcodigo_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_historia_espcodigo_onblur(oThis, iSeqRow) {
  do_ajax_form_historia_validate_espcodigo();
  scCssBlur(oThis);
}

function sc_form_historia_espcodigo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_historia_espcodigo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_historia_hispeso_onblur(oThis, iSeqRow) {
  do_ajax_form_historia_validate_hispeso();
  scCssBlur(oThis);
}

function sc_form_historia_hispeso_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_historia_hispeso_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_historia_hisaltura_onblur(oThis, iSeqRow) {
  do_ajax_form_historia_validate_hisaltura();
  scCssBlur(oThis);
}

function sc_form_historia_hisaltura_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_historia_hisaltura_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_historia_histemperatura_onblur(oThis, iSeqRow) {
  do_ajax_form_historia_validate_histemperatura();
  scCssBlur(oThis);
}

function sc_form_historia_histemperatura_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_historia_histemperatura_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_historia_hispulso_onblur(oThis, iSeqRow) {
  do_ajax_form_historia_validate_hispulso();
  scCssBlur(oThis);
}

function sc_form_historia_hispulso_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_historia_hispulso_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_historia_hisfrecresp_onblur(oThis, iSeqRow) {
  do_ajax_form_historia_validate_hisfrecresp();
  scCssBlur(oThis);
}

function sc_form_historia_hisfrecresp_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_historia_hisfrecresp_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_historia_hispresart_onblur(oThis, iSeqRow) {
  do_ajax_form_historia_validate_hispresart();
  scCssBlur(oThis);
}

function sc_form_historia_hispresart_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_historia_hispresart_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_historia_hisembaraz_onblur(oThis, iSeqRow) {
  do_ajax_form_historia_validate_hisembaraz();
  scCssBlur(oThis);
}

function sc_form_historia_hisembaraz_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_historia_hisembaraz_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_historia_hisfumador_onblur(oThis, iSeqRow) {
  do_ajax_form_historia_validate_hisfumador();
  scCssBlur(oThis);
}

function sc_form_historia_hisfumador_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_historia_hisfumador_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_historia_hisedad_onblur(oThis, iSeqRow) {
  do_ajax_form_historia_validate_hisedad();
  scCssBlur(oThis);
}

function sc_form_historia_hisedad_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_historia_hisedad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_historia_hisenfmed_onblur(oThis, iSeqRow) {
  do_ajax_form_historia_validate_hisenfmed();
  scCssBlur(oThis);
}

function sc_form_historia_hisenfmed_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_historia_hisenfmed_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_historia_hisanteced_onblur(oThis, iSeqRow) {
  do_ajax_form_historia_validate_hisanteced();
  scCssBlur(oThis);
}

function sc_form_historia_hisanteced_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_historia_hisanteced_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_historia_hishistoria_onblur(oThis, iSeqRow) {
  do_ajax_form_historia_validate_hishistoria();
  scCssBlur(oThis);
}

function sc_form_historia_hishistoria_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_historia_hishistoria_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_historia_hisevolucion_onblur(oThis, iSeqRow) {
  do_ajax_form_historia_validate_hisevolucion();
  scCssBlur(oThis);
}

function sc_form_historia_hisevolucion_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_historia_hisevolucion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_historia_hisusucrea_onblur(oThis, iSeqRow) {
  do_ajax_form_historia_validate_hisusucrea();
  scCssBlur(oThis);
}

function sc_form_historia_hisusucrea_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_historia_hisusucrea_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_historia_hisusumodi_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_historia_hisfeccrea_onblur(oThis, iSeqRow) {
  do_ajax_form_historia_validate_hisfeccrea();
  scCssBlur(oThis);
}

function sc_form_historia_hisfeccrea_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_historia_validate_hisfeccrea();
  scCssBlur(oThis);
}

function sc_form_historia_hisfeccrea_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_historia_hisfeccrea_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_historia_hisfeccrea_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_historia_hisfeccrea_hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_historia_hisfecmodi_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_historia_hisfecmodi_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_historia_cliente_onblur(oThis, iSeqRow) {
  do_ajax_form_historia_validate_cliente();
  scCssBlur(oThis);
}

function sc_form_historia_cliente_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_historia_cliente_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_historia_edad_onblur(oThis, iSeqRow) {
  do_ajax_form_historia_validate_edad();
  scCssBlur(oThis);
}

function sc_form_historia_edad_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_historia_edad_onfocus(oThis, iSeqRow) {
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
	displayChange_field("cliente", "", status);
	displayChange_field("edad", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("hisfecha", "", status);
	displayChange_field("medcodigo", "", status);
	displayChange_field("espcodigo", "", status);
	displayChange_field("fclnumero", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("hispeso", "", status);
	displayChange_field("hisaltura", "", status);
	displayChange_field("histemperatura", "", status);
	displayChange_field("hispulso", "", status);
	displayChange_field("hisfrecresp", "", status);
	displayChange_field("hispresart", "", status);
	displayChange_field("hisfumador", "", status);
	displayChange_field("hisembaraz", "", status);
	displayChange_field("hisedad", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("hisenfmed", "", status);
	displayChange_field("hisanteced", "", status);
	displayChange_field("hishistoria", "", status);
	displayChange_field("hisevolucion", "", status);
}

function displayChange_block_4(status) {
	displayChange_field("hisusucrea", "", status);
	displayChange_field("hisfeccrea", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_cliente(row, status);
	displayChange_field_edad(row, status);
	displayChange_field_hisfecha(row, status);
	displayChange_field_medcodigo(row, status);
	displayChange_field_espcodigo(row, status);
	displayChange_field_fclnumero(row, status);
	displayChange_field_hispeso(row, status);
	displayChange_field_hisaltura(row, status);
	displayChange_field_histemperatura(row, status);
	displayChange_field_hispulso(row, status);
	displayChange_field_hisfrecresp(row, status);
	displayChange_field_hispresart(row, status);
	displayChange_field_hisfumador(row, status);
	displayChange_field_hisembaraz(row, status);
	displayChange_field_hisedad(row, status);
	displayChange_field_hisenfmed(row, status);
	displayChange_field_hisanteced(row, status);
	displayChange_field_hishistoria(row, status);
	displayChange_field_hisevolucion(row, status);
	displayChange_field_hisusucrea(row, status);
	displayChange_field_hisfeccrea(row, status);
}

function displayChange_field(field, row, status) {
	if ("cliente" == field) {
		displayChange_field_cliente(row, status);
	}
	if ("edad" == field) {
		displayChange_field_edad(row, status);
	}
	if ("hisfecha" == field) {
		displayChange_field_hisfecha(row, status);
	}
	if ("medcodigo" == field) {
		displayChange_field_medcodigo(row, status);
	}
	if ("espcodigo" == field) {
		displayChange_field_espcodigo(row, status);
	}
	if ("fclnumero" == field) {
		displayChange_field_fclnumero(row, status);
	}
	if ("hispeso" == field) {
		displayChange_field_hispeso(row, status);
	}
	if ("hisaltura" == field) {
		displayChange_field_hisaltura(row, status);
	}
	if ("histemperatura" == field) {
		displayChange_field_histemperatura(row, status);
	}
	if ("hispulso" == field) {
		displayChange_field_hispulso(row, status);
	}
	if ("hisfrecresp" == field) {
		displayChange_field_hisfrecresp(row, status);
	}
	if ("hispresart" == field) {
		displayChange_field_hispresart(row, status);
	}
	if ("hisfumador" == field) {
		displayChange_field_hisfumador(row, status);
	}
	if ("hisembaraz" == field) {
		displayChange_field_hisembaraz(row, status);
	}
	if ("hisedad" == field) {
		displayChange_field_hisedad(row, status);
	}
	if ("hisenfmed" == field) {
		displayChange_field_hisenfmed(row, status);
	}
	if ("hisanteced" == field) {
		displayChange_field_hisanteced(row, status);
	}
	if ("hishistoria" == field) {
		displayChange_field_hishistoria(row, status);
	}
	if ("hisevolucion" == field) {
		displayChange_field_hisevolucion(row, status);
	}
	if ("hisusucrea" == field) {
		displayChange_field_hisusucrea(row, status);
	}
	if ("hisfeccrea" == field) {
		displayChange_field_hisfeccrea(row, status);
	}
}

function displayChange_field_cliente(row, status) {
}

function displayChange_field_edad(row, status) {
}

function displayChange_field_hisfecha(row, status) {
}

function displayChange_field_medcodigo(row, status) {
}

function displayChange_field_espcodigo(row, status) {
}

function displayChange_field_fclnumero(row, status) {
}

function displayChange_field_hispeso(row, status) {
}

function displayChange_field_hisaltura(row, status) {
}

function displayChange_field_histemperatura(row, status) {
}

function displayChange_field_hispulso(row, status) {
}

function displayChange_field_hisfrecresp(row, status) {
}

function displayChange_field_hispresart(row, status) {
}

function displayChange_field_hisfumador(row, status) {
}

function displayChange_field_hisembaraz(row, status) {
}

function displayChange_field_hisedad(row, status) {
}

function displayChange_field_hisenfmed(row, status) {
}

function displayChange_field_hisanteced(row, status) {
}

function displayChange_field_hishistoria(row, status) {
}

function displayChange_field_hisevolucion(row, status) {
}

function displayChange_field_hisusucrea(row, status) {
}

function displayChange_field_hisfeccrea(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_historia_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(21);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_hisfecha" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_hisfecha" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      setTimeout(function() { do_ajax_form_historia_validate_hisfecha(iSeqRow); }, 200);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['hisfecha']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_hisfeccrea" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_hisfeccrea" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['hisfeccrea']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['hisfeccrea']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_historia_validate_hisfeccrea(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['hisfeccrea']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_hisfecmodi" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_hisfecmodi" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['hisfecmodi']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['hisfecmodi']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_historia_validate_hisfecmodi(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['hisfecmodi']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_historia')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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

