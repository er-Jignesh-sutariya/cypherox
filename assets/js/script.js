"use strict";

const base_url = $('input[name="base_url"]').val();

const checkPrompt = (id) => {
  if (confirm("Are you sure?") === true) document.getElementById(id).submit();
};

var ajaxReq = "ToCancelPrevReq";

const submitForm = (form) => {
  const task = $("#t_name").val();

  if (task) {
    $("#error_msg").html("");

    ajaxReq = $.ajax({
      url: $(`#${form}`).attr("action"),
      type: "POST",
      data: { t_name: task },
      dataType: "json",
      async: false,
      beforeSend: function () {
        if (ajaxReq != "ToCancelPrevReq" && ajaxReq.readyState < 4) {
          ajaxReq.abort();
        }
      },
      success: function (result) {
        if (result.error === true) $("#error_msg").html(result.message);
        else location.reload();
      },
      error: function (xhr, ajaxOptions, thrownError) {},
    });
  } else {
    $("#error_msg").html("Enter task.");
  }
};