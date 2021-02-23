
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
  scEventControl_data["prenumero" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["prenombre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["preestado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["medcodigo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["preobserv" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclnumero" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["preusucrea" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["prefeccrea" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["preusumodi" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["prefecmodi" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["total" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["total_realizado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["total_faltante" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["detalle" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["cliente" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cliente" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["prenumero" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["prenumero" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["prenombre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["prenombre" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["preestado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["preestado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["medcodigo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["medcodigo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["preobserv" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["preobserv" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclnumero" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclnumero" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["preusucrea" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["preusucrea" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["prefeccrea" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["prefeccrea" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["preusumodi" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["preusumodi" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["prefecmodi" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["prefecmodi" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["total" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["total" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["total_realizado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["total_realizado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["total_faltante" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["total_faltante" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["detalle" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detalle" + iSeqRow]["change"]) {
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
  if ("preestado" + iSeq == fieldName) {
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
  $('#id_sc_field_prenumero' + iSeqRow).bind('blur', function() { sc_form_presupuesto_prenumero_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_presupuesto_prenumero_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_presupuesto_prenumero_onfocus(this, iSeqRow) });
  $('#id_sc_field_prenombre' + iSeqRow).bind('blur', function() { sc_form_presupuesto_prenombre_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_presupuesto_prenombre_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_presupuesto_prenombre_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclnumero' + iSeqRow).bind('blur', function() { sc_form_presupuesto_fclnumero_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_presupuesto_fclnumero_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_presupuesto_fclnumero_onfocus(this, iSeqRow) });
  $('#id_sc_field_medcodigo' + iSeqRow).bind('blur', function() { sc_form_presupuesto_medcodigo_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_presupuesto_medcodigo_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_presupuesto_medcodigo_onfocus(this, iSeqRow) });
  $('#id_sc_field_preestado' + iSeqRow).bind('blur', function() { sc_form_presupuesto_preestado_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_presupuesto_preestado_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_presupuesto_preestado_onfocus(this, iSeqRow) });
  $('#id_sc_field_preobserv' + iSeqRow).bind('blur', function() { sc_form_presupuesto_preobserv_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_presupuesto_preobserv_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_presupuesto_preobserv_onfocus(this, iSeqRow) });
  $('#id_sc_field_preusucrea' + iSeqRow).bind('blur', function() { sc_form_presupuesto_preusucrea_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_presupuesto_preusucrea_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_presupuesto_preusucrea_onfocus(this, iSeqRow) });
  $('#id_sc_field_preusumodi' + iSeqRow).bind('blur', function() { sc_form_presupuesto_preusumodi_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_presupuesto_preusumodi_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_presupuesto_preusumodi_onfocus(this, iSeqRow) });
  $('#id_sc_field_prefeccrea' + iSeqRow).bind('blur', function() { sc_form_presupuesto_prefeccrea_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_presupuesto_prefeccrea_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_presupuesto_prefeccrea_onfocus(this, iSeqRow) });
  $('#id_sc_field_prefeccrea_hora' + iSeqRow).bind('blur', function() { sc_form_presupuesto_prefeccrea_hora_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_presupuesto_prefeccrea_hora_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_presupuesto_prefeccrea_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_prefecmodi' + iSeqRow).bind('blur', function() { sc_form_presupuesto_prefecmodi_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_presupuesto_prefecmodi_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_presupuesto_prefecmodi_onfocus(this, iSeqRow) });
  $('#id_sc_field_prefecmodi_hora' + iSeqRow).bind('blur', function() { sc_form_presupuesto_prefecmodi_hora_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_presupuesto_prefecmodi_hora_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_presupuesto_prefecmodi_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_detalle' + iSeqRow).bind('blur', function() { sc_form_presupuesto_detalle_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_presupuesto_detalle_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_presupuesto_detalle_onfocus(this, iSeqRow) });
  $('#id_sc_field_cliente' + iSeqRow).bind('blur', function() { sc_form_presupuesto_cliente_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_presupuesto_cliente_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_presupuesto_cliente_onfocus(this, iSeqRow) });
  $('#id_sc_field_total' + iSeqRow).bind('blur', function() { sc_form_presupuesto_total_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_presupuesto_total_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_presupuesto_total_onfocus(this, iSeqRow) });
  $('#id_sc_field_total_realizado' + iSeqRow).bind('blur', function() { sc_form_presupuesto_total_realizado_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_presupuesto_total_realizado_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_presupuesto_total_realizado_onfocus(this, iSeqRow) });
  $('#id_sc_field_total_faltante' + iSeqRow).bind('blur', function() { sc_form_presupuesto_total_faltante_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_presupuesto_total_faltante_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_presupuesto_total_faltante_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_presupuesto_prenumero_onblur(oThis, iSeqRow) {
  do_ajax_form_presupuesto_validate_prenumero();
  scCssBlur(oThis);
}

function sc_form_presupuesto_prenumero_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_presupuesto_prenumero_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_presupuesto_prenombre_onblur(oThis, iSeqRow) {
  do_ajax_form_presupuesto_validate_prenombre();
  scCssBlur(oThis);
}

function sc_form_presupuesto_prenombre_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_presupuesto_prenombre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_presupuesto_fclnumero_onblur(oThis, iSeqRow) {
  do_ajax_form_presupuesto_validate_fclnumero();
  scCssBlur(oThis);
}

function sc_form_presupuesto_fclnumero_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_presupuesto_fclnumero_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_presupuesto_medcodigo_onblur(oThis, iSeqRow) {
  do_ajax_form_presupuesto_validate_medcodigo();
  scCssBlur(oThis);
}

function sc_form_presupuesto_medcodigo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_presupuesto_medcodigo_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_presupuesto_preestado_onblur(oThis, iSeqRow) {
  do_ajax_form_presupuesto_validate_preestado();
  scCssBlur(oThis);
}

function sc_form_presupuesto_preestado_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_presupuesto_preestado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_presupuesto_preobserv_onblur(oThis, iSeqRow) {
  do_ajax_form_presupuesto_validate_preobserv();
  scCssBlur(oThis);
}

function sc_form_presupuesto_preobserv_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_presupuesto_preobserv_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_presupuesto_preusucrea_onblur(oThis, iSeqRow) {
  do_ajax_form_presupuesto_validate_preusucrea();
  scCssBlur(oThis);
}

function sc_form_presupuesto_preusucrea_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_presupuesto_preusucrea_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_presupuesto_preusumodi_onblur(oThis, iSeqRow) {
  do_ajax_form_presupuesto_validate_preusumodi();
  scCssBlur(oThis);
}

function sc_form_presupuesto_preusumodi_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_presupuesto_preusumodi_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_presupuesto_prefeccrea_onblur(oThis, iSeqRow) {
  do_ajax_form_presupuesto_validate_prefeccrea();
  scCssBlur(oThis);
}

function sc_form_presupuesto_prefeccrea_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_presupuesto_validate_prefeccrea();
  scCssBlur(oThis);
}

function sc_form_presupuesto_prefeccrea_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_presupuesto_prefeccrea_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_presupuesto_prefeccrea_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_presupuesto_prefeccrea_hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_presupuesto_prefecmodi_onblur(oThis, iSeqRow) {
  do_ajax_form_presupuesto_validate_prefecmodi();
  scCssBlur(oThis);
}

function sc_form_presupuesto_prefecmodi_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_presupuesto_validate_prefecmodi();
  scCssBlur(oThis);
}

function sc_form_presupuesto_prefecmodi_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_presupuesto_prefecmodi_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_presupuesto_prefecmodi_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_presupuesto_prefecmodi_hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_presupuesto_detalle_onblur(oThis, iSeqRow) {
  do_ajax_form_presupuesto_validate_detalle();
  scCssBlur(oThis);
}

function sc_form_presupuesto_detalle_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_presupuesto_detalle_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_presupuesto_cliente_onblur(oThis, iSeqRow) {
  do_ajax_form_presupuesto_validate_cliente();
  scCssBlur(oThis);
}

function sc_form_presupuesto_cliente_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_presupuesto_cliente_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_presupuesto_total_onblur(oThis, iSeqRow) {
  do_ajax_form_presupuesto_validate_total();
  scCssBlur(oThis);
}

function sc_form_presupuesto_total_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_presupuesto_total_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_presupuesto_total_realizado_onblur(oThis, iSeqRow) {
  do_ajax_form_presupuesto_validate_total_realizado();
  scCssBlur(oThis);
}

function sc_form_presupuesto_total_realizado_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_presupuesto_total_realizado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_presupuesto_total_faltante_onblur(oThis, iSeqRow) {
  do_ajax_form_presupuesto_validate_total_faltante();
  scCssBlur(oThis);
}

function sc_form_presupuesto_total_faltante_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_presupuesto_total_faltante_onfocus(oThis, iSeqRow) {
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
	displayChange_field("cliente", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("prenumero", "", status);
	displayChange_field("prenombre", "", status);
	displayChange_field("preestado", "", status);
	displayChange_field("medcodigo", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("preobserv", "", status);
	displayChange_field("fclnumero", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("preusucrea", "", status);
	displayChange_field("prefeccrea", "", status);
	displayChange_field("preusumodi", "", status);
	displayChange_field("prefecmodi", "", status);
}

function displayChange_block_4(status) {
	displayChange_field("total", "", status);
	displayChange_field("total_realizado", "", status);
	displayChange_field("total_faltante", "", status);
}

function displayChange_block_5(status) {
	displayChange_field("detalle", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_cliente(row, status);
	displayChange_field_prenumero(row, status);
	displayChange_field_prenombre(row, status);
	displayChange_field_preestado(row, status);
	displayChange_field_medcodigo(row, status);
	displayChange_field_preobserv(row, status);
	displayChange_field_fclnumero(row, status);
	displayChange_field_preusucrea(row, status);
	displayChange_field_prefeccrea(row, status);
	displayChange_field_preusumodi(row, status);
	displayChange_field_prefecmodi(row, status);
	displayChange_field_total(row, status);
	displayChange_field_total_realizado(row, status);
	displayChange_field_total_faltante(row, status);
	displayChange_field_detalle(row, status);
}

function displayChange_field(field, row, status) {
	if ("cliente" == field) {
		displayChange_field_cliente(row, status);
	}
	if ("prenumero" == field) {
		displayChange_field_prenumero(row, status);
	}
	if ("prenombre" == field) {
		displayChange_field_prenombre(row, status);
	}
	if ("preestado" == field) {
		displayChange_field_preestado(row, status);
	}
	if ("medcodigo" == field) {
		displayChange_field_medcodigo(row, status);
	}
	if ("preobserv" == field) {
		displayChange_field_preobserv(row, status);
	}
	if ("fclnumero" == field) {
		displayChange_field_fclnumero(row, status);
	}
	if ("preusucrea" == field) {
		displayChange_field_preusucrea(row, status);
	}
	if ("prefeccrea" == field) {
		displayChange_field_prefeccrea(row, status);
	}
	if ("preusumodi" == field) {
		displayChange_field_preusumodi(row, status);
	}
	if ("prefecmodi" == field) {
		displayChange_field_prefecmodi(row, status);
	}
	if ("total" == field) {
		displayChange_field_total(row, status);
	}
	if ("total_realizado" == field) {
		displayChange_field_total_realizado(row, status);
	}
	if ("total_faltante" == field) {
		displayChange_field_total_faltante(row, status);
	}
	if ("detalle" == field) {
		displayChange_field_detalle(row, status);
	}
}

function displayChange_field_cliente(row, status) {
}

function displayChange_field_prenumero(row, status) {
}

function displayChange_field_prenombre(row, status) {
}

function displayChange_field_preestado(row, status) {
}

function displayChange_field_medcodigo(row, status) {
}

function displayChange_field_preobserv(row, status) {
}

function displayChange_field_fclnumero(row, status) {
}

function displayChange_field_preusucrea(row, status) {
}

function displayChange_field_prefeccrea(row, status) {
}

function displayChange_field_preusumodi(row, status) {
}

function displayChange_field_prefecmodi(row, status) {
}

function displayChange_field_total(row, status) {
}

function displayChange_field_total_realizado(row, status) {
}

function displayChange_field_total_faltante(row, status) {
}

function displayChange_field_detalle(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_detalle_presupuesto")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_detalle_presupuesto")[0].contentWindow.scRecreateSelect2();
	}
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_presupuesto_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(24);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_prefeccrea" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_prefeccrea" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['prefeccrea']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['prefeccrea']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_presupuesto_validate_prefeccrea(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['prefeccrea']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_prefecmodi" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_prefecmodi" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['prefecmodi']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['prefecmodi']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_presupuesto_validate_prefecmodi(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['prefecmodi']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_presupuesto')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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

var scBtnGrpStatus = {};
function scBtnGrpShow(sGroup) {
  if (typeof(scBtnGrpShowMobile) === typeof(function(){})) { return scBtnGrpShowMobile(sGroup); };
  $('#sc_btgp_btn_' + sGroup).addClass('selected');
  var btnPos = $('#sc_btgp_btn_' + sGroup).offset();
  scBtnGrpStatus[sGroup] = 'open';
  $('#sc_btgp_btn_' + sGroup).mouseout(function() {
    scBtnGrpStatus[sGroup] = '';
    setTimeout(function() {
      scBtnGrpHide(sGroup, false);
    }, 1000);
  }).mouseover(function() {
    scBtnGrpStatus[sGroup] = 'over';
  });
  $('#sc_btgp_div_' + sGroup + ' span a').click(function() {
    scBtnGrpStatus[sGroup] = 'out';
    scBtnGrpHide(sGroup, false);
  });
  $('#sc_btgp_div_' + sGroup).css({
    'left': btnPos.left
  })
  .mouseover(function() {
    scBtnGrpStatus[sGroup] = 'over';
  })
  .mouseleave(function() {
    scBtnGrpStatus[sGroup] = 'out';
    setTimeout(function() {
      scBtnGrpHide(sGroup, false);
    }, 1000);
  })
  .show('fast');
}
function scBtnGrpHide(sGroup, bForce) {
  if (bForce || 'over' != scBtnGrpStatus[sGroup]) {
    $('#sc_btgp_div_' + sGroup).hide('fast');
    $('#sc_btgp_btn_' + sGroup).addClass('selected');
  }
}
