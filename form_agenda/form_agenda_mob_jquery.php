
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
  scEventControl_data["agenombre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["medcodigo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ageintervalo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ageactivo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["agecolor" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ageusucrea" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["agefeccrea" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ageusumodi" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["agefecmodi" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["agelunactivo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["agemaractivo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["agemieactivo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["agejueactivo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["agevieactivo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["agesabactivo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["agedomactivo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["agelunini" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["agelunfin" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["agemarini" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["agemarfin" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["agemieini" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["agemiefin" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["agejueini" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["agejuefin" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["agevieini" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ageviefin" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["agesabini" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["agesabfin" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["agedomini" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["agedomfin" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["agenombre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["agenombre" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["medcodigo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["medcodigo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ageintervalo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ageintervalo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ageactivo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ageactivo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["agecolor" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["agecolor" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ageusucrea" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ageusucrea" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["agefeccrea" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["agefeccrea" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ageusumodi" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ageusumodi" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["agefecmodi" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["agefecmodi" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["agelunactivo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["agelunactivo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["agemaractivo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["agemaractivo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["agemieactivo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["agemieactivo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["agejueactivo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["agejueactivo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["agevieactivo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["agevieactivo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["agesabactivo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["agesabactivo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["agedomactivo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["agedomactivo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["agelunini" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["agelunini" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["agelunfin" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["agelunfin" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["agemarini" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["agemarini" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["agemarfin" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["agemarfin" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["agemieini" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["agemieini" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["agemiefin" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["agemiefin" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["agejueini" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["agejueini" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["agejuefin" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["agejuefin" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["agevieini" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["agevieini" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ageviefin" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ageviefin" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["agesabini" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["agesabini" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["agesabfin" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["agesabfin" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["agedomini" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["agedomini" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["agedomfin" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["agedomfin" + iSeqRow]["change"]) {
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
  $('#id_sc_field_agenombre' + iSeqRow).bind('blur', function() { sc_form_agenda_agenombre_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_agenda_agenombre_onfocus(this, iSeqRow) });
  $('#id_sc_field_medcodigo' + iSeqRow).bind('blur', function() { sc_form_agenda_medcodigo_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_agenda_medcodigo_onfocus(this, iSeqRow) });
  $('#id_sc_field_ageactivo' + iSeqRow).bind('blur', function() { sc_form_agenda_ageactivo_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_agenda_ageactivo_onfocus(this, iSeqRow) });
  $('#id_sc_field_ageintervalo' + iSeqRow).bind('blur', function() { sc_form_agenda_ageintervalo_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_agenda_ageintervalo_onfocus(this, iSeqRow) });
  $('#id_sc_field_agelunactivo' + iSeqRow).bind('blur', function() { sc_form_agenda_agelunactivo_onblur(this, iSeqRow) })
                                          .bind('click', function() { sc_form_agenda_agelunactivo_onclick(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_agenda_agelunactivo_onfocus(this, iSeqRow) });
  $('#id_sc_field_agemaractivo' + iSeqRow).bind('blur', function() { sc_form_agenda_agemaractivo_onblur(this, iSeqRow) })
                                          .bind('click', function() { sc_form_agenda_agemaractivo_onclick(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_agenda_agemaractivo_onfocus(this, iSeqRow) });
  $('#id_sc_field_agemieactivo' + iSeqRow).bind('blur', function() { sc_form_agenda_agemieactivo_onblur(this, iSeqRow) })
                                          .bind('click', function() { sc_form_agenda_agemieactivo_onclick(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_agenda_agemieactivo_onfocus(this, iSeqRow) });
  $('#id_sc_field_agejueactivo' + iSeqRow).bind('blur', function() { sc_form_agenda_agejueactivo_onblur(this, iSeqRow) })
                                          .bind('click', function() { sc_form_agenda_agejueactivo_onclick(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_agenda_agejueactivo_onfocus(this, iSeqRow) });
  $('#id_sc_field_agevieactivo' + iSeqRow).bind('blur', function() { sc_form_agenda_agevieactivo_onblur(this, iSeqRow) })
                                          .bind('click', function() { sc_form_agenda_agevieactivo_onclick(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_agenda_agevieactivo_onfocus(this, iSeqRow) });
  $('#id_sc_field_agesabactivo' + iSeqRow).bind('blur', function() { sc_form_agenda_agesabactivo_onblur(this, iSeqRow) })
                                          .bind('click', function() { sc_form_agenda_agesabactivo_onclick(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_agenda_agesabactivo_onfocus(this, iSeqRow) });
  $('#id_sc_field_agedomactivo' + iSeqRow).bind('blur', function() { sc_form_agenda_agedomactivo_onblur(this, iSeqRow) })
                                          .bind('click', function() { sc_form_agenda_agedomactivo_onclick(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_agenda_agedomactivo_onfocus(this, iSeqRow) });
  $('#id_sc_field_agelunini' + iSeqRow).bind('blur', function() { sc_form_agenda_agelunini_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_agenda_agelunini_onfocus(this, iSeqRow) });
  $('#id_sc_field_agelunfin' + iSeqRow).bind('blur', function() { sc_form_agenda_agelunfin_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_agenda_agelunfin_onfocus(this, iSeqRow) });
  $('#id_sc_field_agemarini' + iSeqRow).bind('blur', function() { sc_form_agenda_agemarini_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_agenda_agemarini_onfocus(this, iSeqRow) });
  $('#id_sc_field_agemarfin' + iSeqRow).bind('blur', function() { sc_form_agenda_agemarfin_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_agenda_agemarfin_onfocus(this, iSeqRow) });
  $('#id_sc_field_agemieini' + iSeqRow).bind('blur', function() { sc_form_agenda_agemieini_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_agenda_agemieini_onfocus(this, iSeqRow) });
  $('#id_sc_field_agemiefin' + iSeqRow).bind('blur', function() { sc_form_agenda_agemiefin_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_agenda_agemiefin_onfocus(this, iSeqRow) });
  $('#id_sc_field_agejueini' + iSeqRow).bind('blur', function() { sc_form_agenda_agejueini_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_agenda_agejueini_onfocus(this, iSeqRow) });
  $('#id_sc_field_agejuefin' + iSeqRow).bind('blur', function() { sc_form_agenda_agejuefin_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_agenda_agejuefin_onfocus(this, iSeqRow) });
  $('#id_sc_field_agevieini' + iSeqRow).bind('blur', function() { sc_form_agenda_agevieini_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_agenda_agevieini_onfocus(this, iSeqRow) });
  $('#id_sc_field_ageviefin' + iSeqRow).bind('blur', function() { sc_form_agenda_ageviefin_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_agenda_ageviefin_onfocus(this, iSeqRow) });
  $('#id_sc_field_agesabini' + iSeqRow).bind('blur', function() { sc_form_agenda_agesabini_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_agenda_agesabini_onfocus(this, iSeqRow) });
  $('#id_sc_field_agesabfin' + iSeqRow).bind('blur', function() { sc_form_agenda_agesabfin_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_agenda_agesabfin_onfocus(this, iSeqRow) });
  $('#id_sc_field_agedomini' + iSeqRow).bind('blur', function() { sc_form_agenda_agedomini_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_agenda_agedomini_onfocus(this, iSeqRow) });
  $('#id_sc_field_agedomfin' + iSeqRow).bind('blur', function() { sc_form_agenda_agedomfin_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_agenda_agedomfin_onfocus(this, iSeqRow) });
  $('#id_sc_field_agecolor' + iSeqRow).bind('blur', function() { sc_form_agenda_agecolor_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_agenda_agecolor_onfocus(this, iSeqRow) });
  $('#id_sc_field_ageusucrea' + iSeqRow).bind('blur', function() { sc_form_agenda_ageusucrea_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_agenda_ageusucrea_onfocus(this, iSeqRow) });
  $('#id_sc_field_ageusumodi' + iSeqRow).bind('blur', function() { sc_form_agenda_ageusumodi_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_agenda_ageusumodi_onfocus(this, iSeqRow) });
  $('#id_sc_field_agefeccrea' + iSeqRow).bind('blur', function() { sc_form_agenda_agefeccrea_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_agenda_agefeccrea_onfocus(this, iSeqRow) });
  $('#id_sc_field_agefeccrea_hora' + iSeqRow).bind('blur', function() { sc_form_agenda_agefeccrea_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_agenda_agefeccrea_onfocus(this, iSeqRow) });
  $('#id_sc_field_agefecmodi' + iSeqRow).bind('blur', function() { sc_form_agenda_agefecmodi_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_agenda_agefecmodi_onfocus(this, iSeqRow) });
  $('#id_sc_field_agefecmodi_hora' + iSeqRow).bind('blur', function() { sc_form_agenda_agefecmodi_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_agenda_agefecmodi_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_agenda_agenombre_onblur(oThis, iSeqRow) {
  do_ajax_form_agenda_mob_validate_agenombre();
  scCssBlur(oThis);
}

function sc_form_agenda_agenombre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_agenda_medcodigo_onblur(oThis, iSeqRow) {
  do_ajax_form_agenda_mob_validate_medcodigo();
  scCssBlur(oThis);
}

function sc_form_agenda_medcodigo_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_agenda_ageactivo_onblur(oThis, iSeqRow) {
  do_ajax_form_agenda_mob_validate_ageactivo();
  scCssBlur(oThis);
}

function sc_form_agenda_ageactivo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_agenda_ageintervalo_onblur(oThis, iSeqRow) {
  do_ajax_form_agenda_mob_validate_ageintervalo();
  scCssBlur(oThis);
}

function sc_form_agenda_ageintervalo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_agenda_agelunactivo_onblur(oThis, iSeqRow) {
  do_ajax_form_agenda_mob_validate_agelunactivo();
  scCssBlur(oThis);
}

function sc_form_agenda_agelunactivo_onclick(oThis, iSeqRow) {
  do_ajax_form_agenda_mob_event_agelunactivo_onclick();
}

function sc_form_agenda_agelunactivo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_agenda_agemaractivo_onblur(oThis, iSeqRow) {
  do_ajax_form_agenda_mob_validate_agemaractivo();
  scCssBlur(oThis);
}

function sc_form_agenda_agemaractivo_onclick(oThis, iSeqRow) {
  do_ajax_form_agenda_mob_event_agemaractivo_onclick();
}

function sc_form_agenda_agemaractivo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_agenda_agemieactivo_onblur(oThis, iSeqRow) {
  do_ajax_form_agenda_mob_validate_agemieactivo();
  scCssBlur(oThis);
}

function sc_form_agenda_agemieactivo_onclick(oThis, iSeqRow) {
  do_ajax_form_agenda_mob_event_agemieactivo_onclick();
}

function sc_form_agenda_agemieactivo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_agenda_agejueactivo_onblur(oThis, iSeqRow) {
  do_ajax_form_agenda_mob_validate_agejueactivo();
  scCssBlur(oThis);
}

function sc_form_agenda_agejueactivo_onclick(oThis, iSeqRow) {
  do_ajax_form_agenda_mob_event_agejueactivo_onclick();
}

function sc_form_agenda_agejueactivo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_agenda_agevieactivo_onblur(oThis, iSeqRow) {
  do_ajax_form_agenda_mob_validate_agevieactivo();
  scCssBlur(oThis);
}

function sc_form_agenda_agevieactivo_onclick(oThis, iSeqRow) {
  do_ajax_form_agenda_mob_event_agevieactivo_onclick();
}

function sc_form_agenda_agevieactivo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_agenda_agesabactivo_onblur(oThis, iSeqRow) {
  do_ajax_form_agenda_mob_validate_agesabactivo();
  scCssBlur(oThis);
}

function sc_form_agenda_agesabactivo_onclick(oThis, iSeqRow) {
  do_ajax_form_agenda_mob_event_agesabactivo_onclick();
}

function sc_form_agenda_agesabactivo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_agenda_agedomactivo_onblur(oThis, iSeqRow) {
  do_ajax_form_agenda_mob_validate_agedomactivo();
  scCssBlur(oThis);
}

function sc_form_agenda_agedomactivo_onclick(oThis, iSeqRow) {
  do_ajax_form_agenda_mob_event_agedomactivo_onclick();
}

function sc_form_agenda_agedomactivo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_agenda_agelunini_onblur(oThis, iSeqRow) {
  do_ajax_form_agenda_mob_validate_agelunini();
  scCssBlur(oThis);
}

function sc_form_agenda_agelunini_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_agenda_agelunfin_onblur(oThis, iSeqRow) {
  do_ajax_form_agenda_mob_validate_agelunfin();
  scCssBlur(oThis);
}

function sc_form_agenda_agelunfin_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_agenda_agemarini_onblur(oThis, iSeqRow) {
  do_ajax_form_agenda_mob_validate_agemarini();
  scCssBlur(oThis);
}

function sc_form_agenda_agemarini_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_agenda_agemarfin_onblur(oThis, iSeqRow) {
  do_ajax_form_agenda_mob_validate_agemarfin();
  scCssBlur(oThis);
}

function sc_form_agenda_agemarfin_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_agenda_agemieini_onblur(oThis, iSeqRow) {
  do_ajax_form_agenda_mob_validate_agemieini();
  scCssBlur(oThis);
}

function sc_form_agenda_agemieini_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_agenda_agemiefin_onblur(oThis, iSeqRow) {
  do_ajax_form_agenda_mob_validate_agemiefin();
  scCssBlur(oThis);
}

function sc_form_agenda_agemiefin_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_agenda_agejueini_onblur(oThis, iSeqRow) {
  do_ajax_form_agenda_mob_validate_agejueini();
  scCssBlur(oThis);
}

function sc_form_agenda_agejueini_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_agenda_agejuefin_onblur(oThis, iSeqRow) {
  do_ajax_form_agenda_mob_validate_agejuefin();
  scCssBlur(oThis);
}

function sc_form_agenda_agejuefin_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_agenda_agevieini_onblur(oThis, iSeqRow) {
  do_ajax_form_agenda_mob_validate_agevieini();
  scCssBlur(oThis);
}

function sc_form_agenda_agevieini_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_agenda_ageviefin_onblur(oThis, iSeqRow) {
  do_ajax_form_agenda_mob_validate_ageviefin();
  scCssBlur(oThis);
}

function sc_form_agenda_ageviefin_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_agenda_agesabini_onblur(oThis, iSeqRow) {
  do_ajax_form_agenda_mob_validate_agesabini();
  scCssBlur(oThis);
}

function sc_form_agenda_agesabini_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_agenda_agesabfin_onblur(oThis, iSeqRow) {
  do_ajax_form_agenda_mob_validate_agesabfin();
  scCssBlur(oThis);
}

function sc_form_agenda_agesabfin_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_agenda_agedomini_onblur(oThis, iSeqRow) {
  do_ajax_form_agenda_mob_validate_agedomini();
  scCssBlur(oThis);
}

function sc_form_agenda_agedomini_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_agenda_agedomfin_onblur(oThis, iSeqRow) {
  do_ajax_form_agenda_mob_validate_agedomfin();
  scCssBlur(oThis);
}

function sc_form_agenda_agedomfin_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_agenda_agecolor_onblur(oThis, iSeqRow) {
  do_ajax_form_agenda_mob_validate_agecolor();
  scCssBlur(oThis);
}

function sc_form_agenda_agecolor_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_agenda_ageusucrea_onblur(oThis, iSeqRow) {
  do_ajax_form_agenda_mob_validate_ageusucrea();
  scCssBlur(oThis);
}

function sc_form_agenda_ageusucrea_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_agenda_ageusumodi_onblur(oThis, iSeqRow) {
  do_ajax_form_agenda_mob_validate_ageusumodi();
  scCssBlur(oThis);
}

function sc_form_agenda_ageusumodi_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_agenda_agefeccrea_onblur(oThis, iSeqRow) {
  do_ajax_form_agenda_mob_validate_agefeccrea();
  scCssBlur(oThis);
}

function sc_form_agenda_agefeccrea_onblur(oThis, iSeqRow) {
  do_ajax_form_agenda_mob_validate_agefeccrea();
  scCssBlur(oThis);
}

function sc_form_agenda_agefeccrea_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_agenda_agefeccrea_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_agenda_agefecmodi_onblur(oThis, iSeqRow) {
  do_ajax_form_agenda_mob_validate_agefecmodi();
  scCssBlur(oThis);
}

function sc_form_agenda_agefecmodi_onblur(oThis, iSeqRow) {
  do_ajax_form_agenda_mob_validate_agefecmodi();
  scCssBlur(oThis);
}

function sc_form_agenda_agefecmodi_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_agenda_agefecmodi_onfocus(oThis, iSeqRow) {
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
	if ("6" == block) {
		displayChange_block_6(status);
	}
	if ("7" == block) {
		displayChange_block_7(status);
	}
	if ("8" == block) {
		displayChange_block_8(status);
	}
	if ("9" == block) {
		displayChange_block_9(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("agenombre", "", status);
	displayChange_field("medcodigo", "", status);
	displayChange_field("ageintervalo", "", status);
	displayChange_field("ageactivo", "", status);
	displayChange_field("agecolor", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("ageusucrea", "", status);
	displayChange_field("agefeccrea", "", status);
	displayChange_field("ageusumodi", "", status);
	displayChange_field("agefecmodi", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("agelunactivo", "", status);
	displayChange_field("agemaractivo", "", status);
	displayChange_field("agemieactivo", "", status);
	displayChange_field("agejueactivo", "", status);
	displayChange_field("agevieactivo", "", status);
	displayChange_field("agesabactivo", "", status);
	displayChange_field("agedomactivo", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("agelunini", "", status);
	displayChange_field("agelunfin", "", status);
}

function displayChange_block_4(status) {
	displayChange_field("agemarini", "", status);
	displayChange_field("agemarfin", "", status);
}

function displayChange_block_5(status) {
	displayChange_field("agemieini", "", status);
	displayChange_field("agemiefin", "", status);
}

function displayChange_block_6(status) {
	displayChange_field("agejueini", "", status);
	displayChange_field("agejuefin", "", status);
}

function displayChange_block_7(status) {
	displayChange_field("agevieini", "", status);
	displayChange_field("ageviefin", "", status);
}

function displayChange_block_8(status) {
	displayChange_field("agesabini", "", status);
	displayChange_field("agesabfin", "", status);
}

function displayChange_block_9(status) {
	displayChange_field("agedomini", "", status);
	displayChange_field("agedomfin", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_agenombre(row, status);
	displayChange_field_medcodigo(row, status);
	displayChange_field_ageintervalo(row, status);
	displayChange_field_ageactivo(row, status);
	displayChange_field_agecolor(row, status);
	displayChange_field_ageusucrea(row, status);
	displayChange_field_agefeccrea(row, status);
	displayChange_field_ageusumodi(row, status);
	displayChange_field_agefecmodi(row, status);
	displayChange_field_agelunactivo(row, status);
	displayChange_field_agemaractivo(row, status);
	displayChange_field_agemieactivo(row, status);
	displayChange_field_agejueactivo(row, status);
	displayChange_field_agevieactivo(row, status);
	displayChange_field_agesabactivo(row, status);
	displayChange_field_agedomactivo(row, status);
	displayChange_field_agelunini(row, status);
	displayChange_field_agelunfin(row, status);
	displayChange_field_agemarini(row, status);
	displayChange_field_agemarfin(row, status);
	displayChange_field_agemieini(row, status);
	displayChange_field_agemiefin(row, status);
	displayChange_field_agejueini(row, status);
	displayChange_field_agejuefin(row, status);
	displayChange_field_agevieini(row, status);
	displayChange_field_ageviefin(row, status);
	displayChange_field_agesabini(row, status);
	displayChange_field_agesabfin(row, status);
	displayChange_field_agedomini(row, status);
	displayChange_field_agedomfin(row, status);
}

function displayChange_field(field, row, status) {
	if ("agenombre" == field) {
		displayChange_field_agenombre(row, status);
	}
	if ("medcodigo" == field) {
		displayChange_field_medcodigo(row, status);
	}
	if ("ageintervalo" == field) {
		displayChange_field_ageintervalo(row, status);
	}
	if ("ageactivo" == field) {
		displayChange_field_ageactivo(row, status);
	}
	if ("agecolor" == field) {
		displayChange_field_agecolor(row, status);
	}
	if ("ageusucrea" == field) {
		displayChange_field_ageusucrea(row, status);
	}
	if ("agefeccrea" == field) {
		displayChange_field_agefeccrea(row, status);
	}
	if ("ageusumodi" == field) {
		displayChange_field_ageusumodi(row, status);
	}
	if ("agefecmodi" == field) {
		displayChange_field_agefecmodi(row, status);
	}
	if ("agelunactivo" == field) {
		displayChange_field_agelunactivo(row, status);
	}
	if ("agemaractivo" == field) {
		displayChange_field_agemaractivo(row, status);
	}
	if ("agemieactivo" == field) {
		displayChange_field_agemieactivo(row, status);
	}
	if ("agejueactivo" == field) {
		displayChange_field_agejueactivo(row, status);
	}
	if ("agevieactivo" == field) {
		displayChange_field_agevieactivo(row, status);
	}
	if ("agesabactivo" == field) {
		displayChange_field_agesabactivo(row, status);
	}
	if ("agedomactivo" == field) {
		displayChange_field_agedomactivo(row, status);
	}
	if ("agelunini" == field) {
		displayChange_field_agelunini(row, status);
	}
	if ("agelunfin" == field) {
		displayChange_field_agelunfin(row, status);
	}
	if ("agemarini" == field) {
		displayChange_field_agemarini(row, status);
	}
	if ("agemarfin" == field) {
		displayChange_field_agemarfin(row, status);
	}
	if ("agemieini" == field) {
		displayChange_field_agemieini(row, status);
	}
	if ("agemiefin" == field) {
		displayChange_field_agemiefin(row, status);
	}
	if ("agejueini" == field) {
		displayChange_field_agejueini(row, status);
	}
	if ("agejuefin" == field) {
		displayChange_field_agejuefin(row, status);
	}
	if ("agevieini" == field) {
		displayChange_field_agevieini(row, status);
	}
	if ("ageviefin" == field) {
		displayChange_field_ageviefin(row, status);
	}
	if ("agesabini" == field) {
		displayChange_field_agesabini(row, status);
	}
	if ("agesabfin" == field) {
		displayChange_field_agesabfin(row, status);
	}
	if ("agedomini" == field) {
		displayChange_field_agedomini(row, status);
	}
	if ("agedomfin" == field) {
		displayChange_field_agedomfin(row, status);
	}
}

function displayChange_field_agenombre(row, status) {
}

function displayChange_field_medcodigo(row, status) {
}

function displayChange_field_ageintervalo(row, status) {
}

function displayChange_field_ageactivo(row, status) {
}

function displayChange_field_agecolor(row, status) {
}

function displayChange_field_ageusucrea(row, status) {
}

function displayChange_field_agefeccrea(row, status) {
}

function displayChange_field_ageusumodi(row, status) {
}

function displayChange_field_agefecmodi(row, status) {
}

function displayChange_field_agelunactivo(row, status) {
}

function displayChange_field_agemaractivo(row, status) {
}

function displayChange_field_agemieactivo(row, status) {
}

function displayChange_field_agejueactivo(row, status) {
}

function displayChange_field_agevieactivo(row, status) {
}

function displayChange_field_agesabactivo(row, status) {
}

function displayChange_field_agedomactivo(row, status) {
}

function displayChange_field_agelunini(row, status) {
}

function displayChange_field_agelunfin(row, status) {
}

function displayChange_field_agemarini(row, status) {
}

function displayChange_field_agemarfin(row, status) {
}

function displayChange_field_agemieini(row, status) {
}

function displayChange_field_agemiefin(row, status) {
}

function displayChange_field_agejueini(row, status) {
}

function displayChange_field_agejuefin(row, status) {
}

function displayChange_field_agevieini(row, status) {
}

function displayChange_field_ageviefin(row, status) {
}

function displayChange_field_agesabini(row, status) {
}

function displayChange_field_agesabfin(row, status) {
}

function displayChange_field_agedomini(row, status) {
}

function displayChange_field_agedomfin(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_agenda_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(23);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_agefeccrea" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_agefeccrea" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['agefeccrea']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['agefeccrea']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_agenda_mob_validate_agefeccrea(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['agefeccrea']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_agefecmodi" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_agefecmodi" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['agefecmodi']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['agefecmodi']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_agenda_mob_validate_agefecmodi(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['agefecmodi']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_agelunini" + iSeqRow).timepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_timepicker_value["#id_sc_field_agelunini" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      if (sc_jq_timepicker_value["#id_sc_field_agelunini" + iSeqRow] != dateText) {
        $("#id_sc_field_agelunini" + iSeqRow).trigger('change');
      }
    },
    hourText: "<?php   echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_hour'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    minuteText: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_mint'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    timeSeparator: ":",
  });

  $("#id_sc_field_agelunfin" + iSeqRow).timepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_timepicker_value["#id_sc_field_agelunfin" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      if (sc_jq_timepicker_value["#id_sc_field_agelunfin" + iSeqRow] != dateText) {
        $("#id_sc_field_agelunfin" + iSeqRow).trigger('change');
      }
    },
    hourText: "<?php   echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_hour'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    minuteText: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_mint'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    timeSeparator: ":",
  });

  $("#id_sc_field_agemarini" + iSeqRow).timepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_timepicker_value["#id_sc_field_agemarini" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      if (sc_jq_timepicker_value["#id_sc_field_agemarini" + iSeqRow] != dateText) {
        $("#id_sc_field_agemarini" + iSeqRow).trigger('change');
      }
    },
    hourText: "<?php   echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_hour'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    minuteText: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_mint'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    timeSeparator: ":",
  });

  $("#id_sc_field_agemarfin" + iSeqRow).timepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_timepicker_value["#id_sc_field_agemarfin" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      if (sc_jq_timepicker_value["#id_sc_field_agemarfin" + iSeqRow] != dateText) {
        $("#id_sc_field_agemarfin" + iSeqRow).trigger('change');
      }
    },
    hourText: "<?php   echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_hour'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    minuteText: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_mint'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    timeSeparator: ":",
  });

  $("#id_sc_field_agemieini" + iSeqRow).timepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_timepicker_value["#id_sc_field_agemieini" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      if (sc_jq_timepicker_value["#id_sc_field_agemieini" + iSeqRow] != dateText) {
        $("#id_sc_field_agemieini" + iSeqRow).trigger('change');
      }
    },
    hourText: "<?php   echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_hour'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    minuteText: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_mint'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    timeSeparator: ":",
  });

  $("#id_sc_field_agemiefin" + iSeqRow).timepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_timepicker_value["#id_sc_field_agemiefin" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      if (sc_jq_timepicker_value["#id_sc_field_agemiefin" + iSeqRow] != dateText) {
        $("#id_sc_field_agemiefin" + iSeqRow).trigger('change');
      }
    },
    hourText: "<?php   echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_hour'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    minuteText: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_mint'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    timeSeparator: ":",
  });

  $("#id_sc_field_agejueini" + iSeqRow).timepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_timepicker_value["#id_sc_field_agejueini" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      if (sc_jq_timepicker_value["#id_sc_field_agejueini" + iSeqRow] != dateText) {
        $("#id_sc_field_agejueini" + iSeqRow).trigger('change');
      }
    },
    hourText: "<?php   echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_hour'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    minuteText: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_mint'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    timeSeparator: ":",
  });

  $("#id_sc_field_agejuefin" + iSeqRow).timepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_timepicker_value["#id_sc_field_agejuefin" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      if (sc_jq_timepicker_value["#id_sc_field_agejuefin" + iSeqRow] != dateText) {
        $("#id_sc_field_agejuefin" + iSeqRow).trigger('change');
      }
    },
    hourText: "<?php   echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_hour'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    minuteText: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_mint'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    timeSeparator: ":",
  });

  $("#id_sc_field_agevieini" + iSeqRow).timepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_timepicker_value["#id_sc_field_agevieini" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      if (sc_jq_timepicker_value["#id_sc_field_agevieini" + iSeqRow] != dateText) {
        $("#id_sc_field_agevieini" + iSeqRow).trigger('change');
      }
    },
    hourText: "<?php   echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_hour'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    minuteText: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_mint'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    timeSeparator: ":",
  });

  $("#id_sc_field_ageviefin" + iSeqRow).timepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_timepicker_value["#id_sc_field_ageviefin" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      if (sc_jq_timepicker_value["#id_sc_field_ageviefin" + iSeqRow] != dateText) {
        $("#id_sc_field_ageviefin" + iSeqRow).trigger('change');
      }
    },
    hourText: "<?php   echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_hour'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    minuteText: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_mint'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    timeSeparator: ":",
  });

  $("#id_sc_field_agesabini" + iSeqRow).timepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_timepicker_value["#id_sc_field_agesabini" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      if (sc_jq_timepicker_value["#id_sc_field_agesabini" + iSeqRow] != dateText) {
        $("#id_sc_field_agesabini" + iSeqRow).trigger('change');
      }
    },
    hourText: "<?php   echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_hour'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    minuteText: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_mint'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    timeSeparator: ":",
  });

  $("#id_sc_field_agesabfin" + iSeqRow).timepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_timepicker_value["#id_sc_field_agesabfin" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      if (sc_jq_timepicker_value["#id_sc_field_agesabfin" + iSeqRow] != dateText) {
        $("#id_sc_field_agesabfin" + iSeqRow).trigger('change');
      }
    },
    hourText: "<?php   echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_hour'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    minuteText: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_mint'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    timeSeparator: ":",
  });

  $("#id_sc_field_agedomini" + iSeqRow).timepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_timepicker_value["#id_sc_field_agedomini" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      if (sc_jq_timepicker_value["#id_sc_field_agedomini" + iSeqRow] != dateText) {
        $("#id_sc_field_agedomini" + iSeqRow).trigger('change');
      }
    },
    hourText: "<?php   echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_hour'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    minuteText: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_mint'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    timeSeparator: ":",
  });

  $("#id_sc_field_agedomfin" + iSeqRow).timepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_timepicker_value["#id_sc_field_agedomfin" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      if (sc_jq_timepicker_value["#id_sc_field_agedomfin" + iSeqRow] != dateText) {
        $("#id_sc_field_agedomfin" + iSeqRow).trigger('change');
      }
    },
    hourText: "<?php   echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_hour'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    minuteText: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_mint'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    timeSeparator: ":",
  });

} // scJQTimePickerAdd

function setaCorPaleta(sField, sValue) {
  $('.colors_' + sField).removeClass('scFormColorPaleteItemChecked');
  $('#id_sc_field_' + sField).val(sValue);
  $(".colors_" + sField + "[valor='"+ sValue +"']").addClass('scFormColorPaleteItemChecked');
} // setaCorPaleta

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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_agenda_mob')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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

