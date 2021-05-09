
$('button[name=sepeteEkle]').click(function(){
  var urunId = $(this).attr('urunId');
  var urunAdet = $('input[name=urunAdet'+urunId+']').val();

  $.ajax({
    url: 'post.php',
    type: 'post',
    data: {'urunId':urunId, 'urunAdet':urunAdet},
    dataType: 'json',
    success: function(resp){
      alert(resp.mesaj);
    }
  });
});
