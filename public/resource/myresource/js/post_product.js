$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
function readURL(input, id) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $(id).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$('#InputFile1').click(function () {
    $('#InputFile_1').click();
});
$('#InputFile2').click(function () {
    $('#InputFile_2').click();
});
$('#InputFile3').click(function () {
    $('#InputFile_3').click();
});
$('#InputFile4').click(function () {
    $('#InputFile_4').click();
});
$("#InputFile_1").change(function () {
    readURL(this, "#InputFile1");
});
$("#InputFile_2").change(function () {
    readURL(this, "#InputFile2");
});
$("#InputFile_3").change(function () {
    readURL(this, "#InputFile3");
});
$("#InputFile_4").change(function () {
    readURL(this, "#InputFile4");
});