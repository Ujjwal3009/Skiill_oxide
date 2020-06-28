<!-- navbar hacks-->
</body>
</html>
<script type="text/javascript" src="js/jquery.js"></script>   
<script type="text/javascript" src="js/materialize.min.js"></script>
<script>
 var el=document.querySelector('.tabs');
 var instance=M.Tabs.init(el,{});
 
   (function($){
       $(function(){
           $('.sidenav').sidenav();
           $('.dropdown-trigger').dropdown();
           $('.carousel').carousel();

       });
   })(jQuery)
   
</script>