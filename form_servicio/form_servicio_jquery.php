
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
  scEventControl_data["sercodigo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sernombre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["serduracion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["espcodigo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["serprecio" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sersincosto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["serusucrea" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["serfeccrea" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["serusumodi" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["serfecmodi" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["sercodigo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sercodigo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sernombre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sernombre" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["serduracion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["serduracion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["espcodigo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["espcodigo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["serprecio" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["serprecio" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sersincosto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sersincosto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["serusucrea" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["serusucrea" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["serfeccrea" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["serfeccrea" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["serusumodi" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["serusumodi" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["serfecmodi" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["serfecmodi" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["espcodigo" + iSeqRow]["autocomp"]) {
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
  $('#id_sc_field_sercodigo' + iSeqRow).bind('blur', function() { sc_form_servicio_sercodigo_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_servicio_sercodigo_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_servicio_sercodigo_onfocus(this, iSeqRow) });
  $('#id_sc_field_sernombre' + iSeqRow).bind('blur', function() { sc_form_servicio_sernombre_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_servicio_sernombre_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_servicio_sernombre_onfocus(this, iSeqRow) });
  $('#id_sc_field_serduracion' + iSeqRow).bind('blur', function() { sc_form_servicio_serduracion_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_servicio_serduracion_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_servicio_serduracion_onfocus(this, iSeqRow) });
  $('#id_sc_field_serprecio' + iSeqRow).bind('blur', function() { sc_form_servicio_serprecio_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_servicio_serprecio_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_servicio_serprecio_onfocus(this, iSeqRow) });
  $('#id_sc_field_espcodigo' + iSeqRow).bind('blur', function() { sc_form_servicio_espcodigo_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_servicio_espcodigo_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_servicio_espcodigo_onfocus(this, iSeqRow) });
  $('#id_sc_field_sersincosto' + iSeqRow).bind('blur', function() { sc_form_servicio_sersincosto_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_servicio_sersincosto_onchange(this, iSeqRow) })
                                         .bind('click', function() { sc_form_servicio_sersincosto_onclick(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_servicio_sersincosto_onfocus(this, iSeqRow) });
  $('#id_sc_field_seriva' + iSeqRow).bind('change', function() { sc_form_servicio_seriva_onchange(this, iSeqRow) });
  $('#id_sc_field_serusucrea' + iSeqRow).bind('blur', function() { sc_form_servicio_serusucrea_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_servicio_serusucrea_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_servicio_serusucrea_onfocus(this, iSeqRow) });
  $('#id_sc_field_serusumodi' + iSeqRow).bind('blur', function() { sc_form_servicio_serusumodi_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_servicio_serusumodi_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_servicio_serusumodi_onfocus(this, iSeqRow) });
  $('#id_sc_field_serfeccrea' + iSeqRow).bind('blur', function() { sc_form_servicio_serfeccrea_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_servicio_serfeccrea_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_servicio_serfeccrea_onfocus(this, iSeqRow) });
  $('#id_sc_field_serfeccrea_hora' + iSeqRow).bind('blur', function() { sc_form_servicio_serfeccrea_hora_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_servicio_serfeccrea_hora_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_servicio_serfeccrea_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_serfecmodi' + iSeqRow).bind('blur', function() { sc_form_servicio_serfecmodi_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_servicio_serfecmodi_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_servicio_serfecmodi_onfocus(this, iSeqRow) });
  $('#id_sc_field_serfecmodi_hora' + iSeqRow).bind('blur', function() { sc_form_servicio_serfecmodi_hora_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_servicio_serfecmodi_hora_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_servicio_serfecmodi_hora_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_servicio_sercodigo_onblur(oThis, iSeqRow) {
  do_ajax_form_servicio_validate_sercodigo();
  scCssBlur(oThis);
}

function sc_form_servicio_sercodigo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_servicio_sercodigo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_servicio_sernombre_onblur(oThis, iSeqRow) {
  do_ajax_form_servicio_validate_sernombre();
  scCssBlur(oThis);
}

function sc_form_servicio_sernombre_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_servicio_sernombre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_servicio_serduracion_onblur(oThis, iSeqRow) {
  do_ajax_form_servicio_validate_serduracion();
  scCssBlur(oThis);
}

function sc_form_servicio_serduracion_onchange(oThis, iSeqRow) {
  scJQSlideValue("serduracion" + iSeqRow, iSeqRow);
  scMarkFormAsChanged();
}

function sc_form_servicio_serduracion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_servicio_serprecio_onblur(oThis, iSeqRow) {
  do_ajax_form_servicio_validate_serprecio();
  scCssBlur(oThis);
}

function sc_form_servicio_serprecio_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_servicio_serprecio_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_servicio_espcodigo_onblur(oThis, iSeqRow) {
  do_ajax_form_servicio_validate_espcodigo();
  scCssBlur(oThis);
}

function sc_form_servicio_espcodigo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_servicio_espcodigo_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_servicio_sersincosto_onblur(oThis, iSeqRow) {
  do_ajax_form_servicio_validate_sersincosto();
  scCssBlur(oThis);
}

function sc_form_servicio_sersincosto_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_servicio_sersincosto_onclick(oThis, iSeqRow) {
  do_ajax_form_servicio_event_sersincosto_onclick();
}

function sc_form_servicio_sersincosto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_servicio_seriva_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_servicio_serusucrea_onblur(oThis, iSeqRow) {
  do_ajax_form_servicio_validate_serusucrea();
  scCssBlur(oThis);
}

function sc_form_servicio_serusucrea_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_servicio_serusucrea_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_servicio_serusumodi_onblur(oThis, iSeqRow) {
  do_ajax_form_servicio_validate_serusumodi();
  scCssBlur(oThis);
}

function sc_form_servicio_serusumodi_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_servicio_serusumodi_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_servicio_serfeccrea_onblur(oThis, iSeqRow) {
  do_ajax_form_servicio_validate_serfeccrea();
  scCssBlur(oThis);
}

function sc_form_servicio_serfeccrea_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_servicio_validate_serfeccrea();
  scCssBlur(oThis);
}

function sc_form_servicio_serfeccrea_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_servicio_serfeccrea_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_servicio_serfeccrea_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_servicio_serfeccrea_hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_servicio_serfecmodi_onblur(oThis, iSeqRow) {
  do_ajax_form_servicio_validate_serfecmodi();
  scCssBlur(oThis);
}

function sc_form_servicio_serfecmodi_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_servicio_validate_serfecmodi();
  scCssBlur(oThis);
}

function sc_form_servicio_serfecmodi_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_servicio_serfecmodi_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_servicio_serfecmodi_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_servicio_serfecmodi_hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("sercodigo", "", status);
	displayChange_field("sernombre", "", status);
	displayChange_field("serduracion", "", status);
	displayChange_field("espcodigo", "", status);
	displayChange_field("serprecio", "", status);
	displayChange_field("sersincosto", "", status);
	displayChange_field("serusucrea", "", status);
	displayChange_field("serfeccrea", "", status);
	displayChange_field("serusumodi", "", status);
	displayChange_field("serfecmodi", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_sercodigo(row, status);
	displayChange_field_sernombre(row, status);
	displayChange_field_serduracion(row, status);
	displayChange_field_espcodigo(row, status);
	displayChange_field_serprecio(row, status);
	displayChange_field_sersincosto(row, status);
	displayChange_field_serusucrea(row, status);
	displayChange_field_serfeccrea(row, status);
	displayChange_field_serusumodi(row, status);
	displayChange_field_serfecmodi(row, status);
}

function displayChange_field(field, row, status) {
	if ("sercodigo" == field) {
		displayChange_field_sercodigo(row, status);
	}
	if ("sernombre" == field) {
		displayChange_field_sernombre(row, status);
	}
	if ("serduracion" == field) {
		displayChange_field_serduracion(row, status);
	}
	if ("espcodigo" == field) {
		displayChange_field_espcodigo(row, status);
	}
	if ("serprecio" == field) {
		displayChange_field_serprecio(row, status);
	}
	if ("sersincosto" == field) {
		displayChange_field_sersincosto(row, status);
	}
	if ("serusucrea" == field) {
		displayChange_field_serusucrea(row, status);
	}
	if ("serfeccrea" == field) {
		displayChange_field_serfeccrea(row, status);
	}
	if ("serusumodi" == field) {
		displayChange_field_serusumodi(row, status);
	}
	if ("serfecmodi" == field) {
		displayChange_field_serfecmodi(row, status);
	}
}

function displayChange_field_sercodigo(row, status) {
}

function displayChange_field_sernombre(row, status) {
}

function displayChange_field_serduracion(row, status) {
}

function displayChange_field_espcodigo(row, status) {
}

function displayChange_field_serprecio(row, status) {
}

function displayChange_field_sersincosto(row, status) {
}

function displayChange_field_serusucrea(row, status) {
}

function displayChange_field_serfeccrea(row, status) {
}

function displayChange_field_serusumodi(row, status) {
}

function displayChange_field_serfecmodi(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_servicio_form" + pageNo).hide();
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
  $("#id_sc_field_serfeccrea" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_serfeccrea" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['serfeccrea']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['serfeccrea']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_servicio_validate_serfeccrea(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['serfeccrea']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_serfecmodi" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_serfecmodi" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['serfecmodi']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['serfecmodi']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_servicio_validate_serfecmodi(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['serfecmodi']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_servicio')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
});function scJQSlideAdd(seqRow) {
  $("#sc-ui-slide-serduracion" + seqRow).slider({
    min: 5,
    max: 180,
    range: "min",
    step: 5,
    slide: function(event, ui) {
      var thisValue = ui.value;
      if (_scOnInputSupport && !_scMacOs) {
        $("#id_sc_field_serduracion" + seqRow).val(thisValue);
        $("#id_sc_field_serduracion" + seqRow).scInput("formatValue");
      }
      else {
        $("#id_sc_field_serduracion" + seqRow).val(scFormatValue_serduracion(thisValue));
      }
      var changedRow = $("input[name='sc_check_vert[" + seqRow + "]']");
      if (changedRow.length) {
        $(changedRow[0]).prop("checked", true);
      }
    },
    stop: function(event, ui) {
        $("#id_sc_field_serduracion" + seqRow).change();
    }
  });
  scJQSlideValue("serduracion" + seqRow, seqRow);
} // scJQSlideAdd

function scFormatValue_serduracion(thisValue) {
<?php
if ('.' == $this->field_config['serduracion']['symbol_grp']) {
?>
  thisValue = thisValue.toLocaleString("pt");
<?php
}
elseif (',' == $this->field_config['serduracion']['symbol_grp']) {
?>
  thisValue = thisValue.toLocaleString("en");
<?php
}
elseif ('' != $this->field_config['serduracion']['symbol_grp']) {
?>
  thisValue = thisValue.toLocaleString("pt").replace(new RegExp(scRegExpQuote("."), "g"), "<?php echo $this->field_config['serduracion']['symbol_grp']; ?>");
<?php
}
?>
  return thisValue;
} // scFormatValue_serduracion

function scUnformatValue_serduracion(thisValue) {
<?php
if ('' != $this->field_config['serduracion']['symbol_grp']) {
?>
  thisValue = thisValue.replace(new RegExp(scRegExpQuote("<?php echo $this->field_config['serduracion']['symbol_grp']; ?>"), "g"), "");
<?php
}
?>
  return thisValue;
} // scUnformatValue_serduracion

function scJQSlideValue(fieldName, seqRow) {
  var fieldValue = $("#id_sc_field_" + fieldName).val();
  var testFieldName = fieldName;
  if ("" != seqRow) {
    testFieldName = testFieldName.substr(0, testFieldName.length - seqRow.toString().length);
  }
  if ("serduracion" == testFieldName) {
    fieldValue = scUnformatValue_serduracion(fieldValue);
  }
  if ("" == fieldValue) {
    return;
  }
  fieldValue = parseFloat(fieldValue);
  if ("number" != typeof(fieldValue)) {
    return;
  }
  $("#sc-ui-slide-" + fieldName).slider("value", fieldValue);
} // scJQSlideValue

function scRegExpQuote(str) {
  return str.replace(/([.?*+^$[\]\\(){}|-])/g, "\\$1");
} // scRegExpQuote


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQUploadAdd(iLine);
  scJQSlideAdd(iLine);
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

