<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<style type="text/css">
.ui-autocomplete { position: absolute; cursor: default; }
.ui-menu {
        list-style:none;
        padding: 10px;
        margin: 0;
        display:block;
        width:500px;
}
.ui-menu .ui-menu {
        margin-top: -3px;
}
.ui-menu .ui-menu-item {
        margin:0;
        padding: 0;
        width: 500px;
}
.ui-menu .ui-menu-item a {
        text-decoration:none;
        display:block;
        font-size: 20px;
        padding:.2em .4em;
        line-height:1.5;
        zoom:1;
}
.ui-menu .ui-menu-item a.ui-state-hover,
.ui-menu .ui-menu-item a.ui-state-active {
        margin: -1px;
}

</style>
<link rel="stylesheet" href="plugin/jquery-ui/jquery-ui.css">
<body>
<div class="ui-widget">
  <label for="tags">Tags: </label>
  <input id="tags">
</div>
</body>
</html>
  <script src="plugin/js/jquery1.js"></script>
  <script src="plugin/jquery-ui/jquery-ui.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){ 
       // $( "#tags" ).autocomplete({
       // source:"rest/server.php?page=cari",
       // minLength: 1,
       //  select: function (event, ui) {
       //     window.location = ui.item.url;
       //  }
       //  });

         $("#tags").autocomplete({
            minLength: 2,
            source: "rest/server.php?page=cari",
            focus: function( event, ui ) {
              $("#tags").val( ui.item.value );
              return false;
            }
          });

         $("#tags").data( "ui-autocomplete" )._renderItem = function( ul, item ) {
    
            var $li = $('<li>'),
                $img = $('<img width="50px" height="80px">');


            $img.attr({
              src: 'cover/' + item.icon,
              alt: item.value
            });

            $li.attr('data-value', item.value);
            $li.append('<a href="'+item.url+'">');
            $li.find('a').append($img).append(item.value);    

            return $li.appendTo(ul);
          };
  
    });
  </script>