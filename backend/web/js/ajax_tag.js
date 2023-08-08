let tags = [];
$("#ajaxCrudModal").on("shown.bs.modal", function (e) {
  var currentTags = $("#artikel-tag").val();
  var text = e.currentTarget.innerText;
  var subsText = text.substr(2, 6);
  if (subsText === "Create") {
    tags = [];
  } else if (subsText === "Update") {
    tags = currentTags.split(",");
  }
});

function tambahtag(event) {
  var tag = $("#tag").val();
  var keycode = event.keyCode ? event.keyCode : event.which;
  if (keycode == "13" && tag != "") {
    $.each(tags, function (index, value) {
      if (value === tag) {
        throw alert("Tag sudah digunakan.");
      }
    });

    tags.push(tag);
    $("#tag").val("");
    $("#tag-wrap").append(`<div class="tag badge badge-pill badge-primary">
            <span class="txt-tag">${tag}</span>
            <span style="color: black; font-weight: bold; cursor: pointer; padding-left: 3px;" onclick="hapustag('${tag}')">x<span>
        </div>
        `);
    $("#artikel-tag").val(tags.join(","));
  }
}

function hapustag(tag) {
  $.each(tags, function (index, value) {
    if (tag === value) {
      tags.splice(index, "1");
      $(".tag")[index].remove();
      $("#artikel-tag").val(tags);
    }
  });
}

function btnMore() {
  tags = [];
}
