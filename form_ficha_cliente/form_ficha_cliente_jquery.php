
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
  scEventControl_data["fclfechareg" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclcedula" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclactivo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclapellidos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclnombres" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["update_titulo_citas" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclfechanac" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclsexo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclestciv" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fcldireccion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclciudad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fcltelefono" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclcelular" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclemail" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclprofesion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fcllugartrab" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclfacigual" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclfacruc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclfacnombre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclfacdir" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclfactelf" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclfacmail" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclreferpub" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclreferface" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclreferweb" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclreferremit" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclreferremitnom" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclmotivprimcons" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclproblemactual" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclbajotratmed" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclalerganest" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclprophemor" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclintervquir" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclmediesp" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclhiperten" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclhipotiro" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclaltercora" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclgastrit" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclenfsangre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fcldiabet" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclhepatit" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclcancer" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclvih" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclartrit" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclinsufren" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclotrasenf" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclotrasenfdesc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclobserv" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclusucrea" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclfeccrea" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclusumodi" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fclfecmodi" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["historias" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["presupuestos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cobros" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["fclnumero" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclnumero" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclfechareg" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclfechareg" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclcedula" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclcedula" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclactivo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclactivo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclapellidos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclapellidos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclnombres" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclnombres" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["update_titulo_citas" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["update_titulo_citas" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclfechanac" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclfechanac" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclsexo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclsexo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclestciv" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclestciv" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fcldireccion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fcldireccion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclciudad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclciudad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fcltelefono" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fcltelefono" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclcelular" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclcelular" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclemail" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclemail" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclprofesion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclprofesion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fcllugartrab" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fcllugartrab" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclfacigual" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclfacigual" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclfacruc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclfacruc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclfacnombre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclfacnombre" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclfacdir" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclfacdir" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclfactelf" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclfactelf" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclfacmail" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclfacmail" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclreferpub" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclreferpub" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclreferface" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclreferface" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclreferweb" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclreferweb" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclreferremit" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclreferremit" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclreferremitnom" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclreferremitnom" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclmotivprimcons" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclmotivprimcons" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclproblemactual" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclproblemactual" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclbajotratmed" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclbajotratmed" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclalerganest" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclalerganest" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclprophemor" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclprophemor" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclintervquir" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclintervquir" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclmediesp" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclmediesp" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclhiperten" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclhiperten" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclhipotiro" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclhipotiro" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclaltercora" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclaltercora" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclgastrit" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclgastrit" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclenfsangre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclenfsangre" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fcldiabet" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fcldiabet" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclhepatit" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclhepatit" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclcancer" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclcancer" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclvih" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclvih" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclartrit" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclartrit" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclinsufren" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclinsufren" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclotrasenf" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclotrasenf" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclotrasenfdesc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclotrasenfdesc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclobserv" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclobserv" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclusucrea" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclusucrea" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclfeccrea" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclfeccrea" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclusumodi" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclusumodi" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fclfecmodi" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fclfecmodi" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["historias" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["historias" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["presupuestos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["presupuestos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cobros" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cobros" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("fclestciv" + iSeq == fieldName) {
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
  $('#id_sc_field_fclnumero' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclnumero_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_ficha_cliente_fclnumero_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_ficha_cliente_fclnumero_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclnombres' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclnombres_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_ficha_cliente_fclnombres_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_ficha_cliente_fclnombres_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclapellidos' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclapellidos_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_ficha_cliente_fclapellidos_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_ficha_cliente_fclapellidos_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclfechareg' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclfechareg_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_ficha_cliente_fclfechareg_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_ficha_cliente_fclfechareg_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclfechanac' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclfechanac_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_ficha_cliente_fclfechanac_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_ficha_cliente_fclfechanac_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclsexo' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclsexo_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_ficha_cliente_fclsexo_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_ficha_cliente_fclsexo_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclcedula' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclcedula_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_ficha_cliente_fclcedula_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_ficha_cliente_fclcedula_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclestciv' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclestciv_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_ficha_cliente_fclestciv_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_ficha_cliente_fclestciv_onfocus(this, iSeqRow) });
  $('#id_sc_field_fcldireccion' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fcldireccion_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_ficha_cliente_fcldireccion_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_ficha_cliente_fcldireccion_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclciudad' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclciudad_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_ficha_cliente_fclciudad_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_ficha_cliente_fclciudad_onfocus(this, iSeqRow) });
  $('#id_sc_field_fcltelefono' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fcltelefono_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_ficha_cliente_fcltelefono_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_ficha_cliente_fcltelefono_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclcelular' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclcelular_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_ficha_cliente_fclcelular_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_ficha_cliente_fclcelular_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclemail' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclemail_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_ficha_cliente_fclemail_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_ficha_cliente_fclemail_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclprofesion' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclprofesion_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_ficha_cliente_fclprofesion_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_ficha_cliente_fclprofesion_onfocus(this, iSeqRow) });
  $('#id_sc_field_fcllugartrab' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fcllugartrab_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_ficha_cliente_fcllugartrab_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_ficha_cliente_fcllugartrab_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclreferpub' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclreferpub_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_ficha_cliente_fclreferpub_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_ficha_cliente_fclreferpub_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclreferface' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclreferface_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_ficha_cliente_fclreferface_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_ficha_cliente_fclreferface_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclreferweb' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclreferweb_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_ficha_cliente_fclreferweb_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_ficha_cliente_fclreferweb_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclreferremit' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclreferremit_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_ficha_cliente_fclreferremit_onchange(this, iSeqRow) })
                                           .bind('click', function() { sc_form_ficha_cliente_fclreferremit_onclick(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_ficha_cliente_fclreferremit_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclreferremitnom' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclreferremitnom_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_ficha_cliente_fclreferremitnom_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_ficha_cliente_fclreferremitnom_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclmotivprimcons' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclmotivprimcons_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_ficha_cliente_fclmotivprimcons_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_ficha_cliente_fclmotivprimcons_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclproblemactual' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclproblemactual_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_ficha_cliente_fclproblemactual_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_ficha_cliente_fclproblemactual_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclbajotratmed' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclbajotratmed_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_ficha_cliente_fclbajotratmed_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_ficha_cliente_fclbajotratmed_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclalerganest' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclalerganest_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_ficha_cliente_fclalerganest_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_ficha_cliente_fclalerganest_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclprophemor' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclprophemor_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_ficha_cliente_fclprophemor_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_ficha_cliente_fclprophemor_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclintervquir' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclintervquir_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_ficha_cliente_fclintervquir_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_ficha_cliente_fclintervquir_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclmediesp' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclmediesp_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_ficha_cliente_fclmediesp_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_ficha_cliente_fclmediesp_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclhiperten' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclhiperten_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_ficha_cliente_fclhiperten_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_ficha_cliente_fclhiperten_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclhipotiro' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclhipotiro_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_ficha_cliente_fclhipotiro_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_ficha_cliente_fclhipotiro_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclaltercora' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclaltercora_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_ficha_cliente_fclaltercora_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_ficha_cliente_fclaltercora_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclgastrit' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclgastrit_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_ficha_cliente_fclgastrit_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_ficha_cliente_fclgastrit_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclenfsangre' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclenfsangre_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_ficha_cliente_fclenfsangre_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_ficha_cliente_fclenfsangre_onfocus(this, iSeqRow) });
  $('#id_sc_field_fcldiabet' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fcldiabet_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_ficha_cliente_fcldiabet_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_ficha_cliente_fcldiabet_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclhepatit' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclhepatit_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_ficha_cliente_fclhepatit_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_ficha_cliente_fclhepatit_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclcancer' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclcancer_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_ficha_cliente_fclcancer_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_ficha_cliente_fclcancer_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclvih' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclvih_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_ficha_cliente_fclvih_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_ficha_cliente_fclvih_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclartrit' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclartrit_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_ficha_cliente_fclartrit_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_ficha_cliente_fclartrit_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclinsufren' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclinsufren_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_ficha_cliente_fclinsufren_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_ficha_cliente_fclinsufren_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclotrasenf' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclotrasenf_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_ficha_cliente_fclotrasenf_onchange(this, iSeqRow) })
                                         .bind('click', function() { sc_form_ficha_cliente_fclotrasenf_onclick(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_ficha_cliente_fclotrasenf_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclotrasenfdesc' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclotrasenfdesc_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_ficha_cliente_fclotrasenfdesc_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_ficha_cliente_fclotrasenfdesc_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclobserv' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclobserv_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_ficha_cliente_fclobserv_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_ficha_cliente_fclobserv_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclusucrea' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclusucrea_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_ficha_cliente_fclusucrea_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_ficha_cliente_fclusucrea_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclusumodi' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclusumodi_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_ficha_cliente_fclusumodi_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_ficha_cliente_fclusumodi_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclfeccrea' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclfeccrea_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_ficha_cliente_fclfeccrea_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_ficha_cliente_fclfeccrea_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclfeccrea_hora' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclfeccrea_hora_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_ficha_cliente_fclfeccrea_hora_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_ficha_cliente_fclfeccrea_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclfecmodi' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclfecmodi_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_ficha_cliente_fclfecmodi_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_ficha_cliente_fclfecmodi_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclfecmodi_hora' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclfecmodi_hora_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_ficha_cliente_fclfecmodi_hora_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_ficha_cliente_fclfecmodi_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclfacigual' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclfacigual_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_ficha_cliente_fclfacigual_onchange(this, iSeqRow) })
                                         .bind('click', function() { sc_form_ficha_cliente_fclfacigual_onclick(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_ficha_cliente_fclfacigual_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclfacnombre' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclfacnombre_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_ficha_cliente_fclfacnombre_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_ficha_cliente_fclfacnombre_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclfacruc' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclfacruc_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_ficha_cliente_fclfacruc_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_ficha_cliente_fclfacruc_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclfacdir' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclfacdir_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_ficha_cliente_fclfacdir_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_ficha_cliente_fclfacdir_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclfactelf' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclfactelf_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_ficha_cliente_fclfactelf_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_ficha_cliente_fclfactelf_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclfacmail' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclfacmail_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_ficha_cliente_fclfacmail_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_ficha_cliente_fclfacmail_onfocus(this, iSeqRow) });
  $('#id_sc_field_fclactivo' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_fclactivo_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_ficha_cliente_fclactivo_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_ficha_cliente_fclactivo_onfocus(this, iSeqRow) });
  $('#id_sc_field_cobros' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_cobros_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_ficha_cliente_cobros_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_ficha_cliente_cobros_onfocus(this, iSeqRow) });
  $('#id_sc_field_historias' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_historias_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_ficha_cliente_historias_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_ficha_cliente_historias_onfocus(this, iSeqRow) });
  $('#id_sc_field_presupuestos' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_presupuestos_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_ficha_cliente_presupuestos_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_ficha_cliente_presupuestos_onfocus(this, iSeqRow) });
  $('#id_sc_field_update_titulo_citas' + iSeqRow).bind('blur', function() { sc_form_ficha_cliente_update_titulo_citas_onblur(this, iSeqRow) })
                                                 .bind('change', function() { sc_form_ficha_cliente_update_titulo_citas_onchange(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_ficha_cliente_update_titulo_citas_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_ficha_cliente_fclnumero_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclnumero();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclnumero_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclnumero_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclnombres_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclnombres();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclnombres_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclnombres_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclapellidos_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclapellidos();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclapellidos_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclapellidos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclfechareg_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclfechareg();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclfechareg_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclfechareg_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclfechanac_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclfechanac();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclfechanac_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclfechanac_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclsexo_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclsexo();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclsexo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclsexo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclcedula_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclcedula();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclcedula_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclcedula_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclestciv_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclestciv();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclestciv_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclestciv_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fcldireccion_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fcldireccion();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fcldireccion_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fcldireccion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclciudad_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclciudad();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclciudad_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclciudad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fcltelefono_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fcltelefono();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fcltelefono_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fcltelefono_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclcelular_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclcelular();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclcelular_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclcelular_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclemail_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclemail();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclemail_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclemail_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclprofesion_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclprofesion();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclprofesion_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclprofesion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fcllugartrab_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fcllugartrab();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fcllugartrab_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fcllugartrab_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclreferpub_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclreferpub();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclreferpub_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclreferpub_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclreferface_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclreferface();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclreferface_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclreferface_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclreferweb_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclreferweb();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclreferweb_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclreferweb_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclreferremit_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclreferremit();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclreferremit_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclreferremit_onclick(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_event_fclreferremit_onclick();
}

function sc_form_ficha_cliente_fclreferremit_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclreferremitnom_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclreferremitnom();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclreferremitnom_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclreferremitnom_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclmotivprimcons_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclmotivprimcons();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclmotivprimcons_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclmotivprimcons_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclproblemactual_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclproblemactual();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclproblemactual_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclproblemactual_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclbajotratmed_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclbajotratmed();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclbajotratmed_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclbajotratmed_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclalerganest_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclalerganest();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclalerganest_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclalerganest_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclprophemor_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclprophemor();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclprophemor_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclprophemor_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclintervquir_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclintervquir();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclintervquir_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclintervquir_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclmediesp_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclmediesp();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclmediesp_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclmediesp_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclhiperten_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclhiperten();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclhiperten_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclhiperten_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclhipotiro_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclhipotiro();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclhipotiro_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclhipotiro_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclaltercora_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclaltercora();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclaltercora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclaltercora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclgastrit_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclgastrit();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclgastrit_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclgastrit_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclenfsangre_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclenfsangre();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclenfsangre_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclenfsangre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fcldiabet_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fcldiabet();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fcldiabet_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fcldiabet_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclhepatit_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclhepatit();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclhepatit_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclhepatit_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclcancer_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclcancer();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclcancer_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclcancer_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclvih_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclvih();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclvih_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclvih_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclartrit_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclartrit();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclartrit_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclartrit_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclinsufren_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclinsufren();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclinsufren_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclinsufren_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclotrasenf_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclotrasenf();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclotrasenf_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclotrasenf_onclick(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_event_fclotrasenf_onclick();
}

function sc_form_ficha_cliente_fclotrasenf_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclotrasenfdesc_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclotrasenfdesc();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclotrasenfdesc_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclotrasenfdesc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclobserv_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclobserv();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclobserv_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclobserv_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclusucrea_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclusucrea();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclusucrea_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclusucrea_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclusumodi_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclusumodi();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclusumodi_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclusumodi_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclfeccrea_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclfeccrea();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclfeccrea_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclfeccrea();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclfeccrea_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclfeccrea_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclfeccrea_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclfeccrea_hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclfecmodi_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclfecmodi();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclfecmodi_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclfecmodi();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclfecmodi_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclfecmodi_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclfecmodi_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclfecmodi_hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclfacigual_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclfacigual();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclfacigual_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclfacigual_onclick(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_event_fclfacigual_onclick();
}

function sc_form_ficha_cliente_fclfacigual_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclfacnombre_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclfacnombre();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclfacnombre_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclfacnombre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclfacruc_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclfacruc();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclfacruc_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclfacruc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclfacdir_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclfacdir();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclfacdir_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclfacdir_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclfactelf_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclfactelf();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclfactelf_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclfactelf_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclfacmail_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclfacmail();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclfacmail_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclfacmail_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_fclactivo_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_fclactivo();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_fclactivo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_fclactivo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_cobros_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_cobros();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_cobros_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_cobros_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_historias_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_historias();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_historias_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_historias_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_presupuestos_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_presupuestos();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_presupuestos_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_presupuestos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ficha_cliente_update_titulo_citas_onblur(oThis, iSeqRow) {
  do_ajax_form_ficha_cliente_validate_update_titulo_citas();
  scCssBlur(oThis);
}

function sc_form_ficha_cliente_update_titulo_citas_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_ficha_cliente_update_titulo_citas_onfocus(oThis, iSeqRow) {
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
	if ("10" == block) {
		displayChange_block_10(status);
	}
	if ("11" == block) {
		displayChange_block_11(status);
	}
	if ("12" == block) {
		displayChange_block_12(status);
	}
	if ("13" == block) {
		displayChange_block_13(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("fclnumero", "", status);
	displayChange_field("fclfechareg", "", status);
	displayChange_field("fclcedula", "", status);
	displayChange_field("fclactivo", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("fclapellidos", "", status);
	displayChange_field("fclnombres", "", status);
	displayChange_field("update_titulo_citas", "", status);
	displayChange_field("fclfechanac", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("fclsexo", "", status);
	displayChange_field("fclestciv", "", status);
	displayChange_field("fcldireccion", "", status);
	displayChange_field("fclciudad", "", status);
	displayChange_field("fcltelefono", "", status);
	displayChange_field("fclcelular", "", status);
	displayChange_field("fclemail", "", status);
	displayChange_field("fclprofesion", "", status);
	displayChange_field("fcllugartrab", "", status);
	displayChange_field("fclfacigual", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("fclfacruc", "", status);
	displayChange_field("fclfacnombre", "", status);
	displayChange_field("fclfacdir", "", status);
	displayChange_field("fclfactelf", "", status);
	displayChange_field("fclfacmail", "", status);
}

function displayChange_block_4(status) {
	displayChange_field("fclreferpub", "", status);
	displayChange_field("fclreferface", "", status);
	displayChange_field("fclreferweb", "", status);
	displayChange_field("fclreferremit", "", status);
	displayChange_field("fclreferremitnom", "", status);
}

function displayChange_block_5(status) {
	displayChange_field("fclmotivprimcons", "", status);
}

function displayChange_block_6(status) {
	displayChange_field("fclproblemactual", "", status);
}

function displayChange_block_7(status) {
	displayChange_field("fclbajotratmed", "", status);
	displayChange_field("fclalerganest", "", status);
	displayChange_field("fclprophemor", "", status);
	displayChange_field("fclintervquir", "", status);
	displayChange_field("fclmediesp", "", status);
	displayChange_field("fclhiperten", "", status);
	displayChange_field("fclhipotiro", "", status);
	displayChange_field("fclaltercora", "", status);
	displayChange_field("fclgastrit", "", status);
	displayChange_field("fclenfsangre", "", status);
	displayChange_field("fcldiabet", "", status);
	displayChange_field("fclhepatit", "", status);
	displayChange_field("fclcancer", "", status);
	displayChange_field("fclvih", "", status);
	displayChange_field("fclartrit", "", status);
	displayChange_field("fclinsufren", "", status);
	displayChange_field("fclotrasenf", "", status);
}

function displayChange_block_8(status) {
	displayChange_field("fclotrasenfdesc", "", status);
}

function displayChange_block_9(status) {
	displayChange_field("fclobserv", "", status);
}

function displayChange_block_10(status) {
	displayChange_field("fclusucrea", "", status);
	displayChange_field("fclfeccrea", "", status);
	displayChange_field("fclusumodi", "", status);
	displayChange_field("fclfecmodi", "", status);
}

function displayChange_block_11(status) {
	displayChange_field("historias", "", status);
}

function displayChange_block_12(status) {
	displayChange_field("presupuestos", "", status);
}

function displayChange_block_13(status) {
	displayChange_field("cobros", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_fclnumero(row, status);
	displayChange_field_fclfechareg(row, status);
	displayChange_field_fclcedula(row, status);
	displayChange_field_fclactivo(row, status);
	displayChange_field_fclapellidos(row, status);
	displayChange_field_fclnombres(row, status);
	displayChange_field_update_titulo_citas(row, status);
	displayChange_field_fclfechanac(row, status);
	displayChange_field_fclsexo(row, status);
	displayChange_field_fclestciv(row, status);
	displayChange_field_fcldireccion(row, status);
	displayChange_field_fclciudad(row, status);
	displayChange_field_fcltelefono(row, status);
	displayChange_field_fclcelular(row, status);
	displayChange_field_fclemail(row, status);
	displayChange_field_fclprofesion(row, status);
	displayChange_field_fcllugartrab(row, status);
	displayChange_field_fclfacigual(row, status);
	displayChange_field_fclfacruc(row, status);
	displayChange_field_fclfacnombre(row, status);
	displayChange_field_fclfacdir(row, status);
	displayChange_field_fclfactelf(row, status);
	displayChange_field_fclfacmail(row, status);
	displayChange_field_fclreferpub(row, status);
	displayChange_field_fclreferface(row, status);
	displayChange_field_fclreferweb(row, status);
	displayChange_field_fclreferremit(row, status);
	displayChange_field_fclreferremitnom(row, status);
	displayChange_field_fclmotivprimcons(row, status);
	displayChange_field_fclproblemactual(row, status);
	displayChange_field_fclbajotratmed(row, status);
	displayChange_field_fclalerganest(row, status);
	displayChange_field_fclprophemor(row, status);
	displayChange_field_fclintervquir(row, status);
	displayChange_field_fclmediesp(row, status);
	displayChange_field_fclhiperten(row, status);
	displayChange_field_fclhipotiro(row, status);
	displayChange_field_fclaltercora(row, status);
	displayChange_field_fclgastrit(row, status);
	displayChange_field_fclenfsangre(row, status);
	displayChange_field_fcldiabet(row, status);
	displayChange_field_fclhepatit(row, status);
	displayChange_field_fclcancer(row, status);
	displayChange_field_fclvih(row, status);
	displayChange_field_fclartrit(row, status);
	displayChange_field_fclinsufren(row, status);
	displayChange_field_fclotrasenf(row, status);
	displayChange_field_fclotrasenfdesc(row, status);
	displayChange_field_fclobserv(row, status);
	displayChange_field_fclusucrea(row, status);
	displayChange_field_fclfeccrea(row, status);
	displayChange_field_fclusumodi(row, status);
	displayChange_field_fclfecmodi(row, status);
	displayChange_field_historias(row, status);
	displayChange_field_presupuestos(row, status);
	displayChange_field_cobros(row, status);
}

function displayChange_field(field, row, status) {
	if ("fclnumero" == field) {
		displayChange_field_fclnumero(row, status);
	}
	if ("fclfechareg" == field) {
		displayChange_field_fclfechareg(row, status);
	}
	if ("fclcedula" == field) {
		displayChange_field_fclcedula(row, status);
	}
	if ("fclactivo" == field) {
		displayChange_field_fclactivo(row, status);
	}
	if ("fclapellidos" == field) {
		displayChange_field_fclapellidos(row, status);
	}
	if ("fclnombres" == field) {
		displayChange_field_fclnombres(row, status);
	}
	if ("update_titulo_citas" == field) {
		displayChange_field_update_titulo_citas(row, status);
	}
	if ("fclfechanac" == field) {
		displayChange_field_fclfechanac(row, status);
	}
	if ("fclsexo" == field) {
		displayChange_field_fclsexo(row, status);
	}
	if ("fclestciv" == field) {
		displayChange_field_fclestciv(row, status);
	}
	if ("fcldireccion" == field) {
		displayChange_field_fcldireccion(row, status);
	}
	if ("fclciudad" == field) {
		displayChange_field_fclciudad(row, status);
	}
	if ("fcltelefono" == field) {
		displayChange_field_fcltelefono(row, status);
	}
	if ("fclcelular" == field) {
		displayChange_field_fclcelular(row, status);
	}
	if ("fclemail" == field) {
		displayChange_field_fclemail(row, status);
	}
	if ("fclprofesion" == field) {
		displayChange_field_fclprofesion(row, status);
	}
	if ("fcllugartrab" == field) {
		displayChange_field_fcllugartrab(row, status);
	}
	if ("fclfacigual" == field) {
		displayChange_field_fclfacigual(row, status);
	}
	if ("fclfacruc" == field) {
		displayChange_field_fclfacruc(row, status);
	}
	if ("fclfacnombre" == field) {
		displayChange_field_fclfacnombre(row, status);
	}
	if ("fclfacdir" == field) {
		displayChange_field_fclfacdir(row, status);
	}
	if ("fclfactelf" == field) {
		displayChange_field_fclfactelf(row, status);
	}
	if ("fclfacmail" == field) {
		displayChange_field_fclfacmail(row, status);
	}
	if ("fclreferpub" == field) {
		displayChange_field_fclreferpub(row, status);
	}
	if ("fclreferface" == field) {
		displayChange_field_fclreferface(row, status);
	}
	if ("fclreferweb" == field) {
		displayChange_field_fclreferweb(row, status);
	}
	if ("fclreferremit" == field) {
		displayChange_field_fclreferremit(row, status);
	}
	if ("fclreferremitnom" == field) {
		displayChange_field_fclreferremitnom(row, status);
	}
	if ("fclmotivprimcons" == field) {
		displayChange_field_fclmotivprimcons(row, status);
	}
	if ("fclproblemactual" == field) {
		displayChange_field_fclproblemactual(row, status);
	}
	if ("fclbajotratmed" == field) {
		displayChange_field_fclbajotratmed(row, status);
	}
	if ("fclalerganest" == field) {
		displayChange_field_fclalerganest(row, status);
	}
	if ("fclprophemor" == field) {
		displayChange_field_fclprophemor(row, status);
	}
	if ("fclintervquir" == field) {
		displayChange_field_fclintervquir(row, status);
	}
	if ("fclmediesp" == field) {
		displayChange_field_fclmediesp(row, status);
	}
	if ("fclhiperten" == field) {
		displayChange_field_fclhiperten(row, status);
	}
	if ("fclhipotiro" == field) {
		displayChange_field_fclhipotiro(row, status);
	}
	if ("fclaltercora" == field) {
		displayChange_field_fclaltercora(row, status);
	}
	if ("fclgastrit" == field) {
		displayChange_field_fclgastrit(row, status);
	}
	if ("fclenfsangre" == field) {
		displayChange_field_fclenfsangre(row, status);
	}
	if ("fcldiabet" == field) {
		displayChange_field_fcldiabet(row, status);
	}
	if ("fclhepatit" == field) {
		displayChange_field_fclhepatit(row, status);
	}
	if ("fclcancer" == field) {
		displayChange_field_fclcancer(row, status);
	}
	if ("fclvih" == field) {
		displayChange_field_fclvih(row, status);
	}
	if ("fclartrit" == field) {
		displayChange_field_fclartrit(row, status);
	}
	if ("fclinsufren" == field) {
		displayChange_field_fclinsufren(row, status);
	}
	if ("fclotrasenf" == field) {
		displayChange_field_fclotrasenf(row, status);
	}
	if ("fclotrasenfdesc" == field) {
		displayChange_field_fclotrasenfdesc(row, status);
	}
	if ("fclobserv" == field) {
		displayChange_field_fclobserv(row, status);
	}
	if ("fclusucrea" == field) {
		displayChange_field_fclusucrea(row, status);
	}
	if ("fclfeccrea" == field) {
		displayChange_field_fclfeccrea(row, status);
	}
	if ("fclusumodi" == field) {
		displayChange_field_fclusumodi(row, status);
	}
	if ("fclfecmodi" == field) {
		displayChange_field_fclfecmodi(row, status);
	}
	if ("historias" == field) {
		displayChange_field_historias(row, status);
	}
	if ("presupuestos" == field) {
		displayChange_field_presupuestos(row, status);
	}
	if ("cobros" == field) {
		displayChange_field_cobros(row, status);
	}
}

function displayChange_field_fclnumero(row, status) {
}

function displayChange_field_fclfechareg(row, status) {
}

function displayChange_field_fclcedula(row, status) {
}

function displayChange_field_fclactivo(row, status) {
}

function displayChange_field_fclapellidos(row, status) {
}

function displayChange_field_fclnombres(row, status) {
}

function displayChange_field_update_titulo_citas(row, status) {
}

function displayChange_field_fclfechanac(row, status) {
}

function displayChange_field_fclsexo(row, status) {
}

function displayChange_field_fclestciv(row, status) {
}

function displayChange_field_fcldireccion(row, status) {
}

function displayChange_field_fclciudad(row, status) {
}

function displayChange_field_fcltelefono(row, status) {
}

function displayChange_field_fclcelular(row, status) {
}

function displayChange_field_fclemail(row, status) {
}

function displayChange_field_fclprofesion(row, status) {
}

function displayChange_field_fcllugartrab(row, status) {
}

function displayChange_field_fclfacigual(row, status) {
}

function displayChange_field_fclfacruc(row, status) {
}

function displayChange_field_fclfacnombre(row, status) {
}

function displayChange_field_fclfacdir(row, status) {
}

function displayChange_field_fclfactelf(row, status) {
}

function displayChange_field_fclfacmail(row, status) {
}

function displayChange_field_fclreferpub(row, status) {
}

function displayChange_field_fclreferface(row, status) {
}

function displayChange_field_fclreferweb(row, status) {
}

function displayChange_field_fclreferremit(row, status) {
}

function displayChange_field_fclreferremitnom(row, status) {
}

function displayChange_field_fclmotivprimcons(row, status) {
}

function displayChange_field_fclproblemactual(row, status) {
}

function displayChange_field_fclbajotratmed(row, status) {
}

function displayChange_field_fclalerganest(row, status) {
}

function displayChange_field_fclprophemor(row, status) {
}

function displayChange_field_fclintervquir(row, status) {
}

function displayChange_field_fclmediesp(row, status) {
}

function displayChange_field_fclhiperten(row, status) {
}

function displayChange_field_fclhipotiro(row, status) {
}

function displayChange_field_fclaltercora(row, status) {
}

function displayChange_field_fclgastrit(row, status) {
}

function displayChange_field_fclenfsangre(row, status) {
}

function displayChange_field_fcldiabet(row, status) {
}

function displayChange_field_fclhepatit(row, status) {
}

function displayChange_field_fclcancer(row, status) {
}

function displayChange_field_fclvih(row, status) {
}

function displayChange_field_fclartrit(row, status) {
}

function displayChange_field_fclinsufren(row, status) {
}

function displayChange_field_fclotrasenf(row, status) {
}

function displayChange_field_fclotrasenfdesc(row, status) {
}

function displayChange_field_fclobserv(row, status) {
}

function displayChange_field_fclusucrea(row, status) {
}

function displayChange_field_fclfeccrea(row, status) {
}

function displayChange_field_fclusumodi(row, status) {
}

function displayChange_field_fclfecmodi(row, status) {
}

function displayChange_field_historias(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_grid_historia")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_grid_historia")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_presupuestos(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_grid_presupuesto")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_grid_presupuesto")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_cobros(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_grid_cobros")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_grid_cobros")[0].contentWindow.scRecreateSelect2();
	}
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_ficha_cliente_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(26);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_fclfechareg" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fclfechareg" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      setTimeout(function() { do_ajax_form_ficha_cliente_validate_fclfechareg(iSeqRow); }, 200);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fclfechareg']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_fclfechanac" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fclfechanac" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      setTimeout(function() { do_ajax_form_ficha_cliente_validate_fclfechanac(iSeqRow); }, 200);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-25:c+25',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fclfechanac']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_fclfeccrea" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fclfeccrea" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['fclfeccrea']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fclfeccrea']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_ficha_cliente_validate_fclfeccrea(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fclfeccrea']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_fclfecmodi" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fclfecmodi" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['fclfecmodi']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fclfecmodi']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_ficha_cliente_validate_fclfecmodi(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fclfecmodi']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_ficha_cliente')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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

